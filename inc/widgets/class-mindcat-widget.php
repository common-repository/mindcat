<?php
/*
* @Package: MindCat
*/

class MindCat_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(false, __('MindCat', 'mindcat'), array('description' => __('Displays categories and subcategories as a mindmap', 'mindcat')));
    }
    // PHP4
    public function MindCat_Widget()
    {
        $this->__construct();
    }
    function widget($args, $instance)
    {
        extract($args);
        $title = isset($instance['title']) ? $instance['title'] : '';
        $size = isset($instance['size']) ? $instance['size'] : 50;
        $cat = isset($instance['cat']) ? $instance['title'] : 0;

        wp_enqueue_script('mindcat', plugins_url('/mindcat.min.js', __FILE__), array('jquery'), false, true);
        
        global $MindCat;
        $MindCat->require_once('views/mindmap.php');

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
        }
        echo \Mindcat\mindmap($instance);
        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $size = isset($instance['size']) ? $instance['size'] : 50;
        $cat = isset($instance['cat']) ? $instance['cat'] : 0;
        $count = isset($instance['count']) ? $instance['count'] : 0;
        $hide_empty = isset($instance['hide_empty']) ? $instance['hide_empty'] : 0;
        $max_level = isset($instance['max_level']) ? $instance['max_level'] : 0;

?>
        <input type="hidden" id="<?php echo $this->get_field_id('title'); ?>-title" value="<?php echo $title; ?>">
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'mindcat'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>

        <p style="margin-top:10px;">
            <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Size', 'mindcat'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" type="range" min="20" max="90" value="<?php echo $size; ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Root', 'mindcat'); ?>
                <select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>">
                    <option value='0'><?php _e('Site root', 'mindcat') ?></option>
                    <?php
                    $cats = get_terms('category', array(
                        'hirearchical' => false,
                        'hide_empty' => false,
                    ));
                    foreach ($cats as $cate) { ?>
                        <option value="<?= $cate->term_id ?>" <?php if ($cate->term_id == $cat) {
                                                                echo 'selected';
                                                            } ?>><?= $cate->name ?></option>
                    <?php  }  ?>
                </select>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show posts count', 'mindcat'); ?>
                <select id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
                    <option value="0" <?php if (0 == $count) {
                                            echo 'selected';
                                        } ?>><?php _e('No', 'mindcat'); ?></option>
                    <option value="1" <?php if (1 == $count) {
                                            echo 'selected';
                                        } ?>><?php _e('Yes', 'mindcat'); ?></option>
                </select>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_empty'); ?>"><?php _e('Hide empties', 'mindcat'); ?>
                <select id="<?php echo $this->get_field_id('hide_empty'); ?>" name="<?php echo $this->get_field_name('hide_empty'); ?>">
                    <option value="0" <?php if (0 == $hide_empty) {
                                            echo 'selected';
                                        } ?>><?php _e('No', 'mindcat'); ?></option>
                    <option value="1" <?php if (1 == $hide_empty) {
                                            echo 'selected';
                                        } ?>><?php _e('Yes', 'mindcat'); ?></option>
                </select>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('max_level'); ?>"><?php _e('Max level', 'mindcat'); ?>
                <select id="<?php echo $this->get_field_id('max_level'); ?>" name="<?php echo $this->get_field_name('max_level'); ?>">
                    <option value="0" <?php if (0 == $max_level) {
                                            echo 'selected';
                                        } ?>><?php _e('None', 'mindcat'); ?></option>
                    <?php for ($l = 1; $l < 10; $l++) : ?>
                        <option value="<?php echo $l; ?>" <?php if ($l == $max_level) {
                                                                echo 'selected';
                                                            } ?>><?php echo $l; ?></option>
                    <?php endfor; ?>
                </select>
            </label>
        </p>

<?php
    }
}
