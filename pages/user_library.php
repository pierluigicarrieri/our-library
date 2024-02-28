<?php
    // Starts session
    session_start();

    // Variable for page title, interpolation with the logged user
    $title = "Our Library - ".$_SESSION['logged_user']."'s Books";
    // Variable for css sheet link
    $stylesheet = '../style/user_library.css';
?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1 class="p-5 text-center text-light">User Library</h1>
        <div class="button_wrapper d-flex justify-content-center">
            <a class="btn btn-danger" href="http://localhost:8888/Personal_Projects/our_library/pages/index.php">Home</a>
        </div>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>