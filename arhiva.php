<?php
session_start();

if (!isset($_SESSION['razina']) || $_SESSION['razina'] != 1) {
    header("Location: login.php?admin");
    exit;
}

include 'connect.php';

if (isset($_GET['id']) && isset($_GET['trenutno'])) {
    $id = (int) $_GET['id'];
    $trenutno = (int) $_GET['trenutno'];

    $novaVrijednost = $trenutno ? 0 : 1;

    $query = "UPDATE vijesti SET arhiva=? WHERE id=?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $novaVrijednost, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: administrator.php");
exit;
