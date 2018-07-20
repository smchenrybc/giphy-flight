<?php
/**
 * index.php
 *
 * @package giphy-flight
 */

// autoload
require_once( __DIR__ . '/vendor/autoload.php' );

// Flight stuff
Flight::route('/', function(){
  echo "Hello world!";
});

Flight::route('/@string', function($string){
  if ( is_string( $string ) ) {
    // GIPHY stuff
    $api_instance = new GPH\Api\DefaultApi();
    $api_key = 'jF9bMBYzszD8WWwBCk5tCnQwkhhWtdKE';
    $search_tag = $string;

    // set result var
    $result = $api_instance->gifsRandomGet($api_key, $search_tag);

    // debug result output:
    // echo '<pre>';
    // print_r( $result );
    // echo '</pre>';

    // set URL
    $img_url = $result['data']['image_original_url'];

    echo '<body style="background-color: #EEE; padding: 20px;"><div class="main" style="margin: 0 auto; max-width: 800px;">';
    echo '<img src="'. $img_url .'" alt="'. $search_tag .'" style="display: block; border-radius: 2px; width: 100%; height: auto;" />';
    echo '</div></body>';
  }
});

Flight::start();
