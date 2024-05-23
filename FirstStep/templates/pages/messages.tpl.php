<?php
try {
    // Database connection
    $dbh = new PDO('mysql:host=localhost;dbname=dbfirststep', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');

    // Fetch messages ordered by creation date (ascending order)
    $sqlSelect = "SELECT name, email, message, created_at FROM contact_messages ORDER BY created_at DESC";
    $sth = $dbh->prepare($sqlSelect);
    $sth->execute();
    $messages = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<h2 class="my-4">Messages</h2>

<?php if (!empty($messages)): ?>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td><?= htmlspecialchars($msg['created_at']) ?></td>
                    <td><?= htmlspecialchars($msg['name']) ?></td>
                    <td><?= htmlspecialchars($msg['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No messages found.</p>
<?php endif; ?>
