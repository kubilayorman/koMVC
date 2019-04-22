<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <?php 
    // the below variable postnumber will be the number of the post in the database.
    // when you click on the link to the full post then that postnumber will be used to fetch the full post
    ?>

    <div class="content">

        <div class="content-background">
            <div class="content-top__head">
                <p class="content-top__head--headtitle">Here you'll find my selected work & feedback from clients.</p>
                <p class="content-top__head--subtitle">If something inspires you, don't hesitate to get in touch and we'll talk if it can be applied to your project.</p>
            </div>
        </div>
  
        <?php foreach ($data['cases'] as $case) { ?>  
            <a href="<?php echo URLROOT; ?>/cases/index"  class="portfolio_container">
                <div class="portfolio">
                    <figure class="portfolio__figure">
                        <img src="<?php echo URLROOT; ?>/public/img/moose.jpg" alt="" class="portfolio__image">
                    </figure>
                    <div class="portfolio__text">
                        <p class="portfolio__date"><?php echo $case->created_at; ?></p>
                        <p class="portfolio__summary">Author: <?php echo $case->name; ?></p>
                        <h1 class="portfolio__title"><?php echo $case->title; ?></h1>
                        <p class="portfolio__summary"><?php echo $case->body; ?></p>
                    </div>
                </div>
            </a>
        <?php } ?>
    
    </div>

</main>

<?php require APPROOT . FOOTER; ?>