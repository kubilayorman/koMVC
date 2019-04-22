<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<div class="container">

<p class="content-top__head--headtitle"><?php // echo $requested_page_title; ?></p>

    <div class="content content__column">
    
        <form action="<?php echo URLROOT; ?>/users/register" method="post" class="form__newinsight">

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Name:</p>
                <input type="text" class="form__newinsight--title" name="name" autocomplete="off" value="<?php echo $data['name']; ?>">
                <?php echo "<p style='color:red;'>" . $data['name_err'] . "</p>"; ?>
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Mail:</p>
                <input type="text" class="form__newinsight--title" name="email" autocomplete="off" value="<?php echo $data['email']; ?>">
                <?php echo "<p style='color:red;'>" . $data['email_err'] . "</p>"; ?>
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Password:</p>
                <input type="password" class="form__newinsight--title" name="password" autocomplete="off">
                <?php echo "<p style='color:red;'>" . $data['password_err'] . "</p>"; ?> 
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Confirm Password:</p>
                <input type="password" class="form__newinsight--title" name="confirm_password" autocomplete="off">
                <?php echo "<p style='color:red;'>" . $data['confirm_password_err'] . "</p>"; ?>
            </div>

            <div class="form__newinsight--container">
                <div class="background-color">
                        <button type="submit" class="B-element__submit">Register User</button>
                </div>
            </div>

        </form>

    </div>

</div>

<?php require APPROOT . "/views/inc/footer.php"; ?>