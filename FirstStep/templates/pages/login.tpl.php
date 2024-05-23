<?php
 
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errormessage = "";
$loginSuccessful = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        try {
            // Database connection
            $dbh = new PDO('mysql:host=localhost;dbname=dbfirststep', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');
            
            // Search for a user
            $sqlSelect = "SELECT id, first_name, last_name FROM users WHERE user_name = :usern AND password = SHA1(:pwd)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':usern' => $_POST['username'], ':pwd' => $_POST['password']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $_SESSION['fn'] = $row['first_name'];
                $_SESSION['ln'] = $row['last_name'];
                $_SESSION['user'] = $_POST['username'];
                $loginSuccessful = true;
            } else {
                $errormessage = "Login failed: Invalid username or password.";
            }
        } catch (PDOException $e) {
            $errormessage = "Database error: " . htmlspecialchars($e->getMessage());
        }
    } else {
        $errormessage = "Please provide both username and password.";
    }
}
?>
<body>
    
    <main class="container mt-4">
        <?php if ($loginSuccessful): ?>
            <h1>Logged in successfully:</h1>
            <p>ID: <strong><?= htmlspecialchars($row['id']) ?></strong></p>
            <p>Name: <strong><?= htmlspecialchars($row['first_name'] . " " . $row['last_name']) ?></strong></p>
            <p>Welcome, <?= htmlspecialchars($_SESSION['fn']) ?>!</p>
        <?php else: ?>
            <form action="" method="post">
                <fieldset>
                    <h1>Login</h1>
                    <br>
                    <input type="text" name="username" placeholder="Username" required><br><br>
                    <input type="password" name="password" placeholder="Password" required><br><br>
                    <input type="submit" name="login" value="Login">
                    <br>&nbsp;
                </fieldset>  
            </form>
            <?php if ($errormessage): ?>
                <p style="color: red;"><?= htmlspecialchars($errormessage) ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </main>
</body>

