<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="add">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">เพิ่ม</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>backoffice/dashboard/view">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo isset($this->url) ? $this->url . 'view' : '#'; ?>">User</a></li>
                        <li class="breadcrumb-item active">เพิ่ม</li>
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
                            <h3 class="card-title"><?php echo isset($this->module_title) ? $this->module_title : '-'; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" @submit="checkForm" action="<?php echo $action_url ?>">
                            <div class="card-body overlay-wrapper">
                                <div v-if="isVerity" class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    <div class="text-bold pt-2"> กำลังตรวจสอบ...</div>
                                </div>
                                <div class="form-group col-md-12 col-xl-8">
                                    <label for="InputFullName">ชื่อ-นามสกุล</label>
                                    <input type="text" name="full_name" v-bind:class="{'is-invalid':isErrorName}" class="form-control" id="InputFullName" v-model="full_name" placeholder="full name" autocomplete="off">
                                    <div class="invalid-feedback">
                                        กรุณากรอกชื่อ-นามสกุล
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-8">
                                    <label for="InputEmail">Email address</label>
                                    <input type="email" name="email" v-bind:class="{'is-invalid':isErrorEmail}" class="form-control" id="InputEmail" v-model="email" placeholder="Enter email" autocomplete="off">
                                    <div class="invalid-feedback">
                                        กรุณากรอกอีเมล
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-8">
                                    <label for="InputPassword">รหัสผ่าน</label>
                                    <input type="password" name="password" v-bind:class="{'is-invalid':isErrorPassword}" class="form-control" id="InputPassword" v-model="password" autocomplete="off">
                                    <div class="invalid-feedback">
                                        กรุณากรอกรหัสผ่าน
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-xl-8">
                                    <label for="InputConfirmPassword">ยืนยันรหัสผ่าน</label>
                                    <input type="password" name="confirm_password" v-bind:class="{'is-invalid':isErrorPassword}" class="form-control" id="InputConfirmPassword" v-model="confirmPassword" autocomplete="off">
                                    <div class="invalid-feedback">
                                        กรุณากรอกยืนยันรหัสผ่าน
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="radioGroup">Group</label>
                                    <?php if (!empty($group)) :
                                        foreach ($group as $k => $v) : ?>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="radioGroup<?php echo $k ?>" name="group_id" v-model="group_id" value="<?php echo $v->id; ?>">
                                                <label for="radioGroup<?php echo $k ?>" class="custom-control-label"><?php echo $v->name; ?></label>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="radioStatus">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status" v-model="status" value="enable">
                                        <label for="customRadio1" class="custom-control-label">เปิดการใช้งาน</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status" v-model="status" value="disabled">
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
    window.url = "<?php echo $this->url; ?>"
</script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="application/javascript" src="<?php echo base_url() ?>assets/js/user/add.js"></script>