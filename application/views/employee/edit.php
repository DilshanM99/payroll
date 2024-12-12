<div class="col-8">
<h2 class="mb-4">Edit Employee</h2>

<?php echo form_open('employee/edit/'.$employee['id']); ?>
<div class="form-group">
    <label for="employee_id">Employee ID</label>
    <input type="text" name="employee_id" class="form-control" value="<?php echo $employee['employee_id']; ?>" required>
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $employee['name']; ?>" required>
</div>
<div class="form-group">
    <label for="nic">NIC</label>
    <input type="text" name="nic" class="form-control" value="<?php echo $employee['nic']; ?>" required>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control">
        <option value="active" <?php echo $employee['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
        <option value="deactivated" <?php echo $employee['status'] == 'deactivated' ? 'selected' : ''; ?>>Deactivated</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>
</div>
