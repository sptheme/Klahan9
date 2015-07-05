<?php
/**
 * Listen to Broadcast Widget
 *
 * List latest audio post format by category
 * Learn more: http://codex.wordpress.org/Widgets_API
 *
 * @package     Klahan9
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WPSP_Listen_Broadcast_Widget' ) ) {
    class WPSP_Listen_Broadcast_Widget extends WP_Widget {
	
    /**
     * Register widget with WordPress.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $id = 'wpsp-listent-broadcast-widget';
        $name = WPSP_THEME_NAME . ' - '. __( 'Listen to Broadcast', 'wpsp' );
        $widget_ops = array(
                'classname'         => 'widget-listent-broadcast widget-post-category',
                'description'   => __( 'Present latest of Listen to Broadcast', 'wpsp' )
            );
        $control_ops = array();
        parent::__construct( $id, $name, $widget_ops, $control_ops );
    }

	/**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     * @since 1.0.0
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    function widget( $args, $instance )
    {
        // Extract args
        extract( $args, EXTR_SKIP );

        $category_id        = empty($instance['category_id']) ? 1 : $instance['category_id'];
        $post_num           = empty($instance['post_num']) ? 5 : $instance['post_num'];
        $use_cat_title      = empty($instance['use_cat_title']) ? 0 : $instance['use_cat_title'];
        $title_link         = empty($instance['title_link']) ? 0 : $instance['title_link'];

        if ($use_cat_title) {
            $title = apply_filters('widget_title', get_cat_name($category_id), $instance, $this->id_base);
        } else {
            $title = apply_filters('widget_title', empty($instance['title'] ) ? __('Listen to Broadcast', 'wpsp') : $instance['title'], $instance, $this->id_base);
        }


        echo $before_widget;

            if ($title_link) {
                echo $before_title.'<a href="'.get_category_link($category_id).'">'.$title.'</a>'.$after_title;
            } else {
                echo $before_title.$title.$after_title;
            }

            global $post;
        
            if ( is_singular() ) {
                $args = array( 'post__not_in' => array($post->ID) );   
            } else {
                $args = array( 'post__not_in' => get_option( 'sticky_posts' ) );
            }

            $defaults = array(
                'post_type' => 'post',
                'posts_per_page' => (int) $post_num,
                'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'post_format',
                            'field'    => 'slug',
                            'terms'    => array( 'post-format-audio' ),
                        ),
                        array(
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'    => array( $category_id ),
                        )
                    )    
            );
            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $custom_query = new WP_Query( $args );
            
            if( $custom_query->have_posts() ) {
                while ( $custom_query->have_posts() ) : $custom_query->the_post();
                    get_template_part( 'partials/post-thumb-radio' );
                endwhile; wp_reset_postdata();
            }

        echo $after_widget;
        
        return $instance;
    }                     

    /**
     * Sanitize widget form values as they are saved.
     *
     * @since 1.0.0
     *
     * @see WP_Widget::form()
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['category_id'] = (int) $new_instance['category_id'];
        $instance['post_num'] = (int) $new_instance['post_num'];
        $instance['use_cat_title'] = (int) $new_instance['use_cat_title'];
        $instance['title_link'] = (int) $new_instance['title_link'];

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     * @since 1.0.0
     *
     * @param array $instance Previously saved values from database.
     */
    function form( $instance ) {

        // Parse arguments
        $instance = wp_parse_args((array) $instance, array(
            'title' => __('Listent to Broadcast', 'wpsp'), 
            'category_id' => 1, 
            'post_num' => 5, 
            'use_cat_title' => 0, 
            'title_link' => 0
        ) ); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wpsp'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']) ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Parent category:', 'wpsp'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('category_id'); ?>" name="<?php echo $this->get_field_name('category_id'); ?>">
                <?php
                    $categories = get_categories(array('hide_empty' => 0));
                    foreach ($categories as $cat) {
                        $selected = $cat->cat_ID == $instance['category_id'] ? ' selected="selected"' : '';
                        echo '<option'.$selected.' value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
                    }
                ?>
            </select>
        </p>
        </p>
            <input id="<?php echo $this->get_field_id('use_cat_title'); ?>" name="<?php echo $this->get_field_name('use_cat_title'); ?>" type="checkbox" value="1" <?php if ($instance['use_cat_title']) echo 'checked="checked"'; ?>/>
            <label for="<?php echo $this->get_field_id('use_cat_title'); ?>"><?php _e('Title is parent category', 'wpsp'); ?></label>
            <br>
            <input id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" type="checkbox" value="1" <?php if ($instance['title_link']) echo 'checked="checked"'; ?>/>
            <label for="<?php echo $this->get_field_id('title_link'); ?>"><?php _e('Add parent link to title', 'wpsp'); ?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_num'); ?>"><?php _e('Post number:', 'wpsp'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_num'); ?>" name="<?php echo $this->get_field_name('post_num'); ?>" type="text" value="<?php echo esc_attr($instance['post_num']) ?>" />
        </p>
        
    <?php }
    }
}

// Register widget with widgets init hook
if ( ! function_exists( 'register_wpsp_listen_broadcast_widget' ) ) {
    function register_wpsp_listen_broadcast_widget() {
        register_widget( 'WPSP_Listen_Broadcast_Widget' );
    }
}
add_action( 'widgets_init', 'register_wpsp_listen_broadcast_widget' );