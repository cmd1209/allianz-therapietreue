<?php
/**
 * Title: PDF · wiederverwendbare Download-Karte
 * Slug: allianz-therapietreue/download-card
 * Categories: allianz-therapietreue
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"layout":{"type":"constrained"},"className":"is-style-download-card"} -->
<div class="wp-block-group is-style-download-card"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">PDF · MUSTER</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Informationen zur Therapietreue</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Vorschau einer Material-Karte. Das verlinkte Muster-PDF enthält keine Fachinformationen und wird vor Veröffentlichung ersetzt.</p>
<!-- /wp:paragraph -->
<!-- wp:file {"displayPreview":false,"href":"<?php echo esc_url( get_theme_file_uri( 'assets/images/material-placeholder.pdf' ) ); ?>"} -->
<div class="wp-block-file"><a href="<?php echo esc_url( get_theme_file_uri( 'assets/images/material-placeholder.pdf' ) ); ?>">Muster-PDF · Platzhalter</a><a href="<?php echo esc_url( get_theme_file_uri( 'assets/images/material-placeholder.pdf' ) ); ?>" class="wp-block-file__button wp-element-button" download>Herunterladen</a></div>
<!-- /wp:file -->
</div>
<!-- /wp:group -->
