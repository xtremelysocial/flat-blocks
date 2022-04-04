# About Flat Blocks

The purpose of Flat Blocks is to provide a "ponyfill" that allows for 100% "configuration expression" of design.  Any aspect of configurable design that Gutenberg does not yet take into account is expressed in theme.json 'custom' properties.

The goal is for the ponyfill styling to reflect what Gutenberg will style, from a given configuration, once that work is complete.

Follow Flat Blocks development over at [https://blockbasetheme.com/blog/](https://blockbasetheme.com/blog/)

## Building

Flat Blocks uses SCSS to compile the CSS used to ponyfill Gutenberg.  Building Flat Blocks isn't necessary to use it - either as a theme or as a parent theme - but making changes does require the .scss file to be recompiled.
The easiest way to do so is to use `node` to install and run the necessary dependencies via `npm install`. 
Then after making changes to the *.scss files run `npm run build` to compile.
You can use `npm start` and it will be in 'watch mode' recompiling the .scss files any time any changes are made.

## Creating a Flat Blocks child theme the easy way

Use the [Create Flat Blocks Theme](https://github.com/Automattic/create-blockbase-theme) plugin.

Install Flat Blocks (or any Flat Blocks child)
Use the Customizer and/or Full Site Editor to tweak the design to your liking.
Install the Create Flat Blocks Theme plugin 
Use it to export a new child theme of Flat Blocks.

## Creating a Flat Blocks child theme manually

Flat Blocks is a [parent theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/#what-is-a-parent-theme). The best way to use it is to create a child theme with Flat Blocks as a parent.

To begin you will need a copy of Flat Blocks, which you can get by cloning this repo.

Next you need to create a child theme. A Flat Blocks child theme needs to contain the following files:
- `style.css`
- `theme.json`
- Block templates and block template parts

These files should be in a new directory at the same level as Flat Blocks, using the child theme's name.

The `style.css` file contains the name of the theme and other details. To make Flat Blocks the parent theme it is important to set the "Template" property to `blockbase`.

```
/*
Theme Name: {newtheme}
Theme URI:
Author:
Author URI:
Description:
Requires at least: 5.7
Tested up to: 5.8
Requires PHP: 5.7
Version: 0.0.1
License: GNU General Public License v2 or later
License URI:
Template: blockbase
Text Domain: {newtheme}
Tags:
*/
```

Block Templates and Block template parts are used to display the content on your site. You can simply copy these directories from the Flat Blocks theme to get started. You can modify them in the Template Editor and then use the code view to copy the updated template back into your theme.

The `theme.json` file defines the look and feel of your theme; colors, fonts, spacing, etc are all set in this file. Flat Blocks also defines many custom properties in theme.json which are used to plug the gaps in block themes. Override any values (including the custom values) found in Flat Blocks's theme.json in the child theme's theme.json.

- It is only necessary to define those properties you wish to change, which keeps your code [DRY](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself).
- As more features are added to block themes, Flat Blocks will be updated to support them. By using the Flat Blocks as a parent, the child theme will inherit all these changes.

Simple themes will be able to define everything they need using only a `theme.json` file, but for more complex themes, an additional CSS file can be useful. Flat Blocks uses node to compile SCSS files.  You may want your child theme to take advantage of the same utilities, but child themes do not need to be built with any build tools.

## `functions.php` and `theme.css`

Flat Blocks will load a theme.css file for each of its children. This file lives at childtheme/assets/theme.css. You may wish to add a functions.php file to add block styles or patterns to your theme, but it's not necessary.

Together these files should give you a strong foundation for a Flat Blocks child theme.

## Keeping up to date

Flat Blocks child themes are in a strong position to keep in step with Full Site Editing changes, while being usable in production now. However they do come with a maintenance burden. As Full Site Editing matures, Flat Blocks will continue to change with it; Flat Blocks child themes will need to be kept up to date with these developments so that they can take advantage of the new features.
