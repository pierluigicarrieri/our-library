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
    LIMIT 4';
    // Constructs a statement object with the query to use for the processing
    $statement = $db->prepare($query);
    // Runs the query
    $statement->execute();
    // Returns an instance of the result object later used to get the data
    $results = $statement->get_result();
    // Returns the results of the query as an array of arrays (column name as inner arrays keys)
    $results = $results->fetch_all(MYSQLI_ASSOC);

    var_dump($results);

?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1 class="text-center text-light">Homepage</h1>
        <div class="container">
            <div class="row row-cols-4">

                <?php foreach ($results as $book): ?>

                <div class="col text-light">
                    <div class="card" style="width: 18rem;">
                        <img src= <?php echo $book['cover_img'] ?> class="card-img-top" alt="book_img">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>