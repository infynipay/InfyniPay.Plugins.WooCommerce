# InfyniPay for WooCommerce

Accept payments in WooCommerce through **InfyniPay** — a multi-provider payment
gateway that lets you offer many providers from a single integration and switch
between them without touching code.

| Item | Value |
| --- | --- |
| Plugin | InfyniPay (`infynipay`) |
| Version | 1.0.0 |
| WordPress | 6.0+ |
| WooCommerce | 8.0+ |
| PHP | 8.0+ |
| License | GNU General Public License v3.0 |

## Features

- **Multi-provider checkout** — offer customers several payment methods on a single hosted page.
- **Full refund support** — refunds are processed through the provider, or flagged for manual handling when a provider has no automatic refund. (Partial refunds are not supported.)
- **HPOS compatible** — works with WooCommerce High-Performance Order Storage.
- **WooCommerce Blocks compatible** — supports the Cart & Checkout blocks.
- **Webhook-based order sync** — real-time order status updates.
- **Sandbox (test) mode** with a separate set of credentials.
- **Per-order fee breakdown** stored on each order (provider fee, app fee, net amount).

## Installation

1. Upload the plugin to `/wp-content/plugins/infynipay`, or install it through the WordPress **Plugins** screen.
2. Activate it from the **Plugins** screen.
3. Go to **WooCommerce → Settings → Payments** and enable **InfyniPay**.
4. Enter your InfyniPay License ID and Authorization Code, then save — the plugin retrieves your API credentials automatically.
5. Choose sandbox or live mode and complete the webhook setup.

📖 Full step-by-step guide with screenshots:
<https://www.infynipay.com/integrations/woocommerce/>

## Refunds

InfyniPay supports **full-order refunds only**. When a provider supports automatic
refunds the refund is processed through it; otherwise the order is marked refunded in
InfyniPay and a warning is shown in the WooCommerce admin so you can transfer the
amount to the customer manually.

## Support

- **Email:** support@infynipay.com
- **Docs:** <https://docs.infynipay.com>
- **WordPress support forum:** include "InfyniPay" in your topic

## License

GNU General Public License v3.0 — <https://www.gnu.org/licenses/gpl-3.0.html>

## About InfyniPay

[InfyniPay](https://www.infynipay.com) is a payment orchestration platform that connects your store to 30+ payment providers through a single free, open-source plugin — with automatic routing, failover, webhook verification and server-side confirmation handled for you. Add or switch providers from a dashboard without touching code.

- 🔌 **One integration, 30+ providers** — PayPal, Stripe, Adyen, Paystack, Razorpay, Binance Pay and more
- 🆓 **Free & open-source** — no per-transaction fee from InfyniPay; you pay only your provider's processing fees
- 🔁 **Automatic routing & failover** between providers
- 🛡️ **Signed webhooks + server-side verification** built in

**Links:** [Website](https://www.infynipay.com) · [WooCommerce integration](https://www.infynipay.com/integrations/woocommerce/) · [Docs](https://docs.infynipay.com) · [All integrations](https://www.infynipay.com/integrations/) · [Create a free account](https://console.infynipay.com/auth/signup)
