<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['ime'])) {
    echo '<p>Morate se prvo <a href="login.php">prijaviti</a>.</p>';
    exit;
}

if ($_SESSION['razina'] != 1) {
    echo '<p>Bok ' . htmlspecialchars($_SESSION['ime']) . ', ali nemate administratorska prava.</p>';
    exit;
}

$query = "SELECT * FROM vijesti ORDER BY datum DESC";
$result = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Administracija članaka</h1></header>
    <?php include 'nav.php'; ?>

    <main>
        <p style="margin:10px;">Bok <strong><?php echo htmlspecialchars($_SESSION['ime']); ?></strong>, prijavljeni ste kao administrator.</p>

        <table>
            <tr>
                <th>ID</th>
                <th>Naslov</th>
                <th>Kategorija</th>
                <th>Datum</th>
                <th>Arhiva</th>
                <th>Akcije</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['naslov']); ?></td>
                <td><?php echo htmlspecialchars($row['kategorija']); ?></td>
                <td><?php echo $row['datum']; ?></td>
                <td><?php echo $row['arhiva'] == 1 ? 'DA' : 'NE'; ?></td>
                <td>
                    <a class="btn btn-edit" href="uredi.php?id=<?php echo $row['id']; ?>">Uredi</a>
                    <a class="btn btn-delete" href="obrisi.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sigurno želiš obrisati?')">Obriši</a>
                    <a class="btn btn-toggle" href="arhiva.php?id=<?php echo $row['id']; ?>&trenutno=<?php echo $row['arhiva']; ?>">
                        <?php echo $row['arhiva'] ? 'Vrati' : 'Arhiviraj'; ?>
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </main>

    <footer>
        <p>&copy; Maks Pećušak  mpecusak@tvz.hr  2025</p>
    </footer>
</body>
</html>
