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
                        <li class="breadcrumb-item active"><?php echo isset($this->module_title)?$this->module_title:'';?></li>
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
                                 <button type="button" v-on:click="exportExcel" class="btn btn-block bg-gradient-primary"> <i class="fas fa-file-download" style="font-size:12px;margin-right:5px"></i>Excel</button>
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
                                        <th width="20%">ชื่อระบบ</th>
                                        <th class="text-left">พฤติกรรม</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center">เมื่อวันที่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item,index) in items" :key="item.id">
                                        <td class="text-center">{{index+1}}</td>
                                        <td>{{item.module}}</td>
                                        <td class="text-left">{{item.action}}</td>
                                        <td class="text-center">{{item.status}}</td>
                                        <td class="text-center">
                                            <span v-if="item.created_at">{{item.created_at}}<br> {{item.full_name}}  </span>
                                            <span v-else><span>-</span>                         
                                       </td>
                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
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
<script type="application/javascript" src="<?php echo base_url() ?>assets/js/log-activity/list.js"></script>