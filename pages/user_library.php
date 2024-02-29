<?php
    // Starts session
    session_start();

    // Variable for page title, interpolation with the logged user
    $title = "Our Library - ".$_SESSION['logged_user']."'s Books";
    // Variable for css sheet link
    $stylesheet = '../style/user_library.css';
?>

    <?php
        include('../components/header.php');
    ?>

    <main>
        <h1 class="p-5 text-center text-light">User Library</h1>
        <div class="button_wrapper d-flex justify-content-center">
            <a class="btn btn-danger" href="http://localhost:8888/Personal_Projects/our_library/pages/index.php">Home</a>
        </div>


        <div class="card">
            <div class="imgBox">
                <div class="bark"></div>
                <img src="https://image.ibb.co/fYzTrb/lastofus.jpg">
            </div>
            <div class="details">
                <h4 class="color1">You're not a Fossil! (YET)</h2>
                <h4 class="color2 margin">(HAPPY BIRTHDAY)</h3>
                <p>Dear Dad,</p>
                <p>Let's see.. .</p>
                <p>You’re never around, you</p>
                <p>hate the music I’m into, you</p>
                <p>practically despise the movies I</p>
                <p>like, and yet somehow you still</p>
                <p>manage to be the best dad every year.</p>
                <p>How do you do that? :)</p>
                <p class="text-right">Happy Birthday, papa!</p>
                <p class="text-right">♥Sarah</p>
            </div>
        </div>



    </main>

    <?php
        include('../components/footer.php');
    ?>

</body>
</html>