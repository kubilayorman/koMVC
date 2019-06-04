<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<div class="container">

<h1>this is INSIGHTS</h1>

<p class="content-top__head--headtitle"><?php // echo $requested_page_title; ?></p>

    <div class="content content__column">
    
        <form action="<?php echo URLROOT; ?>/insights/edit/update" method="post" class="form__newinsight">  

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">User ID:</p>
                <input type="text" class="form__newinsight--title" name="user_id" autocomplete="off" value="<?php echo $data['user_id']; ?>" readonly="readonly">
            </div>
            
            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Case ID:</p>
                <input type="text" class="form__newinsight--title" name="id" autocomplete="off" value="<?php echo $data['id']; ?>" readonly="readonly">
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Title:</p>
                <input type="text" class="form__newinsight--title" name="title" autocomplete="off" value="<?php echo $data['title']; ?>">
                <?php if(!empty($data['title_err'])) { echo "<p style='color:red;'>" . $data['title_err'] . "</p>"; } ?> 
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Sub Title:</p>
                <input type="text" class="form__newinsight--title" name="sub_title" autocomplete="off" value="<?php echo $data['sub_title']; ?>">
                <?php if(!empty($data['sub_title_err'])) { echo "<p style='color:red;'>" . $data['sub_title_err'] . "</p>"; } ?> 
            </div>

            <div class="form__newinsight--container">
                <p class="form__newinsight--headtitle">Body:</p>
                <textarea class="contact-container__messagebox" name="body" id="" cols="30" rows="10"><?php echo $data['body']; ?></textarea>
                <?php if(!empty($data['body_err'])) { echo "<p style='color:red;'>" . $data['body_err'] . "</p>"; } ?> 
            </div>

            <div class="form__newinsight--container">
                <div class="background-color">
                        <button type="submit" class="B-element__submit">Update Case</button>
                </div>
            </div>

        </form>

    </div>

</div>

<?php
    if(isset($_SESSION['edit_error_insight'])) {
        unset($_SESSION['edit_error_insight']);
    }
?>

<?php require APPROOT . "/views/inc/footer.php"; ?>