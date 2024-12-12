<div class="col-8">
    <div class="header">
        <h2>Allowances & Deductions</h2>


        <a href="<?php echo site_url('allowance_deduction_master/create'); ?>" class="btn-add"><i
                class="fas fa-plus-square"></i> Add New</a>

    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allowance_deductions as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo ucfirst($item['type']); ?></td>
                        <td>
                            <span class="badge <?php echo strtolower($item['status']); ?>">
                                <?php echo ucfirst($item['status']); ?>
                            </span>
                        </td>
                        <!-- <td><?php echo ucfirst($item['status']); ?></td> -->
                        <td>

                            <div class="actions">
                                <a href="<?php echo site_url('allowance_deduction_master/edit/' . $item['id']); ?>"
                                    class="btn-action"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo site_url('allowance_deduction_master/delete/' . $item['id']); ?>"
                                    class="btn-action"> <i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>