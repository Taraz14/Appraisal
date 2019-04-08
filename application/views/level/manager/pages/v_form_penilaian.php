<script>
$(document).ready(function(){
    if(localStorage.getItem('attr') == 'show'){
        $('.hidup').show();
        $('.mati').hide();
    }
    else{
        $('.hidup').hide();
        $('.mati').show();
    }
})
</script>

<div id="page-wrapper" class="mati">
    <img src="<?= base_url('assets/img/errorpnc.png')?>" height="100%" width="100%">
</div>

<div id="page-wrapper" class="hidup diver">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form Penilaian</h1>
        </div>
        <!-- /.col-lg-12 -->
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Penilaian Karyawan</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Penilaian Karyawan
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" action="<?= site_url('ip')?>" method="POST">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <td>
                                        <label>Pilih Karyawan</label>
                                    </td>
                                    <td>
                                        
                                        <select class="form-control" name="nama_karyawan" required>
                                            <option value="" disabled selected>Pilih Karyawan</option>
                                            <?php
                                                foreach ($name_user as $name) {
                                                    echo '<option value="'.$name->id_user.'">'.$name->name_user.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </div>
                            </div>
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <label>Tanggal Penilaian : </label>
                                    <div class='input-group'>
                                        <input type='text' class="form-control" name="tgl_nilai" value="<?= date('d-m-Y'); ?>" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Periode : </label>
                                    <div class="input-group date" id="startmonth" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#startmonth" name="startmonth" />
                                        <div class="input-group-addon" data-target="#startmonth" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>-</label>
                                    <div class="input-group date" id="endmonth" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#endmonth" name="endmonth" />
                                        <div class="input-group-addon" data-target="#endmonth" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Penilai : </label>
                                    <div class='input-group date'>
                                        <input type="text" class="form-control" value="<?= $penilai->name_user;?>" disabled>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary" style="float:right;">Go</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
            </div>
        </div>
    </div>
</div>