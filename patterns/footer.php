<?php
/**
 * Title: Fußzeile
 * Slug: allianz-therapietreue/footer
 * Categories: allianz-therapietreue
 * Inserter: no
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"layout":{"type":"constrained"},"className":"at-footer"} -->
<div class="wp-block-group at-footer"><!-- wp:columns {"className":"at-footer-columns"} -->
<div class="wp-block-columns at-footer-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"at-footer-title"} -->
<p class="at-footer-title">Gemeinsam dranbleiben.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"at-footer-name"} -->
<p class="at-footer-name">Allianz Therapietreue Deutschland</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:navigation {"className":"at-menu-footer-links","overlayMenu":"never","ariaLabel":"Themen","layout":{"type":"flex","orientation":"vertical"}} -->
<!-- wp:navigation-link {"label":"Über die Allianz","url":"<?php echo esc_url( home_url( '/allianz/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Therapietreue","url":"<?php echo esc_url( home_url( '/therapietreue/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Info-Materialien","url":"<?php echo esc_url( home_url( '/info-materialien/' ) ); ?>","kind":"custom"} /-->
<!-- /wp:navigation -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:navigation {"className":"at-menu-footer-legal","overlayMenu":"never","ariaLabel":"Weitere Links","layout":{"type":"flex","orientation":"vertical"}} -->
<!-- wp:navigation-link {"label":"Award","url":"<?php echo esc_url( home_url( '/award/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Impressum","url":"<?php echo esc_url( home_url( '/impressum/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Datenschutz","url":"<?php echo esc_url( home_url( '/datenschutz/' ) ); ?>","kind":"custom"} /-->
<!-- /wp:navigation -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- wp:group {"layout":{"type":"flex"},"className":"at-footer-bottom"} -->
<div class="wp-block-group at-footer-bottom"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Eine Initiative im Dialog.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Allianz Therapietreue Deutschland · Prototyp</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
