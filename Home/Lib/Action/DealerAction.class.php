<?php
class DealerAction extends CommonAction {
  public function __construct() {
    parent::__construct();

  }

  public function index($cat_id=61) {
    // unset($_SESSION['business_id']);
    if(isset($_SESSION['last_access'])&&(time()-$_SESSION['last_access'])>60){
        unset($_SESSION['business_id']);
    }elseif(!isset($_SESSION['last_access'])){
      unset($_SESSION['business_id']);
    }
    parent::logined();
    //网站标题 关键字 描述
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->assign('cat_info',$cat_info);
    if($cat_info['title']){
      $this->site_title = $cat_info['title'];
    }else{
      $this->site_title = $this->site_info['title'];
    }
    if($cat_info['keywords']){
      $this->site_keywords = $cat_info['keywords'];
    }else{
      $this->site_keywords = $this->site_info['keyword'];
    }
    if($cat_info['cat_desc']){
      $this->site_description = $cat_info['cat_desc'];
    }else{
      $this->site_description = $this->site_info['description'];
    }

    // 默认首字母
    $alphabet = $_GET['alphabet'] ? $_GET['alphabet'] : 'A';
    // 查询首字母
    $alphabet_list = M('region_province')->order('alphabet asc')->group('alphabet')->select();
    $this->alphabet_list = $alphabet_list;

    // 查询省份与市列表
    $province_list = M('region_province')->where('alphabet="'.$alphabet.'"')->order('id asc')->select();
    foreach($province_list as $key => $value){
      $province_list[$key]['city_list'] = M('region_city')->where('province_id='.$value['province_id'])->order('id asc')->select();
    }
    $this->province_list = $province_list;

    // 重点区域
    // 查询衣柜区域
    $emphasis_1 = M('dealer_emphasis')->where('type = 1')->find();
    $province_1 = array_filter(explode(',', $emphasis_1['province']));
    $city_1 = array_filter(explode(',', $emphasis_1['city']));
    $district_1 = array_filter(explode(',', $$emphasis_1['district']));
    $town_1 = array_filter(explode(',', $emphasis_1['town']));
    if($province_1){
      foreach ($province_1 as $key => $value) {
        $province_list_1[$key]['province_id'] = $value;
        $province_list_1[$key]['province_name'] = M('region_province')->where('province_id='.$value)->getField('province_name');
      }
    }
    if($city_1){
      foreach ($city_1 as $key => $value) {
        $city_list_1[$key]['city_id'] = $value;
        $city_list_1[$key]['city_name'] = M('region_city')->where('city_id='.$value)->getField('city_name');
      }
    }
    if($district_1){
      foreach ($district_1 as $key => $value) {
        $district_list_1[$key]['district_id'] = $value;
        $district_list_1[$key]['district_name'] = M('region_country')->where('country_id='.$value)->getField('country_name');
      }
    }
    if($town_1){
      foreach ($town_1 as $key => $value) {
        $town_list_1[$key]['town_id'] = $value;
        $town_list_1[$key]['town_name'] = M('region_town')->where('town_id='.$value)->getField('town_name');
      }
    }
    // 查询橱柜区域
    $emphasis_2 = M('dealer_emphasis')->where('type = 2')->find();
    $province_2 = array_filter(explode(',', $emphasis_2['province']));
    $city_2 = array_filter(explode(',', $emphasis_2['city']));
    $district_2 = array_filter(explode(',', $$emphasis_2['district']));
    $town_2 = array_filter(explode(',', $emphasis_2['town']));
    if($province_2){
      foreach ($province_2 as $key => $value) {
        $province_list_2[$key]['province_id'] = $value;
        $province_list_2[$key]['province_name'] = M('region_province')->where('province_id='.$value)->getField('province_name');
      }
    }
    if($city_2){
      foreach ($city_2 as $key => $value) {
        $city_list_2[$key]['city_id'] = $value;
        $city_list_2[$key]['city_name'] = M('region_city')->where('city_id='.$value)->getField('city_name');
      }
    }
    if($district_2){
      foreach ($district_2 as $key => $value) {
        $district_list_2[$key]['district_id'] = $value;
        $district_list_2[$key]['district_name'] = M('region_country')->where('country_id='.$value)->getField('country_name');
      }
    }
    if($town_2){
      foreach ($town_2 as $key => $value) {
        $town_list_2[$key]['town_id'] = $value;
        $town_list_2[$key]['town_name'] = M('region_town')->where('town_id='.$value)->getField('town_name');
      }
    }
    // 查询衣柜+橱柜区域
    $emphasis_3 = M('dealer_emphasis')->where('type = 3')->find();
    $province_3 = array_filter(explode(',', $emphasis_3['province']));
    $city_3 = array_filter(explode(',', $emphasis_3['city']));
    $district_3 = array_filter(explode(',', $emphasis_3['district']));
    $town_3 = array_filter(explode(',', $emphasis_3['town']));
    if($province_3){
      foreach ($province_3 as $key => $value) {
        $province_list_3[$key]['province_id'] = $value;
        $province_list_3[$key]['province_name'] = M('region_province')->where('province_id='.$value)->getField('province_name');
      }
    }
    if($city_3){
      foreach ($city_3 as $key => $value) {
        $city_list_3[$key]['city_id'] = $value;
        $city_list_3[$key]['city_name'] = M('region_city')->where('city_id='.$value)->getField('city_name');
      }
    }
    if($district_3){
      foreach ($district_3 as $key => $value) {
        $district_list_3[$key]['district_id'] = $value;
        $district_list_3[$key]['district_name'] = M('region_country')->where('country_id='.$value)->getField('country_name');
      }
    }
    if($town_3){
      foreach ($town_3 as $key => $value) {
        $town_list_3[$key]['town_id'] = $value;
        $town_list_3[$key]['town_name'] = M('region_town')->where('town_id='.$value)->getField('town_name');
      }
    }

    $this->province_1 = $province_list_1;
    $this->province_2 = $province_list_2;
    $this->province_3 = $province_list_3;
    $this->city_1 = $city_list_1;
    $this->city_2 = $city_list_2;
    $this->city_3 = $city_list_3;
    $this->district_1 = $district_list_1;
    $this->district_2 = $district_list_2;
    $this->district_3 = $district_list_3;
    $this->town_1 = $town_list_1;
    $this->town_2 = $town_list_2;
    $this->town_3 = $town_list_3;

    $this->alphabet = $alphabet;
    $this->display();
  }

  public function city_detail($cat_id=61){
    //网站标题 关键字 描述
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->assign('cat_info',$cat_info);
    if($cat_info['title']){
      $this->site_title = $cat_info['title'];
    }else{
      $this->site_title = $this->site_info['title'];
    }
    if($cat_info['keywords']){
      $this->site_keywords = $cat_info['keywords'];
    }else{
      $this->site_keywords = $this->site_info['keyword'];
    }
    if($cat_info['cat_desc']){
      $this->site_description = $cat_info['cat_desc'];
    }else{
      $this->site_description = $this->site_info['description'];
    }

    $province_id = $_GET['province_id'] ? $_GET['province_id'] : false;
    $city_id = $_GET['city_id'] ? $_GET['city_id'] : false;
    $district_id = $_GET['district_id'] ? $_GET['district_id'] : false;
    $store_type = $_GET['store_type'] ? $_GET['store_type'] : 1;
    if($district_id){
      $select = 'district';
    }else if($city_id){
      $select = 'city';
    }else{
      $select = 'province';
    }

    if($select == 'district'){
      $district_info = M('region_country')->where('country_id='.$district_id)->find();

      $town_list = M('region_town')->where('country_id='.$district_id)->select();
      foreach ($town_list as $key => $value) {
        $data_list = M('dealer_data')->where('find_in_set("'.$value['town_id'].'", town) AND store_type='.$store_type)->select();
        if($data_list){
          foreach ($data_list as $u => $d) {
            if($d['schedule'] == 1 || $d['schedule'] == 3 || $d['schedule'] == 4 || $d['schedule'] == 6){
              $town_list[$key]['status'] = '1';
              continue;
            }
            if($d['schedule'] == 2){
              $town_list[$key]['status'] = '2';
              continue;
            }
            if($d['schedule'] == 5){
              $town_list[$key]['status'] = '3';
              continue;
            }
          }
        }else{
          $town_list[$key]['status'] = '1';
        }
      }

      $city_info = M('region_city')->where('city_id='.$district_info['city_id'])->find();
      $province_info = M('region_province')->where('province_id='.$city_info['province_id'])->find();
      $this->u_here = '<a href="'.U('Dealer/index').'">首页</a> &nbsp; > &nbsp; <a href="'.U('Dealer/city_detail', array('province_id'=>$province_info['province_id'])).'">'.$province_info['province_name']."</a> &nbsp; > &nbsp; <a href='".U('Dealer/city_detail', array('city_id'=>$city_info['city_id']))."'>".$city_info['city_name']."</a> &nbsp; > &nbsp; <a href='".U('Dealer/detail', array('district_id'=>$district_id))."'><em>".$district_info['country_name']."</em></a>";

      $this->town_list = $town_list;
      $this->district_id = $district_id;
      $this->district_info = $district_info;
    }else if($select == 'city'){
      $city_info = M('region_city')->where('city_id='.$city_id)->find();

      $district_list = M('region_country')->where('city_id='.$city_id)->select();
      foreach ($district_list as $key => $value) {
        $data_list = M('dealer_data')->where('find_in_set("'.$value['country_id'].'", district) AND store_type='.$store_type)->select();
        if($data_list){
          foreach ($data_list as $u => $d) {
            if($d['schedule'] == 1 || $d['schedule'] == 3 || $d['schedule'] == 4 || $d['schedule'] == 6){
              $district_list[$key]['status'] = '1';
              continue;
            }
            if($d['schedule'] == 2){
              $district_list[$key]['status'] = '2';
              continue;
            }
            if($d['schedule'] == 5){
              $district_list[$key]['status'] = '3';
              continue;
            }
          }
        }else{
          $district_list[$key]['status'] = '1';
        }
      }

      $province_info = M('region_province')->where('province_id='.$city_info['province_id'])->find();
      $this->u_here = '<a href="'.U('Dealer/index').'">首页</a> &nbsp; > &nbsp; <a href="'.U('Dealer/city_detail', array('province_id'=>$province_info['province_id'])).'">'.$province_info['province_name']."</a> &nbsp; > &nbsp; <a href='".U('Dealer/city_detail', array('city_id'=>$city_info['city_id']))."'><em>".$city_info['city_name']."</em></a>";

      $this->district_list = $district_list;
      $this->city_id = $city_id;
      $this->city_info = $city_info;
    }else if($select == 'province'){
      $province_info = M('region_province')->where('province_id='.$province_id)->find();

      $city_list = M('region_city')->where('province_id='.$province_id)->select();
      foreach($city_list as $key => $value){
        $data_list = M('dealer_data')->where('find_in_set("'.$value['city_id'].'", city) AND store_type='.$store_type)->select();
        if($data_list){
          foreach ($data_list as $u => $d) {
            if($d['schedule'] == 1 || $d['schedule'] == 3 || $d['schedule'] == 4 || $d['schedule'] == 6){
              $city_list[$key]['status'] = '1';
              continue;
            }
            if($d['schedule'] == 2){
              $city_list[$key]['status'] = '2';
              continue;
            }
            if($d['schedule'] == 5){
              $city_list[$key]['status'] = '3';
              continue;
            }
          }
        }else{
          $city_list[$key]['status'] = '1';
        }
      }

      $this->u_here = '<a href="'.U('Dealer/index').'">首页</a> &nbsp; > &nbsp; <a href="'.U('Dealer/city_detail', array('province_id'=>$province_info['province_id'])).'"><em>'.$province_info['province_name']."</em></a>";

      $this->city_list = $city_list;
      $this->province_id = $province_id;
      $this->province_info = $province_info;
    }
    $this->select = $select;
    $this->store_type = $store_type;
    $this->display();
  }

  public function detail($cat_id=61){
    //网站标题 关键字 描述
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->assign('cat_info',$cat_info);
    if($cat_info['title']){
      $this->site_title = $cat_info['title'];
    }else{
      $this->site_title = $this->site_info['title'];
    }
    if($cat_info['keywords']){
      $this->site_keywords = $cat_info['keywords'];
    }else{
      $this->site_keywords = $this->site_info['keyword'];
    }
    if($cat_info['cat_desc']){
      $this->site_description = $cat_info['cat_desc'];
    }else{
      $this->site_description = $this->site_info['description'];
    }

    $town_id = empty($_GET['town_id']) ? false : $_GET['town_id'];
    $district_id = empty($_GET['district_id']) ? false : $_GET['district_id'];
    $store_type = empty($_GET['store_type']) ? 1 : intval($_GET['store_type']);
    if(!$town_id && !$district_id){
      $this->error('参数错误', U('Dealer/index'));
    }
    if($town_id){
      $town_info = M('region_town')->where('town_id='.$town_id)->find();
      $data_list = M('dealer_data')->where('find_in_set("'.$town_id.'", town) AND store_type='.$store_type)->select();
      foreach($data_list as $key => $value){

        $data_list[$key]['district_name'] = M('region_country')->where('country_id='.$town_info['country_id'])->getField('country_name');
        $data_list[$key]['town_name'] = $town_info['town_name'];
        // $data_list[$key]['principal_name'] = M('dealer_principal')->where('id='.$value['principal_id'])->getField('p_name');

        if($value['schedule'] == 1){
          $data_list[$key]['schedule_name'] = '已下厂';
        }else if($value['schedule'] == 2){
          $data_list[$key]['schedule_name'] = '正在设计平面图';
        }else if($value['schedule'] == 3){
          $data_list[$key]['schedule_name'] = '正在设计施工图';
        }else if($value['schedule'] == 4){
          $data_list[$key]['schedule_name'] = '正在设计样柜图';
        }else if($value['schedule'] == 5){
          $data_list[$key]['schedule_name'] = '待客户确认平面图';
        }else if($value['schedule'] == 6){
          $data_list[$key]['schedule_name'] = '待客户确认施工图';
        }else if($value['schedule'] == 7){
          $data_list[$key]['schedule_name'] = '待客户确认样柜图';
        }else if($value['schedule'] == 8){
          $data_list[$key]['schedule_name'] = '待审核图纸';
        }else if($value['schedule'] == 9){
          $data_list[$key]['schedule_name'] = '待审核报价';
        }else if($value['schedule'] == 10){
          $data_list[$key]['schedule_name'] = '正在计料';
        }else if($value['schedule'] == 11){
          $data_list[$key]['schedule_name'] = '待优化';
        }else if($value['schedule'] == 12){
          $data_list[$key]['schedule_name'] = '已退出';
        }else if($value['schedule'] == 13){
          $data_list[$key]['schedule_name'] = '已开店';
        }else if($value['schedule'] == 14){
          $data_list[$key]['schedule_name'] = '未回传图纸';
        }
      }

      $district_info = M('region_country')->where('country_id='.$town_info['country_id'])->find();
      $city_info = M('region_city')->where('city_id='.$district_info['city_id'])->find();
      $province_info = M('region_province')->where('province_id='.$city_info['province_id'])->find();
      $this->u_here = '<a href="'.U('Dealer/index').'">首页</a> &nbsp; > &nbsp; <a href="'.U('Dealer/city_detail', array('province_id'=>$province_info['province_id'])).'">'.$province_info['province_name']."</a> &nbsp; > &nbsp; <a href='".U('Dealer/city_detail', array('city_id'=>$city_info['city_id']))."'>".$city_info['city_name']."</a> &nbsp; > &nbsp; <a href='".U('Dealer/detail', array('district_id'=>$district_info['country_id']))."'>".$district_info['country_name']."</a>";

      $this->district_info = $district_info;
      $this->town_id = $town_id;
      $this->town_info = $town_info;
    }else if($district_id){
      $district_info = M('region_country')->where('country_id='.$district_id)->find();
// echo '<pre>';print_r($district_info);echo '</pre>';
      $data_list = M('dealer_data')->where('find_in_set("'.$district_id.'", district) AND store_type='.$store_type)->select();
      // echo '<pre>';print_r($data_list);echo '</pre>';
      foreach($data_list as $key => $value){
        $town = array_filter(explode(',', $value['town']));
        foreach($town as $v){
          $sub_town = M('region_town')->where('town_id='.$v)->find();
          if($sub_town['country_id'] == $district_id){
            $data_list[$key]['town_name'] = $sub_town['town_name'];
            continue;
          }
        }

        $data_list[$key]['district_name'] = $district_info['country_name'];
        // $data_list[$key]['principal_name'] = M('dealer_principal')->where('id='.$value['principal_id'])->getField('p_name');

        if($value['schedule'] == 1){
          $data_list[$key]['schedule_name'] = '已下厂';
        }else if($value['schedule'] == 2){
          $data_list[$key]['schedule_name'] = '正在设计平面图';
        }else if($value['schedule'] == 3){
          $data_list[$key]['schedule_name'] = '正在设计施工图';
        }else if($value['schedule'] == 4){
          $data_list[$key]['schedule_name'] = '正在设计样柜图';
        }else if($value['schedule'] == 5){
          $data_list[$key]['schedule_name'] = '待客户确认平面图';
        }else if($value['schedule'] == 6){
          $data_list[$key]['schedule_name'] = '待客户确认施工图';
        }else if($value['schedule'] == 7){
          $data_list[$key]['schedule_name'] = '待客户确认样柜图';
        }else if($value['schedule'] == 8){
          $data_list[$key]['schedule_name'] = '待审核图纸';
        }else if($value['schedule'] == 9){
          $data_list[$key]['schedule_name'] = '待审核报价';
        }else if($value['schedule'] == 10){
          $data_list[$key]['schedule_name'] = '正在计料';
        }else if($value['schedule'] == 11){
          $data_list[$key]['schedule_name'] = '待优化';
        }else if($value['schedule'] == 12){
          $data_list[$key]['schedule_name'] = '已退出';
        }else if($value['schedule'] == 13){
          $data_list[$key]['schedule_name'] = '已开店';
        }else if($value['schedule'] == 14){
          $data_list[$key]['schedule_name'] = '未回传图纸';
        }
      }

      $city_info = M('region_city')->where('city_id='.$district_info['city_id'])->find();
      $province_info = M('region_province')->where('province_id='.$city_info['province_id'])->find();
      $this->u_here = '<a href="'.U('Dealer/index').'">首页</a> &nbsp; > &nbsp; <a href="'.U('Dealer/city_detail', array('province_id'=>$province_info['province_id'])).'">'.$province_info['province_name']."</a> &nbsp; > &nbsp; <a href='".U('Dealer/city_detail', array('city_id'=>$city_info['city_id']))."'>".$city_info['city_name']."</a> &nbsp; > &nbsp; <a href='".U('Dealer/detail', array('district_id'=>$district_info['country_id']))."'><em>".$district_info['country_name']."</em></a>";

      $this->district_id = $district_id;
      $this->town_list = M('region_town')->where('country_id='.$district_id)->select();

      $this->district_info = $district_info;
    }
    $this->shopname=$data_list['0']['shopname'];
    $this->store_type = $store_type;
    $this->data_list = $data_list;
    $this->display();
  }

  public function search($cat_id=61){
    //网站标题 关键字 描述
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->assign('cat_info',$cat_info);
    if($cat_info['title']){
      $this->site_title = $cat_info['title'];
    }else{
      $this->site_title = $this->site_info['title'];
    }
    if($cat_info['keywords']){
      $this->site_keywords = $cat_info['keywords'];
    }else{
      $this->site_keywords = $this->site_info['keyword'];
    }
    if($cat_info['cat_desc']){
      $this->site_description = $cat_info['cat_desc'];
    }else{
      $this->site_description = $this->site_info['description'];
    }

    $keyword = htmlspecialchars($_REQUEST['keyword']);
    $store_type = empty($_GET['store_type']) ? 1 : intval($_GET['store_type']);

    $province = M('region_province')->where('province_name = "'.$keyword.'"')->find();
    if($province){
      @header('Location:'.U('Dealer/city_detail', array('province_id'=>$province['province_id'])));
      exit();
    }
    $city = M('region_city')->where('city_name = "'.$keyword.'"')->find();
    if($city){
      @header('Location:'.U('Dealer/city_detail', array('city_id'=>$city['city_id'])));
      exit();
    }
    $district = M('region_country')->where('country_name = "'.$keyword.'"')->find();
    if($district){
      @header('Location:'.U('Dealer/detail', array('district_id'=>$district['country_id'])));
      exit();
    }
    $town = M('region_town')->where('town_name = "'.$keyword.'"')->find();
    if($town){
      @header('Location:'.U('Dealer/detail', array('town_id'=>$town['town_id'])));
      exit();
    }
    $this->keyword = $keyword;
    $this->display();
  }
}