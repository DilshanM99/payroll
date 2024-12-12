<div class="col-8">
    <h2>Edit Allowance or Deduction</h2>
    <form action="<?php echo site_url('allowance_deduction_master/update/' . $allowance_deduction['id']); ?>" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $allowance_deduction['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="allowance" <?php echo $allowance_deduction['type'] == 'allowance' ? 'selected' : ''; ?>>Allowance</option>
                <option value="deduction" <?php echo $allowance_deduction['type'] == 'deduction' ? 'selected' : ''; ?>>Deduction</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $allowance_deduction['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active" <?php echo $allowance_deduction['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                <option value="inactive" <?php echo $allowance_deduction['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
