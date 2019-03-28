<?php

require_once 'template/config.php';
require_once 'template/header.php'; ?>

<h3>Registered Users</h3>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($db->getUsers() as $key => $user) :?>
            <tr>
                <td><?php echo $user['username']; ?> </td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['country']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user['user_id']; ?>" class="btn btn-light" >Edit</a>
                    <span class="alert-light">|</span>
                    <a href="delete.php?id=<?php echo $user['user_id']; ?>"  class="btn btn-light"
                       onClick="return confirm('Are you sure you want to delete <?php echo $user['username']; ?>?')">Delete</a>
                </td>
            </tr>
            <?php endforeach;?>
    </tbody>
</table>

<?php require_once 'template/footer.php'; ?>

