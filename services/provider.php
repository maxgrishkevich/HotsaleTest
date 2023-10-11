<?php
function getUsers() {
    session_start();
    if (!isset($_SESSION['existing_users'])) {
        $_SESSION['existing_users'] = array();
    }
    $existing_users = $_SESSION['existing_users'];
    session_write_close();
    return $existing_users;
}
