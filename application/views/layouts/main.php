

<?php if ($this->session->userdata('logged_in')): ?>
    <!-- Include Sidebar -->
    <?php include('templates/sidebar.php'); ?>
<?php endif; ?>


<!-- Main Content Area -->
<div class="main-content">
    <!-- This will dynamically display the content of the page -->
    <?php echo $content; ?>
</div>