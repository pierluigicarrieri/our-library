<?php
    // Variable for page title
    $title = 'Our Library - Home';
    // Variable for css sheet link
    $stylesheet = '../style/homepage.css';

    // Query for random books list

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
    GROUP BY Books.id
    ORDER BY RAND()
    LIMIT 4';
    // Constructs a statement object with the query to use for the processing
    $statement = $db->prepare($query);
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
    
    var_dump($results);

?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1 class="p-5 text-center text-light">Welcome to our library</h1>
        <div class="container">
            <div class="row row-cols-4">
                <!-- Dynamically created books -->
                <?php foreach ($results as $book): ?>
                <div class="col text-light">
                    <div class="card h-100" style="width: 18rem;">
                        <img src= <?php echo $book['cover_img'] ?> class="card_img" alt="book_img">
                        <div class="info_container px-1 py-2 text-center">
                            <h5 class="card-title"> <?php echo $book['title'] ?> </h5>
                            <!-- Dynamically created authors -->
                            <?php foreach ($book['authors'] as $author): ?>
                            <span class="card-title"> <?php echo $author ?> </span>
                            <!-- End of authors loop -->
                            <?php endforeach; ?>
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