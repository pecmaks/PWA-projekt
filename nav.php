<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav>
    <ul style="list-style: none; display: flex; gap: 10px; padding: 10px; background-color: #eee;">
        <li><a href="index.php">Početna</a></li>
        <li><a href="kategorija.php?kategorija=akcija">Akcija</a></li>
        <li><a href="kategorija.php?kategorija=drama">Drama</a></li>
        <li><a href="kategorija.php?kategorija=komedija">Komedija</a></li>
        <li><a href="kategorija.php?kategorija=horor">Horor</a></li>
        <li><a href="unos.html">Unos</a></li>
        <li><a href="arhivirane.php">Arhiva</a></li>

        <?php if (isset($_SESSION['razina'])): ?>
            <?php if ($_SESSION['razina'] == 1): ?>
                <li><a href="administrator.php">Admin</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Odjava</a></li>
        <?php else: ?>
            <li><a href="login.php">Prijava</a></li>
            <li><a href="login.php?admin">Admin</a></li>
        <?php endif; ?>
    </ul>
</nav>

<?php if (isset($_SESSION['ime'])): ?>
    <p style="margin-left: 10px;">
        Prijavljeni ste kao: <strong><?php echo htmlspecialchars($_SESSION['ime']); ?></strong>
        (<?php echo $_SESSION['razina'] == 1 ? 'admin' : 'korisnik'; ?>)
    </p>
<?php endif; ?>
