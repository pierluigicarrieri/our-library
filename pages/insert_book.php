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
                            <div class="container">
                                <div class="row row-cols-3">
                                    <div class="col">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                    <div class="col">
                                        <label for="language" class="form-label">Language</label>
                                        <input type="text" class="form-control" name="language" id="language">
                                    </div>
                                    <div class="col">
                                        <label for="ISBN" class="form-label">ISBN</label>
                                        <input type="text" class="form-control" name="ISBN" id="ISBN">
                                    </div>
                                </div>
                                <div class="row row-cols-3">
                                    <div class="col">
                                        <label for="cover_img" class="form-label">Cover Image Link</label>
                                        <input type="text" class="form-control" name="cover_img" id="cover_img">
                                    </div>
                                    <div class="col">
                                        <label for="cover_type" class="form-label">Cover Type</label>
                                        <input type="text" class="form-control" name="cover_type" id="cover_type">
                                    </div>
                                    <div class="col">
                                        <label for="number_of_pages" class="form-label">Pages</label>
                                        <input type="text" class="form-control" name="number_of_pages" id="number_of_pages">
                                    </div>
                                </div>
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <label for="publisher" class="form-label">Publisher</label>
                                        <input type="text" class="form-control" name="publisher" id="publisher">
                                    </div>
                                    <div class="col">
                                        <label for="publication_date" class="form-label">Publication Date</label>
                                        <input type="date" class="form-control" name="publication_date" id="publication_date">
                                    </div>
                                </div>
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="row row-cols-3">
                                    <div class="col">
                                        <label for="author_1" class="form-label">Author 1</label>
                                        <input type="text" class="form-control" name="author_1" id="author_1">
                                    </div>
                                    <div class="col">
                                        <label for="author_2" class="form-label">Author 2</label>
                                        <input type="text" class="form-control" name="author_2" id="author_2">
                                    </div>
                                    <div class="col">
                                        <label for="author_3" class="form-label">Author 3</label>
                                        <input type="text" class="form-control" name="author_3" id="author_3">
                                    </div>
                                </div>
                                <div class="row row-cols-3">
                                    <div class="col">
                                        <label for="genre_1" class="form-label">Genre 1</label>
                                        <input type="text" class="form-control" name="genre_1" id="genre_1">
                                    </div>
                                    <div class="col">
                                        <label for="genre_2" class="form-label">Genre 2</label>
                                        <input type="text" class="form-control" name="genre_2" id="genre_2">
                                    </div>
                                    <div class="col">
                                        <label for="genre_3" class="form-label">Genre 3</label>
                                        <input type="text" class="form-control" name="genre_3" id="genre_3">
                                    </div>
                                </div>
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <div class="button_wrapper d-flex justify-content-center">
                                            <button type="submit" class="btn btn-danger m-auto">Insert book</button>
                                        </div>
                                    </div>
                                </div>
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