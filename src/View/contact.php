<?php
ob_start(); ?>

    <div class="row">
        <div class="col-md-9 col-md-offset-3" id="form_container">
            <h2>Contactez Jean Forteroche</h2>
            <p>
                Envoyez-moi votre message via ce formulaire, je vous répondrais au plus vite !
            </p>
            <form role="form" method="post" id="reused_form">

                <div class="row">
                    <div class="col-sm-9 form-group">
                        <label for="name">
                            Votre nom :</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-sm-9 form-group">
                        <label for="email">
                            Votre e-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message">
                            Votre message:</label>
                        <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-lg btn-default pull-right" >Envoyer →</button>
                    </div>
                </div>

            </form>
            <div id="success_message" style="width:100%; height:100%; display:none; ">
                <h3>Votre message a bien été envoyé !</h3>
            </div>
            <div id="error_message"
                 style="width:100%; height:100%; display:none; ">
                <h3>Error</h3>
                Désolé, il y a une erreur dans le formulaire.

            </div>
        </div>
    </div>

<?php
$content=ob_get_clean();
require "src/View/template.php";
?>