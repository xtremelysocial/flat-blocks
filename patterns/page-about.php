<?php
 /**
  * Title: Sample About Page
  * Slug: flat-blocks/page-about
  * Categories: flatblocks, page
  * Block Types: core/post-content
  * Description: A sample about page with cover image, about us, 3-column features, 4-person team, and call-to-action button
  */
?>

<!-- wp:pattern {"slug":"flat-blocks/cover-desk-light"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
<!-- wp:heading {"placeholder":"A<?php echo __("About Us", "flat-blocks"); ?>"} -->
<h2 class="wp-block-heading" id="about-us"><?php echo __("About Us", "flat-blocks"); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem Ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flat-blocks/columns-features-3-columns"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
<!-- wp:heading {"placeholder":"<?php echo __("Meet Our Team", "flat-blocks"); ?>"} -->
<h2 class="wp-block-heading" id="our-team"><?php echo __("Meet Our Team", "flat-blocks"); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem Ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flat-blocks/columns-team-4-people"} /-->

<!-- wp:pattern {"slug":"flat-blocks/buttons-call-to-action"} /-->


