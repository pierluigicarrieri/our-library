<?php
    $title = 'Our Library - Home';
?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1>Homepage</h1>
        <div>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/login.php" class="btn btn-danger">Login</a>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/login_result.php" class="btn btn-danger">Login Results</a>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/logout_result.php" class="btn btn-danger">Logout Results</a>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/insert_book.php" class="btn btn-danger">Add New Book</a>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/book_insert_result.php" class="btn btn-danger">New Book Added</a>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/user_library.php" class="btn btn-danger">User Library</a>
        </div>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>