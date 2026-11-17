<?php

defined( 'ABSPATH' ) || exit;

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class InfyniPay_Blocks extends AbstractPaymentMethodType
{
    protected $name = 'infynipay';
    protected $gateway;

    public function initialize()
    {
        $gateways = WC()->payment_gateways()->payment_gateways();
        $this->gateway = $gateways['infynipay'] ?? null;
    }

    public function needs_shipping_address()
    {
        return false;
    }

    public function is_active()
    {
        $is = $this->gateway && $this->gateway->is_available();

        return $is;
    }

    public function get_payment_method_script_handles()
    {
        wp_enqueue_style(
            'infynipay-checkout',
            plugins_url('assets/css/infynipay-checkout.css', dirname(__DIR__) . '/infynipay.php'),
            [],
            '1.0.4'
        );

        wp_enqueue_script(
            'wc-infynipay-blocks-integration',
            plugins_url('src/index.js', __DIR__),
            ['wc-blocks-registry', 'wc-settings', 'wp-element', 'wp-i18n'],
            '1.0.3',
            true
        );

        if (function_exists('wp_set_script_translations')) {
            wp_set_script_translations(
                'wc-infynipay-blocks-integration',
                'infynipay',
                dirname(__DIR__) . '/languages'
            );
        }

        $settings = get_option('woocommerce_infynipay_settings', []);
        wp_add_inline_script(
            'wc-infynipay-blocks-integration',
            'window.wc = window.wc || {}; window.wc.wcSettings = window.wc.wcSettings || {}; window.wc.wcSettings["infynipay_data"] = ' . wp_json_encode([
                'title' => $settings['title'] ?? __( 'InfyniPay', 'infynipay' ),
                'description' => $settings['description'] ?? __( 'Pay securely using InfyniPay.', 'infynipay' ),
                'ariaLabel' => $settings['title'] ?? __( 'InfyniPay', 'infynipay' ),
                'logoUrl' => $this->get_logo_url(),
                'isSandbox' => ($settings['testmode'] ?? 'yes') === 'yes',
                'supportedMethods' => $this->gateway ? $this->gateway->get_supported_checkout_methods_for_display() : [],
            ]) . ';',
            'before'
        );
        return ['wc-infynipay-blocks-integration'];
    }


    public function get_payment_method_data()
    {
        $settings = get_option('woocommerce_infynipay_settings', []);
        return [
            'title' => $settings['title'] ?? __( 'InfyniPay', 'infynipay' ),
            'description' => $settings['description'] ?? __( 'Pay securely using InfyniPay.', 'infynipay' ),
            'ariaLabel' => $settings['title'] ?? __( 'InfyniPay', 'infynipay' ),
            'logoUrl' => $this->get_logo_url(),
            'isSandbox' => ($settings['testmode'] ?? 'yes') === 'yes',
            'supportedMethods' => $this->gateway ? $this->gateway->get_supported_checkout_methods_for_display() : [],
            'supports' => ['products', 'subscriptions', 'default', 'virtual'],

        ];
    }

    public function enqueue_payment_method_script()
    {
        wp_enqueue_script(
            'wc-infynipay-blocks-integration',
            plugins_url('src/index.js', __DIR__),
            ['wc-blocks-registry', 'wc-settings', 'wp-element', 'wp-i18n'],
            '1.0.3',
            true
        );
    }

    protected function get_logo_url()
    {
        $base_file = dirname(__DIR__) . '/infynipay.php';
        $logo_candidates = [
            'assets/images/infynipay-blue.png',
            'assets/images/infynipay-logo.svg',
            'assets/images/infynipay-logo.png',
            'assets/images/infynipay.webp',
        ];

        foreach ($logo_candidates as $relative_path) {
            $absolute_path = dirname(__DIR__) . '/' . $relative_path;

            if (file_exists($absolute_path)) {
                return plugins_url($relative_path, $base_file);
            }
        }

        return '';
    }
}