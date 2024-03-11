<?php
    // Starts session
    session_start();

    // Variable for page title
    $title = 'Our Library - New Book Added';
    // Variable for css sheet link
    $stylesheet = '../style/book_insert_result.css';

    // Creates an associative array with all the data in $_POST
    $data = array();
    $data['user_id'] = $_SESSION['user_id'];
    foreach ($_POST as $key => $value) {
        $data[$key] = $value;
    }
    // $data['title'] = $_POST['title'];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];
    // $data[''] = $_POST[''];

    var_dump($data);

    // var_dump($_POST);
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