<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $header['title'] ?><?= isset($header['motto']) ? " | {$header['motto']}" : '' ?></title>
    <link rel="stylesheet" href="./styles/style.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-dark text-white text-center py-3">
        <img src="./images/<?= htmlspecialchars($header['imagesource']) ?>" alt="<?= htmlspecialchars($header['imagealt']) ?>" class="img-fluid">
        <h1><?= htmlspecialchars($header['title']) ?></h1>
        <?php if (isset($header['motto'])) { ?><h2><?= htmlspecialchars($header['motto']) ?></h2><?php } ?>
        <?php if (isset($_SESSION['user'])) { ?>
            <p>Logged in: <strong><?= htmlspecialchars($_SESSION['fn'] . " " . $_SESSION['ln'] . " (" . $_SESSION['user'] . ")") ?></strong></p>
        <?php } ?>
    </header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($pages as $url => $page) { ?>
                <?php if ((!isset($_SESSION['user']) && $page['menun'][0]) || (isset($_SESSION['user']) && $page['menun'][1])) { ?>
                    <li class="nav-item<?= ($page === $find) ? ' active' : '' ?>">
                        <a class="nav-link" href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>"><?= htmlspecialchars($page['text']) ?></a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </nav>
    <main class="container mt-4">
        <?php include("./templates/pages/{$find['file']}.tpl.php"); ?>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        <?php if (isset($footer['copyright'])) { ?>&copy; <?= htmlspecialchars($footer['copyright']) ?> <?php } ?>
        <?php if (isset($footer['firm'])) { ?><?= htmlspecialchars($footer['firm']) ?><?php } ?>
    </footer>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
