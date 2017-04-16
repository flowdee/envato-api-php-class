<?php
// Including class to your project
require('../Envato.php');

$personal_token = '7HetQ2jzR8H2vUrKGhD5SZ8l2eOshTbTx';
$personal_token_new = 'v7VWb5mcJJi8Iaw7F5E8XfDFWTfxHwV4';
$purchase_code = 'efc28b42-9bba-49b4-ab4e-4c8b66841431';

// Setup Envato with your credentials
$envato = new Envato( $personal_token_new );

// Updating the response type
$envato->set_response_type('array');

// Verifying credentials
$credentials = $envato->verify_credentials();
echo '<h3>Verifying credentials</h3>';
var_dump($credentials);
echo '<br />';

// Receive all purchases buyer has made
//$purchases = $envato->call('/buyer/list-purchases');
//debug( $purchases, '/buyer/list-purchases' );

// Reveice all purchases a buyer has made of our api
//$purchases = $envato->call('/buyer/purchases');
//debug( $purchases, '/buyer/purchases' );

// Receive purchase data via purchase code
$purchase_data = $envato->call('/author/sale?code=f3ead7ef-d491-42a0-bbf3-93c19cdc9ef3');
debug( $purchase_data, '/author/sale?code=' );





/**
 * Debug
 *
 * @param $args
 * @param bool $title
 */
function debug( $args, $title = false ) {

    if ( $title )
        echo '<h3>' . $title . '</h3>';

    echo '<pre>';
    print_r( $args );
    echo '</pre>';
}