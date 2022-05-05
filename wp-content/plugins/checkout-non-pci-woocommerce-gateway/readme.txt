=== Checkout.com Non PCI - WooCommerce Gateway ===
Contributors: checkoutintegration
Tags: checkout, payments, credit card
Requires at least: 3.0
Tested up to: 5.0.2
Stable tag: /tags/3.2.1/
Requires PHP: 5.4
Donate link: https://checkout.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Checkout.com is an international provider of online payment solutions. We partner with businesses to optimize their payments, increase revenue and meet the dynamic needs of their customers. We process 50+ currencies and offer access to all international cards and popular local payment methods to merchants through one integration.

== Description ==

### ** Webhook and Success URLs have changed **
From v3.0.0 on, Webhook and Success/Failed URLs have changed and should be configured as follows:

Webhook URL: 
http://example.com/?wc-api=WC_Checkout_Non_Pci_Webhook

Success and Fail URLs: 
http://example.com/?wc-api=WC_Checkout_Non_Pci_Callback
============

Checkout.com is an international provider of online payment solutions. We partner with businesses to optimize their payments, increase revenue and meet the dynamic needs of their customers. We process 50+ currencies and offer access to all international cards and popular local payment methods to merchants through one integration.

The Checkout.com plugin for Woocommerce allows shop owners to process online payments through the Checkout.com Payment Gateway.

This plugin is an integration of Checkout.com and offers 3 payment modes:

* Checkout.JS
Payments are processed from a Lightbox at the checkout withouth leaving the shop.

* Checkout.JS Hosted
Shoppers are redirected from your website to Checkout.com servers to complete payments.

* Frames.JS
The payment form is embedded and shoppers complete payments without leaving your website.

All solutions are cross-browser and cross-device compatible, and can accept online payments from all major credit cards, including 3D Secure handling. Checkout.JS and Checkout.JS Hosted offers in addition many of the most popular Alternative Payment methods used around the world.

Contact us at: https://www.checkout.com/

== Installation ==

1. Unzip your file and copy/paste the folder woocommerce-checkout-non-pci-gateway to your [wordpress directory]\wp-content\plugins\

2. Go to your WordPress administration on http://yoururl/wp-admin, and log in.

3. In your WordPress admin, navigate to Plugins and install the Checkout.com Payment Gateway (GW 3.0)

4. Choose WooCommerce in the left menu, and press Settings. Click on **Checkout ** tab and then navigate to Payment Gateways.

5. In the Payment Gateways section, press setting on 'Credit Card Non PCI (Checkout.com)'. Enter the required information you received from Checkout.com, the field “Secret Key” and “Public Key”. Press ‘Save changes’ at the bottom of the page.

6. Configure the redirection and the webhook URLs from your checkout hub account. 

Webhook URL: 
http://example.com/?wc-api=WC_Checkout_Non_Pci_Webhook

Success and Fail URLs: 
http://example.com/?wc-api=WC_Checkout_Non_Pci_Callback

After Checkout.com GW3 plugin has been set up to use, in payment information page, customers will now be able to choose Checkout.com as a valid payment method.

== Frequently asked questions ==

If you need help for installing our plugin, feel free to drop us an email on integration@checkout.com

== Screenshots ==
1. ‘/assets/Screenshot1.png’
2. ‘/assets/Screenshot2.png’

== Changelog ==
v3.2.1 11 Jan 2019
· Bug fixes and improvements - Show decline reason in order messages

v3.2.0 18 Sep 2018
· Add Mobile Wallets support - General fixes

v3.1.0 18 Jun 2018 Improvements
· Alternative payments added to Frames solution.

v3.0.3 8 May 2018 Bug fix
· Bug fix for mobile redirection 

v3.0.2 30 Apr 2018 Bug fix
· Bug fix on the redirection back to success page

v3.0.1 30 Apr 2018 Bug fix
· Bug fix on the redirection back to success page

v3.0.0 25 Apr 2018 Improvements
**Webhook and Success URLs have changed**
· File webhook.php : woocommerce-checkout-non-pci-gateway\controllers\api\webhook.php has been removed.
Webhook url should now be set as "http://example.com/?wc-api=WC_Checkout_Non_Pci_Webhook"
· File 3dsecure.php : woocommerce-checkout-non-pci-gateway\controllers\api\3dsecure.php has been removed.
Redirection url should now be set as "http://example.com/?wc-api=WC_Checkout_Non_Pci_Callback"
· File delete.php : woocommerce-checkout-non-pci-gateway\controllers\customer\card\delete.php has been removed. The content of this file has been moved to an internal function.

v2.5.5 9 Mar 2018  Bug fixes and improvements
· Add functionality to Suspend, reactivate and cancel subscriptions
· Support to saved cards after changing email account
· Show order details after 3DS redirection
· Bug fixes and improvements

== Upgrade notice ==

Updating the plugin on your WordPress website

When updating any of the non-PCI or PCI versions of the plugin, make sure to:

1. Deactivate the current version of the plugin from the WordPress admin panel.

2. Remove the corresponding directory and its content from [wordpress directory]\wp-content\plugins\

3. Upload the new version of the plugin to [wordpress directory]\wp-content\plugins\

4. Activate the new version of the plugin from the WordPress admin panel.

Existing configuration details will not be lost.


