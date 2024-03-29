<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Herbal Lite
 */
get_header(); ?>
<?php
$hideslide = get_theme_mod('hide_slides', 1);
?>
<?php if (!is_home() && is_front_page()) { ?>
<?php if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php 
$pages = array();
for($sld=10; $sld<13; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }	
} 
if( !empty($pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 10;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $herbal_lite_slideno[] = $i;
          $herbal_lite_slidetitle[] = get_the_title();
		  $herbal_lite_slidedesc[] = get_the_excerpt();
          $herbal_lite_slidelink[] = get_permalink();
          ?>
          <?php if ( has_post_thumbnail() ) { ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php 
      	  }else{ 
		  ?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no_slide.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
		  <?php } ?>
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $herbal_lite_slideno as $herbal_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $herbal_lite_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo $herbal_lite_slidetitle[$k]; ?></h2>
        <p><?php echo $herbal_lite_slidedesc[$k]; ?></p>
        <div class="clear"></div>
        <?php $slide_button = get_theme_mod('slide_button'); ?>              
        <?php if (!empty($slide_button)){  ?>
		 <a class="slide_more" href="<?php echo esc_url($herbal_lite_slidelink[$k] ); ?>">
         		<?php echo esc_html($slide_button);?>
         </a>
        <?php } ?>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } ?>
<?php wp_reset_postdata(); ?>
<div class="clear"></div>
<?php if (!is_home() && is_front_page()) { ?>
<?php $hidepagecontentboxes = get_theme_mod('hide_pagecontentboxes', 1); ?>
<?php if( $hidepagecontentboxes == '') { ?>
<section id="pagearea">
  <div class="container">   
      <?php for($p=1; $p<2; $p++) { ?>
      <?php if( get_theme_mod('page-column'.$p,false)) { ?>
      <?php $querypagecontentboxes = new WP_query('page_id='.get_theme_mod('page-column'.$p,true)); ?>
      <?php while( $querypagecontentboxes->have_posts() ) : $querypagecontentboxes->the_post(); ?>
      <div class="center-title">
			<i class="fa fa-leaf" aria-hidden="true"></i> 
			<h2><?php the_title(); ?></h2> 
			<span></span> 
		</div>
        <div class="space20"></div>
        <div class="sec1pgcontent"><?php the_content(); ?></div> 
      <?php endwhile;
       wp_reset_postdata(); ?>
      <?php }} ?>
      <div class="clear"></div> 
	  <?php $hidepagefourboxes = get_theme_mod('hide_pagefourboxes', 1); ?>
      <?php if( $hidepagefourboxes == '') { ?>
      <div class="benefitboxarea">
		<?php for($q=5; $q<9; $q++) { ?>
        <?php if( get_theme_mod('sec2-page-column'.$q,false)) { ?>
        <?php $querypagefourboxes = new WP_query('page_id='.get_theme_mod('sec2-page-column'.$q,true)); ?>
        <?php while( $querypagefourboxes->have_posts() ) : $querypagefourboxes->the_post(); ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>">
         <div class="benefitbox-4">
            <?php if( has_post_thumbnail() ) { ?>
            <div class="benefit-thumb"><?php the_post_thumbnail();?></div> 
            <?php } ?>
            <div class="benefitbox-title"><?php the_title(); ?></div> 
         </div>
        </a>
        <?php endwhile;
        wp_reset_postdata(); ?>
        <?php }} ?>                    
		</div>
<?php } ?>      
  </div><!-- container -->
</section><!-- #pagearea -->
<div class="clear"></div>
<?php } } ?>
<?php wp_reset_postdata(); ?>
<div class="container">
     <div class="page_content">
  
      <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'herbal-lite' ),
							'next_text' => esc_html__( 'Next', 'herbal-lite' ),
						) );
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
	<section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
                             <header class="entry-header">           
            				<h1><?php the_title(); ?></h1>
                    		</header>
                            <?php the_content(); ?>
                            <?php 
							wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'herbal-lite' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'herbal-lite' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							?>
                            <div class="clear"></div>
                            <?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
							comments_template();
							endif;
					
                        	endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'herbal-lite' ),
							'next_text' => esc_html__( 'Next', 'herbal-lite' ),
						) );
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
	<?php
}
	?>
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>