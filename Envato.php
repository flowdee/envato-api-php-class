<?php
/*
 * Envato API PHP Class
 *
 * This PHP Class was created in order to communicate with the new Envato API.
 *
 * Source: https://github.com/flowdee/envato-api-php-class
 * API Documentation: https://build.envato.com/api/
 *
 * Copyright 2016: flowdee
 */

class Envato {

    // API settings
    private $api_old_url = 'https://api.envato.com/v1/market';
    private $api_new_url = 'https://api.envato.com/v3/market';

    private $api_new_features = array('author', 'buyer');

    // User credentials
    private $api_key;

    // Return type
    private $responseType = 'object';

    # Constructor
    public function Envato($api_key) {

        // Initialize
        $this->api_key = $api_key;
    }

    /**
     * Verify the api credentials and unlock set status
     */
    public function verify_credentials() {

        $response = $this->call('/total-items.json');

        return ( ! isset( $response->error ) && ! isset( $response['error'] ) ) ? true : false;
    }

    /**
     * Set response types
     *
     * @param string $type The type of response, values: array & object (default)
     */
    public function set_response_type( $type ) {

        if ( 'array' === $type )
            $this->responseType = 'array';
    }

    /**
     * Preparing the api call by automatically selecting the correct API version and adding the set
     *
     * @param string $set The url parameters without the basic api url
     * @return mixed The response as object or transformed into an array
     */
    public function call( $set )
    {
        $url = $this->api_old_url;

        foreach ( $this->api_new_features as $feature ) {
            if (strpos($set, '/' . $feature . '/') !== false) {
                $url = $this->api_new_url;
                break;
            }
        }

        $url .= $set;

        // Fetch data
        $response = $this->curl($url);

        // Handle return types
        if ( 'array' === $this->responseType )
            return $this->object_to_array( $response );

        // Also returning possible error object/array including the attributes "error" (code) and "description" (message)
        return $response;
    }

    /**
     * General purpose function to query the Envato API.
     *
     * @param string $url The url to access, via curl.
     * @return object The results of the curl request.
     */
    protected function curl($url)
    {
        if ( empty($url) ) return false;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Envato API Wrapper PHP)');

        $header = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json';
        $header[] = 'Authorization: Bearer ' . $this->api_key;

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $data = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($data);

        return $data; // string or null
    }

    /*
     * Object to Array
     */
    protected function object_to_array($object) {
        return json_decode(json_encode($object), true);
    }

    /*
     * Debugging
     */
    protected function debug($args) {
        echo '<pre>';
        print_r($args);
        echo '</pre>';
    }
}