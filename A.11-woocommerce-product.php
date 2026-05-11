<?php
/**
 * A.11 — WooCommerce Product Schema Extension for AI Search
 *
 * Extends the default Product schema emitted by Yoast SEO or RankMath with the
 * UCP-required fields they omit: GTIN, MPN, brand (from taxonomy), shippingDetails
 * and hasMerchantReturnPolicy.
 *
 * Drop into your child theme's functions.php, or into a small custom plugin.
 *
 * If you are on neither Yoast nor RankMath, the same logic ships as a standalone
 * filter on the WooCommerce hook 'woocommerce_structured_data_product'.
 */

add_filter( 'rank_math/json_ld', 'extend_product_schema_for_ai_search', 99, 2 );
add_filter( 'wpseo_schema_product', 'extend_product_schema_for_ai_search_yoast', 99, 2 );

function extend_product_schema_for_ai_search( $data, $jsonld ) {
    if ( ! is_product() ) return $data;
    global $product;
    if ( ! is_a( $product, 'WC_Product' ) ) return $data;

    foreach ( $data as $key => $entity ) {
        if ( isset( $entity['@type'] ) && $entity['@type'] === 'Product' ) {

            // GTIN at variation level — assumes _gtin meta key on the product
            if ( $product->get_meta( '_gtin' ) ) {
                $data[ $key ]['gtin13'] = $product->get_meta( '_gtin' );
            }

            // MPN
            if ( $product->get_meta( '_mpn' ) ) {
                $data[ $key ]['mpn'] = $product->get_meta( '_mpn' );
            }

            // Brand — promoted from taxonomy to schema field
            $brand_terms = wp_get_post_terms( $product->get_id(), 'product_brand' );
            if ( ! empty( $brand_terms ) ) {
                $data[ $key ]['brand'] = array(
                    '@type' => 'Brand',
                    'name'  => $brand_terms[0]->name,
                );
            }

            // Shipping details
            $data[ $key ]['offers']['shippingDetails'] = array(
                '@type' => 'OfferShippingDetails',
                'shippingRate' => array(
                    '@type'    => 'MonetaryAmount',
                    'value'    => get_option( 'standard_shipping_cost', '4.99' ),
                    'currency' => get_woocommerce_currency(),
                ),
                'shippingDestination' => array(
                    '@type'          => 'DefinedRegion',
                    'addressCountry' => 'GB',
                ),
            );

            // Returns policy — match the live returns page exactly
            $data[ $key ]['offers']['hasMerchantReturnPolicy'] = array(
                '@type'                  => 'MerchantReturnPolicy',
                'applicableCountry'      => 'GB',
                'returnPolicyCategory'   => 'https://schema.org/MerchantReturnFiniteReturnWindow',
                'merchantReturnDays'     => 30,
                'returnMethod'           => 'https://schema.org/ReturnByMail',
                'returnFees'             => 'https://schema.org/FreeReturn',
            );
        }
    }
    return $data;
}

/**
 * Yoast variant — same body, different hook signature.
 * Mirror the field-addition logic above against $data, then return.
 */
function extend_product_schema_for_ai_search_yoast( $data, $context ) {

    if ( $context && $context->indexable && $context->indexable->object_type === 'post' ) {
        $product = wc_get_product( $context->indexable->object_id );
        if ( ! $product ) return $data;

        if ( $product->get_meta( '_gtin' ) ) {
            $data['gtin13'] = $product->get_meta( '_gtin' );
        }
        if ( $product->get_meta( '_mpn' ) ) {
            $data['mpn'] = $product->get_meta( '_mpn' );
        }

        $brand_terms = wp_get_post_terms( $product->get_id(), 'product_brand' );
        if ( ! empty( $brand_terms ) ) {
            $data['brand'] = array(
                '@type' => 'Brand',
                'name'  => $brand_terms[0]->name,
            );
        }

        if ( isset( $data['offers'] ) && is_array( $data['offers'] ) ) {
            $data['offers']['shippingDetails'] = array(
                '@type' => 'OfferShippingDetails',
                'shippingRate' => array(
                    '@type'    => 'MonetaryAmount',
                    'value'    => get_option( 'standard_shipping_cost', '4.99' ),
                    'currency' => get_woocommerce_currency(),
                ),
                'shippingDestination' => array(
                    '@type'          => 'DefinedRegion',
                    'addressCountry' => 'GB',
                ),
            );

            $data['offers']['hasMerchantReturnPolicy'] = array(
                '@type'                  => 'MerchantReturnPolicy',
                'applicableCountry'      => 'GB',
                'returnPolicyCategory'   => 'https://schema.org/MerchantReturnFiniteReturnWindow',
                'merchantReturnDays'     => 30,
                'returnMethod'           => 'https://schema.org/ReturnByMail',
                'returnFees'             => 'https://schema.org/FreeReturn',
            );
        }
    }
    return $data;
}
