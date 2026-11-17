<?php
/**
 * Template: Admin Error Page
 *
 * Variables provided by infynipay_render_admin_error_page():
 *   $css_url    (string) URL to infynipay-admin.css
 *   $error_json (string) JSON-encoded error details
 */
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php esc_html_e( 'InfyniPay Error', 'infynipay' ); ?></title>
	<?php wp_admin_css( 'install', true ); ?>
	<link rel="stylesheet" href="<?php echo esc_url( $css_url ); ?>">
</head>
<body>
	<div class="infynipay-error">
		<h1><?php esc_html_e( 'Something went wrong', 'infynipay' ); ?></h1>
		<p><?php esc_html_e( 'Please contact the store administrator.', 'infynipay' ); ?></p>

		<h3><?php esc_html_e( 'Error details', 'infynipay' ); ?></h3>
		<pre><?php echo esc_html( $error_json ); ?></pre>
	</div>
</body>
</html>
