<?php ob_start(); ?>

    <div id="content" class="row content">
        <section class="col-sm-9 ">
            <form action='<?= HOST ?>add-chapter' method="post">
                <div class="form-group ">
                    <label class="control-label " for="title">Titre</label>
                    <input class="form-control" id="title" name="title" type="text" required/>
                </div>

                <div class="form-group ">
                    <label class="control-label " for="title">Numéro du chapitre</label>
                    <input class="form-control" id="chapter_number" name="chapter_number" type="text" required/>
                </div>

                <div class="form-group ">
                    <label class="control-label" for="content">Contenu</label>
                    <textarea class="form-control" id="mytextarea" name="content" ></textarea>
                </div>

                <input type="hidden" value="" name="chapter_id">

                <div class="form-group">
                        <button class="submitBtn" name="envoyer" value="envoyer" type="submit">
                            Créer le chapitre
                        </button>
                </div>
            </form>
        </section>
    </div>

<?php $content=ob_get_clean();?>
<?php require "src/View/templateadmin.php"; ?>