<?php
    // Starts session
    session_start();
    
    // Variable for page title
    $title = 'Our Library - Add New Book';
    // Variable for css sheet link
    $stylesheet = '../style/insert_book.css';
?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <div class="container py-5">
            <div class="row py-5">
                <div class="col py-5">
                    <!-- Shows book insert form only if a user is logged in -->
                    <?php if(isset($_SESSION['logged_user'])) { ?>

                        <form action="book_insert_result.php" method="post" class="d-flex flex-column align-items-center m-auto text-light">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="ISBN" class="form-label">ISBN</label>
                                <input type="text" class="form-control" name="ISBN">
                            </div>
                            <div class="button_wrapper d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger m-auto">Insert book</button>
                            </div>
                        </form>
                    <!-- If user isn't logged in shows error message -->
                    <?php } else { ?>

                        <h1 class="p-5 text-center text-light">Can't add books if you are not logged in!</h1>
                        <div class="button_wrapper d-flex justify-content-center">
                            <a class="btn btn-danger" href="http://localhost:8888/Personal_Projects/our_library/pages/login.php">Login</a>
                        </div>

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