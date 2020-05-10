<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="add">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12 col-xl-10">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">User </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" @submit="checkForm" action="<?php echo base_url() ?>backoffice/user/store">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFullName">Full name</label>
                                    <input type="text" name="full_name" v-bind:class="{'is-invalid':isErrorName}" class="form-control" id="exampleInputFullName" v-model="full_name" placeholder="full name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" v-bind:class="{'is-invalid':isErrorEmail}" class="form-control" id="exampleInputEmail1" v-model="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status" v-model="status" value="enable" checked>
                                        <label for="customRadio1" class="custom-control-label">เปิดการใช้งาน</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status"  v-model="status" value="disabled">
                                        <label for="customRadio2" class="custom-control-label">ปิดการใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
     window.url = "<?php echo $this->url;?>"
</script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="application/javascript" src="<?php echo base_url() ?>assets/js/add.js"></script>