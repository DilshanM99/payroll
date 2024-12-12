<!-- application/views/add_deduction.php -->

<div class="container">
    <h2>Add Deduction for Employee <?= $employee_id ?></h2>
    <form action="<?= site_url('employee_allowance_deduction/save_deduction') ?>" method="post">
        <input type="hidden" name="employee_id" value="<?= $employee_id ?>">
        <div class="form-group">
            <label for="deduction_id">Deduction:</label>
            <select name="deduction_id" id="deduction_id">
                <?php foreach ($deductions as $deduction): ?>
                    <option value="<?= $deduction['id'] ?>"><?= $deduction['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text" name="amount" id="amount">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>