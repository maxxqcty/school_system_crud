<?php
$action = $_GET['action'] ?? 'login';
if ($action == 'login') {
    include "../actions/login.php";
} elseif ($action == 'register') {
    include "../actions/register.php";
}
?>
