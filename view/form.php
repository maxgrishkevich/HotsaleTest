<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<?php require('includes/header.php'); ?>

<div id="success-message" class="container w-50 mt-5 alert alert-success d-flex align-items-center d-none">
    <span id="success-text"></span>
</div>

<div class="container w-50 mt-5" id="registration-form">
    <form>
        <h1 class="h3 mb-3 fw-normal">Register form</h1>

        <div id="error-message" class="alert alert-danger d-flex align-items-center d-none">
            <span id="error-text"></span>
        </div>

        <div class="form-floating mt-2">
            <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Enter your first name">
            <label for="first_name">First name</label>
        </div>
        <div class="form-floating mt-2">
            <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter your last name">
            <label for="last_name">Last name</label>
        </div>
        <div class="form-floating mt-2">
            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
            <label for="password">Password</label>
        </div>
        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Confirm password">
            <label for="confirm_password">Confirm Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/app.js" type="application/javascript"></script>
</body>
</html>