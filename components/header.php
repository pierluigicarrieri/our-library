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
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost:8888/Personal_Projects/our_library/pages/index.php">
                    <img id="navlogo" src="../assets/site_pics/logo.png" alt="library_logo">
                </a>
                <a class="nav-item nav-link" href="http://localhost:8888/Personal_Projects/our_library/pages/index.php">Our Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Shows Login link only if a user is not logged in -->
                    <?php if(!isset($_SESSION['logged_user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8888/Personal_Projects/our_library/pages/login.php">Login</a>
                        </li>
                    <!-- If user is logged in shows User's library link and Logout link -->
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8888/Personal_Projects/our_library/pages/user_library.php">Your Books, <?php echo $_SESSION['logged_user'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8888/Personal_Projects/our_library/pages/logout.php">Logout</a>
                        </li>
                    <?php } ?>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>