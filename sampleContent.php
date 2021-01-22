<?php
/**
 * @package sampleContent
 * @version 1.0
 */
/*
Plugin Name: sampleContent
Plugin URI: https://progressbar.tw/
Description: 這是面試題目為練習頁面增加文字
Author: Adonis
Version: 1.0
Author URI: https://github.com/adonismis
*/

define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( PLUGIN_DIR .'function.php' );


$sample1 = new Content();

//設定選單
$menu["page_title"] = 'SampleContent';
$menu["menu_title"] = '考題選單';
$sample1->set_menu($menu); 

//新增選單
$sample1->add_menu();

//頁面增加文字
$sample1->add_ContentFilter(); 



?>