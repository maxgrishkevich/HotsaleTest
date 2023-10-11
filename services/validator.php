<?php

$log_file_path = '../logs.txt';
if (!file_exists($log_file_path)) {
    touch($log_file_path);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $error_message = '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Incorrect email.';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Passwords must match.';
    }

    if (empty($error_message)) {

        session_start();
        if (!isset($_SESSION['existing_users'])) {
            $_SESSION['existing_users'] = array();
        }
        $existing_users = &$_SESSION['existing_users'];

        $user_exists = false;
        foreach ($existing_users as $user) {
            if ($user['email'] === $email) {
                $user_exists = true;
                break;
            }
        }
        if (!$user_exists) {
            $new_user = array(
                'id' => count($existing_users) + 1,
                'name' => $first_name . ' ' . $last_name,
                'email' => $email,
                'password' => hash('sha256', $password),
            );
            $existing_users[] = $new_user;
            session_write_close();

            $current_datetime = date("Y-m-d H:i:s");
            $log_message = "[$current_datetime] New user with email $email successfully registered.";
            file_put_contents($log_file_path, $log_message . PHP_EOL, FILE_APPEND);

            $response = array('success' => true, 'message' => "You are successfully registered!");
            echo json_encode($response, JSON_THROW_ON_ERROR);
        } else {
            $error_message = 'The user with this email address is already registered.';
        }
    }

    if (!empty($error_message)) {
        $current_datetime = date("Y-m-d H:i:s");
        file_put_contents($log_file_path, "[$current_datetime] " . $error_message . PHP_EOL, FILE_APPEND);
        $response = ['success' => false, 'message' => $error_message];
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

} else {
    $current_datetime = date("Y-m-d H:i:s");
    $log_message = "[$current_datetime] Data was not transferred by POST method.";
    file_put_contents($log_file_path, $log_message . PHP_EOL, FILE_APPEND);

    $response = ['success' => false, 'message' => 'Data was not transferred.'];
    echo json_encode($response, JSON_THROW_ON_ERROR);
}

