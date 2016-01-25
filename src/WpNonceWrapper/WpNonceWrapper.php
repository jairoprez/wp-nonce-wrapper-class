<?php
namespace Perezlabs\WpNonceWrapper;

class WpNonceWrapper
{
    /**
     * Retrieve URL with nonce added to URL query. 
     * 
     * @param  string $actionUrl URL to add nonce action.
     * @param  int|string $action Nonce action name. 
     * @param  string $name Nonce name.
     * 
     * @return string URL with nonce action added.
     */
    public static function wpNonceUrl( $actionUrl, $action = -1, $name = '_wpnonce' )
    {
        return wp_nonce_url( $actionUrl, $action, $name );
    }

    /**
     * Retrieves or displays the nonce hidden form field.
     * 
     * @param  int|string $action Action name.
     * @param  string $name Nonce name.
     * @param  boolean $referer Whether also the referer hidden form field.
     * @param  boolean $echo Whether to display or return the nonce hidden form field, 
     * and also the referer hidden form field if the $referer argument is set to true. 
     * 
     * @return string The nonce hidden form field, optionally followed by the referer 
     * hidden form field if the $referer argument is set to true.
     */
    public static function wpNonceField( $action = -1, $name = '_wpnonce', $referer = true, $echo = true )
    {
        return wp_nonce_field( $action, $name, $referer, $echo );
    }

    /**
     * Generates and returns a nonce.
     * 
     * @param  int|string $action Action name
     * 
     * @return string The one use form token.
     */
    public static function wpCreateNonce( $action = -1 )
    {
        return wp_create_nonce( $action );
    }

    /**
     * Tests either if the current request carries a valid nonce.
     * 
     * @param  int|string $action Action name.
     * @param  string $queryArg Where to look for nonce in the 
     * $_REQUEST PHP variable.
     * 
     * @return false|int $result False if the nonce is invalid, 1 if the nonce is valid and 
     * generated between 0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
     */
    public static function checkAdminReferer( $action = -1, $queryArg = '_wpnonce' )
    {
        return check_admin_referer( $action, $queryArg );
    }

    /**
     * Verifies the AJAX request to prevent processing requests external of the blog.
     * 
     * @param  int|string $action Action nonce.
     * @param  string $queryArg Where to look for nonce in $_REQUEST.
     * @param  boolean $die Whether to die if the nonce is invalid.
     * 
     * @return false|int False if the nonce is invalid, 1 if the nonce is valid and generated between 0-12 
     * hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
     */
    public static function checkAjaxReferer( $action = -1, $queryArg = false, $die = true )
    {
        return check_ajax_referer( $action, $queryArg, $die );
    }

    /**
     * Verify that a nonce is correct and unexpired with the respect 
     * to a specified action.
     * 
     * @param  string $nonce Nonce to verify.
     * @param  int|string $action Action name.
     * 
     * @return boolean|integer Boolean false if the nonce is invalid. 
     * Otherwise, returns an integer with the value of: 
     * 1 – if the nonce has been generated in the past 12 hours or less.
     * 2 – if the nonce was generated between 12 and 24 hours ago.
     */
    public static function wpVerifyNonce( $nonce, $action = -1 )
    {
        return wp_verify_nonce( $nonce, $action );
    }

    /**
     * Display 'Are you sure you want to do this?' message to 
     * confirm the action being taken.
     * 
     * @param  string $action The nonce action.
     * 
     * @return void
     */
    public static function wpNonceAys( $action )
    {
        wp_nonce_ays( $action );
    }
}