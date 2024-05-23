<?php
try {
    // Database connection
    $dbh = new PDO('mysql:host=localhost;dbname=dbfirststep', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');

    // Fetch messages ordered by creation date (ascending order)
    $sqlSelect = "SELECT IFNULL(u.user_name, 'Guest') AS username, cm.email, cm.message, cm.created_at FROM contact_messages cm LEFT JOIN users u ON cm.user_id = u.id ORDER BY cm.created_at DESC";
    $sth = $dbh->prepare($sqlSelect);
    $sth->execute();
    $messages = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
