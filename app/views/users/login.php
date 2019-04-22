<?php require APPROOT . "/views/inc/header.php"; ?>
<?php require APPROOT . "/views/inc/navbar.php"; ?>

<main class="main">

<div class="content">
    
        <div class="content-background">
            <div class="content-top__head">
                <p class="content-top__head--headtitle">This is where you login to this site.</p>
                <p class="content-top__head--subtitle">If you have a username and password obviously ;)</p>
            </div>

            <form action="<?php echo URLROOT; ?>/users/login" method="post" class="login">

                <div class="login__head">
                    <p class="login__head--headtitle">Please enter login credentials</p>
                </div>

                <div class="login__username">
                    <p class="login__head--subtitle">Email:</p>
                    <input type="text" name="email" class="login__head--input" autocomplete="off">
                    <?php echo $data['email_err']; ?>
                </div>

                <div class="login__password">
                    <p class="login__head--subtitle">Password:</p>
                    <input type="password" name="password" class="login__head--input" autocomplete="off">
                    <?php echo $data['password_err']; ?>
                </div>

                <div class="login__submit">
                    <button name="submit_btn" value="submitted" class="B-element__submit B-element__submit-login">Login</button>
                </div>

            </form>

        </div>
    </div>

</main>

<?php require APPROOT . "/views/inc/footer.php"; ?>