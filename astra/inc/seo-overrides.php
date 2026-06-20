<?php
/**
 * SEO overrides for AuxR_Roi d'la Conduite
 * - default meta description
 * - homepage meta tweaks
 * - lightweight JSON-LD for LocalBusiness
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1) Ensure a default meta description if none is set.
 */
add_action( 'wp_head', function () {
	if ( is_admin() ) {
		return;
	}

	$desc = '';

	if ( is_front_page() || is_home() ) {
		$desc = 'Auto-école à Auxerre : permis B, AAC et conduite supervisée. Formateurs diplômés, label Qualité, accompagnement personnalisé et taux de réussite optimisé.';
	} else {
		// Fallback generic description from site identity.
		$desc = get_bloginfo( 'description' );
	}

	$desc = trim( (string) $desc );

	if ( empty( $desc ) ) {
		return;
	}

	if ( ! $desc ) {
		return;
	}

	$output = sprintf(
		"<meta name=\"description\" content=\"%s\" />\n",
		esc_attr( wp_strip_all_tags( $desc ) )
	);

	echo $output;
}, 1 );

/**
 * 2) JSON-LD LocalBusiness for the driving school.
 */
add_action( 'wp_head', function () {
	if ( is_admin() ) {
		return;
	}

	if ( ! is_front_page() && ! is_home() ) {
		return;
	}

	$json = [
		'@context'    => 'https://schema.org',
		'@type'       => 'ProfessionalService',
		'name'        => 'AuxR_Roi d\'la Conduite',
		'description' => 'Auto-école à Auxerre. Permis B, AAC, conduite supervisée et code de la route.',
		'url'         => home_url( '/' ),
		'telephone'   => '0358438162',
		'address'     => [
			'@type'           => 'PostalAddress',
			'streetAddress'   => '146 rue de Paris',
			'addressLocality' => 'Auxerre',
			'postalCode'      => '89000',
			'addressCountry'  => 'FR',
		],
		'areaServed'  => 'Auxerre',
	];

	$script = sprintf(
		"<script type=\"application/ld+json\">%s</script>\n",
		wp_json_encode( $json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
	);

	echo $script;
}, 2 );
