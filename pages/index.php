<?php
    // Variable for page title
    $title = 'Our Library - Home';
    // Variable for css sheet link
    $stylesheet = '../style/homepage.css';

    // Query for random books list

    // Creates handle to database
    $db = new mysqli('localhost', 'root', 'root', 'our_library');
    // Saves query in a variable, query gets 3 random books
    $query = 'SELECT * FROM Books
    ORDER BY RAND()
    LIMIT 3';

    $statement = $db->prepare($query);

    $statement->execute();

    $results = $statement->get_result();

    $results = $results->fetch_all();

?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1 class="text-center text-light">Homepage</h1>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>