<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <?php 
    // the below variable postnumber will be the number of the post in the database.
    // when you click on the link to the full post then that postnumber will be used to fetch the full post
    ?>

    <div class="content">

        <div class="content-background" id="content-background">
            <div class="content-top__head">
                <p class="content-top__head--headtitle">Here you'll find my selected work & feedback from clients.</p>
                <p class="content-top__head--subtitle">If something inspires you, don't hesitate to get in touch and we'll talk if it can be applied to your project.</p>
            </div>
        </div>
  
        <?php foreach ($data as $case) { ?>  
            <a href="<?php echo URLROOT; ?>/cases/show/<?php echo $case->caseId; ?>"  class="post_container">
                <div class="post">
                    <figure class="post__figure">
                        <img src="<?php echo URLROOT; ?>/public/img/moose.jpg" alt="" class="post__image">
                    </figure>
                    <div class="post__text">
                        <p class="post__title"><?php echo $case->title; ?></p>
                        <p class="post__summary"><?php echo $case->sub_title; ?></p>
                    </div>
                </div>
            </a>
        <?php } ?>
    
    </div>

</main>

<?php require APPROOT . FOOTER; ?>