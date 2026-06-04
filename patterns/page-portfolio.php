<?php
 /**
  * Title: Sample Portfolio Page
  * Slug: flat-blocks/page-portfolio
  * Categories: flatblocks, page
  * Block Types: core/post-content
  * Description: A sample portfolio or home page with cover image, image gallery (for recent works), 3-column features, and call-to-action button
  */
?>

<!-- wp:pattern {"slug":"flat-blocks/cover-geodesic-lights"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
<!-- wp:heading {"placeholder":"<?php echo __("Our Portfolio", "flat-blocks"); ?>o"} -->
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

<!-- wp:pattern {"slug":"flat-blocks/columns-features-3-columns"} /-->

<!-- wp:pattern {"slug":"flat-blocks/buttons-call-to-action"} /-->
