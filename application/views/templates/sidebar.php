<!-- Sidebar -->
<div class="col-3">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Payroll System</h3>
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a href="<?php echo site_url('dashboard'); ?>"
                    class="nav-link <?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('user'); ?>"
                    class="nav-link <?php echo $this->uri->segment(1) == 'user' ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('employee'); ?>"
                    class="nav-link <?php echo $this->uri->segment(1) == 'employee' ? 'active' : ''; ?>">
                    <i class="fas fa-user-tie"></i> Employees
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('allowance_deduction_master'); ?>"
                    class="nav-link <?php echo $this->uri->segment(1) == 'allowance_deduction_master' ? 'active' : ''; ?>">
                    <i class="fas fa-hand-holding-usd"></i> Allowances & Deductions
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('employee_allowance_deduction'); ?>"
                    class="nav-link <?php echo $this->uri->segment(1) == 'employee_allowance_deduction' ? 'active' : ''; ?>">
                    <i class="fas fa-money-check-alt"></i> Employee Allowances
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('paysheet'); ?>"
                    class="nav-link <?php echo $this->uri->segment(1) == 'paysheet' ? 'active' : ''; ?>">
                    <i class="fas fa-money-check-alt"></i> paysheets
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo site_url('logout'); ?>"
                    class="nav-link <?php echo $this->uri->segment(1) == 'logout' ? 'active' : ''; ?>">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>