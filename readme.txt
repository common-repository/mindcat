# MindCat
Contributors: bastho, agencenous, aureliefoucher   
Donate link: https://apps.avecnous.eu/produit/cat-heuristique/?mtm_campaign=wp-plugin&mtm_kwd=mindcat&mtm_medium=wp-repo&mtm_source=donate  
Author URI:  https://apps.avecnous.eu/produit/cat-heuristique/?mtm_campaign=wp-plugin&mtm_kwd=mindcat&mtm_medium=wp-repo&mtm_source=author  
Tags: categories, category, mindmap, widget  
Requires at least: 5.9  
Tested up to: 6.4 
Stable tag: 2.1.1  
License: GPLv2  
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Enhanced category display as mindmap or list of cards with colors and images.

## Description

A panel of tools for taxonomy display.

Displays categories and subcategories as a mindmap, list of cards or list of terms.

Morehover, categories & tags can can be enrechied with colors and images.


## Installation

1. Upload `mindcat` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress admin
3. Start to use blocks or `[mindcat]` shortcode

Shortcode usage :

`[mindcat cat='' size=50 title='' hide_empty=0 count=0 max_level=0]`

- **cat**: category id or slug
- **size**: range used to display distance between items
- **title**: for the root node
- **hide_empty**: show or hide empty categories
- **count**: show or hide posts count 
- **max_level**: limits or not toe a defined level of sub-categories

## Frequently asked questions

### Can I select a primary category as mindmap root ?
Yes, you can choose any category, all sub-categories will be children of your mindmap
## Changelog

### 2.1.1

- Add square display mode (currently only functional for mindcat images)

### 2.1.0

Improvements:

- Add setting for the default mindcat image
- Add medium & large media size support in List block
- Add "none" display mode in List block

Fixes:

- Fix missing default image
- Fix image distortion for brand

### 2.0.0

- Add block support for mindmap
- Add new block: Mindcat List of terms
- Add possibility to select primary and secondary images on terms, with possibility to use a custom meta
- Security: escape all output
- Fix: PHP 8.0 compatibility
- Fix some warnings and notices

### 1.1.3

* use minified CSS/JS
* only load JS if needed

### 1.1.2

* more WP 4.3 compliant

### 1.1.1

release date: aug. 14 2015

* WP 4.3 compliant
* Code cleanup

### 1.1.0

* add: shortcode [mindcat]
* add: Parameters count, hide_empty, max_level
* fix: Optimize code

### 1.0.0

* Initial release

## Upgrade notice

No particular informations