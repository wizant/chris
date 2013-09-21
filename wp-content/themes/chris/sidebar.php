<!--sidebar-->
<aside id="sidebar" role="complementary">
	<!-- widgets -->
	<ul id="widgets">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?>
		<!--/-->
		<?php endif; ?>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2') ) : ?>
		<!--/-->
		<?php endif; ?>
	</ul>
	<!-- /widgets -->
</aside>
<!--/sidebar-->