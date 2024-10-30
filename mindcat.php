<?php
/*
 * Plugin Name: MindCat
 * Plugin URI: https://apps.avecnous.eu/produit/cat-heuristique/?mtm_campaign=wp-plugin&mtm_kwd=mindcat&mtm_medium=wp-repo&mtm_source=dashboard
 * Version: 2.1.1
 * Description: Displays categories and subcategories as a mindmap
 * Author: N.O.U.S. Open Useful and Simple
 * Author URI: https://apps.avecnous.eu/produit/cat-heuristique/?mtm_campaign=wp-plugin&mtm_kwd=mindcat&mtm_medium=wp-repo&mtm_source=author
 * License: GPLv2
 * Text Domain: mindcat
 * Domain Path: /languages/
 * Tags: category, categories, mindmap, widget
 * 
 * @Package MindCat
 */

require_once(plugin_dir_path(__FILE__) . '/inc/class-mindcat.php');
$MindCat = new MindCat();
