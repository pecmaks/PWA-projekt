<?php
session_start();
include 'connect.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = "SELECT * FROM vijesti WHERE id = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id, $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva);
    
    if (mysqli_stmt_fetch($stmt)) {
    } else {
        echo "Članak nije pronađen.";
        exit;
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Nije definiran ID članka.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($naslov); ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="breakingbad.css">
</head>
<body>
    <header><h1><?php echo htmlspecialchars($naslov); ?></h1></header>

    <?php include 'nav.php'; ?>

    <main>
        <?php if ($slika): ?>
            <img src="img/<?php echo htmlspecialchars($slika); ?>" alt="Slika" style="width:100%; max-width:800px; display:block; margin:auto;">
        <?php endif; ?>

        <p><strong>Datum:</strong> <?php echo htmlspecialchars($datum); ?></p>
        <p><strong>Žanr:</strong> <?php echo htmlspecialchars($kategorija); ?></p>

        <section>
            <h3>Kratki sažetak</h3>
            <p><?php echo nl2br(htmlspecialchars($sazetak)); ?></p>
        </section>

        <section>
            <h3>Opis</h3>
            <p><?php echo nl2br(htmlspecialchars($tekst)); ?></p>
        </section>
    </main>

    <footer>
        <p>&copy; Maks Pećušak  mpecusak@tvz.hr  2025</p>
    </footer>
</body>
</html>
