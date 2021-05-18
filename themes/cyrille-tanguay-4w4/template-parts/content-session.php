<?php
/**
 * Template part l'affichage des bloc de cours dans front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */
global $tPropriété;
?>



<article class="sessions">
<p><?php echo $tPropriété['typeCours'] . " - " . $tPropriété['nbHeure'] ; ?></p>
<a href="<?php echo get_permalink() ?>"> <?php echo $tPropriété['sigle']; ?> </a>
</article>
