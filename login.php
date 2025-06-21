<?php
session_start();
include 'connect.php';

$poruka = '';
$adminLogin = isset($_GET['admin']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $korisnicko_ime = trim($_POST['username']);
    $lozinka = trim($_POST['password']);

    $stmt = mysqli_prepare($dbc, "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?");
    mysqli_stmt_bind_param($stmt, "s", $korisnicko_ime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $ime, $hash_lozinka, $razina);
    mysqli_stmt_fetch($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        if (password_verify($lozinka, $hash_lozinka)) {
            if ($adminLogin && $razina != 1) {
                $poruka = "Ovaj korisnik nema administratorska prava.";
            } else {
                $_SESSION['ime'] = $ime;
                $_SESSION['razina'] = $razina;
                header("Location: " . ($razina == 1 ? "administrator.php" : "index.php"));
                exit;
            }
        } else {
            $poruka = "Neispravna lozinka.";
        }
    } else {
        $poruka = "Neispravno korisničko ime.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $adminLogin ? "Admin prijava" : "Prijava korisnika"; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="login-wrapper">
        <h2><?php echo $adminLogin ? "Administratorska prijava" : "Prijava korisnika"; ?></h2>

        <?php if ($poruka): ?>
            <p class="error-msg"><?php echo $poruka; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="username">Korisničko ime:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Lozinka:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Prijavi se">
        </form>
        <div class="form-links">
            <a href="registracija.php" class="btn-register-top">Nemate račun? Registriraj se</a>
            <a href="index.php" class="btn-back-home">← Povratak na početnu</a>
        </div>
    </div>

</body>
</html>
