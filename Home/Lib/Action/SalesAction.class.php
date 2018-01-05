<?php
class SalesAction extends CommonAction {
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
    //网站标题 关键字 描述
    
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->hover = 4;
    //$this->site_title = $cat_info['cat_name'] . '_' .$this->site_info['title'];
    //$this->site_title = $this->site_info['title'];
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

    if($cat_info['description']){
        $this->site_description = $cat_info['description'];
    }else{
        $this->site_description = $this->site_info['description'];
    }

    $where = "is_open=1";
    if($cat_id){
        $sub_cat_ids = $this->sub_cat_ids($cat_id,'articlecat');
        $where .= " and cat_id in ($sub_cat_ids)";
    }
    $keyword    = $this->_get('keyword');
    if($keyword)  $where .= " and title like '%$keyword%'"; 
    $limit      = $this->limit? $this->limit : 9;

    import('ORG.Util.Page2');// 导入分页类
    $count      = M('article')->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
    $Page       = new Page($count,$limit);// 实例化分页类 传入总记录数
    $Page->setConfig('theme',$this->pageTheme);
    $this->assign('page',$Page);

    $this->sale_list = M('article')->where($where)->order('sort_order asc , add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
  
    //banner图
    $this->ban = M('ads')->find(8);

    $this->display();
  }
  //诗尼曼直播厅
  public function zhibo(){
    $this->site_title ="诗尼曼直播-诗尼曼全屋定制";
    $this->ban = M('ads')->find(6);
    $this->display();
  }
  public function detail(){
    $article_id = $_GET['id']+0;
    $cat_id     = $_GET['cat_id']+0;
    $detail = M('article')->where("article_id=$article_id and is_open=1")->find();
    $this->hover = 4;
    //面包屑导航
    $this->ur_here = $this->ur_here . ' > ' . $detail['title'];

    //网站标题 关键字 描述
    //$this->site_title = $detail['title'] . '_' . $this->article_site_title . '_' . $this->site_info['title'];
    if($detail['web_title']){
      $this->site_title = $detail['web_title'];
    }else{
      $this->site_title = $this->site_info['title'];
    }
    if($detail['keywords']){
      $this->site_keywords = $detail['keywords'];
    }else{
      $this->site_keywords = $this->site_info['keyword'];
    }

    if($detail['description']){
      $this->site_description = $detail['description'];
    }else{
      $this->site_description = $this->site_info['description'];
    }

    //上一篇 
    $front=M('article')->where("article_id<".$article_id. " and cat_id=".$cat_id)->order('article_id desc')->limit('1')->find(); 
    
    $this->assign('front',$front); 
    //下一篇 
    $after=M('article')->where("article_id>".$article_id. " and cat_id=".$cat_id)->order('article_id asc')->limit('1')->find(); 
    
    $this->assign('after',$after);

    //banner图
    $this->ban = M('ads')->find(8);
    
    if($detail){
      $detail['images'] = M('articleimg')->where("article_id=".$detail['article_id'])->order('sort_order asc,id desc')->select();
      $this->assign('detail',$detail);

      $cat_info = M('articlecat')->where(array('cat_id'=>$detail['cat_id']))->find();
      $this->assign('cat_info',$cat_info);

      M('article')->where("article_id=".$detail['article_id'])->setInc('click_sum');
    }else{
      $this->error('错误：你的访问的产品不存在或未开放！');
    }

    $this->display();
  }

  public function mxj(){
    //导航索引ID
    $this->nid = 1;
    $cat_id = 50;

    //网站标题 关键字 描述
    $cat_info = M('articlecat')->where('cat_id=50')->find();
    $this->site_title       = $cat_info['title'] ? $cat_info['title'] : $this->site_info['title'];
    $this->site_keywords    = $cat_info['keyword'] ? $cat_info['keyword'] : $this->site_info['keyword'];
    $this->site_description = $cat_info['description'] ? $cat_info['description'] : $this->site_info['description'];

    //视频
    $this->video = M('article')->where('cat_id=51')->order('sort_order ASC, add_time DESC')->select();

    //明星阵容
    $this->start = M('ads')->where('cat_id=15')->order('sort_order ASC, add_time DESC')->limit(10)->select();

    //明星品质
    $this->start_quality = M('ads')->where('cat_id=16')->order('sort_order ASC, add_time DESC')->limit(10)->select();

    //明星福利
    $start_welfare = M('articlecat')->where('parent_id=52')->order('sort_order ASC')->limit(3)->select();
    foreach ($start_welfare as $key => $value) {
      $start_welfare[$key]['pic_list'] = M('ads')->where('cat_id=17 and article_id='.$value['cat_id'])->select();
    }
    $this->qiang1 = $start_welfare[0];
    $this->qiang2 = $start_welfare[1];
    $this->qiang3 = $start_welfare[2];

    //明星直播
    $this->start_live = M('ads')->where('cat_id=18')->find();

    $this->assign('province', $this->get_regions(1, 0));

    $this->district_atr = M('article')->where('cat_id=57')->order('sort_order ASC, add_time DESC')->limit(6)->select();
    $this->assign('tod', $tod);

    $this->display();
  }

  public  function act_message(){
    $data['phone']=$_POST['tel'];
    $data['name']=htmlspecialchars($_POST['name']);
    $data['province']=$_POST['province'];
    $data['city']=$_POST['city'];
    $data['district']=$_POST['district'];

    if(!is_phone($data['phone'])){
      $this->error('手机号码格式不正确');  
    }
    
    $data['type']=5;
    $data['add_time']=time();
    $data['real_ip']=get_ip();
    
    $add=M('guestbook')->add($data);
    if($add){
      $this->success('您的留言提交成功');
    }else{
      $this->error('留言提交失败');  
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
          $html .= '<li>'.$value['region_name'].'<input type="radio" name="city" style="display: none;" value="'.$value['region_id'].'"></li>';
        }
      case 'district':
        $district_list = $this->get_regions(3, $city);
        foreach ($district_list as $key => $value) {
          $html .= '<li>'.$value['region_name'].'<input type="radio" name="district" style="display: none;" value="'.$value['region_id'].'"></li>';
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