<?php
class AboutAction extends CommonAction {
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {
      //网站logo
      $logo1 = M('ads')->where('ads_id=164')->find();
      $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
      $this->assign('logo', $logo1);
      //banner
      $guanyu = M('ads')->where('ads_id=178')->find();
      $this->assign('guanyu',$guanyu);
      //省份
      $province = M('region')->where('parent_id=1')->select();
      $this->assign('province', $province);
      //公司简介
      $gs = M('article')->where('cat_id=2')->where('article_id=1')->find();
      $this->assign('gs',$gs);
      $gsImg = M('ads')->where('cat_id=35')->order('sort_order asc')->limit(6)->select();
      foreach($gsImg as $key=>$val){
          $gsImg['k'.$key] = $val;
      }
      $this->assign('gsImg',$gsImg);
      //品牌使命
      $pinpai = M('article')->where('cat_id=2')->where('article_id=3')->find();
      $this->assign('pinpai',$pinpai);
      $pinpaiImg = M('ads')->where('cat_id=36')->order('sort_order asc')->limit(6)->select();
      foreach($pinpaiImg as $k=>$v){
          $pinpaiImg['k'.$k] = $v;
      }
      $this->assign('pinpaiImg',$pinpaiImg);
      //品牌愿景
      $yuanj = M('article')->where('cat_id=2')->where('article_id=4')->find();
      $this->assign('yuanj',$yuanj);
      $yuanImg = M('ads')->where('cat_id=37')->order('sort_order asc')->limit(3)->select();
      foreach($yuanImg as $k1=>$v1){
          $yuanImg['k'.$k1] = $v1;
      }
      $this->assign('yuanImg',$yuanImg);
      //品牌荣誉
      $rongy = M('article')->where('cat_id=2')->where('article_id=2')->find();
      $this->assign('rongy',$rongy);
      //品牌历程
      $catId = $this->sub_cat_ids(3,'articlecat');
      $catId = explode(',',$catId);
      unset($catId[0]);
      sort($catId) ;
      foreach($catId as $k2=>$v2){
          $lc[$k2] = M('article')->where('cat_id='.$v2)->order('sort_order asc')->select();
          foreach($lc[$k2] as $k3=>$v3){
              $title[] = str_replace("年"," ",$v3['title']);
              $short[] = $v3['short'];
              $content[] = $v3['content'];
          }
      }
      //门店
      $men = M('article')->where('cat_id=5')->order('article_id desc')->field('z_name,z_loca,z_tel')->limit(9)->select();
      $this->assign('men', $men);
      $this->assign('lc_title',json_encode($title));
      $this->assign('lc_short',json_encode($short));
      $this->assign('lc_content',json_encode($content));


      $this->assign('catid', 1);
      $this->display(':about');
  }

    public function getCity(){
        $province = $_GET['province'];
        $region = M('region')->where("region_name='".$province."'")->find();
        $city = M('region')->where('parent_id='.$region['region_id'])->field('region_name')->select();
        echo json_encode($city);
    }

    //门店
    public function getShop(){
        $province = $_GET['province'];
        $city = $_GET['city'];
        $zw_name = $_GET['zw_name'];
        $prov = M('region')->where("region_name='".$province."'")->field('region_id')->find();
        $cty = M('region')->where("region_name='".$city."'")->field('region_id')->find();
        $where_arr['province'] = array('eq',$prov['region_id']);
        $where_arr['city'] = array('eq',$cty['region_id']);
        $where_arr['z_name'] = array('like',"%$zw_name%");
        $zp = M('article')->where('cat_id=5')->where($where_arr)->order('article_id desc')->select();
        echo json_encode($zp);
    }







}