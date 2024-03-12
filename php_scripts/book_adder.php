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

    // Code that saves new book into database

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

    // Saves isbn of the added book into session variable
    $_SESSION['book_identifier'] = $data['ISBN'];

    // Frees the result set
    $statement->free_result();
    // Close the database connection
    $db->close();

    header("Location: http://localhost:8888/Personal_Projects/our_library/pages/book_insert_result.php");

?>