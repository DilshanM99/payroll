<!-- application/views/add_allowance.php -->
<div class="container mt-5">
    <h2 class="mb-4">Add Allowance for Employee: <span class="text-primary"><?= $employee_id ?></span></h2>
    <form action="<?= site_url('employee_allowance_deduction/save_allowance') ?>" method="post" class="bg-light p-4 rounded shadow-sm">
        <input type="hidden" name="employee_id" value="<?= $employee_id ?>">

        <!-- Allowance Dropdown -->
        <div class="form-group mb-4">
            <label for="allowance_id" class="font-weight-bold">Allowance:</label>
            <select name="allowance_id" id="allowance_id" class="form-control">
                <option value="" disabled selected>Select an Allowance</option>
                <?php foreach ($allowances as $allowance): ?>
                    <option value="<?= $allowance['id'] ?>"><?= $allowance['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Amount Input -->
        <div class="form-group mb-4">
            <label for="amount" class="font-weight-bold">Amount:</label>
            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="btn btn-primary px-4 py-2"><i class="fas fa-save"></i> Save Allowance</button>
        </div>
    </form>
</div>
