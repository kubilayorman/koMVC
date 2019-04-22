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
                <p class="content-top__head--headtitle">Welcome! Here you'll find my thoughts about business, design, project management, life and other things.</p>
                <p class="content-top__head--subtitle">I'll also link to other creators as credit and appretiation.</p>
            </div>
        </div>


        <?php foreach ($data['insights'] as $insight) { ?>

            <a href="<?php echo URLROOT; ?>/insights/show/<?php echo $insight->insightId; ?>"   class="post_container">
                <div class="post">
                    <figure class="post__figure">
                        <img src="<?php echo URLROOT; ?>/public/img/moose.jpg" alt="" class="post__image">
                    </figure>
                    <div class="post__text">
                    <p class="portfolio__date"><?php echo $insight->created_at; ?></p>
                        <p class="portfolio__summary">Author: <?php echo $insight->name; ?></p>
                        <h1 class="portfolio__title"><?php echo $insight->title; ?></h1>
                        <p class="portfolio__summary"><?php echo $insight->body; ?></p>
                    </div>
                </div>
            </a>

        <?php } ?>
        
    </div>

</main>


<?php require APPROOT . FOOTER; ?>