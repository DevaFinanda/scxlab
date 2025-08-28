<?php
include 'auth.php';
include '_header.php';

if ($_POST) {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';

    // gunakan prepared statement untuk cegah SQLi
    $stmt = $GLOBALS['PDO']->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->execute([$u, $p]);
    $row = $stmt->fetch();

    if ($row) {
        $_SESSION['user'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // jangan serialisasi object ke cookie
        // cukup simpan JSON aman
        $profileData = [
            "username" => $row['username'],
            "role" => $row['role']
        ];
        setcookie('profile', json_encode($profileData), [
            'httponly' => true,
            'secure' => true,
            'samesite' => 'Strict'
        ]);

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Login failed.";
    }
}
?>

<h2>Login</h2>
<?php if (!empty($error)) echo "<p style='color:red'>" . htmlspecialchars($error) . "</p>"; ?>
<form method="post">
  <label>Username <input name="username"></label>
  <label>Password <input type="password" name="password"></label>
  <button type="submit">Login</button>
</form>

<?php include '_footer.php'; ?>
