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
	<div class="topic-title two-third">
		<?php printf('<span class="week-num">%s</span>', esc_html__('Week ', WPSP_TEXT_DOMAIN) . get_the_date('W') ); 
			if ( ! empty( $sound_url ) ) {
				the_title( sprintf( '<h3 class="topic-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h3>' );
				printf('<span class="topic-date">%s</span>', esc_html__( 'on ', WPSP_TEXT_DOMAIN ) . esc_html( get_the_date('d M, Y') ) );
			} else {
				the_title( sprintf( '<h3 class="topic-title" itemprop="name">', esc_attr( get_the_title() ) ), '</h3>' );	
				printf('<span class="topic-date">%s</span>', esc_html__( 'will broadcast on ', WPSP_TEXT_DOMAIN ) . esc_html( get_the_date('d M, Y') ) ); 
			} ?>
			
	</div>
	<?php if ( ! empty( $speaker_name ) ) { ?>
	<div class="guest-speaker one-fourth last">
		<?php printf('<span class="speaker-title-m">%s</span>', __('Guest Speaker', WPSP_TEXT_DOMAIN) ); 
			printf('<span class="speaker-name">%s</span>', $speaker_name );
			printf('<span class="speaker-position">%s</span>', $speaker_position );
			printf('<span class="speaker-work-place">%s</span>', $speaker_work_place );?>
	</div>
	<?php } ?>
</article><!-- #post-## -->