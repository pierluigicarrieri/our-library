<?php
    // Starts session
    session_start();

    // Variable for page title
    $title = 'Our Library - New Book Added';
    // Variable for css sheet link
    $stylesheet = '../style/book_insert_result.css';

    // Turns in an integer the value of $_POST['number_of_pages']
    $_POST['number_of_pages'] = intval($_POST['number_of_pages']);
    // Creates an associative array with all the data in $_POST
    $data = array();
    $data['user_id'] = $_SESSION['user_id'];
    foreach ($_POST as $key => $value) {
        $data[$key] = $value;
    }

    // Creates handle to database
    $db = new mysqli('localhost', 'root', 'root', 'our_library');
    // Insert into Books table
    $query = "INSERT INTO Books (user_id, title, language, ISBN, cover_img, cover_type, number_of_pages, publisher, publication_date, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $db->prepare($query);
    $statement->bind_param("isssssisss", $data['user_id'], $data['title'], $data['language'], $data['ISBN'], $data['cover_img'], $data['cover_type'], $data['number_of_pages'], $data['publisher'], $data['publication_date'], $data['description']);
    $statement->execute();
    $book_id = $db->insert_id; // Get the last inserted book ID

    // Function to get or insert author ID
    function getOrInsertAuthorId($db, $author_name) {
        $query = "SELECT id FROM Authors WHERE name = ?";
        $statement = $db->prepare($query);
        $statement->bind_param("s", $author_name);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            $query = "INSERT INTO Authors (name) VALUES (?)";
            $statement = $db->prepare($query);
            $statement->bind_param("s", $author_name);
            $statement->execute();
            return $db->insert_id;
        }
    }

    // Insert authors and update Author_Book pivot table
    for ($i = 1; $i <= 3; $i++) {
        $author_key = "author_" . $i;
        if (!empty($data[$author_key])) {
            $author_id = getOrInsertAuthorId($db, $data[$author_key]);
            $query = "INSERT INTO Author_Book (author_id, book_id) VALUES (?, ?)";
            $statement = $db->prepare($query);
            $statement->bind_param("ii", $author_id, $book_id);
            $statement->execute();
        }
    }

    // Function to get or insert genre ID
    function getOrInsertGenreId($db, $genre_name) {
        $query = "SELECT id FROM Genres WHERE name = ?";
        $statement = $db->prepare($query);
        $statement->bind_param("s", $genre_name);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            $query = "INSERT INTO Genres (name) VALUES (?)";
            $statement = $db->prepare($query);
            $statement->bind_param("s", $genre_name);
            $statement->execute();
            return $db->insert_id;
        }
    }

    // Insert genres and update Book_Genre pivot table
    for ($i = 1; $i <= 3; $i++) {
        $genre_key = "genre_" . $i;
        if (!empty($data[$genre_key])) {
            $genre_id = getOrInsertGenreId($db, $data[$genre_key]);
            $query = "INSERT INTO Book_Genre (book_id, genre_id) VALUES (?, ?)";
            $statement = $db->prepare($query);
            $statement->bind_param("ii", $book_id, $genre_id);
            $statement->execute();
        }
    }

    // Code to search for the newly added book and save it for show in results page

    // Saves isbn of the added book into session variable
    $_SESSION['book_identifier'] = $_data['ISBN'];
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
    WHERE Books.ISBN = ?';
    // Constructs a statement object with the query to use for the processing
    $statement = $db->prepare($query);
    // Binds params to query
    $statement->bind_param('s', $_SESSION['book_identifier']);
    // Runs the query
    $statement->execute();
    // Returns an instance of the result object later used to get the data
    $results = $statement->get_result();
    // Takes authors and genres and puts them into arrays
    $booksWithAuthorsAndGenres = array();
    while ($row = $results->fetch_assoc()) {
        // Split the concatenated authors into an array
        $row['authors'] = explode(',', $row['authors']);
        // Split the concatenated genres into an array
        $row['genres'] = explode(',', $row['genres']);
        $booksWithAuthorsAndGenres[] = $row;
    }
    $results = $booksWithAuthorsAndGenres;

    var_dump($results);

    // Frees the result set
    $statement->free_result();
    // Close the database connection
    $db->close();

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
                <!-- Dynamically created books -->
                <?php foreach ($results as $book): ?>
                <div class="col d-flex justify-content-center p-5 text-light">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="imgBox">
                            <!-- Book inner cover -->
                            <div class="bark d-flex justify-content-center">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div>ISBN: <?php echo $book['ISBN'] ?></div>
                                    <div>Language: <?php echo $book['language'] ?></div>
                                    <div>Cover: <?php echo $book['cover_type'] ?></div>
                                    <div><?php echo $book['number_of_pages'] ?> pages</div>
                                    <div>Publisher: <?php echo $book['publisher'] ?></div>
                                </div>
                            </div>
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

        <div>
            <a href="http://localhost:8888/Personal_Projects/our_library/pages/index.php" class="btn btn-danger">Homepage</a>
        </div>

    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>