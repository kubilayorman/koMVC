<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <div class="content">

        <div class="content-background">
            <div class="content-top__head">
                <p class="content-top__head--headtitle"><?php echo $data['header']; ?></p>
                <p class="content-top__head--subtitle"><?php echo $data['subHeader']; ?><a href="<?php echo URLROOT ?>/pages/contact" class="A-element__submit"><?php echo $data['link']; ?></a></p>
            </div>
        </div>

        <div class="content-process">
            <div class="content-process__top">
                <p class="content-process__top--headtitle">1. Meet & Chat</p>
            </div>

            <div class="content-process__bottom">
                <div class="content-process__bottom--figure">
                    <div class="content-process__bottom--circle"></div>
                </div>
                <p class="content-process__bottom--text">
                    <?php echo $data['meet']; ?>
                </p>
            </div>
        </div>

        <div class="content-process">
            <div class="content-process__top">
                <p class="content-process__top--headtitle">2. Project Brief</p>
            </div>

            <div class="content-process__bottom">
                <div class="content-process__bottom--figure">
                    <div class="content-process__bottom--circle"></div>
                </div>
                <p class="content-process__bottom--text">
                    <?php echo $data['brief']; ?>
                </p>
            </div>
        </div>

        <div class="content-process">
            <div class="content-process__top">
                <p class="content-process__top--headtitle">3. Wireframes</p>
            </div>

            <div class="content-process__bottom">
                <div class="content-process__bottom--figure">
                    <div class="content-process__bottom--circle"></div>
                </div>
                <p class="content-process__bottom--text">
                    <?php echo $data['wireFrame']; ?>
                </p>
            </div>
        </div>

        <div class="content-process">
            <div class="content-process__top">
                <p class="content-process__top--headtitle">4. Designs</p>
            </div>

            <div class="content-process__bottom">
                <div class="content-process__bottom--figure">
                    <div class="content-process__bottom--circle"></div>
                </div>
                <p class="content-process__bottom--text">
                    <?php echo $data['design']; ?>
                </p>
            </div>
        </div>

        <div class="content-process">
            <div class="content-process__top">
                <p class="content-process__top--headtitle">5. Development</p>
            </div>

            <div class="content-process__bottom">
                <div class="content-process__bottom--figure">
                    <div class="content-process__bottom--circle"></div>
                </div>
                <p class="content-process__bottom--text">
                    <?php echo $data['development']; ?>
                </p>
            </div>
        </div>

        <div class="content-process">
            <div class="content-process__top">
                <p class="content-process__top--headtitle">6. Training</p>
            </div>

            <div class="content-process__bottom">
                <div class="content-process__bottom--figure">
                    <div class="content-process__bottom--circle"></div>
                </div>
                <p class="content-process__bottom--text">
                    <?php echo $data['training']; ?>
                </p>
            </div>
        </div>

        <div class="content-process">
            <div class="content-process__top">
                <p class="content-process__top--headtitle">7. Launch & Handover</p>
            </div>

            <div class="content-process__bottom">
                <div class="content-process__bottom--figure">
                    <div class="content-process__bottom--circle"></div>
                </div>
                <p class="content-process__bottom--text">
                    <?php echo $data['launch']; ?>
                </p>
            </div>
        </div>

    </div>

</main>

<?php require APPROOT . FOOTER; ?>