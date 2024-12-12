
<div class="container">
    <h1>User Management</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['status'] ?></td>
                    <td>
                        <!-- <a href="<?= site_url('user/view/' . $user['id']) ?>" class="btn btn-primary btn-sm">View</a> -->
                        <a href="<?= site_url('user/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('user/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

