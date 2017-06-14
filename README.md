# UniCenter Payment Bundle

And set-up the required configuration

``` yaml
# app/config/config.yml
uc_payment:
    stripe:
        app_id: '%uc_payment_stripe_app_id%' The Stripe app id key can be added as a symfony parameter
        app_secret: '%uc_payment_stripe_app_secret%' The Stripe secret key can be added as a symfony parameter
        public_key: '%uc_payment_stripe_public_key%' The Stripe public key can be added as a symfony parameter
    paypal:
        client_id: '%uc_payment_paypal_client_id%' The PayPal cleint id key can be added as a symfony parameter
        secret: '%uc_payment_paypal_secret%' The PayPal secret key can be added as a symfony parameter
```

###### Create a charge (to a platform, or a connected Stripe account)

``` php
/**
 * $chargeAmount (int)              : The charge amount in cents, for instance 1000 for 10.00 (of the currency)
 * $chargeCurrency (string)         : The charge currency (for instance, "eur")
 * $paymentToken (string)           : The payment token obtained using the Stripe.js library
 * $applicationFee (int)            : The amount of the application fee (in cents), default to 0
 * $chargeDescription (string)      : (optional) The charge description for the customer
 */
$stripeClient->createCharge($chargeAmount, $chargeCurrency, $paymentToken, $applicationFee, $chargeDescription);
```

###### Refund a Charge

``` php
/**
 * $chargeId (string)           : The Stripe charge ID (returned by Stripe when you create a charge)
 * $refundAmount (int)          : The charge amount in cents (if null, the whole charge amount will be refunded)
 * $metadata (array)            : additional informations about the refund, default []
 * $reason (string)             : The reason of the refund, either "requested_by_customer", "duplicate" or "fraudulent"
 * $refundApplicationFee (bool) : Wether the application_fee should be refunded aswell, default true
 * $reverseTransfer (bool)      : Wether the transfer should be reversed (when using Stripe Connect "destination" parameter on charge creation), default false
 */
$stripeClient->refundCharge($chargeId, $refundAmount, $metadata, $reason, $refundApplicationFee, $reverseTransfer);
```
