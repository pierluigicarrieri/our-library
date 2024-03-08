<?php
    // Starts session
    session_start();

    // Variable for page title
    $title = 'Our Library - Login';
    // Variable for css sheet link
    $stylesheet = '../style/login.css';

    // Script and query for login

    // If username and password are set in the $_POST superglobal, saves values into variables
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Creates handle to database
        $db = new mysqli('localhost', 'root', 'root', 'our_library');
        // Searches in the User table for a record with the correct username and password (as params for now)
        $query = 'SELECT *
        FROM Users
        WHERE first_name = ?
        AND password = ?';
        // Constructs a statement object with the query to use for the processing
        $statement = $db->prepare($query);
        // Binds params to query
        $statement->bind_param('ss', $username, $password);
        // Runs the query
        $statement->execute();
        // Returns an instance of the result object later used to get the data
        $results = $statement->get_result();
        // Fetches query result and puts it into a variable
        while ($row = $results->fetch_assoc()) {
            $user = $row;
        }
        // If query successful puts username in session variable
        if($results->num_rows) {
            $_SESSION['logged_user'] = $username;
            $_SESSION['user_id'] = $user['id'];
        }

        // var_dump($user);

        // Frees the result set
        $statement->free_result();
        // Closes the database connection
        $db->close();
    };

    // var_dump($_SESSION);

?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <div class="container py-5">
            <div class="row py-5">
                <div class="col py-5">
                    <!-- Shows logged in message only if a user is logged in, gives logout button -->
                    <?php if(isset($_SESSION['logged_user'])) { ?>

                        <h1 class="p-5 text-center text-light">Congratulations <?php echo $_SESSION['logged_user'] ?>, you are now logged in!</h1>
                        <div class="button_wrapper d-flex justify-content-center">
                            <a class="btn btn-danger" href="http://localhost:8888/Personal_Projects/our_library/pages/logout_result.php">Logout</a>
                        </div>
                        <!-- If user isn't logged in shows login form -->
                        <?php } else if (isset($_POST['username']) && isset($_POST['password'])) { ?>

                        <h1 class="p-5 text-center text-light">Error, can't log in, please try again</h1>

                        <?php } else { ?>

                        <form action="login.php" method="post" class="d-flex flex-column align-items-center m-auto text-light">
                            <div class="mb-3">
                                <label for="username" class="form-label">User's first name</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="es: Giulia">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="button_wrapper d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger m-auto">Login</button>
                            </div>
                        </form>

                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>