<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($message)) { ?>
            <h1><?= $message ?></h1>
            <?php if($again) { ?>
                <a href="index.php?page=register">Try again!</a>
            <?php } ?>
        <?php } ?>
    </body>  
</html>