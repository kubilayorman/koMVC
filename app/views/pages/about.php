<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <div class="content">

    <?php flashMessage("user_deleted"); session_destroy(); ?>
    
        <div class="content-background" id="content-background">
            <div class="content-top">
                <div class="content-top__head">
                    <p class="content-top__head--headtitle"><?php echo $data['headtitle']; ?></p>
                    <p class="content-top__head--subtitle"><?php echo $data['subtitle']; ?></p>
                </div>
            </div>

            <div class="content-middle">
                <div class="content-middle__aside">
                    <p class="content-middle__aside--text"><?php echo $data['contentone']; ?></p>
                    <p class="content-middle__aside--text"><?php echo $data['question']; ?><a href="<?php echo URLROOT ?>/pages/contact"
                    class="A-element__submit"><?php echo $data['letstalk'] ?></a></p>
                </div>

                <div class="content-middle__aside">
                    <p class="content-middle__aside--text"><?php echo $data['contenttwo']; ?></p>
                    <a href="?clicktoread=1" class="A-element__submit"><?php echo $data['clicktoread']; ?></a>
                </div>
            </div>
        </div>

        <?php

        if(isset($_GET['clicktoread'])) {

        ?>
    
        <div class="content-bottom">
            <div class="content-bottom__column content-bottom__column-headtitle">
                <p class="content-top__head--headtitle content-top__head--headtitle-SnP">Principles</p>
            </div>

            <div class="content-bottom__column">
                <ul class="content-bottom__list">
                    <li class="content-bottom__list-item">Clear Communication
                        <p class="content-bottom__list-listtext"><?php echo $data['clearcommunication']; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Time Management
                        <p class="content-bottom__list-listtext"><?php echo $data['timemanagement']; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Project Management
                        <p class="content-bottom__list-listtext"><?php echo $data['projectmanagement']; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Documentation
                        <p class="content-bottom__list-listtext"><?php echo $data['documentation']; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Collaboration
                    <p class="content-bottom__list-listtext"><?php echo $data['collaboration']; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Structure
                        <p class="content-bottom__list-listtext"><?php echo $data['structure']; ?></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-bottom">
            <div class="content-bottom__column content-bottom__column-headtitle">
                <p class="content-top__head--headtitle content-top__head--headtitle-SnP ">Capabilities</p>
            </div>

            <div class="content-bottom__column">
                <ul class="content-bottom__list">

                <?php foreach ($data['languages'] as $value) {  ?>
                    <li class="content-bottom__list-item"><?php echo $value; ?></li>
                <?php } ?>

                </ul>
            </div>
        </div>

        <?php  
        
        unset($_GET['clicktoread']);
    
        } else {

        } ?>
    </div>

</main>

<?php require APPROOT . FOOTER; ?>