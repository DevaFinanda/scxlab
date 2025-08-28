<?php
include 'auth.php';
include '_header.php';
?>
<h2>Wiki Search</h2>
<form method="get"><input name="q"><button>Search</button></form>
<?php
if (isset($_GET['q'])) {
    $q = $_GET['q'];

    // gunakan prepared statement
    $stmt = $GLOBALS['PDO']->prepare("SELECT * FROM articles WHERE title LIKE ?");
    $stmt->execute(['%' . $q . '%']);

    // tampilkan query aman (escape output)
    echo "<p>Search for: " . htmlspecialchars($q, ENT_QUOTES, 'UTF-8') . "</p>";

    foreach ($stmt as $row) {
        echo "<li>" . htmlspecialchars($row['title']) . ": " . htmlspecialchars($row['body']) . "</li>";
    }
}
?>
<?php include '_footer.php'; ?>
