<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <h1>Logged in:</h1>
        ID: <strong><?= $row['id'] ?></strong><br><br>
        Name: <strong><?= $row['first_name']." ".$row['last_name'] ?></strong>
    <?php } else { ?>
        <h1>Login failed!</h1>
        <a href="?page=login" >Try again!</a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
