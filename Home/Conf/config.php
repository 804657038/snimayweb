<?php
$config_arr1 = include_once WEB_ROOT . 'Common/config.php';
$config_arr2 = array(
  'SHOW_PAGE_TRACE' =>false,
  'TMPL_PARSE_STRING'=>array(
    '__IMG__'    => __ROOT__.'/Public/Home/images',
    '__JS__'     => __ROOT__.'/Public/Home/script',
    '__CSS__'    => __ROOT__.'/Public/Home/style',
    '__CG__'     => __ROOT__.'/Public/Cg',
    '__START__'  => __ROOT__.'/Public/Home/start',

    '__HOME__'   => __ROOT__.'/Home/Tpl',
    '__PIC__'   => __ROOT__.'',
  ),
  'OUTPUT_ENCODE'   => true,
  'URL_HTML_SUFFIX' => 'html',
  /*'URL_PATHINFO_DEPR'=>'-',*/
  'URL_MODEL'       => 2,
  'URL_ROUTER_ON'   => true,
  'URL_ROUTE_RULES' => array( //定义路由规则
    'join'          => 'About/investment',
    //'activites_list' => 'Sales/index',
    'activites/:id' => 'Sales/detail',
    'news'          => 'About/news?cat_id=16',
    'media'         => 'About/news?cat_id=17',
    'know'          => 'About/news?cat_id=18',
    'shipin'        => 'About/news?cat_id=56',
    'introduce'     => array('About/index','cat_id=2'),
    'honor'         => array('About/index','cat_id=3'),
    'zhaopin'       => array('About/index','cat_id=4'),
    'contact'       => array('About/index','cat_id=14'),
    'net'           => array('About/index','cat_id=5'),
    'article/:id'   => array('About/detail'),
    'product/:id'   => array('Product/detail'),
    'product_list'  => 'Product/index',
    'cgzs'          => 'Cg/index',
    'zscx'          => 'Dealer/index',
//--------------------------------------------------------------------------
    'index'         => 'Index/index',
    'service'       => 'Service/index',
    'insert_order'       => 'Service/insert_order',
      'uploadFile'=>'Service/uploadFile',
      'insert_complain'       => 'Service/insert_complain',
      'insert_feeback'       => 'Service/insert_feeback',
  ),
  'LUYOU'           => array(
    'join.html'     => 'About/investment',
    //'activites_list.html' => 'Sales/index',
    'activites/:id' => 'Sales/detail',
    'news'          => 'About/news/cat_id/16',
    'media'         => 'About/news/cat_id/17',
    'know'          => 'About/news/cat_id/18',
    'shipin'        => 'About/news/cat_id/56',
    'introduce'     => 'About/index/cat_id/2',
    'honor'         => 'About/index/cat_id/3',
    'zhaopin'       => 'About/index/cat_id/4',
    'contact'       => 'About/index/cat_id/14',
    'net'           => 'About/index/cat_id/5',
    'article/:id'   => 'About/detail',
    'product/:id'   => 'Product/detail',
    'product_list'  => 'Product/index',
    'zscx'          => 'Dealer/index',
  ),
);

return array_merge($config_arr1, $config_arr2);
?>