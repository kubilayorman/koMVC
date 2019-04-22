<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <div class="content">

        <div class="content-background">
            <div class="content-top">
                <div class="content-top__head">
                    <p class="content-top__head--headtitle">I'm a business & web developer.</p>  
                </div>
            </div>

            <div class="content-middle">
                <div class="content-middle__aside content-middle__aside-servicesrow">
                    <p class="content-middle__aside--text"><?php echo $data['header'] ; ?><span class="bold-span"><?php echo $data['bold'] ; ?></span></p>
                    <a href="<?php echo URLROOT ?>/pages/process" class="A-element__submit"><?php echo $data['link'] ; ?></a>
                </div>
            </div>
        </div>   
        <div class="content-bottom">
            <div class="content-bottom__column content-bottom__column-headtitle">
                <p class="content-top__head--headtitle content-top__head--headtitle-SnP">Web Development</p>
            </div>

            <div class="content-bottom__column">
                <ul class="content-bottom__list">
                <li class="content-bottom__list-item">Brochure Website
                        <p class="content-bottom__list-listtext"><?php echo $data['brochureWebsite'] ; ?></p> 
                    </li>
                    <li class="content-bottom__list-item">App UI
                        <p class="content-bottom__list-listtext"><?php echo $data['appUi'] ; ?></p>
                    </li>
                    <li class="content-bottom__list-item">MVP / Prototype Development
                        <p class="content-bottom__list-listtext"><?php echo $data['protoType'] ; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Corporate Design & Graphics
                        <p class="content-bottom__list-listtext"><?php echo $data['corpDesign'] ; ?></p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-bottom">

            <div class="content-bottom__column content-bottom__column-headtitle">
                <p class="content-top__head--headtitle content-top__head--headtitle-SnP">Business Development</p>
            </div>

            <div class="content-bottom__column">
                <ul class="content-bottom__list">
                    <li class="content-bottom__list-item">Business Model Creation
                        <p class="content-bottom__list-listtext"><?php echo $data['businessModel'] ; ?></p> 
                        <p class="content-bottom__list-listtext"><?php echo $data['businessModelList'] ; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Market Research & Insights
                        <p class="content-bottom__list-listtext"><?php echo $data['marketResearch'] ; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Trend Analysis
                        <p class="content-bottom__list-listtext"><?php echo $data['trendAnalysis'] ; ?></p>
                    </li>
                    <li class="content-bottom__list-item">Marketing & PR
                        <p class="content-bottom__list-listtext"><?php echo $data['marketingPr'] ; ?></p>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</main>

<?php require APPROOT . FOOTER; ?>