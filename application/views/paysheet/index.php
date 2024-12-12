<div class="col-8">
    <div class="header">
        <h2>Paysheet</h2>
        <a href="<?php echo site_url('paysheet/generate'); ?>" class="btn-add">
            <i class="fas fa-plus-square"></i> Generate Paysheet
        </a>
    </div>



    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Basic Salary</th>
                    <th>Allowance</th>
                    <th>EPF</th>
                    <th>Gross Salary</th>
                    <th>Net Salary</th>
                    <th>Month</th>
                    <!-- <th>Added By</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paysheet as $row): ?>
                    <tr>
                        <td><?php echo $row['employee_name']; ?></td>
                        <td><?php echo $row['basic_salary']; ?></td>
                        <td><?php echo $row['allowance']; ?></td>
                        <td><?php echo $row['epf']; ?></td>
                        <td><?php echo $row['gross_salary']; ?></td>
                        <td><?php echo $row['net_salary']; ?></td>
                        <td><?php echo date('F Y', strtotime($row['month'])); ?></td>
                        <!-- <td><?php echo $row['added_by_name']; ?></td> -->
                        <td>
                            <div class="actions">
                                <a href="<?php echo site_url('payslip/' . $row['employee_id']); ?>" class="btn-action">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                
            </tbody>
        </table>
    </div>
</div>
