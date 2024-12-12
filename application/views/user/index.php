<div class="col-8">
    <div class="header">
        <h2>Users List</h2>


        <a href="<?php echo site_url('user/create'); ?>" class="btn-add">
            <i class="fas fa-plus-square"></i> Add User
        </a>
    </div>


    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role ID</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['role_id']; ?></td>
                        <td>
                            <span
                                class="badge <?php echo $user['status'] == 'active' ? 'badge-success' : 'badge-secondary'; ?>">
                                <?php echo ucfirst($user['status']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                            <a href="<?php echo site_url('user/edit/' . $user['id']); ?>" class="btn-action"
                                data-toggle="tooltip" data-placement="top" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?php echo site_url('user/delete/' . $user['id']); ?>" class="btn-action"
                                data-toggle="tooltip" data-placement="top" title="Delete User">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            </div>  
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>