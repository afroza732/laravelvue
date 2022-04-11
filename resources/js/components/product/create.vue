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
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name">
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
    export default{

    }
</script>