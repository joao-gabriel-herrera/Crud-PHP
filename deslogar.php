<?php
function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

if (isset($_GET['deslogar'])) {
    logout();
}
