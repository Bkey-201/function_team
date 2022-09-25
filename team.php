$components = array_merge(
		$components,
		array(

			// header components
			'header'               => Header::class,
			'logo'                 => Logo::class,
			'header-menu'          => HeaderMenu::class,

			// inner page fragments
			'inner-nav-bar'        => InnerNavigation::class,
			'inner-hero'           => InnerHero::class,
			'inner-title'          => InnerTitle::class,
			'inner-top-bar'        => InnerTopBar::class,

			// front page fragments
			'front-hero'           => FrontPageHero::class,
			'front-title'          => Title::class,
			'front-subtitle'       => Subtitle::class,
			'buttons'              => Buttons::class,
			'front-nav-bar'        => Navigation::class,
			'top-bar-list-icons'   => TopBarListIcons::class,
			'top-bar-social-icons' => TopBarSocialIcons::class,
			'front-top-bar'        => TopBar::class,
			'front-image'          => Image::class,

			// footer components
			'front-footer'         => Footer::class,

			// general components
			'css'                  => CssOutput::class,

			// page content
			'main'                 => MainContent::class, // blog loop
			'single'               => SingleContent::class, // single page
			'content'              => PageContent::class, // inner page content
			'front-page-content'   => "{$namespace}\\FrontPageContent", // front page content
			'search'               => "{$namespace}\\PageSearch", // search page
			'page-not-found'       => PageNotFound::class, // 404 page

			// inner content fragments

			// main content
			'main-loop'            => ArchiveLoop::class, // no usage found
			'post-loop'            => PostLoop::class, // single page content
			'archive-loop'         => ArchiveLoop::class, // blog page content

		)
	);

	return $components;
}

Hooks::prefixed_add_filter( 'components', 'pathway_register_components', 20 );
Theme::load(
	array(
		'themeBaseRelativePath' => '',
		'themeRelativePath'     => '',
	)
);

/**
 * @return Theme
 */
function pathway_theme() {
	return Theme::getInstance();
}

function pathway_assets() {
	return pathway_theme()->getAssetsManager();
}


pathway_theme()
	->add_theme_support( 'automatic-feed-links' )
	->add_theme_support( 'title-tag' )
	->add_theme_support( 'post-thumbnails' )
	->add_theme_support(
		'custom-logo',
		array(
			'flex-height' => true,
			'flex-width'  => true,
			'width'       => 150,
			'height'      => 70,
		)
	)
	->register_menus(
		array(
			'header-menu' => esc_html__( 'Header Menu', 'pathway' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'pathway' ),
		)
	);
