<?php
 /**
  * Title: Sample Services Page
  * Slug: flat-blocks/page-services
  * Categories: flatblocks, page
  * Block Types: core/post-content
  * Description: A sample services page with cover image, title and text, what we do, 4-column features, 4-column pricing table, and call-to-action button
  */
?>

<!-- wp:pattern {"slug":"flat-blocks/cover-desk-meeting"} /-->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"flat-blocks/text-title-and-text"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:heading {"placeholder":"<?php echo __("What We Do", "flat-blocks"); ?>"} -->
<h2 class="wp-block-heading" id="what-we-do"><?php echo __("What We Do", "flat-blocks"); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem Ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flat-blocks/columns-features-4-columns"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:heading {"placeholder":"<?php echo __("Our Pricing", "flat-blocks"); ?>"} -->
<h2 class="wp-block-heading" id="our-pricing"><?php echo __("Our Pricing", "flat-blocks"); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem Ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flat-blocks/columns-pricing-table-3-columns"} /-->

<!-- wp:pattern {"slug":"flat-blocks/text-faq"} /-->

<!-- wp:pattern {"slug":"flat-blocks/buttons-call-to-action"} /-->
