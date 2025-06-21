<?php
include 'connect.php';

// Preuzimanje podataka iz forme
$title = isset($_POST['title']) ? $_POST['title'] : '';
$about = isset($_POST['about']) ? $_POST['about'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';
$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$show = isset($_POST['show']) ? 0 : 1; // 0 = prikaži, 1 = arhivirano

// Upload slike
$posterName = '';
if (isset($_FILES['poster']) && $_FILES['poster']['error'] === UPLOAD_ERR_OK) {
    $posterName = basename($_FILES['poster']['name']);
    move_uploaded_file($_FILES['poster']['tmp_name'], 'img/' . $posterName);
}

// Unos u bazu
$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva)
          VALUES (CURDATE(), ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt, 'sssssi', $title, $about, $content, $posterName, $genre, $show);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Film uspješno dodan!</h1></header>
    <nav>
        <ul>
            <li><a href="index.php">Početna</a></li>
            <li><a href="unos.html">Unos filma</a></li>
        </ul>
    </nav>
    <main>
        <h2><?php echo htmlspecialchars($title); ?></h2>
        <p><strong>Žanr:</strong> <?php echo htmlspecialchars($genre); ?></p>
        <p><strong>Prikazati na početnoj:</strong> <?php echo $show == 0 ? 'DA' : 'NE'; ?></p>

        <?php if ($posterName): ?>
            <img src="img/<?php echo htmlspecialchars($posterName); ?>" alt="Poster filma" width="300">
        <?php endif; ?>

        <section>
            <h3>Kratki opis:</h3>
            <p><?php echo nl2br(htmlspecialchars($about)); ?></p>
        </section>

        <section>
            <h3>Opis filma:</h3>
            <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Moji filmovi</p>
    </footer>
</body>
</html>
