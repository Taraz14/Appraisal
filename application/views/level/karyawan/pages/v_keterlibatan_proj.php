<style>
hr {
    border: none;
    height: 1px;
    /* Set the hr color */
    color: #333; /* old IE */
    background-color: #333; /* Modern Browsers */
}
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Keterlibatan Project</h1>
        </div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Keterlibatan Project</li>
        </ol>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                    Keterlibatan Project
                </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="<?= base_url('assets/img/logo.jpg')?>" style="float:left;">
                                <h1>FORM KETERLIBATAN PROJECT</h1>
                                <!-- <div class="col-sm-1">
                                    <p>Department</p>
                                    <p>Periode</p>
                                    <p>Nama</p>
                                </div>
                                <div class="col-sm-1 text-right">
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                </div>
                                <div class="col-sm-1">
                                    <p>Produksi</p>
                                    <p>Januari</p>
                                    <p>Ceryl</p>
                                </div> -->
                                <table border=0>
                                    <tr>
                                        <td><b>Department</b></td>
                                        <td width="30%" align="right"><b>: </b></td>
                                        <td><b><?= $profile->department?></b></td>
                                    </tr>
                                    <br/>
                                    <tr>
                                        <td><b>Nama</td>
                                        <td width="30%" align="right"><b>: </b></td>
                                        <td><b><?= $profile->name_user?></td>
                                    </tr>
                                </table>
                                <hr width="85%"/>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">ID Project</th>
                                            <th class="text-center">Nama Pekerjaan</th>
                                            <th class="text-center">Keterlibatan</th>
                                            <th class="text-center">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
		       						    $no = 0; 
                                        foreach ($proj as $dat) {
                                        $no++; 
		       						?>
                                        <tr>
                                            <td class="text-center"><?= $no?></td>
                                            <td class="text-center"><?= $dat->pid;?></td>
                                            <td class="text-center"><?= $dat->peker;?></td>
                                            <td class="text-center"><?= $dat->plibat;?></td>
                                            <td class="text-center"><?= $dat->pengan;?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>