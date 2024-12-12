<div class="col-8">
    <div class="header">
        <h2>Edit Employee Allowance/Deduction</h2>
    </div>

    <div class="form-container">
        <form action="<?php echo site_url('employee_allowance_deduction/update/' . $allowance_deduction->id); ?>" method="post" class="bg-light p-4 rounded shadow-sm">
            <!-- Allowance/Deduction Name -->
            

            <!-- Amount -->
            <div class="form-group mb-4">
                <label for="amount" class="font-weight-bold">Amount:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">LKR</span>
                    </div>
                    <input type="number" name="amount" id="amount" 
                           value="<?php echo htmlspecialchars($allowance_deduction->amount); ?>" 
                           class="form-control" placeholder="Enter amount" required>
                </div>
            </div>

            <!-- Actions -->
            <div class="text-right">
                <button type="submit" class="btn btn-success px-4 py-2 shadow-sm">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="<?php echo site_url('employee_allowance_deduction'); ?>" class="btn btn-secondary px-4 py-2 shadow-sm">
                    Cancel <i class="fas fa-times"></i>
                </a>
            </div>
        </form>
    </div>
</div>

