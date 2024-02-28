<?php
    // Variable for page title
    $title = 'Our Library - Login';
    // Variable for css sheet link
    $stylesheet = '../style/login.css';
?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1 class="p-5 text-center text-light">Login</h1>
        <form class="d-flex flex-column align-items-center m-auto text-light">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User's first name</label>
                <input type="text" class="form-control" id="username" placeholder="es: Giulia">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="button_wrapper d-flex justify-content-center">
                <button type="submit" class="btn btn-danger m-auto">Login</button>
            </div>
        </form>
    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>