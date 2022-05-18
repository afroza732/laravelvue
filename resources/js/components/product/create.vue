<template>
    <div class="container-fluid">
        <form id="quickForm" method="post" @submit.prevent="submitForm">
        <div class="row">
            <show-errors></show-errors>
            <!-- left column -->
            <div class="col-md-6">
            <!-- jquery validation -->
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Category <span style="color:red;">*</span></label>
                            <Select2 v-model="form.category_id" :options="categories" :settings="{ placeholder: 'Select Category'}"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Brand <span style="color:red;">*</span></label>
                            <Select2 v-model="form.brand_id" :options="brands" :settings="{ placeholder: 'Select Brand'}"/>
                        </div>
                        <div class="form-group">
                            <label for="sku">SKU<span style="color:red;">*</span></label>
                            <input type="text"  v-model="form.sku" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Name<span style="color:red;">*</span></label>
                            <input type="text"  v-model="form.name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Image<span style="color:red;">*</span></label>
                            <input @change="selectImage" type="file"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cost_price">Cost Price($)<span style="color:red;">*</span></label>
                            <input type="text" v-model="form.cost_price"   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="retail_price">Retail Price($)<span style="color:red;">*</span></label>
                            <input type="text" v-model="form.retail_price"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="year">Year<span style="color:red;">*</span></label>
                            <input type="text" v-model="form.year"  class="form-control" placeholder="Product Year[EX:2022]">
                        </div>
                        <div class="form-group">
                            <label for="year">Description<span style="color:red;">*</span></label>
                            <input type="text" v-model="form.description"  class="form-control" placeholder="Product Description[MAX:2022]">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <div class="row" v-for="(item,index) in form.items" :key="index">
                    <div class="col-sm-4">
                        <div class="form-group">
                           <select class="form-control" v-model="item.size_id">
                               <option value="0">Select Size</option>
                               <option v-for="(size,index) in sizes" :key="index" :value="size.id">{{ size.size }}</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" v-model="item.location" placeholder="Location">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" v-model="item.quantity" placeholder="Quantity">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" @click="deleteItem(index)" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
                 <button @click="addItem" type="button" class="btn-sm btn-primary mt-1">+Add Item</button>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </form>
    </div><!-- /.container-fluid -->
</template>
<script>
    import store from '../../store'
    import * as actions from '../../store/action-type'
    import { mapGetters } from 'vuex'
    import Select2 from 'vue3-select2-component';
    import showErrors from '../utils/showErrors';
    export default{
        components: {Select2,showErrors},
        data(){
            return{
                form:{
                    category_id : '',
                    brand_id : '',
                    sku : '',
                    name : '',
                    image : '',
                    cost_price : 0,
                    retail_price : 0,
                    year : '',
                    description : '',
                    status : 1,
                    items:[
                       {
                            size_id : 0,
                            location : '',
                            quantity : 0,
                       }
                    ]
                }
            }
        },
        computed: {
            // mix the getters into computed with object spread operator
            ...mapGetters({
                categories: 'getCategories',
                brands: 'getBrands',
                sizes: 'getSizes'
            })

        },
        mounted(){
            store.dispatch(actions.GET_CATEGORIES),
            store.dispatch(actions.GET_BRANDS),
            store.dispatch(actions.GET_SIZES)
        },
        methods:{
            selectImage(e){
                this.form.image = e.target.files[0];
            },
            addItem(){
                let item =  { size_id : 0,location : '', quantity : 0}
                this.form.items.push(item)
            },
            deleteItem(index){
                this.form.items.splice(index,1)
            },
            submitForm(){
                let data = new FormData();
                data.append('category_id',this.form.category_id);
                data.append('brand_id',this.form.brand_id);
                data.append('sku',this.form.sku);
                data.append('name',this.form.name);
                data.append('image',this.form.image);
                data.append('cost_price',this.form.cost_price);
                data.append('retail_price',this.form.retail_price);
                data.append('year',this.form.year);
                data.append('description',this.form.description);
                data.append('status',this.form.status);
                data.append('items',JSON.stringify(this.form.items));
                store.dispatch(actions.ADD_PRODUCT,data);
            }
        }
    }
</script>
