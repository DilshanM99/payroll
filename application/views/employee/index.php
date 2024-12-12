<div class="col-8">
    <div class="header">
        <h2>Employee List</h2>
        <a href="<?php echo site_url('employee/create'); ?>" class="btn-add">
            <i class="fas fa-plus-square"></i> Add Employee
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Basic Salary</th>
                    <th>Actions</th>
                    <!-- <th>Allowances & Deductions</th> -->
                    <th>Manage Allowances</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['employee_id']; ?></td>
                        <td><?php echo $employee['name']; ?></td>
                        <td>
                            <span
                                class="badge <?php echo $employee['status'] == 'active' ? 'badge-success' : 'badge-secondary'; ?>">
                                <?php echo ucfirst($employee['status']); ?>
                            </span>


                        </td>
                        <td><?php echo $employee['basic_salary']; ?></td>
                        <td>
                            <div class="actions">
                                <a href="<?php echo site_url('employee/edit/' . $employee['id']); ?>" class="btn-action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo site_url('employee/delete/' . $employee['id']); ?>" class="btn-action">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>

                        <!-- Display allowances and deductions for the employee -->
                        <!-- <td>    
                            <?php if (!empty($employee->allowances) || !empty($employee->deductions)) { ?>
                                <ul>
                                    <?php if (!empty($employee->allowances)) { ?>
                                        <li><strong>Allowances:</strong></li>
                                        <?php foreach ($employee->allowances as $allowance) { ?>
                                            <li>
                                                <span class="badge badge-success"><?php echo $allowance->name; ?></span>
                                                (<?php echo $allowance->amount; ?>)
                                            </li>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if (!empty($employee->deductions)) { ?>
                                        <li><strong>Deductions:</strong></li>
                                        <?php foreach ($employee->deductions as $deduction) { ?>
                                            <li>
                                                <span class="badge badge-danger"><?php echo $deduction->name; ?></span>
                                                (<?php echo $deduction->amount; ?>)
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            <?php } else { ?>
                                <p>No allowances or deductions assigned</p>
                            <?php } ?>
                        </td> -->

                        <td>
                            <div class="actions">
                                <a href="<?php echo site_url('employee_allowance_deduction/add_allowance/' . $employee['id']); ?>"
                                    class="btn-action"> <i class="fas fa-plus"></i></a>
                                <a href="<?php echo site_url('employee_allowance_deduction/add_deduction/' . $employee['id']); ?>"
                                    class="btn-action"> <i class="fas fa-minus"></i></a>
                                    <a href="<?php echo site_url('employee_allowance_deduction'); ?>"
                                    class="btn-action"> <i class="fas fa-eye"></i></a>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>