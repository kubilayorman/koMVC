<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<div class="container">

<?php 

// var_dump($_SERVER['edit_error']);

?>

<p class="content-top__head--headtitle"><?php // echo $requested_page_title; ?></p>

    <div class="content content__column">
    
        <form action="<?php echo URLROOT; ?>/users/edit/update" method="post" class="form__newinsight">

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">User ID:</p>
                <input type="text" class="form__newinsight--title" name="id" autocomplete="off" value="<?php echo /*$user->id*/ $data['id']; ?>" readonly="readonly">
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Name:</p>    
                <input type="text" class="form__newinsight--title" name="name" autocomplete="off" value="<?php echo /*$user->name*/ $data['name']; ?>">
                <?php if(!empty($data['name_err'])) { echo "<p style='color:red;'>" . $data['name_err'] . "</p>"; } ?>
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Mail:</p>
                <input type="text" class="form__newinsight--title" name="email" autocomplete="off" value="<?php echo /*$user->email*/ $data['email']; ?>">
                <?php if(!empty($data['email_err'])) { echo "<p style='color:red;'>" . $data['email_err'] . "</p>"; } ?>
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Password:</p>
                <input type="password" class="form__newinsight--title" name="password" autocomplete="off" value="<?php echo /*$user->password*/ $data['password']; ?>">
                <?php if(!empty($data['password_err'])) { echo "<p style='color:red;'>" . $data['password_err'] . "</p>"; } ?>
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Confirm Password:</p>
                <input type="password" class="form__newinsight--title" name="confirm_password" autocomplete="off" value="<?php echo /*$user->password*/ $data['password']; ?>">
                <?php if(!empty($data['confirm_password_err'])) { echo "<p style='color:red;'>" . $data['confirm_password_err'] . "</p>"; } ?>
            </div>

            <div class="form__newinsight--container">
                <div class="background-color">
                        <button type="submit" class="B-element__submit">Update</button>
                </div>
            </div>

        </form>

    </div>

</div>

<?php

if(isset($_SESSION['edit_error'])) {

    unset($_SESSION['edit_error']);
}

?>

<?php require APPROOT . "/views/inc/footer.php"; ?>