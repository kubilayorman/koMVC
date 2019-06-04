<?php require APPROOT . HEADER; ?>
<?php require APPROOT . NAVBAR; ?>

<main class="main">

    <div class="content">
        <div class="content-background" id="content-background">
      
            <div class="content-top__head">
                <p class="content-top__head--headtitle">Contact me and let's talk!</p>
            </div>
            
            <div class="contact-container">
                <form action="<?php echo URLROOT ?>/pages/contact" method="POST" class="contact-container__form">

                    <div class="contact-container__name">
                        <input type="text" class="contact-container__name--input" id="name" name="name" placeholder="Name" autocomplete="off" value="<?php if(isset($data['name'])) { echo $data['name']; } ?>">
                        <label for="name">Name</label>
                        <p><?php if(isset($data['nameError'])) { echo $data['nameError']; } ?></p>
                    </div>

                    <div class="contact-container__mail">
                        <input type="email" class="contact-container__mail--input" id="mail" name="mail" placeholder="Mail" autocomplete="off" value="<?php if(isset($data['mail'])) { echo $data['mail']; } ?>">
                        <label for="mail">Mail</label>
                        <p><?php if(isset($data['mailError'])) { echo $data['mailError']; } ?></p>
                    </div>

                    <div class="contact-container__phone">
                        <input type="tel" class="contact-container__phone--input" id="number" name="phone" placeholder="Phone" autocomplete="off" value="<?php if(isset($data['phone'])) { echo $data['phone']; } ?>">
                        <label for="phone">Phone</label>
                        <p><?php if(isset($data['phoneError'])) { echo $data['phoneError']; } ?></p>
                    </div>

                    <textarea name="message" class="contact-container__messagebox" placeholder="Your message" ><?php if(isset($data['message'])) { echo $data['message']; } ?></textarea>
                    <p><?php if(isset($data['messageError'])) { echo $data['messageError']; } ?></p>


                    <button type="submit" name="submit" class="B-element__submit">Send!</button>

                </form>

                <div class="contact-container__location">
                    <iframe src="<?php echo $data['maps']; ?>"></iframe>
                </div>
            </div>
            
        </div>
    </div>
</main>

<?php require APPROOT . FOOTER; ?>