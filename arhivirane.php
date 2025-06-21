<?php
session_start();
include 'connect.php';

$query = "SELECT * FROM vijesti WHERE arhiva = 1 ORDER BY datum DESC";
$result = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Arhivirane vijesti</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Arhiva</h1></header>

    <?php include 'nav.php'; ?>

    <main>
        <h2 style="text-align: center; margin-bottom: 30px;">Arhivirane vijesti</h2>
        <section class="grid-3">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <a href="clanak.php?id=<?php echo $row['id']; ?>">
                    <article>
                        <img src="img/<?php echo htmlspecialchars($row['slika']); ?>" alt="<?php echo htmlspecialchars($row['naslov']); ?>">
                        <h3><?php echo htmlspecialchars($row['naslov']); ?></h3>
                        <p><?php echo htmlspecialchars($row['sazetak']); ?></p>
                    </article>
                </a>
            <?php endwhile; ?>
        </section>
    </main>

    <footer>
        <p>&copy; Maks Pećušak  mpecusak@tvz.hr  2025</p>
    </footer>
</body>
</html>
