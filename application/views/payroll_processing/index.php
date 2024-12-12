<div class="col-8">
    <div class="header">
        <h2>Payroll Processing</h2>
        <!-- <a href="<?php echo site_url('payroll_processing/create'); ?>" class="btn-add">
            <i class="fas fa-plus-square"></i> Add Payroll Process
        </a> -->
        <a href="<?php echo base_url('payroll_processing/create'); ?>" class="btn btn-primary">Create New Record</a>
        
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Processed By</th>
                    <th>Processed Date</th>
                    <th>Month</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payroll_processing as $row): ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->processed_by; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($row->processed_date)); ?></td>
                        <td><?php echo date('F Y', strtotime($row->month)); ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td>
                            <div class="actions">
                                <a href="<?php echo site_url('payroll_processing/process/' . $row->id); ?>"
                                    class="btn-action">
                                    <i class="fas fa-cogs"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>