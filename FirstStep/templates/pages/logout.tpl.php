<h1>Logged out:</h1>
<?php if (!empty($data['fn']) && !empty($data['ln']) && !empty($data['user'])) { ?>
    <?= htmlspecialchars($data['fn'] . " " . $data['ln'] . " (" . $data['user'] . ")") ?>
<?php } else { ?>
    <p>No user was logged in.</p>
<?php } ?>
