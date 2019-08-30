<?php ob_start(); ?>

    <div id="content" class="row content">
        <section class="col-sm-9 ">

            <form action='<?= HOST ?>edit-chapter' method="post">
                <div class="form-group ">
                    <label class="control-label " for="title">Titre</label>
                    <input class="form-control" id="title" name="title" type="text" value = "<?= $chapter->getTitle(); ?>" required />

                </div>
                <div class="form-group ">
                    <label class="control-label " for="chapter_number">Numéro du chapitre</label>
                    <input class="form-control" id="chapter_number" name="chapter_number" type="number"  value="<?= $chapter->getChapterNumber(); ?>" required />

                </div>
                <div class="form-group ">
                    <label class="control-label" for="content">Contenu</label>
                    <textarea class="form-control" id="content" name="content" required> <?= $chapter->getContent(); ?></textarea>
                </div>
                <input type="hidden" value="<?= $chapter->getId(); ?>" name="chapter_id">
                <div class="form-group">
                    <div>
                        <button class="submitBtn" name="envoyer" value="envoyer" type="submit">
                            Modifier le chapitre
                        </button>


            </form>
        </section>
    </div>
<?php
$content=ob_get_clean();
require "src/View/templateadmin.php";