<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Input Penilaian Karyawan</h1>
        </div>
        <!-- /.col-lg-12 -->
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= site_url('fp');?>">Penilaian Karyawan</a>
            </li>
            <li class="breadcrumb-item active">Input Penilaian</li>
        </ol>
        <div class="row" id="nilai">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" align="center">
                        Form Penilaian Karyawan
                    </div>
                    <div class="panel-body">

                        <?= form_open_multipart(site_url('push'), array("method" => "POST", "autocomplete" => "off", "id" => "formnilai")) ?>
                        <input type="hidden" name="id_u" value="<?= $id_kar?>">
                            <table border="0" width="100%">
                                <tr>
                                    <td><b>Nama Karyawan</b></td>
                                    <td>:</td>
                                    <td><input type="hidden" name="kar" value="<?= $nama_karyawan;?>"/><?= $nama_karyawan?></td>
                                    <td width="40%"></td>
                                    <td><b>Tanggal Penilaian</b>
                                        <td>:</td>
                                        <td><?= date('d-m-Y'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Periode</b></td>
                                        <td>:</td>
                                        <td><input type="hidden" name="per" value="<?= $periode;?>"><?= $periode ?></td>
                                        <td width="40%"></td>
                                        <td><b>Penilai</b>
                                            <td>:</td>
                                            <td><?= $penilai->name_user?></td>
                                        </tr>
                                    </table>
                    <hr/>
             
                    <div class="col-lg-4" style="float: right" id="showskor">
                        <table class="table">
                            <tbody>
                                <td align="right"><h3>Total Skor : </h3></td>
                                <td style="background-color: yellow" class="text-center"><h3 id="sk">0</h3></td>
                            </tbody>
                        </table>
                    </div>

                    <?php
              
                        foreach ($aspek as $index => $isi) {
                            $judul = $isi->jud;
                       
                    ?>
                    <div class="col-sm-12">
                                <h3><?= ($index+1).". ".$judul ?></h3>
                            </div>

                            <table class="table table-bordered" border="1" width="100%">
                                <tr style="background-color:yellow;">
                                    <th class="text-center" rowspan="2">No.</th>
                                    <th class="text-center" rowspan="2">Aspek</th>
                                    <th class="text-center" rowspan="2">Detail Aspek</th>
                                    <th class="text-center" rowspan="2">Bobot</th>
                                    <th class="text-center" colspan="5">Penilaian</th>
                                </tr>
                                <tr align="center" style="background-color:yellow;">  
                                    <td>0</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                
                                <?php
                                $nomor = 1;
                                foreach ($aspek_isi as $as_isi) {
                                    
                                    if ($as_isi->ajas == $isi->ajas) {
                                        $no = $nomor++;
                                        $rb = 'rb_nilai'.$as_isi->asid;
                                        // echo $rb;

                                ?>
                                        <tr align="center">
                                           <td><?=$no?>.</td>
                                           <td><?=$as_isi->asas?></td>
                                           <td><?= $as_isi->asdet?></td>
                                           <td>10</td>
                                           <!-- <input type="hidden" name="id_asp" value="<?= $as_isi->asp ?>"> -->
                         
                                            <td><input type="radio" name="<?= $rb ?>" value="0" class="calc"/></td>
                                            <td><input type="radio" name="<?= $rb ?>" value="1" class="calc"/></td>
                                            <td><input type="radio" name="<?= $rb ?>" value="2" class="calc"/></td>
                                            <td><input type="radio" name="<?= $rb ?>" value="3" class="calc"/></td>
                                            <td><input type="radio" name="<?= $rb ?>" value="4" class="calc"/></td>
                                       </tr>
                                              <?php
                                
                                        }
                                    }
                                ?>
                           </table>
                           <?php 
                           
                             } ?>
                        <div class="col-lg-3" style="float: right">
                            <table border='0' width="100%" class="table">
                                <tr>
                                    <td class="text-center">
                                        <a href="<?= site_url('fp');?>" class="btn btn-danger" id="cancel">Cancel</a>
                                        <a class="btn btn-primary" id="edit">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="form-control btn btn-primary" name="skor" id="submit">Submit</a>
                                        <button type="submit" class="btn btn-success" name="rbutton" id="finish">Finish</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function($) {
            function calcscore(){
                var score = 0;
                var n = 4;

                var rb8 = document.getElementsByName('rb_nilai8');
                var rb9 = document.getElementsByName('rb_nilai9');
                // var rb = $('input[name=rb_nilai9]');

                $(".calc:checked").each(function(){
                    score += parseInt($(this).val()*10)
                });

                $("#sk").html(score/n)
                // console.log(score);
            }
            $().ready(function(){
                var skor = $('#showskor');
                var finish = $('#finish');
                var submit = $('#submit');
                var cancel = $('#cancel');
                var edit = $('#edit');
                var sk = $('#sk');

                $(".calc").change(function(){
                    calcscore()
                });
                skor.hide();
                finish.hide();
                edit.hide();
                submit.click(function(event){
                    finish.show();
                    skor.show();
                    submit.hide();
                    cancel.hide();
                    edit.show();
                })
                edit.click(function(event) {
                    skor.hide();
                    finish.hide();
                    edit.hide();
                    submit.show();
                    cancel.show();
                });
            });
        });
    </script>