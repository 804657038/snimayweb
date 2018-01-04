<?php

$config_arr1 = include_once WEB_ROOT . 'Common/config.php';
$config_arr2 = array(
	'SHOW_PAGE_TRACE'=>false,
	'TMPL_PARSE_STRING'=>array(
		'__IMG__'=>__ROOT__.'/Public/Mobile/images',
		'__JS__'=>__ROOT__.'/Public/Mobile/script',
		'__CSS__'=>__ROOT__.'/Public/Mobile/style',
		'__START__'=>__ROOT__.'/Public/Mobile/start',
		'__STORE__'=>__ROOT__.'/Public/Mobile/store',


		'__HOME__'   => __ROOT__.'/Mobile/Tpl',
		'__PIC__'   => __ROOT__.'',
	),
    'OUTPUT_ENCODE'=>true,
    'URL_HTML_SUFFIX'=>'html',
    /*'URL_PATHINFO_DEPR'=>'-',*/
    'URL_MODEL' => 1,
	'URL_ROUTER_ON' =>true,
    'URL_ROUTE_RULES' => array( //定义路由规则 

		'join'    => 'About/investment',
		'activites_list' => 'Sales/index',
		'activites/:id' => 'Sales/detail',
		'news'    => 'About/news?cat_id=16',
		'media'    => 'About/news?cat_id=17',
		'know'    => 'About/news?cat_id=18',
		'shipin'    => 'About/news?cat_id=56',
		'introduce'    => array('About/index','cat_id=2'),
		'honor'    => array('About/index','cat_id=3'),
		'zhaopin'    => array('About/index','cat_id=4'),
		'contact'    => array('About/index','cat_id=14'),
		'net'    => array('About/index','cat_id=5'),
		'article/:id' => array('About/detail'),
		'product/:id' => array('Product/detail'),
		'product_list' => 'Product/index',
		'cgzs'=>'Cg/cgzs',
		'zscx'=>'Dealer/index',
        'meet/toutiao'=>'Meet/toutiao'
		
	), 
	'LUYOU' => array(
		
		'join.html'    => 'About/investment',
		'activites_list.html' => 'Sales/index',
		'activites/:id'    => 'Sales/detail',
		'news'        => 'About/news/cat_id/16',
		'media'       => 'About/news/cat_id/17',
		'know'        => 'About/news/cat_id/18',
    'shipin'        => 'About/news/cat_id/56',
		'introduce'        => 'About/index/cat_id/2',
		'honor'          => 'About/index/cat_id/3',
		'zhaopin'        => 'About/index/cat_id/4',
		'contact'        => 'About/index/cat_id/14',
		'net'         => 'About/index/cat_id/5',
		'article/:id' => 'About/detail',
		'product/:id' => 'Product/detail',
		'product_list' => 'Product/index',
		'zscx'=>'Dealer/index',
		
	),
);
return array_merge($config_arr1, $config_arr2);
?>