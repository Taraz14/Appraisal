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
                <a href="<?php echo base_url('pnc');?>">Dashboard</a>
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
                                <div class="col-sm-2">
                                    <select class="form-control" name="periode" id="periode">
                                        <option value="" disabled selected>Periode</option>
                                            <?php foreach ($periode as $row) {
                                                echo '<option value="'.$row->periode.'">'.$row->periode.'</option>';
                                            } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control" name="tahun" id="tahun">
                                        <option value="" disabled selected>Pilih Tahun</option>
                                            <?php foreach ($tahun as $row) {
                                                echo '<option value="'.$row->tahun_periode.'">'.$row->tahun_periode.'</option>';
                                            } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control" name="department" id="department">
                                        <option value="" disabled selected>Pilih Department</option>
                                            <?php foreach ($depart as $row) {
                                                echo '<option value="'.$row->department.'">'.$row->department.'</option>';
                                            } ?>
                                    </select>
                                </div>
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

    </div>
</div>