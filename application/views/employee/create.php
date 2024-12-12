<div class="col-8">

    <h2 class="mb-4">Add Employee</h2>

    <?php echo form_open('employee/create'); ?>
    <div class="form-group">
        <label for="employee_id">Employee ID</label>
        <input type="text" name="employee_id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nic">NIC</label>
        <input type="text" name="nic" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="deactivated">Deactivated</option>
        </select>
    </div>
    <div class="form-group">
        <label for="basic_salary">Basic_Salary</label>
        <input type="text" name="basic_salary" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo form_close(); ?>
</div>