<?php
/**
 * Widget Class for Feature Video Post Widget
 *
 * Featured post video format by category
 * Learn more: http://codex.wordpress.org/Widgets_API
 *
 * @package     Klahan9
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WPSP_FVP_Widget' ) ) {
    class WPSP_FVP_Widget extends WP_Widget {
	
    /**
     * Register widget with WordPress.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $id = 'wpsp-recent-tv-widget';
        $name = WPSP_THEME_NAME . ' - '. __( 'Feature Video Post', 'wpsp' );
        $widget_ops = array(
                'classname'         => 'widget-recent-tv widget-post-category',
                'description'   => __( 'Featured post video format by category', 'wpsp' )
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
        $use_cat_title      = empty($instance['use_cat_title']) ? 0 : $instance['use_cat_title'];
        $title_link         = empty($instance['title_link']) ? 0 : $instance['title_link'];

        if ($use_cat_title) {
            $title = apply_filters('widget_title', get_cat_name($category_id), $instance, $this->id_base);
        } else {
            $title = apply_filters('widget_title', empty($instance['title'] ) ? __('New Episode in TV Series', 'wpsp') : $instance['title'], $instance, $this->id_base);
        }


        echo $before_widget;

            if ($title_link) {
                echo $before_title.'<a href="'.get_category_link($category_id).'">'.$title.'</a>'.$after_title;
            } else {
                echo $before_title.$title.$after_title;
            }

            global $post;
            $args = array();

            $defaults = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'post__not_in' => array($post->ID),
                'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'post_format',
                            'field'    => 'slug',
                            'terms'    => array( 'post-format-video' ),
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
                    get_template_part( 'partials/post-featured-tv' );
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
            'title' => __('New Episode in TV Series', 'wpsp'), 
            'category_id' => 1, 
            'use_cat_title' => 0, 
            'title_link' => 0
        ) ); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wpsp'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']) ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Parent category:', 'wpsp'); ?></label>
            <?php $args = array(
                'orderby'            => 'ID', 
                'order'              => 'ASC',
                'show_count'         => 1,
                'hide_empty'         => 0,
                'hide_if_empty'      => false,
                'echo'               => 1,
                'selected'           => $instance['category_id'],
                'hierarchical'       => 1, 
                'name'               => $this->get_field_name( 'category_id' ),
                'id'                 => $this->get_field_id( 'category_id' ),
                'class'              => 'widefat',
                'taxonomy'           => 'category',
              );

              wp_dropdown_categories( $args ); ?>
        </p>
        </p>
            <input id="<?php echo $this->get_field_id('use_cat_title'); ?>" name="<?php echo $this->get_field_name('use_cat_title'); ?>" type="checkbox" value="1" <?php if ($instance['use_cat_title']) echo 'checked="checked"'; ?>/>
            <label for="<?php echo $this->get_field_id('use_cat_title'); ?>"><?php _e('Title is parent category', 'wpsp'); ?></label>
            <br>
            <input id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" type="checkbox" value="1" <?php if ($instance['title_link']) echo 'checked="checked"'; ?>/>
            <label for="<?php echo $this->get_field_id('title_link'); ?>"><?php _e('Add parent link to title', 'wpsp'); ?></label>
        </p>
        
    <?php }
    }
}

// Register widget with widgets init hook
if ( ! function_exists( 'register_wpsp_fvp_widget' ) ) {
    function register_wpsp_fvp_widget() {
        register_widget( 'WPSP_FVP_Widget' );
    }
}
add_action( 'widgets_init', 'register_wpsp_fvp_widget' );