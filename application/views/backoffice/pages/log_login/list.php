<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="list">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo isset($this->module_title)?$this->module_title:'';?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo isset($this->module_title)?$this->module_title:'';?></li></li>
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
                <div class="col-md-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button type="button" v-on:click="exportExcel" class="btn btn-block bg-gradient-primary"><i class="fas fa-file-download" style="font-size:12px;margin-right:5px"></i>Excel</button>
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
                                        <th width="20%">ชื่อผู้เข้าใช้</th>
                                        <th class="text-left">พฤติกรรม</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center">เมื่อวันที่</th>
                                    </tr>
                                </thead>
                                <tbody v-if="items.length > 0">
                                    <tr v-for="(item,index) in items" :key="item.id">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{item.username}}</td>
                                        <td class="text-left">{{item.action}}</td>
                                        <td class="text-center">{{item.status}}</td>
                                        <td class="text-center">{{item.date_time}} </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr colspan="5">
                                        <td class="text-center">ไม่มีข้อมูล</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <?php /*if ($num_rows > 11) : ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <?php
                                $page = ceil($num_rows/10);
                                for ($i = 1; $i  <= $page; $i++) : ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $this->url . 'view?page='.$i ?>"><?php echo $i?></a></li>

                                <?php endfor; ?>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    <?php endif;*/ ?>
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
<script type="application/javascript" src="<?php echo base_url() ?>assets/js/log-login/list.js"></script>