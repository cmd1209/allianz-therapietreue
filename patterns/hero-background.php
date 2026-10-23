<?php
/**
 * Title: Hero · Hintergrundbild
 * Slug: allianz-therapietreue/hero-background
 * Categories: allianz-therapietreue
 * Description: Titelbereich mit austauschbarem Hintergrundbild, Fokuspunkt und einstellbarem Navy-Overlay.
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-placeholder.svg' ) ); ?>","dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"className":"at-hero at-hero-background","textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-cover at-hero at-hero-background has-background-color has-text-color"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-placeholder.svg' ) ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"at-hero-copy","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group at-hero-copy"><!-- wp:paragraph {"className":"is-style-eyebrow","textColor":"background"} -->
<p class="is-style-eyebrow has-background-color has-text-color">Therapie gelingt gemeinsam</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Mehr Vertrauen.<br>Mehr Verbindung.<br>Mehr Therapietreue.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"at-hero-lead","fontSize":"lead"} -->
<p class="at-hero-lead has-lead-font-size">Wir bringen Menschen und Perspektiven zusammen – für einen gemeinsamen Blick auf Therapietreue in Deutschland.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-highlight at-icon-arrow-up-right at-icon-right"} -->
<div class="wp-block-button is-style-highlight at-icon-arrow-up-right at-icon-right"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/allianz/' ) ); ?>">Die Allianz kennenlernen</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Bildplatzhalter – bitte durch freigegebene Fotografie ersetzen.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
