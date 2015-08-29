<?php
/**
 * The template used for displaying related post content
 *
 * Option: diplay as thumbnail or icon post
 * 
 * @package Klahan9
 */

?>
<?php
	$sound_url = get_post_meta( get_the_ID(), 'sp_sound_url', true );
	$speaker_name = esc_html( get_post_meta( get_the_ID(), 'sp_speaker_name', true ) );
	$speaker_position = esc_html( get_post_meta( get_the_ID(), 'sp_speaker_position', true ) );
	$speaker_work_place = esc_html( get_post_meta( get_the_ID(), 'sp_speaker_work_place', true ) );
?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<div class="post-thumbnail one-fourth">
	<?php	
		if (has_post_thumbnail()) {
		    printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a>', 
					esc_url( get_permalink() ), 
					esc_attr( get_the_title() ), 
					get_the_post_thumbnail( $post->ID, 'small-thumb' )  
				);
		} else { 
			printf( '<a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">%3$s</a>', 
					esc_url( get_permalink() ), 
					esc_attr( get_the_title() ), 
					'<img src="' . esc_url( ot_get_option( 'post-placeholder' ) ) . '">'  
				);
		} 
	?>			
	</div>
	<div class="topic-title two-fourth">
		<?php printf('<span class="week-num">%s</span>', esc_html__('Week ', 'klahan9') . get_the_date('W') ); 
			if ( ! empty( $sound_url ) ) {
				the_title( sprintf( '<h3 class="topic-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h3>' );
				printf('<span class="topic-date">%s</span>', esc_html__( 'on ', 'klahan9' ) . esc_html( get_the_date('d F, Y') ) );
			} else {
				the_title( sprintf( '<h3 class="topic-title" itemprop="name">', esc_attr( get_the_title() ) ), '</h3>' );	
				printf('<span class="topic-date">%s</span>', esc_html__( 'will broadcast on ', 'klahan9' ) . esc_html( get_the_date('d F, Y') ) ); 
			} ?>
			
	</div>
	<?php if ( ! empty( $speaker_name ) ) { ?>
	<div class="guest-speaker one-fourth last">
		<?php printf('<span class="speaker-title-m">%s</span>', __('Guest Speaker', 'klahan9') ); 
			printf('<span class="speaker-name">%s</span>', $speaker_name );
			printf('<span class="speaker-position">%s</span>', $speaker_position );
			printf('<span class="speaker-work-place">%s</span>', $speaker_work_place );?>
	</div>
	<?php } ?>
</article><!-- #post-## -->