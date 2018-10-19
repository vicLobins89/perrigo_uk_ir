<?php $options = get_option('rh_settings'); ?>

			<?php get_sidebar('footer'); ?>

			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="cf">
					
					<?php
					if($options['logo_alt']){
						echo '<a class="logo" href="'. home_url() .'"><img src="'. $options['logo_alt'] .'" alt="'. get_bloginfo('name') .'" /></a>';
					}
					?>

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
						'container_id' => 'teconsent',
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
						<script async="async" type="text/javascript" src=//consent.trustarc.com/notice?domain=perrigo.com&c=teconsent&js=bb&noticeType=bb&text=true&cookieLink=https%3A%2F%2Fwww.perrigo.com%2Fprivacy.aspx&privacypolicylink=https%3A%2F%2Fwww.perrigo.com%2Fprivacy.aspx></script>
					</nav>

					<!--<p class="source-org copyright">&copy; <?php// echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>-->

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/rarehoney.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site-->