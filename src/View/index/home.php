<?php
ob_start(); ?>

      <div id="content" class="row content">
          <section class="col-sm-9 ">

              <h4>Le premier chapitre</h4>

              <h5><?= $firstChapter->getTitle(); ?></h5>

              <p><?= substr($firstChapter->getContent(),0 ,200); ?>... <a href="chapitre/<?= $firstChapter->getId()?>">Lire la suite</a></p>

              <p><?= $firstChapter->getCreationDate(); ?></p>

          </section>


          <section class="col-sm-3">
              <h4>L'auteur : </h4>
              <aside>
                  <img src=".\public\img\auteur.png"
                       alt="Jean Forteroche, auteur de Billet Simple pour l'Alaska" height="160" width="170"
                       class="mx-auto d-block">
                  <h5>Jean Forteroche</h5>
                  <p>Jean Forteroche est né en 1962 à Menton. Attiré dés son plus jeune âge par le froid et la neige, il déménage à Toronto en 1979 pour y poursuivre ses études. Il n'en repartira jamais.</p>
              </aside>
              <h4>Réseaux sociaux</h4>
              <aside id="social">
                    <span id="facebook" class="socialLink">
                        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
                    </span>
                  <span id="twitter" class="socialLink">
                        <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
                    </span>
                  <span id="instagram" class="socialLink">
                        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
                    </span>
                  <span id="linkedin" class="socialLink">
                        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
                    </span>
              </aside>
          </section>
      </div>
          <section>
              <h4>Les trois derniers chapitres</h4>
              <div class="row"><?php foreach($lastThreeChapters as $tc): ?>
                      <article class="col-md-3 col-md-offset-1">
                          <h5><?= $tc->getTitle(); ?></h5>
                          <p><?= substr($tc->getContent(),0 ,200); ?>... <a href="chapitre/<?= $tc->getId()?>">Lire la suite</a></p>
                          <p> <?= $tc->getCreationDate(); ?></p>
                      </article>

                  <?php endforeach; ?>
              </div>
          </section>




<?php
$content=ob_get_clean();
require "src/View/template.php";
?>