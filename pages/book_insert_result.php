<?php
    // Starts session
    session_start();

    // Variable for page title
    $title = 'Our Library - New Book Added';
    // Variable for css sheet link
    $stylesheet = '../style/book_insert_result.css';

    // Code to search for the newly added book and save it for show in results page

    // Creates handle to database
    $db = new mysqli('localhost', 'root', 'root', 'our_library');
    // Saves query in a variable, query gets the book with the same ISBN as the saved one
    $query = 'SELECT Books.*, 
    GROUP_CONCAT(DISTINCT Authors.name ORDER BY Authors.id) AS authors,
    GROUP_CONCAT(DISTINCT Genres.name) AS genres
    FROM Books
    JOIN Author_Book ON Books.id = Author_Book.book_id
    JOIN Authors ON Author_Book.author_id = Authors.id
    JOIN Book_Genre ON Books.id = Book_Genre.book_id
    JOIN Genres ON Book_Genre.genre_id = Genres.id
    JOIN Users ON Books.user_id = Users.id
    WHERE Books.ISBN = ?
    GROUP BY Books.id';
    // Constructs a statement object with the query to use for the processing
    $statement = $db->prepare($query);
    // Binds params to query
    $statement->bind_param('s', $_SESSION['book_identifier']);
    // Runs the query
    $statement->execute();
    // Returns an instance of the result object later used to get the data
    $results = $statement->get_result();
    // Takes authors and genres and puts them into arrays
    $book_with_authors_and_genres = array();
    while ($row = $results->fetch_assoc()) {
        // Split the concatenated authors into an array
        $row['authors'] = explode(',', $row['authors']);
        // Split the concatenated genres into an array
        $row['genres'] = explode(',', $row['genres']);
        $book_with_authors_and_genres[] = $row;
    }
    $book = $book_with_authors_and_genres;

    // Frees the result set
    $statement->free_result();
    // Close the database connection
    $db->close();

    var_dump($book);
    // var_dump($data);
    // var_dump($_POST);
?>

    <?php
        include('../components/header.php');
    ?>

    <main>

        <h1>New Book Added</h1>

        <div class="container py-5">
            <div class="row row-cols-1 py-5">
                <!-- Book -->
                <div class="col d-flex justify-content-center p-5 text-light">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="imgBox">
                            <!-- Book inner cover -->
                            <div class="bark d-flex justify-content-center">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div>ISBN: <?php echo $book[0]['ISBN'] ?></div>
                                    <div>Language: <?php echo $book[0]['language'] ?></div>
                                    <div>Cover: <?php echo $book[0]['cover_type'] ?></div>
                                    <div><?php echo $book[0]['number_of_pages'] ?> pages</div>
                                    <div>Publisher: <?php echo $book[0]['publisher'] ?></div>
                                </div>
                            </div>
                            <img src= <?php echo $book[0]['cover_img'] ?> class="card_img" alt="book_img">
                        </div>
                        <div class="details px-1 py-2 text-center">
                            <h4 class="card-title"> <?php echo $book[0]['title'] ?> </h4>
                            <div class="d-flex justify-content-around">
                                <!-- Dynamically created authors -->
                                <?php foreach ($book[0]['authors'] as $author): ?>
                                <h6 class="card-title px-1"> <?php echo $author ?> </h6>
                                <!-- End of authors loop -->
                                <?php endforeach; ?>
                            </div>
                            <p class="card-text"> <?php echo $book[0]['description'] ?> </p>
                        </div>
                    </div>
                </div>
                <!-- End of book -->
            </div>
        </div>

        <div>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/index.php" class="btn btn-danger">Homepage</a>
        </div>

    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>