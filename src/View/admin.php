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
                        <th>Numéro</th>
                        <th>Chapitre</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($chapters)): ?>
                        <?php foreach ($chapters as $data): ?>
                            <tr>
                                <td><?= htmlspecialchars_decode($data['chapter_number']); ?></td>
                                <td> <?= nl2br(htmlspecialchars_decode($data['title'])) ?> </td>
                                <td> <?= $data['creationDate'] ?> </td>
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
                        <th>Chapitre dédié</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($comments)): ?>
                        <?php foreach ($comments as $data_comment): ?>
                            <tr>
                                <td><?= htmlspecialchars($data_comment['username']); ?></td>
                                <td> <?= nl2br(htmlspecialchars(substr($data_comment['content'], 0, 100))).'...' ?> </td>
                                <td> <?= $data_comment['chapter_id'] ?> </td>
                                <td> <?= $data_comment['creationDate'] ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>


<?php
$content=ob_get_clean();
require "src/View/templateadmin.php";
?>