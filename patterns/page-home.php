<?php
 /**
  * Title: Sample Home Page
  * Slug: flat-blocks/page-home
  * Categories: flatblocks, page
  * Block Types: core/post-content
  * Description: A sample home page with cover image, image gallery, 3-column features, call-to-action button, recent posts, 3-column colored social media icons, a map and address
  */
?>

<!-- wp:pattern {"slug":"flat-blocks/cover-scroll-home-header"} /-->

<!-- wp:pattern {"slug":"flat-blocks/text-title-and-text"} /-->

<!-- wp:paragraph {"textAlign":"center","className":"is-style-default"} -->
<p class="has-text-align-center is-style-default">Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus.</p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flat-blocks/columns-features-3-columns"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
<!-- wp:heading {"placeholder":"<?php echo __("Our Portfolio", "flat-blocks"); ?>"} -->
<h2 class="wp-block-heading" id="our-portfolio"><?php echo __("Our Portfolio", "flat-blocks"); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column {"verticalAlignment":"top","className":"is-style-default"} -->
<div class="wp-block-column is-vertically-aligned-top is-style-default">
<!-- wp:paragraph {"placeholder":"<?php echo __("Our recent works", "flat-blocks") . '...'; ?>"} -->
<p><?php echo __("Our recent works", "flat-blocks") . '...'; ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"align":"right","className":"is-style-link-no-underline","placeholder":"<?php echo __("See All Works", "flat-blocks"); ?>"} -->
<p class="has-text-align-right is-style-link-no-underline"><a href="$#">&gt; <?php echo __("See All Works", "flat-blocks"); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flat-blocks/image-gallery"} /-->

<!-- wp:pattern {"slug":"flat-blocks/buttons-call-to-action"} /-->

<!-- wp:pattern {"slug":"flat-blocks/columns-recent-posts-3-columns"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
<!-- wp:heading {"placeholder":"<?php echo __("Stay Connected", "flat-blocks"); ?>"} -->
<h2 class="wp-block-heading" id="stay-connected"><?php echo __("Stay Connected", "flat-blocks"); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem Ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flat-blocks/columns-social-media-3-columns"} /-->

<!-- wp:pattern {"slug":"flat-blocks/columns-map-static"} /-->
