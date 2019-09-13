<?php ob_start(); ?>

<div class="admin"><?php echo "Bonjour " . $_SESSION['username'] . ", bienvenue dans votre espace d'administration."; ?></div>
    <main class="col-md-12 ml-sm-auto px-4" role="main">
        <section id="dashboard">
            <h2>Tableau de bord</h2>
            <hr/>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview_C1">
                        <div class="overview-element">
                            <div class="icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="text">
                                <h2>
                                    <?= $numberChapter['nb'] ?>
                                </h2>
                                <span>chapitre<?php if ($numberChapter['nb'] > 1): ?>s <?php endif;?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview_C2">
                        <div class="overview-element">
                            <div class="icon">
                                <i class="fas fa-comment-dots"></i>
                            </div>
                            <div class="text">
                                <h2>
                                    <?= $numberComment['nb'] ?>
                                </h2>
                                <span>commentaire<?php if ($numberComment['nb'] > 1): ?>s <?php endif;?> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview_C3">
                        <div class="overview-element">
                            <div class="icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="text">
                                <h2>
                                    <?= $numberReport['nb'] ?>
                                </h2>
                                <span>commentaire<?php if ($numberReport['nb'] > 1): ?>s <?php endif?> signalé<?php if ($numberReport['nb'] > 1): ?>s<?php endif;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="last-chapters">
            <br>
            <h2>Derniers chapitres</h2>
            <hr />
            <div class="tab">
                <table class="table table-borderless table-striped table-light table-hover">
                    <thead>
                    <tr>
                        <th>Chapitre</th>
                        <th>Titre</th>
                        <th>Date de publication</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($adminChapters)): ?>
                        <?php foreach ($adminChapters as $ac): ?>
                            <tr>
                                <td><?= htmlspecialchars_decode($ac->getChapterNumber()); ?></td>
                                <td> <?= nl2br(htmlspecialchars_decode($ac->getTitle())) ?> </td>
                                <td> <?= $ac->getCreationDate() ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="commentaires">
            <br />
            <h2>Derniers commentaires</h2>
            <hr />
            <div class="tab">
                <table class="table table-borderless table-striped table-light table-earning table-hover">
                    <thead>
                    <tr>
                        <th>Auteurs</th>
                        <th>Commentaires</th>
                        <th>Chapitre lié au commentaire</th>
                        <th>Date de publication</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($comments as $c): ?>

                            <tr>
                                <td><?= htmlspecialchars($c->getUsername()); ?></td>
                                <td> <?= nl2br(htmlspecialchars(substr($c->getContent(), 0, 100))) ?> </td>
                                <td> Chapitre <?= $c->getChapterId() ?> </td>
                                <td> <?= $c->getCommentDate() ?> </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </section>
    </main>


<?php $content=ob_get_clean();?>
<?php require "src/View/templateadmin.php"; ?>