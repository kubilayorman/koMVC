<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <div class="content">
        <div class="content-background">
            
            <div class="content-top__head">
                <p class="content-top__head--headtitle">Contact me and let's talk!</p>
            </div>
                
            <div class="contact-container">
                <form action="#" class="contact-container__form">
                    
                    <div class="contact-container__name">
                        <input type="text" class="contact-container__name--input" id="name" name="name" placeholder="Name" autocomplete="off">
                        <label for="name">Name</label>
                    </div>

                    <div class="contact-container__mail">
                        <input type="email" class="contact-container__mail--input" id="mail" name="mail" placeholder="Mail" autocomplete="off">
                        <label for="mail">Mail</label>
                    </div>

                    <div class="contact-container__phone">
                        <input type="tel" class="contact-container__phone--input" id="number" name="phone" placeholder="Phone" autocomplete="off">
                        <label for="phone">Phone</label>
                    </div>

                    <textarea name="messagebox" class="contact-container__messagebox" placeholder="Your message"></textarea>
                    <button class="B-element__submit">Send!</button>

                </form>

                <div class="contact-container__location">
                    <iframe src="<?php echo $data['maps']; ?>"></iframe>
                </div>
            </div>
            
        </div>
    </div>
</main>

<?php require APPROOT . FOOTER; ?>