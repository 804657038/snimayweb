<?php
class StoreAction2 extends CommonAction {
  public function __construct() {
    parent::__construct();
    /******************************网站标题及面包屑导航******************************/
    $cat_id = $_GET['cat_id']+0;
    $article_id = $_GET['id']+0;
    if($article_id)$cat_id = M('article')->where(array('article_id'=>$article_id))->getField('cat_id');

    $this->cat_id = $cat_id;

    $this->parent_id = M('articlecat')->where(array('cat_id'=>$cat_id))->getField('parent_id');

    $this->article_cat = $this->subCat(0,'articlecat');
    //print_r($this->article_cat);

    $parent_cat= $this->supCat($cat_id,true,'articlecat');
    
    /******************************网站标题及面包屑导航******************************/
    $ur_here = '<a href="/">Home</a>';
    $article_site_title = array();
    foreach($parent_cat as $key=>$value){
      $ur_here .= " > <a href='". U('About/'.$this->action,array('cat_id'=>$value['cat_id'])) ."'>" . strip_tags($value['cat_name']) . "</a>";
      $article_site_title[] = $value['cat_name'];
    }
    $this->article_site_title = implode('_',array_reverse($article_site_title));//产品页的标题
    $this->ur_here = $ur_here;
  }

  public function index($cat_id=19) {
    import("ORG.Wx.Jssdk");
    $jssdk = new JSSDK("wx6b9860fd89fbbf52", "1ec720aece1244d5d089b7df02bc631d");
    $signPackage = $jssdk->GetSignPackage();      
    $this->assign("info", $info);
    $this->assign("signPackage",$signPackage);
    $this->display();
  }
  public function store_list(){
    // echo '<pre>';print_r($_REQUEST);echo '</pre>';exit();
    $lat=$_GET['lat'];
    $lon=$_GET['lon'];
    $sql = "SELECT *,(ROUND(6378.137 * 2 * ASIN(SQRT(POW(SIN(((lat * PI()) / 180 - ('".$lat."' * PI()) / 180) / 2), 2) + COS(('".$lat."' * PI()) / 180) * COS((lat * PI()) / 180) * POW(SIN(((lng * PI()) / 180 - ('".$lon."' * PI()) / 180) / 2), 2))), 2)) AS distance FROM tp_store ORDER BY distance ASC LIMIT 0,10";
    // echo $sql;
    $Model = new Model();
    $result = $Model->query($sql);
    // echo $Model->getDbError();
    // echo '<pre>';print_r($result);echo '</pre>';exit();
    $this->lat2 = $lat;
    $this->lon2 = $lon;
    $this->banner_list = M('ads')->where('cat_id=20')->order('sort_order asc,ads_id asc')->select();
    $this->assign('result',$result);
    $this->display();
  }
  public function shopimg($store_id){
      $M_Store = M("Store");
      $img = $M_Store->field('original_img')->where("id=".$store_id)->find();
      return $img;
  }

      //添加留言
    public function sale(){
      $store_id=empty($_GET['store_id'])?0:intval($_GET['store_id']);
      $M_Sale = M('Sale');
      $saleList = $M_Sale->where(array('store_id'=>$store_id))->order('sort_order asc')->select();
      // echo '<pre>';print_r($saleList);echo '</pre>';
      $counts = count($saleList);
      $store_img=$this->shopimg($store_id);
      $this->assign("store_img",$store_img['original_img']);
      $this->assign("store_id",$store_id);
      $this->assign("counts",$counts);
      $this->assign("saleList",$saleList);
      $this->display();
    }
    public function mapnav(){
      import("ORG.Wx.Jssdk");
      $jssdk = new JSSDK("wx6b9860fd89fbbf52", "643df5e6db3ab1b165f1beaf22f36766");
      $signPackage = $jssdk->GetSignPackage();      
      $store_id=empty($_GET['store_id'])?0:intval($_GET['store_id']);
      $M_Store = M("Store");
      $info = $M_Store->field('name,address,lat,lng')->where("id=".$store_id)->find();
      // echo '<pre>';print_r($info);echo '</pre>';
      $store_img=$this->shopimg($store_id);
      $this->assign("store_img",$store_img['original_img']);
      $this->assign("info", $info);
      $this->assign("signPackage",$signPackage);
      $this->display();
    }
    public function activity(){
      $store_id=empty($_GET['store_id'])?0:intval($_GET['store_id']);
      $M_Act = M("Activity");
      $info = $M_Act->where("store_id=".$store_id)->select();
      // echo '<pre>';print_r($info);echo '</pre>';
      $store_img=$this->shopimg($store_id)
      $alike_act = M('ads')->where('cat_id=23')->order('sort_order asc,ads_id asc')->select();;
      $this->assign("store_img",$store_img['original_img']);
      $this->assign("store_id",$store_id);
      $this->assign("info", $info);
      $this->assign("alike_act",$alike_act);
      $this->display();
    }
    public function activity2(){
      $this->banner_list2 = M('ads')->where('cat_id=21')->order('sort_order asc,ads_id asc')->select();
      $this->display();
    }
    public function activity3(){
      $this->banner_list3 = M('ads')->where('cat_id=22')->order('sort_order asc,ads_id asc')->select();
      $this->display();
    }
    public function search(){
        header("Content-type: text/html; charset=utf-8");
        $keyword= $_GET['text'];
        $lat=$_GET['lat'];
        $lon=$_GET['lon'];
        // $file  = 'log.txt';
        // if($f  = file_put_contents($file, $keyword,FILE_APPEND)){// 这个函数支持版本(PHP 5) 
        //     echo "写入成功。<br />";
        // }
        // echo $keyword;
        $M_Store = M('Store');
        $condition["name"] = array("like", "%".$keyword."%");
        $saleList = $M_Store->field("*,(ROUND(6378.137 * 2 * ASIN(SQRT(POW(SIN(((lat * PI()) / 180 - ('".$lat."' * PI()) / 180) / 2), 2) + COS(('".$lat."' * PI()) / 180) * COS((lat * PI()) / 180) * POW(SIN(((lng * PI()) / 180 - ('".$lon."' * PI()) / 180) / 2), 2))), 2)) AS distance")->where($condition)->order('distance asc')->select();
        // var_dump($saleList);
        echo json_encode($saleList);
    }
}