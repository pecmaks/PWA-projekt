<?php
session_start();

if (!isset($_SESSION['razina']) || $_SESSION['razina'] != 1) {
    header("Location: login.php?admin");
    exit;
}
include 'connect.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = "DELETE FROM vijesti WHERE id = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Vijest je uspješno obrisana.'); window.location.href='administrator.php';</script>";
    } else {
        echo "<script>alert('Greška pri brisanju.'); window.location.href='administrator.php';</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Nije odabran članak za brisanje.'); window.location.href='administrator.php';</script>";
}
?>
