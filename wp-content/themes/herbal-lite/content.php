<?php
/**
 * @package Herbal Lite
 */
?>
<div class="blog_lists">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if (has_post_thumbnail() ){ ?>
    <div class="post-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
    <?php }?>

    <header class="entry-header">           
        <h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="postmeta">
                <div class="post-date"><?php the_date(); ?></div><!-- post-date -->
                <div class="post-comment"> &nbsp;|&nbsp; <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>
                <div class="post-categories"> &nbsp;|&nbsp; <?php the_category( __( ', ', 'herbal-lite' )); ?></div>                  
            </div><!-- postmeta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if (!is_single() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
        <?php the_content( esc_html__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'herbal-lite' ) ); ?>  
        <?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'herbal-lite' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'herbal-lite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>        
    </div><!-- .entry-content -->
    <?php endif; ?>
    <div class="clear"></div>
</article><!-- #post-## -->
</div><!-- blog-post-repeat -->