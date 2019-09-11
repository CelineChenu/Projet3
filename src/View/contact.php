<?php
ob_start(); ?>

    <div class="row">
        <div class="col-md-9 col-md-offset-3" id="form_container">
            <h2>Contactez Jean Forteroche</h2>
                <p>Envoyez-moi votre message via ce formulaire, je vous répondrais au plus vite !</p>

            <form action='<?= HOST ?>envoyer-mail' method="post">

                <div class="row">
                    <div class="col-sm-5 form-group">
                        <label for="name">Votre nom :</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                        <div class="w-100"></div>
                    <div class="col-sm-5 form-group">
                        <label for="email">Votre e-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                        <div class="w-100"></div>
                </div>


                <div class="row">
                    <div class="col-sm-9 form-group">
                        <label for="message">Votre message:</label>
                        <textarea class="form-control" name="message" id="message" maxlength="6000" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <input type="checkbox" name="consent" id="consent" value="1">
                        <label for="consent">En cochant cette case, vous acceptez la politique de confidentialité de ce site.</label>
                    </div>
                </div>
                <div id="anchor-contact-error"><?php if(isset($_SESSION['contact-error'])): ?>
                    <p> <?= $_SESSION['contact-error']; ?></p>
                    <?php unset($_SESSION['contact-error']); endif;?>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="submitBtn" >Envoyer  <i class="fas fa-caret-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $content=ob_get_clean();?>
<?php require "src/View/template.php"; ?>