<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>


<main class="main">

<?php //$insight = $data['insightSingle']; ?>

    <div class="content">
        <div class="content-background content-background--small" id="content-background">
            <div class="content-top__head">
                <p class="post__head post__head--headtitle"><?php echo $data->title; ?></p>
                <p class="post__head post__head--subtitle"><?php echo $data->sub_title; ?></p>
                <p class="post__head post__head--subtitle post__head--nameNdate">Written by <?php echo $data->name; ?> on the </p>
                <p class="post__head post__head--subtitle post__head--nameNdate"><?php echo $data->date_stamp; ?></p>
            </div>
        </div>

        <div class="post post--show">
            <figure class="post__figure post__figure--show">
                <img src="<?php echo URLROOT; ?>/public/img/moose.jpg" alt="" class="post__image post__image--show">
            </figure>
            <div class="post__text post__text--show">
                <p class="post__summary"><?php echo $data->body; ?></p>
            </div>
        </div>


    </div>

</main>


<?php require APPROOT . FOOTER; ?>