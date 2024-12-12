<div class="col-8">
<h2>Add User</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('user/create'); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label for="role_id">Role ID</label>
        <input type="number" class="form-control" name="role_id" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            <option value="active">Active</option>
            <option value="deactivated">Deactivated</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Add User</button>
<?php echo form_close(); ?>
</div>