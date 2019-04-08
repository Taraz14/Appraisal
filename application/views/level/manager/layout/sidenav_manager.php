    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                
                <li>
                    <a href="<?php echo site_url('manager');?>"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-pencil fa-fw"></i> Penilaian Karyawan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('fp');?>">Input Penilaian Karyawan</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('manager/nilai');?>">View Penilaian Karyawan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= site_url('libat')?>"><i class="fa fa-newspaper-o fa-fw"></i> Keterlibatan Project</a>
                </li>
                <li>
                    <a href="<?= site_url('manager/pass')?>"><i class="fa fa-unlock-alt fa-fw"></i> Ubah Password</a>
                    <!-- /.nav-second-level -->
                </li>                        
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
