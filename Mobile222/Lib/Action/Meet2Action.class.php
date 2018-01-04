<?php
class Meet2Action extends CommonAction {
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
    $num1 = M('Meeting')->where('id=2')->getField('num1');
    $feedback_count = M('Guestbook')->where('type=7')->count(); 
    $info['num1'] = $num1 + $feedback_count;
    $info['num2'] = M('Meeting')->where('id=2')->getField('num2');
    $info['url'] = M('Meeting')->where('id=2')->getField('url');
    $info['url2'] = M('Meeting')->where('id=2')->getField('url2');

    $this->assign("info", $info);
    $this->assign("signPackage",$signPackage);
    $this->display();
  }
  // public function success() {
  //   $info['url'] = M('Meeting')->where('id=1')->getField('url');
  //   $this->assign("info", $info);
  //   $this->display();
  // }

      //添加留言
    public function addMessage(){
        $data = M('guestbook')->create();

        foreach($data as $v){
            if(empty($v)){
                $this->error('请认真填写各项内容，再提交!');
                exit;
            }
        }
        //if (!is_email($data['email'])) $this->error('邮箱格式错误！');
        if (!is_phone($data['phone'])) $this->error('电话格式错误！');
        $data['add_time'] = time();
        if(M('guestbook')->add($data)){
            $this->success('您的留言已经提交，感谢您的反馈！');
        }else{
            $this->error('网络错误！');
        }
    }

  public function region_list(){
    $province = intval($_POST['province']) ? intval($_POST['province']) : 0;
    $city = intval($_POST['city']) ? intval($_POST['city']) : 0;
    $type = $_POST['type'];

    $html = '';
    switch ($type) {
      case 'city':
        $city_list = $this->get_regions(2, $province);
        foreach ($city_list as $key => $value) {
          $html .= '<option value="'.$value['region_id'].'">'.$value['region_name'].'</option>';
        }
      case 'district':
        $district_list = $this->get_regions(3, $city);
        foreach ($district_list as $key => $value) {
          $html .= '<option value="'.$value['region_id'].'">'.$value['region_name'].'</option>';
        }
        break;
    }

    $result = array(
      'html' => $html,
    );
    die(json_encode($result));
  }

  /**
   * 获得指定国家的所有省份
   *
   * @access      public
   * @param       int     country    国家的编号
   * @return      array
   */
  public function get_regions($type = 0, $parent = 0){
    if($parent){
      return M('region')->where("region_type = '$type' AND parent_id = '$parent'")->select();
    }else{
      return M('region')->where("region_type = '$type'")->select();
    }
  }
}