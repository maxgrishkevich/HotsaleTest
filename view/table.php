<?php
    include('../services/provider.php');
    $users = getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<?php require('includes/header.php'); ?>

<div class="container mt-5 w-50">
    <h1 class="h3 mb-3 fw-normal">Users Table</h1>

    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($users)) : ?>
            <?php foreach ($users as $user):?>
                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <th scope="row">1</th>
                <td>Just Example</td>
                <td>example@email.com</td>
            </tr>
            <div class="alert alert-danger" role="alert">
                <span class="error-message">No registered users for now(</span>
            </div>
        <?php endif;?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/app.js" type="application/javascript"></script>
</body>
</html>