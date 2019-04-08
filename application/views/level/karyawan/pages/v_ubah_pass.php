<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ubah Password</h1>
        </div>
        <!-- /.col-lg-12 -->
            <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo site_url();?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Ubah Password</li>
    </ol>

        <form action="<?= site_url('pass_change_process')?>" method="post">
            <div class="form-group">
                <label for="currpass">Current Password</label>
                <input type="password" class="form-control" id="currpass" name="old" aria-describedby="currpassHelp" placeholder="Current Password">
                <small id="currpassHelp" class="form-text text-muted">Enter your current Password.</small>
            </div>
            <div class="form-group">
                <label for="newpass">New Password</label>
                <input type="password" class="form-control" id="newpass" name="new" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="confpass">confirm Password</label>
                <input type="password" class="form-control" id="confpass" name="re_new" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </form>

    </div>
</div>