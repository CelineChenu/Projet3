<?php ob_start(); ?>

<section class="col-sm-12 ">
    <h4 class="comment">Commentaires à modérer</h4>
    <div id="content" class="row content">

        <?php if($comments == NULL):?>
            Aucun commentaire à modérer
        <?php else: ?>
        <?php foreach ($comments as $cr): ?>
            <div class="col-sm-8 offset-sm-1">
                <p class="date">Commentaire posté le <?= $cr->getCommentDate(); ?> : </p>
                <p class="username"> Par <?= htmlspecialchars($cr->getUsername()) ; ?></p>
                <p class="content"><?= htmlspecialchars($cr->getContent()) ; ?></p>
                <a title="Valider ce commentaire" href="<?= HOST ?>valider-commentaire/<?= $cr->getId(); ?>" id="validCommentButton" class="button"> <i class="fas fa-check-circle"></i> Valider le commentaire</a>
                <a title="Modérer ce commentaire" href="<?= HOST ?>moderer-commentaire/<?= $cr->getId(); ?>" id="moderateCommentButton" class="button"><i class="fas fa-times-circle"></i> Modérer le commentaire</a>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>


</section>

<section class="col-sm-12 ">
    <h4 class="comment">Commentaires refusés</h4>
        <div id="content" class="row content">

            <?php if($commentsModerated == NULL):?>
                Aucun commentaire refusé
            <?php else: ?>
                <?php foreach ($commentsModerated as $cm):?>
                    <div class="col-sm-8 offset-sm-1">
                        <p class="date">Commentaire posté le <?= $cm->getCommentDate(); ?> : </p>
                        <p class="username"> Par <?= htmlspecialchars($cm->getUsername()) ; ?></p>
                        <p class="content"><?= htmlspecialchars($cm->getContent()) ; ?></p>
                        <a title="Valider ce commentaire" href="<?= HOST ?>valider-commentaire/<?= $cm->getId(); ?>" class="button cm-validateButton"> <i class="fas fa-check-circle"></i> Valider le commentaire</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>



<?php $content=ob_get_clean();?>
<?php require "src/View/templateadmin.php"; ?>


<script>

    $('.cm-validateButton').click(function() {
        if(confirm('Êtes-vous sûr.e de vouloir valider ce commentaire ?')) {
            return true;
        } else {
            return false;
        }

    });
    
    $('#validCommentButton').click(function() {
        if(confirm('Êtes-vous sûr.e de vouloir valider ce commentaire ?')) {
            return true;
        } else {
            return false;
        }
    });
    
     $('#moderateCommentButton').click(function() {
        if(confirm('Êtes-vous sûr.e de vouloir modérer ce commentaire ?')) {
            return true;
        } else {
            return false;
        }
    
    });



</script>
