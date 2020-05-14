<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="list">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button type="button" v-on:click="toAddPage" class="btn btn-block bg-gradient-primary"><i class="fas fa-plus" style="font-size:12px;margin-right:5px"></i>เพิ่ม</button>
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="5%" class="text-center">ลำดับ</th>
                                        <th width="20%">ชื่อ</th>
                                        <th class="text-left">อีเมล</th>
                                        <th class="text-center">กลุ่ม</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center">อัพเดทเมื่อวันที่</th>
                                        <th width="20%">การจัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item,index) in items" :key="item.message">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{item.full_name}}</td>
                                        <td class="text-left">{{item.email}}</td>
                                        <td class="text-center">{{item.group_name}}</td>
                                       
                                        <td class="text-center">
                                            <!-- <span class="tag tag-success">{{item.status}}</span> -->
                                            <span class="badge badge-success">{{item.status}}</span>
                                            <!-- <div v-if="item.status === 'enable'">
                                                <span class="badge badge-success">{{item.status}}</span>
                                            <div v-else>
                                                <span class="badge badge-success">{{item.status}}</span>
                                            </div> -->
                                        </td>
                                        <td class="text-center">
                                            <span v-if="item.update_at">{{item.updated_at}}<br> {{item.updated_by}}  </span v-else><span>-</span>                         
                                       </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="<?php $this->url; ?>/edit">แก้ไข</a>
                                                        <!-- <a class="dropdown-item" href="#">คัดลอก</a> -->
                                                        <a class="dropdown-item" href="#" v-on:click="updateStatus(item.id)">ปิดการใช้งาน</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" v-on:click="handleDelete(item.id)">ลบ</a>

                                                    </div>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
<!-- <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="application/javascript" src="<?php echo base_url() ?>assets/js/user/list.js"></script>