=== Flat Blocks ===
Contributors:  XtremelySocial

== Description ==

Flat Blocks is a modern “flat” style theme with a nice color palette, full and wide width support, and support for the new “Full Site Editing” in WordPress. It includes dozens of block patterns and alternate layouts and color schemes.

== Quick Start Guide ==

= Front (Home) Page = 

This theme is designed to work great whether your front (home) page is your blog or a "static page". This theme has a Template Part called "Home Page Top" that displays either way and you can change it whatever you want. By default, it has a cover image with the site title and tagline and colored welcome section with some text.

To check your settings for blog or static page, go to Settings -> Reading in the WordPress Admin Dashboard.

Note that if you have the blog set on the home page, it uses the Template called Index ("index.html"). If you have the home page set to a page, it will use hat page and the blog page uses the Home template ("home.html").

= Menus = 

Right away you'll want to go into the Site Editor and select the navigation menus you want for the header and the footer. Once you do, your old menus will be copied into the header and footer templates and stored there.

Note that if you are running the Gutenberg Plugin and have menus assigned to "header" and "footer", they should be defaulted already. Otherwise, go into Appearance -> Customize -> Menus -> View All Locations and select them there. WordPress v6 doesn't have this functionality.

= Header, Footer, and Blog Layouts = 

One of the cool things about this theme is that we provide numerous header, footer, and blog layouts (Query Loops). While you are in the Site Editor, check them out. Just be sure to replace the "Header Default" block not the main Header block. The same thing applies to the "Footer Default". For blog layouts, change the "Query Loop" block instead of the Query block.

Note that the theme is setup this way so that you can change the header, footer, and query layout across the entire site. If you change the actual Header, Footer, and Query blocks, you'll only be changing them on the Home Page that you are editing by default in the Site Editor.

= Page and Block Patterns = 

This theme provides TONS of Block Patterns that you can insert into your pages and posts to quickly build out content. It also includes full Page Patterns that will pull in a whole series of Block Patterns to easily build a Home, About, Services, or Portfolio page. 

Note that Block and Page Patterns are copied into your page or post and unlike Block Templates above, edits you make to Block Patterns are stored only on that page or post.

== Creating a Child Theme Using the Create Block Theme Plugin ==
Use the [Create Block Theme](https://wordpress.org/plugins/create-block-theme/) plugin.

1. Install Flat Blocks (or any Flat Blocks child theme)
2. Use the Full Site Editor to adjust any global styles, templates, template parts, etc. to your liking.
3. Install the Create Block Theme plugin 
4. Use it to export a new child theme of Flat Blocks

== Creating a Child Theme Manually ==

Flat Blocks is a [parent theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/#what-is-a-parent-theme). The best way to use it is to create a child theme with Flat Blocks as a parent.

= style.css (Required) =

Create a directory for your child theme at the same level as other parent and child themes. Name the directory something like flat-blocks-child.

A Child theme needs a `style.css` file that links its template to the partent theme.

The `style.css` file contains the name of the theme and other details. To make Flat Blocks the parent theme it is important to set the "Template" property to `flat-blocks`.

```
/*
Theme Name: {newtheme}
Theme URI:
Author:
Author URI:
Description:
Requires at least: 6.2
Tested up to: 6.3
Requires PHP: 7.4
Version: 1.0
License: GNU General Public License v2 or later
License URI:
Template: flat-blocks
Text Domain: {newthemeslug}
Tags:
*/
```

The Flat Blocks parent theme will automatically load this child theme's `style.css` file for you. You don't even need a `functions.php` file to do it. You can place any CSS rules that you want in here.

= screenshot.png (Recommended) =

It is recommended that you create a `screenshot.png` for your child theme or at least copy down the parent theme's screenshot so something displays in the WordPress Admin.

If you create one, it should be 1200x900 pixels and you should compress it to reduce its size to be suitable for limited bandwidth.

= theme.json (optional) =

You can also include a `theme.json` file in the child theme root directory. This file defines the look and feel of your theme: colors, fonts, spacing, etc. are all set in this file. Flat Blocks also defines some custom properties in theme.json which are used in the CSS. You can override any values (including the custom values) found in Flat Blocks's theme.json in the child theme's theme.json.

- It is only necessary to define those properties you wish to change, which keeps your code [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself).
- As more features are added to block themes, Flat Blocks will be updated to support them. By using Flat Blocks as a parent, the child theme will inherit all these changes.

= Templates and Template Parts (optional) =

You can also place Block Templates and Block Template Parts into your child theme. They should be placed in /templates and /parts subdirectories, respectively. They are used to display the various pages and posts on your site. You can copy down the Flat Blocks theme full directories or individual files and override them with the Site Editor.

Simple child themes should be able to define everything they need using only the `style.css`, `theme.json`, and Template Parts and Template files, but for more complex child themes, a `functions.php` file may be useful.

= Adding a functions.php (optional) =

If you place a `functions.php` file in the main child theme directory, PHP can be used to override many more aspects of the theme that aren't possible with the other files above. For example, you can add your own Block Patterns and/or custom Block Styles. The Flat Blocks parent theme provides several "filters" in addition to the ones built into core WordPress.

Take a look at the `/inc/block-patterns.php` file and find the line that reads `apply_filters`. You can then use an `add_filter` to `functions.php` to alter the array. 

= Full Child Theme Directory Structure =

Here is a visualization of the structure of a fully built out child theme:

/flat-blocks-child/
   |--- style.css (required)
   |--- screenshot.png (recommended)
   |--- theme.json (recommended, only changed values)
   |--- functions.php (optional, auto loads)
   /parts/
	  |--- *.html (auto loads)
   /templates/
	  |--- *.html (auto loads)
   /patterns/
	  |--- *.php (auto loads, if found)
	  |--- *.html (load with `add_filter` in functions.php)

= Keeping The Parent Theme Up to Date =

When you modify a child theme as opposed to make code changes to a parent theme, the parent theme can be easily updated as new releases come out without necessarily impacting your child theme.

Of course if there are major changes to the parent theme, it may impact your child theme, so be sure to read the release notes for the Flat Blocks theme to see what has changed with each release.

== More Information About This Theme ==

For more information, see these pages on the XtremelySocial.com website:
* How to use our Block Themes: https://xtremelysocial.com/userguide/block-themes/
* Our Theme Block Styles: https://xtremelysocial.com/userguide/block-styles/
* Our Theme Block Patterns: https://xtremelysocial.com/userguide/block-patterns/

You can check out our other themes here: https://xtremelysocial.com/wordpress/

== Changelog ==

= 2.0.3 = 
April 18, 2025

* Tested with WordPress v6.8.
* Enhanced CSS for font color on input fields when used within a section (Group, Column) with a dark background. Removed the custom variables --wp--custom--color--field--background and --wp--custom--color--field--text from the main theme.json since they aren't needed anymore. They can still be used in custom Global Styles or Child Themes though.
* Set Comment Form labels to normal font weight (by removing medium weight in the CSS).
* Added CSS to reduce the height of the Search input and button when used in a Navigation menu so it looks better alongside the other menu items.
* Enhanced CSS for automatic vertical margins on blocks to allow the user to set top margin to zero on the first block and/or bottom margin on the last block. For example, if you want the last block on a page to not have margin after it before the footer.
* Enhanced CSS for vertical margins on Social Icons blocks.
* Enhanced CSS to remove top margin on Comments block if it is completely empty (no comments or comment form).
* Enhanced CSS for captions on images within the Image Gallery block to honor the default theme border radius, which is 5px.
* Enhanced CSS to get a little more aggressive in applying default text color on colored backgrounds.
* Updated readme.txt section on creating child themes based on simplifications made in Flat Blocks v2.0.
* Updated CSS source (.scss) files to get media query breakpoints (e.g. '@media only AND (max-width: 600px)') from the core WordPress scripts (@wordpress/base-styles/breakpoints).

= 2.0.2 = 
February 5, 2025

* Template Parts:
	* Added new ones for Search Title, 404 (Error Page) Title, and Archive (Blog) Title. These can be found under the "Title" category in the Block Patterns in the Editor along with the Page Title and Post Title Template Parts. 
	* On the Page Title, set the Excerpt length to 20 words (was 30).
	* Updated the various Templates to use the new title Template Parts.
* Enhanced CSS:
	* Add bottom margin on the last element in the Post Content (unless the user overrides it on the block).
	* Inherit text alignment on Dashicons.
	* Fix link hover color in the Editor (issue is with WordPress v6.7).

= 2.0.1 = 
January 6, 2025

* Add support for the older "aligncenter" class in users content since WordPress now uses "has-text-align-center" and doesn't style the older class.
* Remove extra margin from Scroll Down Arrow without Text.
* Remove extra top and bottom margin from Sidebar Left and Sidebar Right Block Patterns.

= 2.0 = 
January 2, 2025

Version Summary: Updated minimum WordPress version required to 6.7 which coupled with simplifying CSS throughout significantly reduced the amount of CSS needed by over 25%. The theme now only loads the CSS styles needed for each page and instructs WordPress to also do this, which further reduces the amount of CSS for most pages. Added 5 new gradients based on the recent duotones that were added. Changed Larger and Extra Large font slugs to match the TwentyTwentyFive theme.

Changes to look out for and update your content if necessary:
* Change "Extra Large" font size to use "2X Large" and "Larger" font size to use "Extra Large".
* Check top margins on pages and posts with sidebars, both with and without featured images. If there is extra top margin, you can remove it from the sidebar and/or featured image. 
* Check footers with copyright date and/or theme info that might be using Block Bindings. Use the more recent Template Parts (Site Copyright, Theme Tagline).
* If you are still using the really old "Background" and "Foreground" colors, change them to "Base" and "Contrast" colors instead.
* If coming over to Flat Blocks from another theme, change out the background and text colors. Unknown background colors are mapped to the Primary color (light green by default) and the text color to Foreground Alt (offwhite by default).

More Details:
* Updated minimum WordPress version required to 6.7 and dropped all the code needed to support back to Wordpress v6.5.
* CSS Enhancements and Optimization:
	* Simplified the CSS for default text and link colors on colored backgrounds as well as for Navigation highlights which reduced CSS by over 25%.
	* Now Dashicons CSS only loads if in use on a particular page, further reducing CSS on most pages. Also enhanced it to work better with optimization plugins that concatenate CSS, such as Jetpack Boost.
	* The theme now instructs WordPress to only load the CSS styles needed for each page (which is the default in WordPress v6.7). The theme itself now also does this which lets core WordPress optimize whether styles are loaded inline or in separate CSS file(s).
	* Rewrote the CSS for top margin on blocks to be consistent with WordPress vertical spacing as well as no longer require certain Template Parts and Templates to add top-margin.
	* Enhanced the CSS for horizontal padding on tablet and mobile so that groups and columns with colored backgrounds line up better with the site's global padding. 
	* Enhanced the CSS for default text color on Cover Images.
	* Added clear floats automatically to Groups which have align left and align right in them. This is only done on normal (non-flex) Groups, not on Rows (flex).
	* For users migrating from other themes, we now map unknown background colors to mapped to the Primary color (Light Green by default) and the text color to Foreground Alt (Off White by default).
	* Added legacy support for Flat Blocks versions 1.9x, specifically for deprecated font sizes, top margins, and the scroll down arrow. Removed legacy support for older theme versions, such as the use of "foreground" and "background" color names (use contrast and base now).
* Changed icons that the theme uses directly to SVG instead of Dashicons, such as post date, author name, scroll down arrow, etc. So Dashicons CSS styles will only load when used in your content itself.
* Changed the "Larger" font size (larger) to "Extra Large" (x-large) and "Extra Large" (x-large) to "2X Large" (xx-large) for compatibility with the TwentyTwentyFive theme. Added CSS for backwards compatibility, but you should update the font sizes in your content at some point.
* Added more gradient options to match the duotones added in Flat Blocks v1.9: Purple to Yellow, Purple to Green, Blue to Red, Blue to Orange, and Midnight (Midnight Blue to Blue).
* Added Block Pattern for Cover Camera. 
* Added WEBP versions of all cover images. The JPEG versions are still used in the various Block Patterns, but if your web server supports WEBP then you can upload them to your Media Library and use them instead. WEBP is a more optimized image format specifically for use on the web. 
* Removed Block Bindings for site copyright year and theme info. Template Parts with Block Patterns are now used instead. 
* Rewrote the main functions.php to radically simplify it as well. It now uses an array to load other PHP include files as well as an array for which CSS stylesheets to load. Code needed for older WordPress versions was removed.
* Moved block patterns functions into the main block-patterns.php as they are no longer needed outside that context.
* For developers: Updated webpack.config.js to add postcss-loader to use autoprefixer to add browser prefixes automatically (e.g. -webkit-mask-image). Removed our vendor-prefixes mixin as it is no longer needed. 

= 1.9.7 =
December 7, 2024

More updates to CSS for margins for WordPress v6.7. Specifically for users that have edited the Sidebar or other Template Parts or Templates.

= 1.9.6 =
December 6, 2024

Version Summary: All custom Block Styles and Font Sizes now available in the Styles Editor and more updates to support changes in WordPress v6.7.

* Added new Footer with Site Motto (tagline) and Social Icons. Updated the Footer with Site Motto, Social Icons, and Site Info to use it.
* Set Footer Colored to underline links on hover since the links are the same as the text color.
* For Never Mobile navigation menus in the header, now highlight the current link and any nav link on hover.
* Added No Readmore custom block style to the Post Excerpt and Latest Posts (with excerpt) blocks. 
* More updates to the CSS for default vertical margins based on changes made to WordPress v6.7.

= 1.9.5 =
December 3, 2024

* Fix issue with Post Comments not displaying.
* Added new Templates for Page No Sidebar, Page No Comments or Sidebar, Post No Sidebar, Post Featured Image No Sidebar. This is so the Flat Blocks Classic child theme that uses them will retain the Template when changing from the child theme to the parent theme and back.
* Adjusted some of the CSS for vertical margins and padding to use the global Block Gap setting (--wp--style--block-gap) rather than Spacing 40 (--wp--preset--spacing--40). By default these are the same, but if the user changes the Block Gap, the vertical spacing will be more in line. This was also to fix the theme preview on WordPress.org. 
* Featured Images on Posts and Pages with Sidebars now have a rounded border to match Featured Images in the blog. 

= 1.9.4 =
December 2, 2024

* Due to changes in WordPress v6.7, added vertical margin and padding in the Editor to match the front-end.
* Updated Call to Action Block Pattern to wrap Button in a Buttons Block for consistency with recent WordPress versions and for the WordPress.org theme preview.
* Set light default link and button color on Midnight Blue and Dark Midnight Blue backgrounds. This is more consistent with the handling of other dark accent colors.
* Enhanced CSS to prevent empty Comments section from adding margin before the Footer.
* Added Block Bindings for Current Year (e.g. 2024), Theme Name (with link) and Theme Author (with link). We may use these in a future theme update as Block Bindings mature in WordPress (e.g. can just now see them at all in the Editor in WordPress v6.7). These are used currently in the Flat Blocks Classic child theme as they work better than PHP-based Block Patterns in the WordPress.org theme previews.
* Refactored the code in functions.php to load included files using an array. It loads both this theme and child theme files if they exist. This new function also includes a filter for child themes to alter the list, whether to add to it or remove from it.

= 1.9.3 =
December 1, 2024

* Revert replacing theme slug for patterns within patterns in child themes.
* Let Paragraph top and bottom margin default based on the font size (i.e. "1 em").

= 1.9.2 =
November 30, 2024

Update to fix child theme patterns within patterns.

= 1.9.1 =
November 30, 2024

Update to fix child theme patterns within patterns. This is related to the Site Info and Theme Tagline Block Patterns that use the new Current Year, Theme Name, and Theme Author Block Patterns. Specifically replace "slug":"flat-blocks/" with the child theme slug. 

= 1.9 =
November 30, 2024

Version Summary: Added new Template Parts for Site Copyright (with current year), Theme Tagline (Flat Blocks theme by Xtremelysocial), and Social Icons so you can edit them. Added 2 new Footer Template Parts and updated the one with Site Motto to use the site name and tagline. Outline style buttons are now colored just like standard buttons (wth Highlight color). Overhauled and expanded Duotones for images. Drop-down Navigation menus are now wider. Preset font-sizes can now be edited directly in the Site Editor (WordPress v6.7+).

* Added new Template Parts for Site Copyright (with current year), Theme Tagline (Flat Blocks theme by XtremelySocial), and Social Icons. Updated all the Footers and Sidebar to use these new Template Parts. That way, you can edit these Template Parts and the updates will be reflected on all the various Footers and Sidebar.
* Added new Block Patterns to support the new Template Parts: Current Year, Site Copyright (which uses Current Year), Theme Author, Theme Name, and Theme Tagline (which uses Theme Author and Name).
* Added two new Footer Template Parts: Footer Compact with Nav Menu and Theme Tagline, Footer 3 Blocks with Nav Menu and Site Copyright.
* Updated the Footer with Motto, Social Icons, and and Site Info to use a new Site Title and Tagline Block Pattern instead of the more generic Title and Text Pattern.
* Presets for font-size Large and up now use the new WordPress v6.7 format in theme.json which allows you to edit them! They still work with older WordPress versions, but you can't edit them directly in the Editor.
* Outline style buttons now default to the Highlight color (instead of the text color), but will inherit the text color on certain colored backgrounds, just like standard buttons.
* Changed up all the Duotone colors (effects that can be added to images) to have lighter colored shadows to look better. Simplified the Duotone names to Primary, Primary Alt, Secondary, Secondary Alt, Tertiary, and Tertiary Alt.
* Added all of the default WordPress Duotones too, although using this theme's color palette. This includes Purple and Yellow, Blue and Red, Midnight (Black and Blue), Magenta (Red) and Yellow, Purple and Green, Blue and Orange. These are compatible with your duotone selections created with other themes that use the WordPress defaults. It also means you can take them with you to other themes that support the defaults.
* Adjusted drop-down menu width to default to 240px by adding new new custom variable in theme.json --wp-custom--navigation--width. The WordPress default is 200px. Also added --wp-custom--navigation--wide-width to set the width of the mobile-only nav menu. It is still 360px wide.
* Added a new Site Contents section to the Sidebar with a Pages List so it lists all the pages on your site.
* Set default Separator color back to Neutral Alt, but it is easily changed in the Site Editor now (since Flat Blocks v1.8).
* More enhancements to default text (contrast) colors on colored backgrounds. Specifically, set white and off-white as default colors on dark backgrounds so that Foreground Alt can now be set to a dark color to allow for alternate lighter color palettes. 
* Changed quote accent color and separator color to Highlight color. It was Primary color and by default they are the same, but this allows for a light Primary color in theme styles or child themes. 
* Added Base background color to Header Fixed and Header Logo Fixed.
* Removed CSS for automatically adding padding to Group blocks that don't have a colored background. This simplifies the Template Parts throughout the theme.

= 1.8.1 =
November 21, 2024

Adjusted CSS for fixed headers to use Background color for older theme versions before changing over to using Base color.

= 1.8 =
November 20, 2024

Version Summary: Now ALL custom block styles are visible in the Styles Editor! Also adjusted site logo size and paddings to line up mobile nav open and close buttons. Added more descriptive labels for the Editor on various templates.

* Now ALL custom block styles are visible in the Styles Editor! This requires WordPress v6.6+. Note there is still CSS associated with many of these styles, but the attributes that you can change in the Styles Editor will override the default ones in the theme. For example if you want a thicker border on groups or a different colored background on comments, post meta, and sidebars.
* Adjusted sizes of the site logo on various header template parts to all be 64px (previously 50px, 64px, or 80px). Adjusted padding on Colored Header. This allowed us to line up the mobile Nav menu open and close buttons.
* Removed Admin Menu links to the old Widgets and Menus customizer since these should not be used in a block-based theme.
* Reduced vertical spacing when Nav menu wraps lines. 
* Set font-size to small for <pre> and <code> tags.
* Relabeled Site Header, Site Footer, and Site Query to Header Template, Footer Template, and Query Template in the Styles Editor. This was done just to better indicate that replacing it will only affect the Template currently being edited. To replace the Header or Footer site-wide across all templates, replace the one below it that has a specific name, such as Header Fixed.
* Added more labels to special groups in the various page Templates, such as page title groups and query pagination. This is nice for the outline view in the Editor. 
* Enhanced CSS for Dashicons icons.
* Separated out Image Gallery styles from the Image styles in source SCSS files.

= 1.7.1 =
November 17, 2024

* Fix for missing "Border" custom style on Images in the Editor. It was only showing up on Image Galleries.
* Set Excerpt length to 30 words when displayed in the Page title. The Excerpt is still the default 55 words on blog pages.
* Enhanced CSS for image captions within Image Galleries.
* Enhanced CSS for multi-level drop-down nav menus. 
* Enhanced CSS for Dashicons icons.
* Removed No Read More custom style for Post Excerpt since its no longer needed. Read More now has to be manually added to the block by the user if desired.

= 1.7 =
November 13, 2024

* Updated "Tested up to" with WordPress v6.7 and "Requires at least" to v6.5.
* Enhanced CSS to map the new WordPress v6.7 TwentyTwentyFive colors to this theme's colors.
* Updates for much better support of right-to-left languages! This includes updating the CSS for lists and post meta icons as well as updating the various footer template parts that used to have right-alignment on some of the text items. Please do let us know if you run into any issues and/or would like to translate the theme into other languages. 
* Turned off the ability to edit the normal and wide content width on individual blocks because it will break the vertical alignment of the theme. You can still edit the site-wide normal and wide widths though. 
* Updated the Post Meta and Post Title template parts to display the Post Author Name. Also default an icon next to it and add a custom block style to remove it, if desired.
* Updated the Author page template to use a rounded border on the author information so that it is visually set apart from the author's post below it. 
* Updated the remaining social media icons over to X instead of Twitter in the sidebar and various template parts and patterns.
* Updated the default social media links to point to the WordPress page, such as on Facebook and X.
* Enhance CSS for header navigation with highlight color on link hover and currently active page link to also work with the Page List block. That is what is defaulted on new WordPress sites and in the WordPress.org theme preview.
* Set Site Logo in the various Header template parts to reduce the tendency to shrink when there is a very long site title or navigation menu (set flex-shrink to 0).
* Enhanced CSS for the Dashicons used for post icons. Replaced the Dashicon for Lists with Checkmarks with simpler Unicode character. 
* Moved CSS for Images, Headings, and Columns from flat-blocks.css to block-styles.css. This reduces the size of flat-blocks.css which is the first to load. This is also in preparation for possible future performance enhancements.

= 1.6.9 =
November 9, 2024

* Fix issue with Theme Styles that set dotted underline on links that was also resetting the color palette to the default one. This required changing --wp--custom--color--link--style to --wp--custom--link--style in theme.json.

= 1.6.8 =
November 5, 2024

* Remove CSS for Editor background and text color since it now defaults from the settings in theme.json.
* Fix WordPress bug where Separator preview doesn't display in the Editor.
* Remove old commented out code in block-patterns.php, block-styles.php, and wp-compatibility.php.

= 1.6.7 =
October 29, 2024

* Added new gradient backgrounds: Primary to Primary Alt, Secondary to Secondary Alt, Tertiary to Tertiary Alt.
* Updated social media icons in the various footer template parts to switch over to X instead of Twitter.
* Updated social media icons in the Social Media block patterns to be white instead of off-white for greater contrast with the background color.
* On blocks with gradient background, default the text color and inherit the link color from the text color.
* Enhanced CSS for Separator block to fix a bug in WordPress where user settings for separator color were overriden by the default separator color (in theme.json).
* For WordPress v6.6 and higher, added our Thick and Wide Thick Separator block styles to the Editor so you can change the separator color if you'd like.
* On header nav menu with colored background, lighten the link text on hover.
* Updated striped table and calendar block heading background and text colors to work better with dark site backgrounds.
* Moved the padding on colored groups and columns to CSS (flat-blocks.css) instead of in "additional CSS" on those blocks in theme.json. This keeps the "additional CSS" clean for users to add their own without messing up the defaults.

= 1.6.6 =
October 12, 2024

Version Summary: Updated logic for default link colors and link underlines on colored backgrounds and in menus. Added new "Colored Footer" and "Colored Footer w/Links" template parts. The former uses the Secondary colors and the latter uses the Primary colors with light text and links are underlined. That one is great to use when you want a colored footer but the link color doesn't look good with it. Updated dark background theme styles, but removed the Auto Dark Mode as WordPress isn't handling "Additional CSS" very well in theme styles.

* Updated all the color palettes to better handle link colors and whether to underline or not. Set a teal (blue-green) color on Midnight Blue and Dark Midnight Blue backgrounds when using those color palettes (the main one still uses green links).
* Added new custom variables for hover opacity and hover style for links and hover opacity for buttons. --wp--custom--color--link--hover-opacity, --wp--custom--color--link--hover-style, and --wp--custom--color--button--hover-opacity.
* Changed separator (hr) color to use the highlight color when used on a colored background (group, columns, etc.)
* Updated the new default link underline logic to set non-underlined links to underline on hover.
* Set input fields to inherit the body font (lato by default) and in dark themes to use a dark background.
* Removed font color from Rounded, Rounded Border, and Thick Rounded Border styles so they default to the overall Contrast color (#555555 by default). This is useful in case you want to change the background color to a dark color. Just be sure to set a light font color if you do. 
* Added No Padding style to the Media & Text block.
* Removed the theme reference in the "Header with Tagline" template part so it works with child themes.
* Added padding to colored groups which are aligned wide in the Site Editor to better match the front-end (align full already did this).
* Removed Fixed Header custom group style and implemented the WordPress position:sticky feature instead. CSS and javascript for backwards-compatibility remains. 
* Removed default top and bottom padding on Group blocks, but updated CSS for backward-compatibility.
* Now including WordPress development configuration files: webpack.config.js, package.json, and package-lock.json. If you have node.js and the WordPress development scripts installed, you can run npm start or npm run build in the flat-blocks directory.

= 1.6.5 =
September 6, 2024

Version Summary: Several enhancements made to provide sensible defaults for text, link, and hover colors as well as wether links are underlined or not. This makes it easy to change just the background color on groups or columns, etc. and not have to always specify the other colors.

Also added Next and Previous Post links so user can easily page through articles on your site.

Here are some more updates:
* Added About 3 Navs Footer Template Part and set the About 3 Navs w/Site Info to use it.
* Adjust CSS for horizontal padding in the Editor to better deal with full-width and non-full-width blocks. Set Header w/Tagline Template Part to use it too.
* Added names to all Header, Footer, Sidebar, Post Meta, and Main content groups to differentiate them from other groups in the Templates while viewing in the Editor.
* Added new custom variables for button colors: --wp--custom--color--button-background and --wp--custom--color--button--text. Replaced --wp--custom--border--color with --wp--custom--color--border to be consistent with the new color variables.
* Centered the "No results" on queries and locked the block so it can't accidentally be removed. 

= 1.6.4 =
August 22, 2024

Version Summary: Added 4 new button styles. Button Alt and Button Outline Alt have no border-radius so they are rectangular. Button Alt 2 and Outline Alt 2 are pill shaped. Extended Rounded Corners, Rounded Border, and Thick Rounded Border to Cover, Media & Text, Code, Columns, and individual Column blocks. With WordPress v6.6, all of these new styles can be edited in the Styles Editor.

Here are more details on the updates:
* Added 4 new button styles, Button Alt, Button Alt 2, Outline Alt and Outline Alt 2. By default, the Alt ones are rounded and the Alt 2 are rectangular, but you can change them yourself in the Styles Editor.
* Extended Rounded Corners, Rounded Border, and Thick Rounded Border to Cover, Media & Text, Code, Columns, and individual Column blocks. These can be edited in the Styles Editor.
* You can now also edit the Border and Thick Border styles for groups, columns, etc.
* Changed Fixed Header group style over to the new Position: Sticky. CSS remains for backwards-compatibility for a while, but the ability to select it in the Editor has been removed. Use Position: Sticky on the group instead.
* Added Link No Underline, Link Underline, and Link Underline Hover styles to the List block so these can be controlled at the list level rather than the individual list item. 
* Renamed custom-styles.css to block-styles.css to better reflect the fact that it has both standard and custom block styles in it.

= 1.6.3 =
August 16, 2024

Version Summary: This is a big update for WordPress v6.6, especially for Theme Styles. You can now mix and match various color schemes, font pairings (with and without uppercase headings), and drop-shadows on buttons and post featured images. There are 14 colors schemes, 14 typography options, and 3 different shadows totalling well over 500 possible combinations!

In addition, two new color names were added for "Highlight" and "Highlight Alt" which are now used to set the button background, link color, and link hover color. Various Template Parts and Block Patterns were updated to support all this.

Here are more details on the updates:
	* Added Highlight Color (--wp--preset--color--highlight) and Highlight Alt (--wp--preset--color--highlight-alt) colors to the color palette to replace --wp--custom--link--color and --wp--custom--link--hover. 
	* Set the default button color to the highlight color to match the links.
	* Added --wp--custom--color--field--background and --wp--custom--color--field--text to set form fields background and text color for dark theme styles. Renamed --wp--custom--outline--color to --wp--custom--color--field--outline.
	* Removed inline CSS in the Dark Midnight Blue and Dark Very Dark Gray global theme styles that is no longer needed when using the new highlight colors. Note that Auto Dark Mode still needs inline CSS to change the colors depending on whether the user's system is in light or dark mode.
	* Updated Template Parts to no longer specify the text color so that the new default text colors will be used: Comments, Header Colored, Footer Default Light, Post Meta, Sidebar, Page Title with Excerpt.
	* Updated Block Patterns to no longer specify the text color so that the new default text colors will be used: Title and Text, Pricing Table 3 Columns, Pricing Table 4 Columns, Cover Scroll Home Header, Cover Scroll Page Header.
	* Changed the various Theme Styles that had yellow as the secondary or tertiary color to use orange instead as it is more readable with the default off-white text color. Note that existing Orange and Yellow theme styles can still be used for those that want those colors as a default.
	* Increased the headings font sizes for the Style Script font.
	* Fixed formatting issues in Templates: Page Site Map, Post Sidebar Left, and Post Sidebar Right. 
	* Bumped minimum WordPress version to 6.4, so that support goes back two major release levels.

= 1.6.2 =
August 7, 2024

* New Template Part for Page Title with Excerpt. This will display a subtitle below the page title that displays the page excerpt. By default the excerpt is the first 25 words from the page itself, but it is best to write a custom page excerpt. This was added from our Flat Blocks Classic theme to be used now by all. 
* Added new Image Border style to the Image Gallery block. This makes it easy to add a border to all the individual images at once.
* For Image Gallery Pattern, add lightbox (click to expand) to each image. WordPress still requires this to be set on each image rather than the whole gallery itself, so this is a time-saver.
* Added Link Underline on Hover style to the Site Title. 
* Fix Title and Subtitle Pattern which was displaying an issue in the block editor due to it using an H1 tag. Changed it to H2 since only the site title should be H1.
* Fix Default Auto-Dark Mode Global Theme Style since change to base and contrast colors in v1.6.
* Set headings top and bottom margin in theme.json to be the Block Gap ("spacing") setting for the theme, which is by default 18px. This is done for consistency as core WordPress uses em values so much larger margins on larger fonts. 
* Various CSS enhancements:
	* Enhanced CSS for images with borders and captions.
	* Tweaked the preset box shadows to make them a bit more prominent.
	* Simplify CSS for handling link underline, no underline, or underline on hover. These CSS classes can also now be added to 3rd-party blocks manually in the Advanced->Additional CSS Class(es) block setting in the Editor. Use is-style-link-no-underline, is-style-link-underline, or is-style-link-underline-hover.
	* Reduced line height on Latest Posts block article titles
	* Remove extra bottom margin on post excerpts with "no read more" style applied
	* Enhance native Dashicons CSS to preserve aspect ratio
* Moved Global Theme Styles to a new /styles/global directory now that the typography ones are moved into /styles/typography.

= 1.6.1 =
July 28, 2024

* Reverted back to defaulting link underlines, but then overriding it to no underlines on on navigation, captions, etc. This allows users to easily change the default in the Global Styles settings. 
* Added custom CSS variables for link position, offset, and style to theme.json so that child themes can set these.
* Miscellaneous CSS enhancements, such as reducing specificity of CSS for default font colors on colored backgrounds, specifying some defaults for when custom variables might be missing, removed extra bottom margin on post author name in post meta, etc.

= 1.6 =
July 23, 2024

* Breaking change: Changed Background and Foreground colors to Base and Contrast respectively to match the default WordPress TwentyTwentyFour theme. CSS was added for backward-compatibility though (in /src/scss/base/_color-compat.scss).
* Breaking change: Default outline buttons to Contrast (foreground) color. Individual outline button color can be easily changed.
* Updates for WordPress v6.6:
	* Updated theme.json to version 3 which allows the new WordPress v6.6 features, such as Block Style Variations. See https://make.wordpress.org/core/2024/06/19/theme-json-version-3/
	* Typography styles are now available to apply to any of the other colored global theme styles. This lets you mix and match colors and typography. Note these styles were moved into a /styles/typography directory to differentiate them from the ones in the main folder. 
	* Fix font size issue and spacing size issue introduced with v6.6. Now setting the new  defaultFontSizes and defaultSpacingSizes to false in theme.json, so that theme settings aren't overwritten. Also note had to add !important to font sizes normal and huge because WordPress was still outputting them. 
	* Fix global style preview button color for the way WordPress v6.6 works. i.e. So the little button-colored dots reflect the button color for each style.
* CSS fixes and enhancements:
	* Fix CSS which was overriding the ability to set the color of outline style buttons in the Global Styles Editor.
	* Fix wide and thick wide separators that weren't displaying due to change in WordPress CSS.
	* Enhance Dashicons CSS to behave better when manually added to paragraphs, headings, or list items.
	* Remove underline on Calendar navigation links since we were required to default links to underline per WordPress theme guidelines.
Other:
	* Fix font color on Title and Text pattern to use Foreground Alt since the background color is dark. 
	* Softened the shadow on the Outline and Crisp box shadow styles.
	* Reduced button text line height to 1.25 (was the same as regular text which is 1.5).

= 1.5 = 
Apr 7, 2024

* Tested up through WordPress v6.5. Updated CSS for Outline style buttons in the editor so it doesn't have a background color. 
* Enabled "lightbox" (click image to display full-width in popup window) by default (in theme.json). This can be turned off, if desired, in the Global Styles settings.
* Enhance Dashicons CSS to behave better when manually added to paragraphs, headings, or list items.

= 1.4.8 = 
Mar 16, 2024

* Added Query No Results block to all the Query Block Patterns in case nothing was found. Note this is mostly for the search results, but will apply to categories and tags, etc. that might not have posts.
* Added right padding to dashicons-before CSS class. Note this has to be added manually in Advanced block settings.
* Added CSS for is-style-no-padding on Query Block. Note this has to be added manually in Advanced block settings.
* Added a filter that child themes can use called 'flatblocks_allow_page_excerpts' which can be passed true or false to indicate whether pages should allow excerpts or not. This has always been turned on so that is still the default.

= 1.4.7 = 
Feb 16, 2024

* Added more cover images and Block Patterns for them: Book, Building, City Night, guitars, notebooks.
* Changed link underline to sit completely below the bottom of letters (text-underline-position: under).
* Changed comment form label to use medium font weight (font-weight: 400).
* Changed author bio to use normal font size (was .7em).
* Adjust CSS for padding on Post Comments.
* Enhanced block pattern functions to allow child themes to reference local images in block patterns. Add property 'imageRoot' => get_stylesheet_directory_uri() when filtering 'flatblocks_block_patterns'.

= 1.4.6 = 
Feb 13, 2024

* Added a new cover image that is an antique typewriter and a Block Pattern to insert it in the Block Editor. The image itself is in the /assets/images/ folder if you want to upload it to your Media Library. 
* Changed default box shadows for buttons to "tone them down" from the WordPress defaults. The WordPress defaults from least amount of shadow to the most are: natural, deep, sharp, outline, and crisp. We toned down natura and deep and set the old natural to sharp. Outline and Crips remain the same.
* Enhanced CSS for latest post block featured images with border and image galleries with image titles.
* Changed the Compact Footer Template Parts to consistently use "footer-info" as the ID and CSS class. This is to differentiate them from the larger footers that use "site-footer" ID and CSS class.
* Adjust the bottom padding on featured images in the Latest Posts block.
* Don't put bullets on Latest Posts block if it is the Grid layout. i.e. Only do it for list style.
* Changed the menu and social link icon hover animations to use "ease-in" instead of "ease" (changed in theme.json).
* Renamed /src/sass folder to /src/scss.

= 1.4.5 = 
Jan 25, 2024

* For fixed headers, line up mobile menu open and close buttons.
* Changed custom variable in theme.json --wp--custom--button--shadow to --wp--custom--shadow--default. This specifies a drop-shadow to use or "none" for buttons (and the fixed header). To specify one, use var(--wp--preset--shadow--natural).
* If a default shadow is specified, add it to the fixed header, latest post featured images, and blog featured images in addition to buttons.
* Enhanced CSS for navigation menu hover color to work with colored header backgrounds.
* For Groups with flex (Rows) and "No Wrap" specified, go ahead and wrap on mobile screens. Otherwise, the layout is broken. 
* Added a little more space to the top of the Cover Scroll Home Header cover image text. 

= 1.4.4 = 
Jan 12, 2024

* When a Pages list in a Navigation Block has a drop-down menu, highlight the drop-down title on hover like for other menu items.
* Remove some headers and a footer that were for testing only.

= 1.4.3 = 
Jan 11, 2024

* Default Detail Block Header (summary line) to Primary color and set to primary-alt color when open. However, you can choose a font on an individual detail block to override it.

* Font and link colors now default to light color on dark colored backgrounds.
	* For groups, columns, buttons, and paragraphs, foreground-alt is used (off-white by default).
	* For Cover image block, black or white is used like core WordPress does, but base it on the percent opacity of the cover image overlay. 40% or greater will use white, otherwise black is used. For other blocks, such as Groups and Columns, foreground-alt is used on the dark-colored backgrounds. 
	* For Navigation Block, replaced some of the CSS by using theme.json. This results in ANY navigation bar using the primary color on hover including the footer nav. 
	* For Block Patterns and Template Parts, removed foreground-alt, off-white, and white font colors since they now default based on the background color.
	* Updated Static Map & Address and Jetpack Map & Address Block Patterns (and the footers that use them) to use "Dark" background color instead "Almost Black". This will leave the link color as "Primary" instead of changing it to "Foreground Alt" based on the new default link color rules above.
	* Updated all the necessary Global Theme Styles to add a bit of CSS to override some of the above font and link color defaults. Mainly for the shades of yellow where dark text is more readable than off-white.

* Added Custom Block Styles for Links:
	* Link Underline on Hover for Paragraph, List Item, Latest Posts, Latest Comments, Page List, and Post Title
	* Link Underline and Link No Underline for Post Title and Post Terms. Set Post Terms (category and tag lists) to not underline links by default. 

* Adjusted top and bottom spacing on comment section.

* Fixed typo on the word "Query" in various Block Patterns and the corresponding language translation file (.pot).

* Enhanced smooth scroll javascript for potential future additional header type. 

= 1.4.2 = 
December 12, 2023

* Breaking change to default link underlines
	* Default links to have underlines to comply with WordPress.org theme guidelines where "underline is the only accepted method of indicating links within the content". Note that we had already turned off link underlines on numerous blocks (via Global Styles), such as lists, category and tag cloud, etc. so this should just properly underline links in your main content. 
	* Due to above, updated various Template Parts and Patterns to not underline links. e.g. Page Home pattern, Page Portfolio pattern, Pricing Table patterns. 
	* Added Custom Block Style for List Items to specify link underline or not. 

* Adjustments to horizontal padding
	* Adjusted spacing on post author avatar and bio on Author Page Template.
	* Removed specific horizontal padding from the Compact Footer and Fixed Header Template Parts so that it defaults to the global style Layout -> Padding setting. Adjusted Editor CSS for this. 
	* In the Editor, fix left padding on Latest Posts list when styled with Bullets.

* Changes to global theme styles
	* Renamed Global Theme Style "Dark - Almost Black" to "Dark - Very Dark Gray" to more accurately reflect the background color. 
	* Changed Global Theme Style "Default - Auto Dark Mode" to have the WordPress Admin Bar (if turned on by the logged in user) to Almost Black color to distinguish it from the dark background color. 
	* Reordered the global theme styles: Move Dark Midnight Blue, Dark Almost Black, and Auto Dark Mode earlier in the list. Move Default with Shadow and Default Blue Links towards the end of the list. This shows off more of the color options earlier in the list.

* Changes to cover images block patterns
	* Changed all the Cover Image Block Patterns to have the subtitle as Heading Level 3 (H3) instead of H2. The Title is still H3. 

= 1.4.1 = 
December 2, 2023

* Updates for WordPress v6.4:
	* Updates to Editor styles for older HTML-based buttons, forms, etc. WordPress v6.4 has removed the .wp-site-blocks class from the block Editor so all the styles using that had to be updated.
	* Default column spacing (gap) on flex columns just like on other columns (by default 18px). WordPress v6.4 sets this to zero for some reason so there is no spacing between columns. Note that the user can override this on individual columns blocks, if desired. 
	* In the Editor, fix site title link to be the primary color.
	* Fix custom styles for List block with Checkmarks and Plain Centered.
	* For theme users coming from the TwentyTwentyThree or TwentyTwentyFour theme, changed the mapping of that theme's base color to our foreground-alt color, base color 2 to light gray and base color 3 to gray. This is mainly for when a user set their background and foreground to one of these base colors. In that case, the text would be indistinguishable from the background.
* Don't set older-style input buttons to have light border on colored backgrounds. Instead, users can replace the older style buttons with the Button block and choose Outline style.
* Added custom styles for user to set link underline or not on Categories, Latest Posts, Latest Comments, and Page List blocks.
* For global theme style Source Sans & Source Serif Pro, slightly increase the font weight on the Site Title block because this font is very thin.

= 1.4 = 
November 23, 2023

* Block Patterns
	* Added Block Patterns for Content with Right Sidebar and Content with Left Sidebar. This allows you to make any individual page or post have a custom sidebar that you can put anything you want into.
	* Fix Pattern Image with Computer Screen Title and Text to use the newer preset spacing format.
	* Changed the full-page Block Patterns for About, Home, Portfolio, and Services to use the other block patterns to build the page (<!-- wp:pattern /-->) rather than the custom function flatblocks_get_block_pattern(). This makes the code easier to maintain.
	
* Global Styles Enhancements
	* Changed the default global style setting to not underline links except for in paragraph blocks. Previously link underlines were defaulted everywhere but then overridden in global styles for most blocks, such as the site title, list block, query pagination, etc. By changing to no link underline except in paragraphs, 3rd-party plugin content links will not default to having underlines. We had already provided custom styles on paragraphs to either show or not show link underlines, so this can continue to be controlled at the individual paragraph block level.
	* Center separator block by default (change left and right margin in global theme styles to "auto").

* CSS Enhancements and Fixes
	* Enhancement for the WordPress v6.4 new image "lightbox" ("expand on click"): Hide caption on our custom style for Image with Computer Screen.
	* Lighten day numbers on Calendar block when using a global theme style with a dark background. 
	* Enhance CSS to allow users to manually add Dashicon icon CSS to paragraphs. e.g. "dashicons dashicons-before dashicons-arrow-up-alt2" will add an Arrow Up icon before a text link, such as in the footer nav.
	* Enhanced the CSS for theme compatibility with background/base and foreground/contrast colors. This is for users of TwentyTwentyThree and other themes that use base and contrast colors moving to this theme which uses background and foreground colors. Accent color(s) now map to this theme's primary color too.
	* Style older form reset button styles to match the theme button styles.
	* Align built-in (Dashicon) icons to the top so they align better with text.
	* Default social link icons to be centered.

* Javascript Enhancements
	* Enhance smooth scrolling on internal links to page or post comments to account for fixed header height.

= 1.3.12 = 
September 26, 2023

* Enhance CSS for Social Links, Paragraph "link no underline" style, Query block needed for WordPress.org theme preview.

= 1.3.11 = 
September 26, 2023

* Enhance CSS for horizontal padding and buttons on colored backgrounds primarily for when  previewing the theme on WordPress.org.
* Increase font-weight on comment author name.

= 1.3.10 = 
September 16, 2023

* Defaulted links to underline on post/page content and in comment contents per WordPress.org Theme Guidelines. So then set various other theme elements to not underline links in theme.json, such as post title, post date, post author name, lists, etc. Also updated the various footer template parts to set the paragraph style to not underline links. Note that the no underline paragraph style was also changed to "is-style-link-no-underline" (previously it was "is-style-no-link-underline").
* Increased the font weight on the new WordPress v6.3 Details Block heading line (called "Summary").
* Center-align captions by default in the Block Editor. The CSS there is different than on the front-end, so had to add this to /assets/css/editor-styles.css.

= 1.3.9 =
September 11, 2023

* Added "Page Featured Image with Left Sidebar" and "Page Featured Image with Right Sidebar" templates for those that like a more "classic" look to certain pages. 
* Enhanced footers with maps to not have top and bottom margin on them since these footers have dark backgrounds and would let the light background show through. Also updated the contact info on them to include an email address. 
* Enhanced functions.php to add two new filters that can be used to alter the way WordPress and this theme loads its stylesheets. By default, everything works the same way as it has in prior versions, so you shouldn't see any difference. If a child theme overrides these default values, it will tell WordPress and/or this theme to load individual block styles separately. The logic is smart enough to only load block styles for ones in use on any given page or post. This enhancement was done to pave the way for taking advantage of any performance enhancements in WordPress. From our testing, however, this tends to lower performance scores not improve them so that is why this is turned OFF by default. To override the defaults and turn on separate block style loading, add the following to functions.php in your child theme.
	add_filter( 'should_load_separate_core_block_assets', '__return_true' );
	add_filter( 'flatblocks_should_load_separate_block_assets', '__return_true' );
* As a result of above, we are now including invidual block styles in the /assets/css/blocks/ directory. These are only used if you override the default setting above, but if you do, they are needed.
* Simplified CSS in editor-styles.css to remove .is-root-container before each CSS style because that was only needed when also loading these styles on the front-end.
* Enhanced CSS in the Editor for horizontal spacing (padding) on tablet and mobile.
* Enhance CSS for groups that are header, footer, or main. Top padding will be removed automatically and left and right padding will depend on whether site horizontal spacing is needed (.has-global-padding).
* Enhanced our function that loads block patterns to alter the theme name not just for child themes but now also for parent themes created from Flat Blocks. i.e. The theme slug is now overridden whenever the theme slug isn't exactly 'flat-blocks'.

= 1.3.8 =
September 9, 2023

* Enhanced Post Featured Images to use the new WordPress v6.3 "aspect ratio" feature to set them to 16:9 format. This is the format the theme has always intended to use and all included images are in that format and the theme even adds two additional image sizes that are also 16:9 format. Now this aspect ratio will be honored on all Post Featured Images. Note that this was NOT done to Cover images. Those images are intended to also be in 16:9 format, but the user can set the "minimum height" to make them shorter and we don't want to override that. 
* Updated border and spacing on some styles in theme.json to prevent crashing the Editor. Specifically these were values set to reference other styles ("ref":). These are replaced now with custom border settings (--wp--custom--border--style and --wp--custom--border--radius) and preset spacing (--wp--preset--spacing--40). Block Styles effected are: Code, Featured Image, Spacer, Separator.
* Put back default of centering figure captions (images and tables) as there are some situations where the user can't alter it, such as when left or right aligning an image.
* Moved all editor styles into their own stylesheet (/assets/css/editor-styles.css). This reduces the front-end CSS which helps performance a bit.
* Removed ID's from all images and queries used in patterns. They weren't a problem, but WordPress suggests removing them.
* Refactored flat-blocks.css and custom-styles.css to move non-critical core block styles to custom-styles.css. This way the flat-blocks.css file contains all the styles needed to render the vast majority of "above the fold" content. Also, we implemented SASS behind the scenes to generate the theme's CSS files. This will let us change how various styles load more easily in the future.

= 1.3.7 =
September 7, 2023

* Style the Tag and Category Cloud alternate Outline style to use the theme's border radius (5px by default) and padding. 
* Enhancement to Block Styles logic to allow inlining styles or referencing a registered style handle. This is mainly for child themes or possible future performance enhancements as WordPress v6 evolves.

= 1.3.6 =
September 6, 2023

* Quick fix for Custom Block Styles not loading (block-styles.php).

= 1.3.5 =
September 6, 2023

* Quick fix for Query Patterns: Sidebar Left, Sidebar Right, and Single Column that were creating issues if running PHP v8+.
* Quick fix for Cover Colored Blocks Pattern.
* Enhanced block-styles.php to not issue a PHP warning if malformed block array passed to it. This is a nice touch for child themes that may add a filter to override or add custom block patterns.

= 1.3.4 =
September 5, 2023

* In header navigation, use the primary color as the link hover color. Note that if the header color is overriden by the user, this won't apply. The chosen color will just be lightened like it worked prior to this change.
* In header navigation, also highlight the current menu item (or parent item). By default, the primary color will be used (light green). On user-colored headers, bold will be used.
* Reduce default cover image overlay color to 40% (was 60%) on the colored block image to allow more of the image's natural colors to show through.
* Updated screenshot to reflect highlight of home page link and lightening of cover overlay in the site header.
* Set footer columns to use thick gap to match pages with sidebars. The thick gap style is twice the standard block gap (which is preset spacing 40 that is responsive up to 18px). So the gap is up to 36px now.
* Don't automatically center figure captions (image, table, etc.) since the user can specify what position they want it in (and it defaults to left).
* Added an anchor link of #wrapper at the top of each page for the theme preview on WordPress.org and for users with older navigation menus that point to that as it was the standard on older WordPress themes (before Block based themes). This theme uses #page and that still works as well.

= 1.3.3 =
September 3, 2023

* Locked numerous theme elements that are critical to the templates, such as the main group for the page/post, sidebar on the templates with sidebars, etc. These can always be unlocked by the user, but will prevent accidentally deleting critical template components.
* Set separators to not default to centered (but of course allow the user to center them).
* Removed footer from Post Content Only template. This template is designed to be like a "landing page" where all of the content is built on the page itself. i.e. The user will create a unique header and/or footer, if desired.
* Enhanced CSS for:
	* WordPress Admin Bar on mobile to make sure it stays in its fixed position.
	* Padding and background color on Fixed headers.

= 1.3.2 =
September 1, 2023

* Added Post Featured Image with Left Sidebar and Post Featured Image with Right Sidebar templates for those that like a more "classic" look to their blog posts. 
* Turned off WordPress loading core block CSS files separately. This was supposed to improve performance, but in practice it doesn't because it causes more files to need to load before the page displays. 
* Enhanced the CSS for horizontal spacing on mobile. Don't allow user to set it to zero on headers, footers, or on the comments template part. 
* Enhanced the CSS for cover block inner content to allow for full-width groups if desired. The default is still wide-width though.
* Enhanced Dashicons CSS so the icons better match the element you are placing them on. For example to match the font size and font weight.
* Set links and navigation links to simply default their font-weight (by removing the font-weight designators in theme.json). This allows the font-weight to be overridden on individual blocks. Also, set hover color on Site Title link. 
* Enhanced the smooth scroll javascript to better calculate the scroll position with the new fixed header logic.
* Set dependencies on child theme styles so they are sure to load after the Flat Blocks ones. 

= 1.3.1 = 
August 31, 2023

* Rewrote all the logic for Fixed Headers and Fixed Nav Menus. They now both work in the Site Editor! The extra "hidden" group for the #page anchor for smooth scrolling isn't needed anymore either. This also removes the requirement for the fixedheader javascript, so site performance is improved. 
* Disabled the "Sticky" Group block option in the Editor because it didn't work anyway and could conflict with the new fixed header logic.
* Adjusted the smooth scroll javascript to work with this new fixed header method. 
* Tweaked the CSS for horizontal padding and vertical margin on the front-end and in the editor. Updated some of the custom styles to use block-gap instead of preset-spacing-40. This was only done where it was used for the same purpose as vertical gap.
* Fix for child theme style.css not loading in the Block Editor
* As a result, the Editor now matches the front-end even better!
* Added new Post No Comments Template for when there are historical comments that you no longer want to display on a post. 
* Tweaks to the CSS for plain style lists (no bullets or numbering) to add some bottom margin to better separate them.
* Adjusted small and normal social icon sizes up a bit (22px and 26px respectively).
* No longer load the theme's style.css since it is only required by WordPress to describe the theme itself. There is no actual CSS in it. The CSS for this theme is in /assets/css/flat-blocks.css and /assets/css/custom-styles.css.
* For child themes, their /assets/css/custom-styles.css will now be automatically loaded into the Editor if it exists.
* Updated this readme.txt file to clarify and enhance instructions for creating a child theme.
* Updated the Custom Block Styles logic to allow for non-core styles. This was done in case anyone wants to add custom block styles to blocks added with a plugin, such as Jetpack. Just pass in jetpack/whatever-block instead of core/whatever-block or just whatever-block.

= 1.3 =
August 20, 2023

* Updates and enhancements specifically for WordPress v6.3:
	* Added Frequently Asked Questions (FAQ) Block Pattern now that WordPress v6.3 includes a "Details" block. This block can hide detailed text and display it when the user clicks on the "Summary" (title).
	* Added the FAQ Block Pattern to the Services Page template.
	* Now that WordPress core block styles are pretty complete as of v6.3, we no longer include the "extra" block styles. i.e. loaded through add_theme_support( 'wp-block-styles' ). Those were conflicting with the theme and user global style settings as WordPress v6.3 for some reason places them later in the generated CSS style sheet.
	* Dashicons (icon font) now display properly when editing pages or posts in the new Block Editor. This refers to the calendar, comments, scroll down arrow, etc. Changed the way these Dashicons are loaded now that the Block Editor uses iframes.
* Additional updates and enhancements:
	* Separator and pull quote blocks now defaults to the theme style's primary color to match reqular quotes (by default this is light green).
	* Styled the Table with Stripes style.
	* Optimized all included image assets to reduce their size while retaining good quality for the web. 
	* Added section in this readme.txt file about how to create a child theme of Flat Blocks

= 1.2.14 =
August 16, 2023

* Added the Roboto Mono font and set it to the default for code and preformatted blocks.
* The Fixed Mobile Nav Menu can now be centered in addition to positioned left or right.
* Fixed issue with Menu Never Mobile where it was going mobile on small screens. Also added a group to it so there is margin between it and the site title. 
* Added custom page list styles for checkmarks and plain lists, so you can now choose those styles for them just like on regular lists.
* For Media & Text block with border style, round the edges and add a bit of padding to be more similar to post thumbnail images.
* Enhanced the smooth scrolling to factor in whether the site is displaying the Admin Bar or not. This is most beneficial for cover blocks with scroll to content sections. 
* Made some code optimizations to the fixed header javascript.
* Cleaned up the horizontal padding CSS rules to reduce the number !important designators. This gives user more control in adding their own padding to blocks, but will still overriding the left and right padding on mobile devices so all the blocks line up nicely with consistent margins.
* Moved the theme's pattern-related functions into its own 'pattern-functions.php' file in the /inc directory. Added inclusion of that file into the PHP-based patterns that use it. This is to help when admins are using the WP-CLI command line utilities.

= 1.2.13 =
July 24, 2023

* Added logic to the sample page Patterns to make sure the necessary theme functions have been properly loaded. Specifically flatblocks_get_block_pattern().
* Added one more Template Part Area called "Menu". This should be useful in a future version of WordPress. 

= 1.2.12 =
July 18, 2023

* Added some sample navigation links to the various Footer Menu template parts. This is to prevent WordPress from displaying a complete list of the sites pages in the footer. Of course once the user specifies an actual footer menu, the sample links get overridden. Note that for the header menu, the default behavior of displaying the full pages list is still in place as it makes sense there.
* For Site Title, remove link hover color from theme.json so it defaults from the general link hover color or a custom link color if the user specifies one. This was done to the various global theme styles that set the Site Title link hover as well.
* Adjusted mobile nav menu padding to better match site header padding.
* On Author Page Template, fix alignment of the author name.
* Fix input select box font color when previewing theme on WordPress.org. Specifically, set the font to the Foreground color.
* On the global theme style Default Drop Shadow, fix the drop-shadow on buttons. 
* Added some sections to categorize Template Parts. This will be useful in a future version of WordPress. Added Title, Sidebar, Query, Comments, Menu, and Content (for everything else). WordPress already has Header and Footer.

= 1.2.11 =
July 17, 2023

* Enhancement to Auto Dark Mode global theme style to also darken the drop-down menus and mobile menu.
* Fix issue with global theme style: Purple, Yellow, & Midnight Blue causing it to not show up as an available style in the Editor.
* For fixed mobile nav, allow positioning left, center, or right by adjusting it's group container. 
* Remove theme name from the header template parts. This should allow child themes to override them.
* Remove menu reference# from the various menu template parts. This should help with WordPress navigation fallback logic. That means it should do a better job at finding an appropriate menu from your site.

= 1.2.10 = 
July 11, 2023

* Added global theme style for auto dark mode! This is the second style right afer the default one. It will automatically change to a dark background with light text when the operating system gets set to dark mode. For example in Windows, iOS, etc.
* Added two new colors: Light Blue and Light Yellow. Updated the theme gradient colors to use them to provide a wider range of color. Also updated the Orange, Yellow, & Midnight Blue global theme style to use the new light yellow color. Updated the Yellow, Orange, & Midnight Blue global theme style to bold links in Post and Page content so they stand out more. 
* Refine CSS for images with hard-coded widths, mainly for the WordPress.org theme preview which uses older (non-block) markup.

= 1.2.9 = 
July 7, 2023

* Refine CSS for buttons to reduce unintentional styling of buttons in 3rd-party plugins.
* Refine CSS for images with hard-coded widths to reduce the chance of breaking the page layout. 
* Update minimum PHP required to v7.4, which is the minimum that WordPress itself recommends. Note that PHP v8.1 is preferred, but this theme doesn't require anything beyond what WordPress itself does.

= 1.2.8 = 
July 5, 2023

* Adjust logic for blog on home page so that it shows the extra "Content Top" Template Part only on the first page.
* Remove large padding in all Header Template Parts, so now defaults to Small spacing.
* Along with Header padding changes, remove Header Compact since its no longer any different than Header Default.
* Add template parts for footer block 1, block 2, and about block. Update the footer templates that use them. This way when the component blocks are edited, the updates will be reflected in all the footer templates that use them.
* In conjunction with adding the footer blocks, revise the CSS for vertical margin on template parts.
* Only display Post Comment Count on blog if Gutenberg plugin is enabled. This Block isn't part of standard WordPress. This was done with a new hidden pattern (hidden-post-date.php).
* Adjust font-size on Site Map page template to match the others ("x-large" font size).
* For global theme style with drop-shadow buttons and link underlines, remove underline from nav menus
* Set Post/Page Excerpt length to 25 words if used in Post Title or Page Title Template Part. However, it still uses the default 55 words on the blog. 

= 1.2.7 = 
June 30, 2023

* Clean up CSS for input fields and buttons
* Updated readme.txt to discuss setting the blog or a page as the site home page.

= 1.2.6 = 
June 28, 2023

* Update icon color to be white for social media icon patterns, both 3-column and 4-column. This looks better on all colored-backgrounds.
* To better support user's older post and page content and older plubins, added CSS to style non-block buttons, forms, and input fields to better match the block-based ones styled in theme.json.
* For Comments template part, keep avatar and user name on the same line (don't collapse on mobile)
* Added bottom padding on sidebar
* Add filter for child themes to be able to specify whether to remove core WordPress block patterns or not. The filter name is 'flatblocks_remove_core_patterns'. The default is true.

= 1.2.5 = 
June 27, 2023

* Fix issue with CSS for images with hard-coded dimensions

= 1.2.4 = 
June 26, 2023

* Update theme screenshot to show primary, secondary, and tertiary color for a better theme preview on WordPress.org.
* Update the CSS for images to prevent older block editor markup that uses wp-block-caption from breaking the layout. 

= 1.2.3 = 
June 26, 2023

* Fix font color on post meta box when using dark theme style.
* Darken link color on Purple global theme style.
* Change Title and Text block pattern to have secondary background color so its different than the cover image which uses the primary color.
* Fix WordPress bug where columns block doesn't have gap in the Block Editor.
* Added feature to functions.php to load child theme's /assets/css/custom-styles.css file if it exists.

= 1.2.2 = 
June 23, 2023

* Updates for more accurate theme previews on WordPress.org Theme Directory:
	* Remove bottom margin on columns block
	* On blog, put date and comment count on the same line to take up less space
	* Renumbered global theme styles so more colorful options are at the beginning.
* When Gutenburg plugin active, allow user to set various menus in the Customizer. This is an easy way to assign menus without having to edit the menu Template Parts themselves.
* Cleaned up some CSS for the included Dashicon font icons, image block top margins, featured image top margin, post content bottom margin, heading bottom margin, post title line height, and image captions on dark backgrounds.
* Change font color to foreground-alt on pricing tables and social icons to look better on theme styles with dark backgrounds.

= 1.2.1 =
June 21, 2023

* Updates for inclusion in the WordPress.org Theme Directory:
	* Added content to the top of the front (home) page for when the user has it set to display the blog. So added a template part for Content Page Top and a Front Page template in PHP to conditionally load it when appropriate. Also added Home template for the blog when static page is set to the front page.
	* Modified Page Home template and pattern to match the new front page template.
	* Updated the screenshot to match the new front page template.
* Updated entry content bottom margin to be on the last block so that user can override it by setting margin-bottom to 0.
* Added spacing around Team block patterns (both 3 column and 4 column).
* Changed custom page templates Page Featured Image and Page Featured Cover to allow full width.
* Removed CSS classes on <main> to denote template file since WordPress already puts this on the <body> tag.
* Fixed issue with images not having top margin according to the overall vertical spacing.
* Added post date and author fields to Post Meta, specifically so post templates without title will show this information.
* Changed template part name for default query to query-loop-2-columns to better denote which layout it is. 


= 1.2 =
June 8, 2023

Updates for WordPress v6.2:
* Updated the theme to use core WordPress v6.2 default, wide, and full width handling (useRootPaddingAwareAlignments). Set the overall layout to have left and right padding (preset spacing 50 which is responsive from small to large).
* In conjunction with the above, updated all templates to use the new "layout":{"type":"constrained"} versus the old "layout":{"inherit":true}. This is important for properly handling full and wide with layouts.
* Added more preset responsive spacing sizes and renamed them to match core WordPress v6.2.
* Fixes for various block patterns for WordPress v6.2: all the cover images, the button in the 2-column call-to-action, and the large social media icons.
* Added new pattern for Call to Action Rounded. This is a wide-with group with colored background and rounded borders.
* Added new pattern for Testimonial. This is a full-wide colored group with profile pic, quote, and the person's name.
* Cleaned up Quote styling, such as vertical space above the quote author (cite).
* Remove bold font files (weight 700) as we use weights 300, 400, and 500 only. This reduces the overall size of the theme.
* Updated the various theme styles that specify fonts to set it at the heading level now that WordPress v6.2 supports that. Previously we had to specify each individual h1, h2, h3, etc.
* Reduced the number of custom group styles to only the ones used directly in the theme templates, template parts, and patterns. In WordPress v6.2 its very easy for users to choose preset spacing for padding and margin, so fewer group styles related to those are needed.
* Added a new header menu dark template part and set header dark and header dark fixed to use it. This way those header menus will have a dark background to match the header background itself.
* Added link and hover color to the Site Title in theme.json (core/site-title) now that it doesn't default from the overall theme link and hover colors.
* Added button hover color to theme.json and removed the css from flat-blocks.css.
* Add Bullet style to latest posts and latest comments blocks since default is now plain (no bullets).
* Remove extra padding on sub-menus that have colored backgrounds.
* Remove custom border thin, normal, thick, and style and replace with hard-coded values. custom-border-color and custom-border-radius are still in place and used in the theme CSS
* Fix rounded image styles when global image style has a border radius.
* Add border to rounded profile pic (avatar) on testimonials pattern.
* Fix for center align on images now that WordPress uses the figure tag.
* Set Outline button padding to match regular buttons factoring in the outline button border width.
* Style the file download and search buttons to match other buttons
* Better support for users turning on link underlining. Added several blocks to theme.json to not display link underlines, such as Lists, Latest Posts, Latest Comments, etc. because it was just TOO much underlining.
* Added more image duotones. Turned off default WordPress duotones as the colors clash.
* Added more gradient colors.
* Add new custom variable to theme.json to control button drop-shadow (--wp--custom--button--shadow).
* Add new custom variable to theme.json for focus outline color (--wp--custom--outline--color).
* Set border radius on input fields, including text areas.
* Set outline (focus) to gray drop-shadow instead of the browser defaults.
* Inherit text color on colored backgrounds for when user defaults headings to a color.
* Added new global theme style for button drop-shadow and link underlines.
* Changed default theme style tertiary color to orange.
* Added light purple to the color palette and changed the purple theme style to use that one.
* Updated the global theme styles to have duotones that match each style's color scheme.

= 1.1 =
April 14, 2023

Updates for WordPress v6.1:
* Preset spacing sliders for padding and margins. These are based on the site gap (18px by default but can be overriden in the Global Styles Editor).
* Implemented the new more flexible WordPress comment blocks

= 1.0 =
March 10, 2023

Initial theme version

== Copyright ==

Flat Blocks WordPress Theme, (C) 2023 Tim Nicholson / XtremelySocial
Flat Blocks is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

This theme bundles the following third-party resources:

=== Images ===
All images from https://pexels.com licensed under the GPL, including modifications made for Flat Blocks to adjust image sizes.

=== Fonts === 
Lato
Copyright (c) 2010-2011 by tyPoland Lukasz Dziedzic with Reserved Font Name "Lato". Licensed under the SIL Open Font License, Version 1.1. 
Source: http://www.typoland.com/
License: Copyright (c) 2011-2011 by tyPoland Lukasz Dziedzic (http://www.typoland.com/) with Reserved Font Name "Lato". Licensed under the SIL Open Font License, Version 1.1 (http://scripts.sil.org/OFL). 

Raleway
Copyright 2010 The Raleway Project Authors (impallari@gmail.com), with Reserved Font Name "Raleway".
Source: http://theleagueofmoveabletype.com
License: This Font Software is licensed under the SIL Open Font License, Version 1.1. This license is available with a FAQ at: http://scripts.sil.org/OFL

Roboto
Copyright 2011 Google Inc. All Rights Reserved.
Source: Google.com
License: Licensed under the Apache License, Version 2.0

Lora
Copyright 2011 The Lora Project Authors (https://github.com/cyrealtype/Lora-Cyrillic), with Reserved Font Name "Lora".
Source: http://cyreal.org
License: This Font Software is licensed under the SIL Open Font License, Version 1.1. This license is available with a FAQ at: http://scripts.sil.org/OFL

Source Sans Pro
© 2010 - 2018 Adobe Systems Incorporated (http://www.adobe.com/), with Reserved Font Name ‘Source’.
Source: http://www.adobe.com/type
License: This Font Software is licensed under the SIL Open Font License, Version 1.1. This license is available with a FAQ at: http://scripts.sil.org/OFL. This Font Software is distributed on an ‘AS IS’ BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the SIL Open Font License for the specific language, permissions and limitations governing your use of this Font Software.

Playfair Display
Copyright 2017 The Playfair Display Project Authors (https://github.com/clauseggers/Playfair-Display), with Reserved Font Name "Playfair Display".
Source: http://www.forthehearts.net
License: This Font Software is licensed under the SIL Open Font License, Version 1.1. This license is available with a FAQ at: http://scripts.sil.org/OFL

Source Serif 4 Variable
© 2014 - 2021 Adobe Systems Incorporated (http://www.adobe.com/), with Reserved Font Name ‘Source’.
Source: http://www.adobe.com/type
License: This Font Software is licensed under the SIL Open Font License, Version 1.1. This license is available with a FAQ at: http://scripts.sil.org/OFL. This Font Software is distributed on an ‘AS IS’ BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the SIL Open Font License for the specific language, permissions and limitations governing your use of this Font Software.

Nunito
Copyright 2014 The Nunito Project Authors (https://github.com/googlefonts/nunito)
Source: http://www.sansoxygen.com
License: This Font Software is licensed under the SIL Open Font License, Version 1.1. This license is available with a FAQ at: https://scripts.sil.org/OFL

Style Script
Copyright 2013 The Style Script Project Authors (https://github.com/googlefonts/style-script)
Source: http://www.typesetit.com
License: This Font Software is licensed under the SIL Open Font License, Version 1.1. This license is available with a FAQ at: https://scripts.sil.org/OFL

Roboto Mono
Copyright 2015 The Roboto Mono Project Authors (https://github.com/googlefonts/robotomono)
Source: Google.com
License: Licensed under the Apache License, Version 2.0
