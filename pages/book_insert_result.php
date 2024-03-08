<?php
    // Starts session
    session_start();

    // Variable for page title
    $title = 'Our Library - New Book Added';
    // Variable for css sheet link
    $stylesheet = '../style/book_insert_result.css';

    var_dump($_POST);
?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1>New Book Added</h1>
        <div>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/index.php" class="btn btn-danger">Homepage</a>
        </div>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>