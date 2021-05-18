<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>
	<main id="primary" class="site-main">
	


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<section id="annonce"></section>
				<h1 class="page-title">Accueil</h1>
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="cours">
				<section class="partSessions">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			//global $tProprieté;
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriété);
				//print_r($tPropriété);
				if ($tPropriété['typeSession'] != $precedent): 
					if ("XXXXXX" != $precedent)	: ?>
						</section>
						<?php if (in_array($precedent, ['1','2','3','4','5','6'])) : ?>
							<section class="ctrl-session">

							</section>
						<?php endif; ?>
					<?php endif; ?>	
					<section <?php echo class_composant($tPropriété['typeSession']) ?>>
					<h2><?php echo $tPropriété['typeSession'] ?></h2>

				<?php endif ?>	


				<?php if (in_array($tPropriété['typeSession'], ['1','2','3','4','5','6']) ) : 
						get_template_part( 'template-parts/content', 'session' ); 				

				endif;	
				$precedent = $tPropriété['typeSession'];
						endwhile;?>
			</section> <!-- fin section cours -->
		<?php endif; ?>
		</section>
		<section class="admin-rapide">
			<h3>Ajouter un article de catégorie « Nouvelles »</h3>
			<input type="text" name="title" placeholder="Titre">
			<textarea name="content" ></textarea>
			<button id='bout-rapide'>Créer une nouvelle</button>
		</section>


		<section class="nouvelles">
			<!-- button id="bout_nouvelles">Afficher les 3 dernières nouvelles</button -->
			<section></section>
		</section>

	

	</main><!-- #main -->

<?php 
// get_sidebar();
get_footer();

function convertirTableau(&$tPropriété)
{
	/*
	$titre = get_the_title(); 
	// 582-1W1 Mise en page Web (75h)
	$sigle = substr($titre, 0, 7);
	$nbHeure = substr($titre,-4,3);
	$titrePartiel =substr($titre,8,-6);
	$session = substr($titre, 4,1);
	// $contenu = get_the_content();
	// $resume = substr($contenu, 0, 200);
	$typeCours = get_field('type_de_cours');
*/

	$tPropriété['titre'] = get_the_title(); 
	$tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
	$tPropriété['nbHeure'] = substr($tPropriété['titre'],-6,6);
	$tPropriété['titrePartiel'] = substr($tPropriété['titre'],8,-6);
	$tPropriété['session'] = substr($tPropriété['titre'], 4,1);
	$tPropriété['typeCours'] = get_field('type_de_cours');
	$tPropriété['typeSession'] = get_field('session');
	$tPropriété['typeOption'] = get_field('option');
}


// function class_composant($typeCours){

// 	if (in_array($typeCours, ['Web', 'Jeu', 'Spécifique'])){
// 		return 'class="carrousel-2"';
// 	}
// 	elseif ($typeCours == 'Projets'){
// 		return 'class="galerie"';
// 	}
// 	else {
// 		return 'class="bloc"';
// 	}
// }
function class_composant($typeSession){

	if (in_array($typeSession, ['1','2','3','4','5','6'])){
			return 'class="session"';
			function class_composant($typeOption){

				if(in_array($typeOption, ['true'])){
					return 'class="option"';
				}
				
			
			}
	}
	


}

