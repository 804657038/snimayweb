<?php
class AboutAction extends CommonAction {
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

    //左边小广告图
    $this->ads1 = M('ads')->where('ads_id=31')->find();
  }

  public function index($cat_id=2) {
    //网站标题 关键字 描述
    
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->hover = 2;
    //$this->site_title = $cat_info['cat_name'] . '_' .$this->site_info['title'];
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

    $this->about_jj = M('article')->where('article_id = 1')->find();
    $this->about_ry = M('article')->where('article_id = 2')->find();
    $this->about_sm = M('article')->where('article_id = 3')->find();
    $this->about_pp = M('article')->where('article_id = 4')->find();

    $honor_list = array();
    $honor_cat = M('articlecat')->where('parent_id=3')->order('cat_id desc')->select();
    foreach ($honor_cat as $key => $value) {
      $honor_list[] =  M('article')->where('cat_id='.$value['cat_id'])->order('sort_order desc , add_time asc')->limit(6)->select();
    }
    $this->honor_list=$honor_list;
    $this->honor_pic = M('ads')->where('cat_id=5')->order('sort_order asc , add_time desc')->select();

    $limit      = $this->limit? $this->limit : 10;

    import('ORG.Util.Page2');// 导入分页类
    $count      = M('article')->where('cat_id=4')->count();// 查询满足要求的总记录数 $map表示查询条件
    $Page       = new Page($count,$limit);// 实例化分页类 传入总记录数
    $Page->setConfig('theme',$this->pageTheme);
    $this->assign('page',$Page);

    $this->recruit_list = M('article')->where('cat_id=4')->order('sort_order asc , add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->province = M('region')->where('parent_id=1')->order('region_id asc')->select();
    //banner图
    $this->ban = M('ads')->find(36);
    $this->title = '关于诗尼曼';
    if($cat_id == 3){
      $this->display('honor');
    }elseif($cat_id == 4){
      $this->display('recruit');
    }elseif($cat_id == 14){
      $this->display('contact');
    }elseif($cat_id == 5){
      $this->display('join');
    }else{
      $this->display();
    }
  }

  public function investment($cat_id=20) {
    //网站标题 关键字 描述
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->hover = 5;
    //$this->site_title = $cat_info['cat_name'] . '_' .$this->site_info['title'];
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
    $this->arti_1 = M('article')->where('article_id = 22')->find();
    $this->arti_2 = M('article')->where('article_id = 23')->find();
    $this->arti_3 = M('article')->where('article_id = 24')->find();
    $this->arti_4 = M('article')->where('article_id = 25')->find();

    $this->ys_list = M('article')->where('cat_id=22')->order('sort_order asc , article_id asc')->select();
    $this->join_list = M('article')->where('cat_id=23')->order('sort_order asc , article_id asc')->select();

    $bess_list = M('article')->where('cat_id=24')->order('sort_order asc , article_id asc')->select();
    foreach ($bess_list as $key => $value) {
      $bess_list[$key]['list'] = M('articleimg')->where("article_id=".$value['article_id'])->order('sort_order asc,id desc')->select();
    }
    $this->bess_list = $bess_list;
    //banner图
    $this->ban = M('ads')->find(37);
    $this->title = '招商加盟';
    $this->display();
  }

  //站点
  public function site(){
    $this->site_title ="站点地图-诗尼曼全屋定制";
    $this->display();
  }

  //获取地区列表
  public function get_location($id){
    $location_list = M('article')->where("province=$id")->select();
    foreach ($location_list as $key => $value) {
      echo "<div class='web-m3'><div class='w-t clearfix'><span>". $value['z_name'] ."</span><a href='###' class='btn'></a></div><div class='w-f'><p class='p1'>". $value['z_loca'] ."</p><p class='p2'>".$value['z_tel']."</p></div></div>";
    }
  }

  //获取地区列表
  public function get_location1($id){
    $location_list = M('article')->where("city=$id")->select();
    foreach ($location_list as $key => $value) {
      echo "<div class='web-m3'><div class='w-t clearfix'><span>". $value['z_name'] ."</span><a href='###' class='btn'></a></div><div class='w-f'><p class='p1'>". $value['z_loca'] ."</p><p class='p2'>".$value['z_tel']."</p></div></div>";
    }
  }

  //获取地区列表
  public function get_location2($key){
    $location_list = M('article')->where("cat_id=5 and z_name like '%$key%'")->select();
    foreach ($location_list as $key => $value) {
      echo "<div class='web-m3'><div class='w-t clearfix'><span>". $value['z_name'] ."</span><a href='###' class='btn'></a></div><div class='w-f'><p class='p1'>". $value['z_loca'] ."</p><p class='p2'>".$value['z_tel']."</p></div></div>";
    }
  }

  public function news() {
    $cat_id = $_GET['cat_id'];
    //网站标题 关键字 描述
    $cat_id = isset($cat_id) ? $cat_id : 16;
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    $this->hover = 3;
    //$this->site_title = $cat_info['cat_name'] . '_' .$this->site_info['title'];
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
    $t = time();
    $where = "is_open=1 and add_time<=".$t;
    if($cat_id){
      $sub_cat_ids = $this->sub_cat_ids($cat_id,'articlecat');
      $where .= " and cat_id in ($sub_cat_ids)";
    }
    $keyword    = $this->_get('keyword');
    //$keyword    = iconv('gbk', 'utf-8', $keyword);
  
    if($keyword){
      $where .= " and FIND_IN_SET('$keyword',tip)";
    }else{
      if($cat_id){
        $sub_cat_ids = $this->sub_cat_ids($cat_id,'articlecat');
        $where .= " and cat_id in ($sub_cat_ids)";
      }
    }
    
    $limit      = $this->limit? $this->limit : 5;
    //print_r($where);exit;
    import('ORG.Util.Page2');// 导入分页类
    $count      = M('article')->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
    $Page       = new Page($count,$limit);// 实例化分页类 传入总记录数
    $Page->setConfig('theme',$this->pageTheme);
    $this->assign('page',$Page);

    //banner图
    $this->ban = M('ads')->find(35);
    $this->article_list = M('article')->where($where)->order(' is_top desc,sort_order asc , add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    
    $this->assign('totalPage',ceil($count/$limit));
    $this->title = '新闻中心';
    if($cat_id == 56 || $cat_id == 58 || $cat_id == 59 || $cat_id == 60){
      if($cat_id == 56){
        $this->cat_id = 58;
      }
      $this->sub_nav = M('articlecat')->where('parent_id=56')->select();
      $this->display('video');
    }else{
      $this->display();
    }
  }

  public function ajax_video(){
    $art_id = $_POST['art_id'];
    if(!$art_id){
      die(json_encode('参数错误'));
    }

    $art_info = M('article')->where('article_id='.$art_id)->find();

    if(empty($art_info['video'])){
      die(json_encode('暂无视频，待更新！'));
    }else{
      if(strstr($art_info['video'], '<iframe')){
        $str = $art_info['video'];
        $preg = '/<iframe.*?src=[\"|\']?(.*?)[\"|\']?\s.*?<\/iframe>/i';
        preg_match_all($preg,$str,$img_array);
        $src = $img_array[1][0];

        die(json_encode("<iframe height=100% width=100% src='".$src."' frameborder=0 'allowfullscreen'></iframe>"));
      }else{
        die(json_encode('<video src="/Video/'.$art_info['video'].'" width="100%" height="100%" controls="controls"> 您的浏览器不支持 video 标签。 </video>'));
      }
    }
  }

  public function detail(){
    $article_id = $_GET['id']+0;
    $cat_id     = $_GET['cat_id']+0;
    $detail = M('article')->where("article_id=$article_id and is_open=1")->find();
    $this->hover = 3;
    //面包屑导航
    $this->ur_here = $this->ur_here . ' > ' . $detail['title'];

    //网站标题 关键字 描述
    $this->site_title = $detail['title'] . '-诗尼曼全屋定制';

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
    $detail['tip'] = explode(',', $detail['tip']);
    //上一篇 
    $front=M('article')->where("article_id<".$article_id. " and cat_id=".$cat_id)->order('article_id desc')->limit('1')->find(); 
    
    $this->assign('front',$front); 
    //下一篇 
    $after=M('article')->where("article_id>".$article_id. " and cat_id=".$cat_id)->order('article_id asc')->limit('1')->find(); 
    
    $this->assign('after',$after);

    //banner图
    $this->ban = M('ads')->find(35);
    $this->title = '新闻中心';
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
}