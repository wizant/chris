<?php
//remove wordpress version
remove_action('wp_head', 'wp_generator');

//enamble post thumbnails
add_theme_support('post-thumbnails');

//add shortcode support to widgets
add_filter('widget_text', 'do_shortcode');

//register sidebars
if (function_exists('register_sidebar')) {
	$sidebars = array('Sidebar 1', 'Sidebar 2');

	foreach($sidebars as $sidebar){
		register_sidebar(array(
			'name' => $sidebar,
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

//add menu support
add_theme_support('menus');

//add support for custom background
add_theme_support( 'custom-background', array(
	'default-color' => 'fff',
));

//custom login
$header_image = get_header_image();

//custom login
function custom_login() {
	global $header_image;
	
	if ( $header_image ) {
		echo '<style type="text/css">
			.login h1 a {
				width: ' . get_custom_header()->width . 'px;
				height: ' . get_custom_header()->height . 'px;
				margin: 0 auto;
				background: url("' . esc_url( $header_image ) . '") top center no-repeat;
			}
		</style>';
	}
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/styles/login.css" />'; 
}
add_action('login_head', 'custom_login');

/**
 * Sets up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 */
function custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '000',
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => 250,
		'width'                  => 250,
		'max-width'              => 2000,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,
		
		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'custom_header_style',
		'admin-head-callback'    => 'custom_admin_header_style',
		'admin-preview-callback' => 'custom_admin_header_image'
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'custom_header_setup' );

/**
 * Styles the header text displayed on the blog.
 *
 * get_header_textcolor() options: 444 is default, hide text (returns 'blank'), or any hex value.
 */
function custom_header_style() {
	$text_color = get_header_textcolor();
	$background = set_url_scheme( get_background_image() );
	$color = get_theme_mod( 'background_color' );

	if ( $background && $color ) {
		$style = $color ? "background-color: #$color;" : '';

		if ( $background ) {
			$image = " background-image: url('$background');";
	
			$repeat = get_theme_mod( 'background_repeat', 'repeat' );
			if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
				$repeat = 'repeat';
			$repeat = " background-repeat: $repeat;";
	
			$position = get_theme_mod( 'background_position_x', 'left' );
			if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
				$position = 'left';
			$position = " background-position: top $position;";
	
			$attachment = get_theme_mod( 'background_attachment', 'scroll' );
			if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
				$attachment = 'scroll';
			$attachment = " background-attachment: $attachment;";
	
			$style .= $image . $repeat . $position . $attachment;
		}
	}
	?>
	<style type="text/css">
		body { <?php echo trim( $style ); ?> }
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) {
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text, use that.
		} else if ($text_color != get_theme_support( 'custom-header', 'default-text-color' )) {
	?>
		#site-title a,
		#site-description {
			color: #<?php echo $text_color; ?> !important;
		}
	<?php } ?>
	</style>
	<?php
}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 */
function custom_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#headimg h2 {
		line-height: 1.6;
		margin: 0;
		padding: 0;
	}
	#headimg h1 {
		font-size: 30px;
	}
	#headimg h1 a {
		color: #515151;
		text-decoration: none;
	}
	#headimg h1 a:hover {
		color: #21759b;
	}
	#headimg h2 {
		color: #757575;
		font: normal 13px/1.8 "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", sans-serif;
		margin-bottom: 24px;
	}
	#headimg img {
		max-width: <?php echo get_theme_support( 'custom-header', 'max-width' ); ?>px;
	}
	</style>
<?php
}

/**
 * Outputs markup to be displayed on the Appearance > Header admin panel.
 * This callback overrides the default markup displayed there.
 */
function custom_admin_header_image() {
	?>
	<div id="headimg">
		<?php
		if ( ! display_header_text() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
		<?php if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }

/* custom comments */
function custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) {
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) { ?>
				<p class="comment-awaiting-moderation">Your comment is awaiting moderation.</p>
			<?php } ?>

			<section class="comment-content">
				<?php comment_text(); ?>
			</section>

			<footer class="comment-actions">
				<?php edit_comment_link( __( 'Edit' ) ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</footer>
		</article>
	<?php
		break;
	}
}

//get category parents
function get_cat_parents($catId, &$output = array()) {
	if(!empty($catId)){
		if(!in_array($catId, $output)){
			$output[] = $catId;
		}
		  
		$category = get_category($catId);
		  
		if($category->category_parent){
			return get_cat_parents($category->category_parent, $output);
		}
	}
	return array_reverse($output);
}

//truncate text
function truncate($string, $limit, $break=" ", $pad="...") {
	// return with no change if string is shorter than $limit  
	if(strlen($string) <= $limit) return $string; 
	$string = substr($string, 0, $limit); 

	if(false !== ($breakpoint = strrpos($string, $break))) { 
		$string = substr($string, 0, $breakpoint); 
	} 
	return $string . $pad; 
}

//syntax highlighting
function highlight() {
	function highlight_css() {
		wp_enqueue_style('google-code-prettify', get_bloginfo('stylesheet_directory') . '/plugins/google-code-prettify/prettify.css', false, false, 'screen');
	}
	add_action('wp_print_styles', 'highlight_css');
	
	function highlight_js(){
		wp_enqueue_script('google-code-prettify', get_bloginfo('stylesheet_directory') . '/plugins/google-code-prettify/prettify.js', false, false, true);
	}
	
	function highlight_trigger(){ ?>
		<script type="text/javascript">
			prettyPrint();
		</script>
	<?php }
	add_action('wp_print_scripts', 'highlight_js');
	add_action('wp_footer', 'highlight_trigger', 100);
}

function dump($var) {
	echo '<pre class="prettyprint">';
	var_dump($var);
	echo '</pre>';
}

//get IP address
function get_real_ip()
{
  $proxy_headers = array(
      'CLIENT_IP', 
      'FORWARDED', 
      'FORWARDED_FOR', 
      'FORWARDED_FOR_IP', 
      'HTTP_CLIENT_IP', 
      'HTTP_FORWARDED', 
      'HTTP_FORWARDED_FOR', 
      'HTTP_FORWARDED_FOR_IP', 
      'HTTP_PC_REMOTE_ADDR', 
      'HTTP_PROXY_CONNECTION',
      'HTTP_VIA', 
      'HTTP_X_FORWARDED', 
      'HTTP_X_FORWARDED_FOR', 
      'HTTP_X_FORWARDED_FOR_IP', 
      'HTTP_X_IMFORWARDS', 
      'HTTP_XROXY_CONNECTION', 
      'VIA', 
      'X_FORWARDED', 
      'X_FORWARDED_FOR'
     );

  foreach($proxy_headers as $proxy_header)
  {
    if(isset($_SERVER[$proxy_header]) && preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $_SERVER[$proxy_header])) /* HEADER ist gesetzt und dies ist eine gültige IP */
    {
        return $_SERVER[$proxy_header];
    }
    else if(stristr(',', $_SERVER[$proxy_header]) !== FALSE)
    {
      $proxy_header_temp = trim(array_shift(explode(',', $_SERVER[$proxy_header]))); 

      if(($pos_temp = stripos($proxy_header_temp, ':')) !== FALSE) {
      	$proxy_header_temp = substr($proxy_header_temp, 0, $pos_temp);
      }

      if(preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $proxy_header_temp)){
      	return $proxy_header_temp;
      }
    }
  }

  return $_SERVER['REMOTE_ADDR'];
}

/**
 * Send a POST requst using cURL
 * @param string $url to request
 * @param array $post values to send
 * @param array $options for cURL
 * @return string
 */
function curl_post($url, array $post = NULL, array $options = array())
{
    $defaults = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POSTFIELDS => http_build_query($post)
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

/**
 * Send a GET requst using cURL
 * @param string $url to request
 * @param array $get values to send
 * @param array $options for cURL
 * @return string
 */
function curl_get($url, array $get = NULL, array $options = array())
{   
    $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
    );
   
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

/* detect ajax call */
function is_ajax(){
	 if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	 	return true;
	 } else {
	 	return false;
	 }
}
?>