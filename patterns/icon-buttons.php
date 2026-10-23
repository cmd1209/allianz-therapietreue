<?php
/**
 * Title: Buttons · Primary, Secondary, Highlight mit Icons
 * Slug: allianz-therapietreue/icon-buttons
 * Categories: allianz-therapietreue, buttons
 * Description: Native Buttons mit links oder rechts platzierten Lucide-Icons. Linkziele vor Veröffentlichung prüfen.
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-primary at-icon-arrow-right at-icon-right"} -->
<div class="wp-block-button is-style-primary at-icon-arrow-right at-icon-right"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/allianz/' ) ); ?>">Mehr erfahren</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-secondary at-icon-mail"} -->
<div class="wp-block-button is-style-secondary at-icon-mail"><a class="wp-block-button__link wp-element-button" href="#kontakt">Kontakt</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-highlight at-icon-download"} -->
<div class="wp-block-button is-style-highlight at-icon-download"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/material-placeholder.pdf' ) ); ?>">Muster-PDF herunterladen</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
