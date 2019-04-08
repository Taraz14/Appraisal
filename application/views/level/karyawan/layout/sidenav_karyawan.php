    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                
                <li>
                    <a href="<?php echo site_url('karyawan');?>"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-pencil fa-fw"></i> Penilaian Karyawan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('karyawan/nilai');?>">View Penilaian Karyawan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= site_url('karyawan/libat')?>"><i class="fa fa-newspaper-o fa-fw"></i> Keterlibatan Project</a>
                </li>
                <li>
                    <a href="<?= site_url('karyawan/pass')?>"><i class="fa fa-unlock-alt fa-fw"></i> Ubah Password</a>
                    <!-- /.nav-second-level -->
                </li>                        
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
