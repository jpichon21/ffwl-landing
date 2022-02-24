<?php
function apollo13framework_apollo13_info() {
	apollo13framework_theme_pages_header();
	do_action('apollo13framework_apollo13_info_page_content');
	apollo13framework_theme_pages_footer();
}

function apollo13framework_apollo13_import() {
	apollo13framework_theme_pages_header();

	global $apollo13framework_a13;

	$has_valid_purchase_code = $apollo13framework_a13->check_for_valid_license();

	if(!$has_valid_purchase_code){
		do_action('apollo13framework_license_is_needed_msg');
		return;
	}
	if(apollo13framework_is_companion_plugin_ready()){
		do_action('apollo13framework_apollo13_importer_page_content');
	}

	apollo13framework_theme_pages_footer();
}

function apollo13framework_apollo13_export() {
	apollo13framework_theme_pages_header();
	if(apollo13framework_is_companion_plugin_ready()){
		do_action('apollo13framework_apollo13_exporter_page_content');
	}

	apollo13framework_theme_pages_footer();
}

function apollo13framework_apollo13_help() {
	apollo13framework_theme_pages_header();
	global $apollo13framework_a13;
	?>

	<h2><?php echo esc_html__( 'Where to get help?', 'a13-onelander' ); ?></h2>

	<h3 class="center"><a href="https://support.apollo13.eu/"><?php echo esc_html__( 'Support Forum', 'a13-onelander' ); ?></a></h3>
	<p><?php
		echo esc_html__( 'If you have question about how something works, or you feel like you have found bug please come to our support forum! It is the best place, where we can work together to solve issues and explain various topics.', 'a13-onelander' );
		?></p>
	<p><?php
		echo esc_html__( 'To access forum you will need your license code.', 'a13-onelander' ).
			' <a href="'.esc_url( $apollo13framework_a13->get_docs_link('license-code') ).'" target="_blank">'.esc_html__( 'Where to find your code?', 'a13-onelander' ).'</a>';
		?></p>
	<p><?php echo esc_html__( 'We understand that most of our customers are not developers(programmers), that is why we will also help you with issues caused by other components (plugins for example) and we will provide you instructions to help fixing issues, even if it is not directly related to our theme.', 'a13-onelander' ); ?></p>

	<h3 class="center"><a href="<?php echo esc_url($apollo13framework_a13->get_docs_link()); ?>"><?php echo esc_html__( 'Online Documentation', 'a13-onelander' ); ?></a></h3>
	<p><?php echo
		esc_html__( 'Online documentation is always most up to date if it comes to explaining how to work with the theme. It will come handy as the first source when you trying to work out problematic topics.', 'a13-onelander' );
		?></p>

	<h3 class="center"><a href="https://apollo13themes.com/rife/tutorials/"><?php echo esc_html__( 'Video Tutorials', 'a13-onelander' ); ?></a></h3>
	<p><?php
		echo esc_html__( 'We have prepared some basics tutorials on how to work with the theme.', 'a13-onelander' );
		?></p>
	<p><?php
		echo esc_html__( 'We are planning to do more, but if you have idea for subject that we should cover in next tutorials, please let us know.', 'a13-onelander' );
		?></p>

	<h3 class="center"><a href="https://apollo13themes.com/contact/"><?php echo esc_html__( 'Contact Apollo13Themes', 'a13-onelander' ); ?></a></h3>
	<p><?php
		echo '<a href="https://apollo13themes.com/contact/">'.esc_html__( 'Just come and say hi :-)', 'a13-onelander').'</a>'
		?></p>


	<h2><?php echo esc_html__( 'Changelog', 'a13-onelander' ); ?></h2>
	<h3 class="center"><a href="https://www.apollo13.eu/themes_update/apollo13_framework_theme/index.html#change-log"><?php echo esc_html__( 'Visit the Changelog', 'a13-onelander' ); ?></a></h3>

	<h2><?php echo esc_html__( 'Theme requirements:', 'a13-onelander' ); ?></h2>
	<div class="feature-section one-col">
		<div class="col">
			<?php apollo13framework_theme_requirements_table(); ?>
		</div>
	</div>

	<?php
	apollo13framework_theme_pages_footer();
}

function apollo13framework_theme_pages_header(){
	if(!current_user_can('install_plugins')){
		wp_die(esc_html__('Sorry, you are not allowed to access this page.', 'a13-onelander'));
	}
	$pages = array(
		'info' => esc_html__( 'License &amp; Info', 'a13-onelander' ),
		'import' => esc_html__( 'Design Importer', 'a13-onelander' ),
		'export' => esc_html__( 'Export', 'a13-onelander' ),
		'help' => esc_html__( 'Get Help', 'a13-onelander' ),
		'recommendations' => esc_html__( 'Recommended Tools', 'a13-onelander' ),
	);

	//check for current tab
	$current_subpage = isset( $_GET['subpage'] ) ? sanitize_text_field( wp_unslash( $_GET['subpage'] ) ) : 'info';
	?>
<div class="wrap apollo13-page <?php echo esc_attr( $current_subpage ); ?> about-wrap">
	<h1><?php
		/* translators: %s: Theme name */
		echo sprintf( esc_html__( 'Welcome to %s Theme', 'a13-onelander' ), esc_html(A13FRAMEWORK_OPTIONS_NAME_PART ));
		?></h1>

	<div class="about-text">
		<?php echo esc_html__( 'On these pages you can get info what is new, import designs and get help if you will ever need it.', 'a13-onelander' ); ?><br />
		<?php echo esc_html__( 'Thanks for being with us!', 'a13-onelander' ); ?>
		<p class="socials"><a class="on-twitter" href="https://twitter.com/apollo13themes" target="_blank"><?php echo esc_html__( 'Apollo13Themes on Twitter', 'a13-onelander' ); ?></a></p>
	</div>
	<div class="wp-badge"><?php echo esc_html__( 'Version', 'a13-onelander' ).' '.esc_html( A13FRAMEWORK_THEME_VERSION ); ?></div>
	<h2 class="nav-tab-wrapper wp-clearfix">
		<?php
		foreach($pages as $subpage => $title){
			$query_args = array(
				'page' => 'apollo13_pages',
				'subpage' => $subpage
			);

			$is_current = $current_subpage === $subpage;

			echo '<a href="'.esc_url( add_query_arg( $query_args, admin_url( 'themes.php') ) ).'" class="nav-tab'.esc_attr( $is_current ? ' nav-tab-active' : '').'">'.esc_html( $title ).'</a>';
		}
		?>
	</h2>
	<?php
}

function apollo13framework_theme_pages_footer(){
	echo '</div>';
}

function apollo13framework_importer_grid_item($files_directory, $demo ){
	$current_item_categories = '';
	foreach ( $demo['categories'] as $category ) {
		$current_item_categories .= str_replace( ' ', '_', strtolower( $category ) ) . ' ';
	}

	echo '<div class="demo_grid_item" '.
	     'data-main_category="' . esc_attr( str_replace( ' ', '_', strtolower( implode( '|', $demo['categories'] ) ) ) ) . '" '.
	     'data-categories="' . esc_attr( $current_item_categories . ' ' . strtolower( $demo['name'] ) ) . '"'.
	     'data-full="' . esc_url( $files_directory . 'full.jpg' ) . '"'.
	     'data-id="' . esc_attr( $demo['id'] ) . '"'.
	     'data-name="' . esc_attr( $demo['name'] ) . '"'.
	     '>';
	echo '<div>';
	echo '<img class="thumb" src="' . esc_url( $files_directory . 'thumb.jpg' ).'">';
	echo '<div class="demo_grid_item_title" style="'. esc_attr( 'background-color:'.$demo['background'].';color:'.$demo['font_color'].';' ) .'">' . esc_html( implode( ' ', $demo['categories'] ) ) . '</div>';

	echo '<div class="action-bar">';
		echo '<a class="button demo-preview" href="' . esc_url( $demo['demo_url'] ) . '" target="_blank">' .
		     esc_html__( 'Live preview', 'a13-onelander' ) . '</a>'.
		     '<span class="a13_demo_name">' . esc_html( $demo['name'] ) .'</span>';
		echo '<button class="button button-primary demo-select" data-demo-id="' . esc_attr( $demo['id'] ) . '">' . esc_html__( 'Choose & move to next step', 'a13-onelander' ) . '</button>';
	echo '</div>';//end .action-bar

	echo '</div>';//end .demo_grid_item > div
	echo '</div>';//end .demo_grid_item
}