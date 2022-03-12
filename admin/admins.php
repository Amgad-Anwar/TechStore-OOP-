<?php

use TechStore\Classes\Models\Admin;

require_once('header.php')


?>

<?php

$ad = new Admin;
$admins = $ad->selectAll();
?>

<div class="container-fluid py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>All Admins</h3>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($admins as $admin) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $admin['name']; ?></td>
                            <td><?= $admin['email']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="profile.php?id=<?= $admin['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php if ($admin['is_super'] !== 'yes') : ?>
                                    <a class="btn btn-sm btn-danger" href="handelers/handele-delete-admin.php?id=<?= $session->get('adminId') ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                <?php endif ?>

                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php

require_once('footer.php')


?>