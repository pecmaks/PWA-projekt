<?php
session_start();
include 'connect.php';

$poruka = '';
$uspjesnaRegistracija = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $lozinka1 = $_POST['lozinka'];
    $lozinka2 = $_POST['lozinka2'];

    if ($lozinka1 !== $lozinka2) {
        $poruka = "Lozinke se ne podudaraju!";
    } else {
        $hashed = password_hash($lozinka1, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($dbc, "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $poruka = "Korisničko ime već postoji!";
        } else {
            $stmt = mysqli_prepare($dbc, "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, 0)");
            mysqli_stmt_bind_param($stmt, "ssss", $ime, $prezime, $username, $hashed);
            mysqli_stmt_execute($stmt);
            $uspjesnaRegistracija = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-wrapper">
        <h2>Registracija korisnika</h2>

        <?php if ($uspjesnaRegistracija): ?>
            <p class="success-msg">Uspješno ste se registrirali!</p>
            <div class="form-links">
                <a class="btn-register-top" href="login.php">Prijava</a>
            </div>
        <?php else: ?>
            <?php if ($poruka): ?>
                <p class="error-msg"><?php echo $poruka; ?></p>
            <?php endif; ?>

            <form method="post" action="">
                <label for="ime">Ime:</label>
                <input type="text" name="ime" required>

                <label for="prezime">Prezime:</label>
                <input type="text" name="prezime" required>

                <label for="username">Korisničko ime:</label>
                <input type="text" name="username" required>

                <label for="lozinka">Lozinka:</label>
                <input type="password" name="lozinka" required>

                <label for="lozinka2">Ponovi lozinku:</label>
                <input type="password" name="lozinka2" required>

                <input type="submit" value="Registriraj se">
            </form>

            <div class="form-links">
                <a class="btn-back-home" href="login.php">&larr; Povratak na prijavu</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
