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