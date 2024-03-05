<?php
    // Starts session
    session_start();

    // Variable for page title, interpolation with the logged user
    $title = "Our Library - ".$_SESSION['logged_user']."'s Books";
    // Variable for css sheet link
    $stylesheet = '../style/user_library.css';

    // Query and code for random books list

    // If username and password are set in the $_POST superglobal, saves values into variables
    if(isset($_SESSION['logged_user'])) {
        $username = $_SESSION['logged_user'];
        // Creates handle to database
        $db = new mysqli('localhost', 'root', 'root', 'our_library');
        // Saves query in a variable, query gets 4 random books (with their authors and genres as strings separated by a comma)
        $query = 'SELECT Books.*, 
        GROUP_CONCAT(DISTINCT CONCAT(Authors.first_name, " ", Authors.last_name) ORDER BY Authors.id) AS authors,
        GROUP_CONCAT(DISTINCT Genres.name) AS genres
        FROM Books
        JOIN Author_Book ON Books.id = Author_Book.book_id
        JOIN Authors ON Author_Book.author_id = Authors.id
        JOIN Book_Genre ON Books.id = Book_Genre.book_id
        JOIN Genres ON Book_Genre.genre_id = Genres.id
        JOIN Users ON Books.user_id = Users.id
        WHERE Users.first_name = ?
        GROUP BY Books.id
        ORDER BY RAND()
        LIMIT 4';
        // Constructs a statement object with the query to use for the processing
        $statement = $db->prepare($query);
        // Binds params to query
        $statement->bind_param('s', $username);
        // Runs the query
        $statement->execute();
        // Returns an instance of the result object later used to get the data
        $results = $statement->get_result();
        // Takes authors and strings and puts them into arrays
        $booksWithAuthorsAndGenres = array();
        while ($row = $results->fetch_assoc()) {
            // Split the concatenated authors into an array
            $row['authors'] = explode(',', $row['authors']);
            // Split the concatenated genres into an array
            $row['genres'] = explode(',', $row['genres']);
            $booksWithAuthorsAndGenres[] = $row;
        }
        $results = $booksWithAuthorsAndGenres;
        
        // var_dump($results);

        // Frees the result set
        $statement->free_result();
        // Closes the database connection
        $db->close();
    }

?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <div class="container py-5">
            <div class="row row-cols-2 py-5">
                <!-- Dynamically created books -->
                <?php foreach ($results as $book): ?>
                <div class="col d-flex justify-content-center p-5 text-light">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="imgBox">
                            <div class="bark"></div>
                            <img src= <?php echo $book['cover_img'] ?> class="card_img" alt="book_img">
                        </div>
                        <div class="details px-1 py-2 text-center">
                            <h4 class="card-title"> <?php echo $book['title'] ?> </h4>
                            <div class="d-flex justify-content-around">
                                <!-- Dynamically created authors -->
                                <?php foreach ($book['authors'] as $author): ?>
                                <h6 class="card-title px-1"> <?php echo $author ?> </h6>
                                <!-- End of authors loop -->
                                <?php endforeach; ?>
                            </div>
                            <p class="card-text"> <?php echo $book['description'] ?> </p>
                        </div>
                    </div>
                </div>
                <!-- End of books loop -->
                <?php endforeach; ?>
            </div>
        </div>

    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>