<?php
include 'auth.php';
include '_header.php';
?>
<h2>Crash Test</h2>
<?php
$factor = $_GET['factor'] ?? 1;

// Validasi numeric
if (!is_numeric($factor) || $factor == 0) {
    echo "Invalid input";
} else {
    $result = 100 / $factor; 
    echo "100 / " . htmlspecialchars($factor) . " = " . htmlspecialchars($result);
}
?>
<?php include '_footer.php'; ?>
