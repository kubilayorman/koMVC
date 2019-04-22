<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<div class="container">

<h1>this is CASES</h1>

<p class="content-top__head--headtitle"><?php // echo $requested_page_title; ?></p>

    <div class="content content__column">
    
        <form action="<?php echo URLROOT; ?>/cases/add" method="post" class="form__newinsight">

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">User ID:</p>
                <input type="text" class="form__newinsight--title" name="id" autocomplete="off" value="<?php echo $_SESSION['user_id']; ?>" readonly="readonly">
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Title:</p>
                <input type="text" class="form__newinsight--title" name="title" autocomplete="off" value="<?php echo $data['title']; ?>">
                <?php echo "<p style='color:red;'>" . $data['title_err'] . "</p>"; ?>
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Body:</p>
                <textarea class="contact-container__messagebox" name="body" id="" cols="30" rows="10"><?php echo $data['body']; ?></textarea>
                <?php echo "<p style='color:red;'>" . $data['body_err'] . "</p>"; ?>
            </div>

            <div class="form__newinsight--container">
                <div class="background-color">
                        <button type="submit" class="B-element__submit">Add Case</button>
                </div>
            </div>

        </form>

    </div>

</div>

<?php require APPROOT . "/views/inc/footer.php"; ?>