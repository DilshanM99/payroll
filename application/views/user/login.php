<!-- <div class="row justify-content-center col-12">
    <div class="col-4">
        <h2 class="mb-4 text-center">Login</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <?php echo form_open('user/login'); ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required>
                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        <?php echo form_close(); ?>
    </div>
</div> -->


<div class="row justify-content-center col-12" style="padding: 50px 0;">
    <div class="col-4">
        <div class="card shadow-sm">
            <div class="card-header text-center">
                <h2 class="mb-0">Login</h2>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open('user/login'); ?>
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username</label>
                        <input type="text" name="username" class="form-control form-control-lg" value="<?php echo set_value('username'); ?>" placeholder="Enter your username" required>
                        <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" required>
                        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="#">Forgot Password?</a>
        </div>
        <div class="text-center">
            <p class="mt-3">Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f4f6f9;
    }
    .card {
        overflow: hidden;
        border-radius: 15px;
    }

    .card-header{
        background-color: #ffffff;

        border-top-left-radius: 20px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .alert {
        border-radius: 15px;
    }
</style>