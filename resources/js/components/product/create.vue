<template>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
                <!-- form start -->
                <form id="quickForm" method="post" action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <Select2 v-model="form.category_id" :options="categories" :settings="{ placeholder: 'Select Category'}"/>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                </form>
            </div>
            <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</template>
<script>
    import store from '../../store'
    import * as actions from '../../store/action-type'
    import { mapGetters } from 'vuex'
    import Select2 from 'vue3-select2-component';
    export default{
        components: {Select2},
        data(){
            return{
                form:{
                    category_id : 0
                }
            }
        },
        computed: {
            // mix the getters into computed with object spread operator
            ...mapGetters({
                categories: 'getCategories'
            })
           
        },  
        mounted(){
            store.dispatch(actions.GET_CATEGORIES)
        }
    }
</script>