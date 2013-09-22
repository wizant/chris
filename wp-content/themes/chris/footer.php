                </div>
            </div>
			<!--/content-->
            </div>
			
			<!--footer-->
			<footer id="footer">
                <div id="sec-nav">
                    <div class="content">
                        <!--social networks-->
                        <nav id="social">
                            <ul>
                                <li>
                                    <a href="" class="social-icon social-icon-facebook">Find us on Facebook</a>
                                </li>
                                <li>
                                    <a href="" class="social-icon social-icon-twitter">Find us on Twitter</a>
                                </li>
                                <li>
                                    <a href="" class="social-icon social-icon-google-plus">Find us on Google+</a>
                                </li>
                            </ul>
                        </nav>
                        <!--/social networks-->

                        <!-- navigation -->
                        <?php wp_nav_menu(
                            array(
                                'container' => 'nav',
                                'menu' => 'Navigation'
                            )
                        ); ?>
                        <!-- /navigation -->
                    </div>
                </div>
                <div id="copyright">
                    <div class="content">&copy; <?php echo date('Y'); ?> Company.me, Inc. All rights reserved.</div>
                </div>
			</footer>
			<!--/footer-->
		</div>
		<!--/container-->
		
		<?php wp_footer(); ?>
		
		<!--Scripts-->
		<!--[if lt IE 7 ]>
			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js" charset="utf-8"></script>
			<script type="text/javascript">window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
		<![endif]-->
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/scripts/css3-mediaqueries.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/scripts/jquery.placeholder.min.js" charset="utf-8"></script>
            <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/scripts/bootstrap.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/scripts/app.js" charset="utf-8"></script>
	</body>
</html>