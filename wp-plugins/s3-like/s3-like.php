<?php
   /*
   Plugin Name: S3-Like Storage Endpoint
   Plugin URI: http://www.camptocamp.com
   Description: A plugin to set the endpoint for s3-like storage
   Version: 1.0
   Author: Christophe Burki
   Author URI: http://www.camptocamp.com
   License: GPL2
   */


define('URL_S3_LIKE_STORAGE', 'os.zhdk.cloud.switch.ch');


function set_storage_endpoint($args) {
    $args['endpoint'] = 'https://' . URL_S3_LIKE_STORAGE;
    return $args;
}

function replace_attachment_url($url) {
    $new_url = str_replace('s3.amazonaws.com', URL_S3_LIKE_STORAGE, $url);
    return $new_url;
}


add_filter('aws_get_client_args', 'set_storage_endpoint');
add_filter('as3cf_get_attachment_url', 'replace_attachment_url');
add_filter('as3cf_get_attachment_secure_url', 'replace_attachment_url');

?>
