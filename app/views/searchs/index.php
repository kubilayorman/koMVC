<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <div class="content">
        <div class="content-background" id="content-background">
            <div class="content-top__head">
                <p class="content-top__head--headtitle">Welcome! Here you'll find my thoughts about business, design, project management, life and other things.</p>
                <p class="content-top__head--subtitle">I'll also link to other creators as credit and appretiation.</p>
            </div>
        </div>

        <?php foreach ($data['searchResults'] as $searchResult) { ?>

            <a href="<?php echo URLROOT; ?>/<?php echo $searchResult->controller_name; ?>/show/<?php echo $searchResult->id; ?>"   class="post_container">
                <div class="post">
                    <figure class="post__figure">
                        <img src="<?php echo URLROOT; ?>/public/img/moose.jpg" alt="" class="post__image">
                    </figure>
                    <div class="post__text">
                        <p class="post__title"><?php echo $searchResult->title; ?></p>
                        <p class="post__summary"><?php echo $searchResult->body; ?></p>
                        <p class="post__summary">Written by <?php echo $searchResult->user_name; ?></p>
                        <p class="post__date"><?php echo $searchResult->date_stamp; ?></p>
                    </div>
                </div>
            </a>

        <?php } ?>
        
    </div>

</main>


<?php require APPROOT . FOOTER; ?>