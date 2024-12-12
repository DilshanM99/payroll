<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Add these links in your header -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/styles.css'); ?>">

</head>

<body>
    <div class="row">
        <div class="col-8 mt-5 mb-5 offset-3">
            <?php if ($this->session->userdata('logged_in')): ?>
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <a href="javascript:history.back()" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo site_url('user/logout'); ?>" class="btn btn-danger btn-sm">Logout</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>



        <?php if ($this->session->userdata('logged_in')): ?>
            <!-- Include Sidebar -->
            <?php include('sidebar.php'); ?>
        <?php endif; ?>