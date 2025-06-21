<?php
session_start();
include 'connect.php';

$kategorija = isset($_GET['kategorija']) ? $_GET['kategorija'] : '';

$query = "SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = 0 ORDER BY datum DESC";
$stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt, 's', $kategorija);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $id, $datum, $naslov, $sazetak, $tekst, $slika, $kat, $arhiva);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst(htmlspecialchars($kategorija)); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Kategorija: <?php echo ucfirst(htmlspecialchars($kategorija)); ?></h1>
    </header>

    <?php include 'nav.php'; ?>

    <main>
        <div class="grid-3">
        <?php while (mysqli_stmt_fetch($stmt)): ?>
            <a href="clanak.php?id=<?php echo $id; ?>">
                <article>
                    <img src="img/<?php echo htmlspecialchars($slika); ?>" alt="Slika">
                    <h3><?php echo htmlspecialchars($naslov); ?></h3>
                    <p><?php echo htmlspecialchars($sazetak); ?></p>
                </article>
            </a>
        <?php endwhile; ?>
        </div>
    </main>

    <footer>
        <p>&copy; Maks Pećušak  mpecusak@tvz.hr  2025</p>
    </footer>
</body>
</html>
<?php
mysqli_stmt_close($stmt);
?>
