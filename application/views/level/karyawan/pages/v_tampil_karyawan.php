<style type="text/css" media="screen">
    .a{
        cursor: pointer;
        color: #333333;
    }
    .test{
        width:50px;
        float:right;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tampil Nilai Karyawan</h1>
        </div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tampil Nilai Karyawan</li>
        </ol>

       <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tampil Nilai Karyawan
                    </div>
                    <div class="panel-body">
                        <div class="row">  
                            <form>
                                <div class="container-fluid">
                                <table class="table table-striped table-bordered" id="karyawan_table">
                                    <thead>
                                        <tr>
                                            <th>ID.</th>
                                            <th>Nama Karyawan</th>
                                            <th>Department</th>
                                            <th>Tanggal Penilaian</th>
                                            <th>Periode</th>
                                            <th>Jumlah Skor</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>                             
                                </table>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="detail_nilai" tabindex="-1" role="dialog" aria-labelledby="detail_nilaiTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="detail_nilaiTitle">Detail Nilai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                    <table id="detail_table" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul Aspek</th>
                                <th>Aspek</th>
                                <th>Detail Aspek</th>
                                <th>Tahun Periode</th>
                                <th>Periode</th>
                                <th>Nilai</th>
                                <th>Tanggal Penilaian</th>
                            </tr>
                        </thead>                             
                    </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
    </div>
</div>