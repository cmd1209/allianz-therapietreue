<?php
/**
 * Title: Aktuelles · neueste Beiträge
 * Slug: allianz-therapietreue/news
 * Categories: allianz-therapietreue
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"layout":{"type":"constrained"},"className":"at-section at-news","tagName":"section","anchor":"aktuelles"} -->
<section id="aktuelles" class="wp-block-group at-section at-news"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Im Gespräch bleiben</p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Aktuelles aus der Allianz</h2>
<!-- /wp:heading -->
<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"layout":{"type":"constrained"},"className":"at-news-card"} -->
<div class="wp-block-group at-news-card"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->
<!-- wp:post-date {"fontSize":"small","format":"d.m.Y"} /-->
<!-- wp:post-title {"isLink":true,"level":3} /-->
<!-- wp:post-excerpt {"moreText":"Weiterlesen ↗","excerptLength":24} /-->
</div>
<!-- /wp:group -->

<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph {"className":"at-note"} -->
<p class="at-note">Hier finden Sie künftig Neuigkeiten aus der Allianz.</p>
<!-- /wp:paragraph -->

<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
</section>
<!-- /wp:group -->
