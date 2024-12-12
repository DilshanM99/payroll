<!-- allowance_deduction/index.php -->

<div class="col-8">
    <div class="header">
        <h2>Employee Allowances and Deductions</h2>
        
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Allowance/Deduction Name</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($employee_allowance_deductions)): ?>
                    <?php foreach ($employee_allowance_deductions as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['employee_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['master_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['amount']); ?></td>
                            <td>
                                <span class="badge <?php echo $item['type'] == 'allowance' ? 'badge-success' : 'badge-danger'; ?>">
                                    <?php echo ucfirst($item['type']); ?>
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="<?php echo site_url('employee_allowance_deduction/edit/' . $item['id']); ?>" class="btn-action">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?php echo site_url('employee_allowance_deduction/delete/' . $item['id']); ?>" class="btn-action" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No allowances/deductions found for any employee.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
