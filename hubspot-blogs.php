<?php 
/*
Plugin Name: Hubspot Blog Getter
Description: This will grab blogs from Hubspot
Author: Aaron Wagner
Version: 1.0
*/

defined('ABSPATH') or die("No script kiddies please!");

function get_hubspot_blogs($key,$limit){
	$url="https://api.hubapi.com/content/api/v2/blog-posts?hapikey=$key&order_by=-created&state=PUBLISHED&limit=$limit";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);
	curl_close($ch);

	return json_decode($result, true);
}