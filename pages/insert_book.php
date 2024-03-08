<?php
    // Starts session
    session_start();

    $title = 'Our Library - Add New Book';
    // Variable for css sheet link
    $stylesheet = '../style/insert_book.css';
?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1>Add New Book and blabla</h1>
        <div>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/index.php" class="btn btn-danger">Homepage</a>
        </div>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>