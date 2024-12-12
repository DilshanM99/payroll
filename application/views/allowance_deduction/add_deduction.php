<div class="col-8">
    <!-- Enhanced Add Deduction Form -->
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Add Deduction for Employee: 
                    <span class="text-warning"><?= htmlspecialchars($employee_id); ?></span>
                </h5>
            </div>
            <div class="card-body bg-light">
                <form action="<?= site_url('employee_allowance_deduction/save_deduction') ?>" method="post" class="p-3">
                    <input type="hidden" name="employee_id" value="<?= htmlspecialchars($employee_id); ?>">

                    <!-- Deduction Dropdown -->
                    <div class="form-group mb-4">
                        <label for="deduction_id" class="font-weight-bold">Deduction</label>
                        <select name="deduction_id" id="deduction_id" class="form-control custom-select" required>
                            <option value="" disabled selected>Select a Deduction</option>
                            <?php foreach ($deductions as $deduction): ?>
                                <option value="<?= $deduction['id']; ?>"><?= htmlspecialchars($deduction['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Amount Input -->
                    <div class="form-group mb-4">
                        <label for="amount" class="font-weight-bold">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">LKR</span>
                            </div>
                            <input type="number" name="amount" id="amount" class="form-control" 
                                   placeholder="Enter amount" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger px-4 py-2 shadow-sm">
                            <i class="fas fa-save"></i> Save Deduction
                        </button>
                        <a href="<?= site_url('employee_allowance_deduction'); ?>" 
                           class="btn btn-secondary px-4 py-2 shadow-sm">
                             View Deductions <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
