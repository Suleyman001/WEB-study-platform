<h2>Register</h2>
<?php if (isset($message)) { ?>
    <h1><?= htmlspecialchars($message) ?></h1>
    <?php if ($again) { ?>
        <a href="index.php?page=register">Try again!</a>
    <?php } ?>
<?php } else { ?>
    <form action="?page=registration" method="post">
        <fieldset>
            <input type="text" name="firstname" placeholder="First name" required><br><br>
            <input type="text" name="lastname" placeholder="Last name" required><br><br>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" name="registration" value="Registration">
        </fieldset>
    </form>
<?php } ?>
