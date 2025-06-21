<?php
session_start();

if (!isset($_SESSION['razina']) || $_SESSION['razina'] != 1) {
    header("Location: login.php?admin");
    exit;
}
include 'connect.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = "SELECT * FROM vijesti WHERE id = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id, $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
} else {
    echo "Nema ID-a članka.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = $_POST['title'];
    $sazetak = $_POST['about'];
    $tekst = $_POST['content'];
    $kategorija = $_POST['genre'];
    $arhiva = isset($_POST['show']) ? 1 : 0;

    // Ako je nova slika uploadana, zamijeni je
    if ($_FILES['poster']['error'] === UPLOAD_ERR_OK) {
        $slika = basename($_FILES['poster']['name']);
        move_uploaded_file($_FILES['poster']['tmp_name'], 'img/' . $slika);
    }

    $update = "UPDATE vijesti SET naslov=?, sazetak=?, tekst=?, slika=?, kategorija=?, arhiva=? WHERE id=?";
    $stmt = mysqli_prepare($dbc, $update);
    mysqli_stmt_bind_param($stmt, 'sssssii', $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>alert('Uspješno ažurirano!'); window.location.href='administrator.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Uredi vijest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Uredi vijest</h1></header>
    <nav>
        <ul>
            <li><a href="index.php">Početna</a></li>
            <li><a href="administrator.php">Administracija</a></li>
        </ul>
    </nav>
    <main>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label>Naslov:</label><br>
                <input type="text" name="title" value="<?php echo htmlspecialchars($naslov); ?>" required>
            </div>

            <div>
                <label>Kratki opis:</label><br>
                <textarea name="about" maxlength="200" required><?php echo htmlspecialchars($sazetak); ?></textarea>
            </div>

            <div>
                <label>Opis:</label><br>
                <textarea name="content" required><?php echo htmlspecialchars($tekst); ?></textarea>
            </div>

            <div>
                <label>Žanr:</label><br>
                <select name="genre">
                    <option value="akcija" <?php if ($kategorija == 'akcija') echo 'selected'; ?>>Akcija</option>
                    <option value="drama" <?php if ($kategorija == 'drama') echo 'selected'; ?>>Drama</option>
                    <option value="komedija" <?php if ($kategorija == 'komedija') echo 'selected'; ?>>Komedija</option>
                    <option value="horor" <?php if ($kategorija == 'horor') echo 'selected'; ?>>Horor</option>
                </select>
            </div>

            <div>
                <label>Nova slika (ostavi prazno ako ne mijenjaš):</label><br>
                <input type="file" name="poster" accept="image/*">
            </div>

            <div>
                <label>Prikazati na početnoj?</label>
                <input type="checkbox" name="show" <?php if ($arhiva == 0) echo 'checked'; ?>>
            </div>

            <div>
                <button type="submit">Spremi</button>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Moji filmovi</p>
    </footer>
</body>
</html>
