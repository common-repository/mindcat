<?php
/*
* MindCat
*
* @package     MindCat
* @subpackage  MindCat/Views
* @version     2.1.1
* @since       1.0.0
*/

namespace Mindcat;

function subcat($cat, $level, $args = array())
{
    $terms = get_terms('category', array(
        'parent' => $cat,
        'hirearchical' => false,
        'hide_empty' => $args['hide_empty'],
    ));
    $ret = '';
    $MindCatColors = get_option('MindCatColors', array());
    if (!is_array($MindCatColors)) $MindCatColors = array();

    if (sizeof($terms) > 0) {
        $ret .= '<ul>';
        foreach ($terms as $term) {
            $link = get_term_link($term, 'category');
            $bgcolor = isset($MindCatColors[$term->term_id]['bg']) ? $MindCatColors[$term->term_id]['bg'] : '#CCCCCC';
            $color = isset($MindCatColors[$term->term_id]['txt']) ? $MindCatColors[$term->term_id]['txt'] : '#333333';
            $ret .= '<li data-id="' . esc_attr($term->term_id) . '" class="mindcat_child"><a href="' . esc_attr($link) . '" style="background:' . esc_attr($bgcolor) . ';color:' . esc_attr($color) . ';">' . $term->name;
            if (1 == $args['count']) {
                $ret .= '<span class="mindcat_count">' . $term->count . '</span>';
            }
            $ret .= '</a>';
            if ($args['max_level'] > 0 && $args['max_level'] > $level) {
                $ret .= subcat($term->term_id, $level + 1, $args);
            }
            $ret .= '</li>';
        }
        $ret .= '</ul>';
    }
    return $ret;
}

function mindmap($args = '')
{
    extract(
        shortcode_atts(
            array(
                'cat' => '',
                'size' => 50,
                'title' => '',
                'hide_empty' => 0,
                'count' => 0,
                'max_level' => 0
            ),
            $args
        )
    );
    $root = get_option('blogname');
    $link = get_option('siteurl');


    $bgcolor = '#CCCCCC';
    $color = '#33333';
    $posts_count = 0;

    if ($cat == '') {
        $cat = 0;
    }
    if (is_string($cat) || $cat != '0') {

        if (is_numeric($cat)) {
            $term = get_term($cat, 'category');
        } else {
            $term = get_term_by('slug', $cat, 'category');
        }
        $cat = 0;
        if (!is_wp_error($term)) {
            $root = $term->name;
            $link = get_term_link($term, 'category');
            $cat = $term->term_id;
            $posts_count = $term->count;
            $MindCatColors = get_option('MindCatColors', array());
            if (!is_array($MindCatColors)) $MindCatColors = array();
            $bgcolor = isset($MindCatColors[$term->term_id]['bg']) ? $MindCatColors[$term->term_id]['bg'] : '#CCCCCC';
            $color = isset($MindCatColors[$term->term_id]['txt']) ? $MindCatColors[$term->term_id]['txt'] : '#333333';
        }
        if (is_wp_error($link)) {
            $link = get_option('siteurl');
        
        }
    }
    if (!empty($title)) {
        $root = $title;
    }

    if (false == $hide_empty || $count > 0) {
        $ret = '<div class="mindcat" data-size="' . esc_attr($size) . '"><ul><li class="mindcat_root">';
        $ret .= '<a href="' . esc_attr($link) . '" style="background:' . esc_attr($bgcolor) . ';color:' . esc_attr($color) . ';">' . $root;
        if ($cat != 0 && 1 == $count) {
            $ret .= '<span class="mindcat_count">' . $posts_count . '</span>';
        }
        $ret .= '</a>';
        $ret .= subcat($cat, 1, $args);
        $ret .= '</li></ul></div>';
    }
    return $ret;
}