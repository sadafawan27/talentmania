<?php
//about theme info
add_action( 'admin_menu', 'herbal_lite_abouttheme' );
function herbal_lite_abouttheme() {    	
	add_theme_page( esc_html__('Theme Info', 'herbal-lite'), esc_html__('Theme Info', 'herbal-lite'), 'edit_theme_options', 'herbal_lite_guide', 'herbal_lite_mostrar_guide');   
} 

//guidline for about theme
function herbal_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 99%; text-align:center;}
}
</style>
<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:10px; border-bottom:1px solid #ccc; margin-bottom:15px; margin-top:10px;">
			  <?php esc_html_e('Theme Info', 'herbal-lite'); ?>
		   </div>
           <div style="text-align:center; font-weight:bold;">
				<a href="<?php echo esc_url(HERBAL_LITE_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'herbal-lite'); ?></a> | 
				<a href="<?php echo esc_url(HERBAL_LITE_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'herbal-lite'); ?></a> | 
				<a href="<?php echo esc_url(HERBAL_LITE_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'herbal-lite'); ?></a>
                <div style="height:5px"></div>
			</div>
          <p><?php esc_html_e('Herbal Lite is a herbal products and store WordPress theme which can be used for herbal medicines, pharmacy, naturopathy, natural and organic medicinal herbs, herbal tea, organic products and food, agricultural products, agri based foods, food packaging industry, yoga, spa, nature conservation, environmental naturo eco social group websites and other types of nature related websites. Is multipurpose and compatible with page builders like Divi, Visual Composer, Elementor, Live composer and beaver builder etc. It is also multilingual compatible and translation ready.','herbal-lite'); ?></p>
		  <a href="<?php echo esc_url(HERBAL_LITE_FREE_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.jpg" alt="" /></a>
	</div><!-- .col-left -->
	<!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>