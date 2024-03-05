<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('../components/favicon.php');
    ?>
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href= <?php echo $stylesheet ?>>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <header class="mb-5">
        <nav class="d-flex justify-content-between align-items-center p-2">
            <div class="d-flex align-items-center">
                <a href="http://localhost:8888/Personal_Projects/our_library/pages/index.php">
                    <img src="../assets/site_pics/logo.png" alt="library_logo">
                </a>
                <a id="site_name" href="http://localhost:8888/Personal_Projects/our_library/pages/index.php">Our Library</a>
            </div>
            <ul class="d-flex align-items-center">
            <!-- Shows Login link only if a user is not logged in -->
            <?php if(!isset($_SESSION['logged_user'])) { ?>
                <li class="px-2">
                    <a href="http://localhost:8888/Personal_Projects/our_library/pages/login.php">LOGIN</a>
                </li>
            <!-- If user is logged in shows User's library link and Logout link -->
            <?php } else { ?>
                <li class="px-2">
                    <a href="http://localhost:8888/Personal_Projects/our_library/pages/user_library.php">YOUR BOOKS, <?php echo strtoupper($_SESSION['logged_user']) ?></a>
                </li>
                <li class="px-2">
                    <a href="http://localhost:8888/Personal_Projects/our_library/pages/logout.php">LOGOUT</a>
                </li>
            <?php } ?>
            </ul>
        </nav>
    </header>