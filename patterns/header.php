<?php
/**
 * Title: Kopfzeile
 * Slug: allianz-therapietreue/header
 * Categories: allianz-therapietreue
 * Inserter: no
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"layout":{"type":"constrained"},"className":"at-header"} -->
<div class="wp-block-group at-header"><!-- wp:group {"layout":{"type":"flex"},"className":"at-header-inner"} -->
<div class="wp-block-group at-header-inner"><!-- wp:group {"layout":{"type":"flex"},"className":"at-brand"} -->
<div class="wp-block-group at-brand"><!-- wp:image {"sizeSlug":"full","className":"at-brand-symbol"} -->
<figure class="wp-block-image size-full at-brand-symbol"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/brand/symbol.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->
<!-- wp:paragraph {"className":"at-wordmark"} -->
<p class="at-wordmark"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Allianz<br>Therapietreue<span class="at-brand-country">Deutschland</span></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:navigation {"className":"at-menu-primary","overlayMenu":"mobile","ariaLabel":"Hauptnavigation","layout":{"type":"flex","justifyContent":"right"}} -->
<!-- wp:navigation-link {"label":"Allianz","url":"<?php echo esc_url( home_url( '/allianz/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Therapietreue","url":"<?php echo esc_url( home_url( '/therapietreue/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Info-Materialien","url":"<?php echo esc_url( home_url( '/info-materialien/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Award","url":"<?php echo esc_url( home_url( '/award/' ) ); ?>","kind":"custom"} /-->

<!-- /wp:navigation -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
