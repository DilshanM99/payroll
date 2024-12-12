<div class="col-8">
<h2>Edit User</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('user/edit/'.$user['id']); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required>
    </div>
    <div class="form-group">
        <label for="role_id">Role ID</label>
        <input type="number" class="form-control" name="role_id" value="<?php echo $user['role_id']; ?>" required>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            <option value="active" <?php echo $user['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="deactivated" <?php echo $user['status'] == 'deactivated' ? 'selected' : ''; ?>>Deactivated</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update User</button>
<?php echo form_close(); ?>
</div>