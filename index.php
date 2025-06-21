<?php
include 'connect.php';


$query = "SELECT * FROM vijesti WHERE arhiva = 0 ORDER BY datum DESC";
$result = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Početna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Moji filmovi i serije</h1></header>
    <?php if (isset($_SESSION['ime'])): ?>
        <div class="user-info">
            Prijavljeni ste kao: <strong><?php echo htmlspecialchars($_SESSION['ime']); ?></strong> 
            (<?php echo ($_SESSION['razina'] == 1 ? 'admin' : 'korisnik'); ?>)
            <a href="logout.php">Odjava</a>
        </div>
    <?php endif; ?>

    <?php include 'nav.php'; ?>

    <main>
        <div class="grid-3">
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <a href="clanak.php?id=<?php echo $row['id']; ?>">
                    <article>
                        <img src="img/<?php echo htmlspecialchars($row['slika']); ?>" alt="Poster">
                        <h3><?php echo htmlspecialchars($row['naslov']); ?></h3>
                        <p><?php echo htmlspecialchars($row['sazetak']); ?></p>
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
