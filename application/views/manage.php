<div class="container mt-5">
    <h2>Manage Allowances & Deductions for <?php echo $employee['name']; ?></h2>

    <!-- Add Allowance/Deduction Form -->
    <form method="post" action="<?php echo site_url('employee_allowance_deduction/add'); ?>">
        <input type="hidden" name="employee_id" value="<?php echo $employee['id']; ?>">
        <div class="form-row">
            <div class="col-md-4">
                <label>Type</label>
                <select name="type" class="form-control">
                    <option value="allowance">Allowance</option>
                    <option value="deduction">Deduction</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Master Data</label>
                <select name="master_id" class="form-control">
                    <?php foreach ($master_data as $master): ?>
                        <option value="<?php echo $master['id']; ?>"><?php echo $master['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label>Amount</label>
                <input type="text" name="amount" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add</button>
    </form>

    <!-- List of Allowances & Deductions -->
    <h3 class="mt-5">Existing Allowances & Deductions</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allowances_deductions as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo ucfirst($item['type']); ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['amount']; ?></td>
                    <td>
                        <a href="<?php echo site_url('employee_allowance_deduction/delete/' . $item['id'] . '/' . $employee['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
