<?php

if ( ! function_exists( 'bright_news_get_all_google_fonts' ) ) :
	/**
	 * Returns list of Google fonts.
	 */
	function bright_news_get_all_google_fonts() {
		$webfonts_json   = get_template_directory() . '/inc/google-webfonts.json';
		$fonts_json_data = file_get_contents( $webfonts_json );

		$all_fonts = json_decode( $fonts_json_data, true );

		$google_fonts = array();
		foreach ( $all_fonts as $font ) {
			$google_fonts[ $font['family'] ] = array(
				'family'   => $font['family'],
				'variants' => $font['variants'],
			);
		}
		return $google_fonts;
	}
endif;

if ( ! function_exists( 'bright_news_get_all_google_font_families' ) ) :
	/**
	 * Returns list of Google font families.
	 */
	function bright_news_get_all_google_font_families() {
		$google_fonts  = bright_news_get_all_google_fonts();
		$font_families = array();
		foreach ( $google_fonts as $font ) {
			$font_families[ $font['family'] ] = $font['family'];
		}
		return $font_families;
	}
endif;

if ( ! function_exists( 'bright_news_get_fonts_url' ) ) :
	/**
	 * Return Google fonts URL.
	 */
	function bright_news_get_fonts_url() {
		$fonts_url = '';
		$fonts     = array();

		$all_fonts = bright_news_get_all_google_fonts();

		if ( ! empty( get_theme_mod( 'bright_news_site_title_font', 'Maitree' ) ) ) {
			$fonts[] = get_theme_mod( 'bright_news_site_title_font', 'Maitree' );
		}

		if ( ! empty( get_theme_mod( 'bright_news_site_description_font', 'Rubik' ) ) ) {
			$fonts[] = get_theme_mod( 'bright_news_site_description_font', 'Rubik' );
		}

		if ( ! empty( get_theme_mod( 'bright_news_header_font', 'Lora' ) ) ) {
			$fonts[] = get_theme_mod( 'bright_news_header_font', 'Lora' );
		}

		if ( ! empty( get_theme_mod( 'bright_news_body_font', 'Merriweather Sans' ) ) ) {
			$fonts[] = get_theme_mod( 'bright_news_body_font', 'Merriweather Sans' );
		}

		$fonts = array_unique( $fonts );

		foreach ( $fonts as $font ) {
			$variants      = $all_fonts[ $font ]['variants'];
			$font_family[] = $font . ':' . implode( ',', $variants );
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_family ) ),
		);

		if ( ! empty( $font_family ) ) {
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;
