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

    $this->about_jj = M('article')->where('article_id = 1')->find();
    $this->about_ry = M('article')->where('article_id = 2')->find();
    $this->about_sm = M('article')->where('article_id = 3')->find();
    $this->about_pp = M('article')->where('article_id = 4')->find();

    $honor_list = array();
    $honor_cat = M('articlecat')->where('parent_id=3')->order('cat_id desc')->select();
    foreach ($honor_cat as $key => $value) {
      $honor_list[] =  M('article')->where('cat_id='.$value['cat_id'])->order('sort_order desc , add_time asc')->limit(5)->select();
    }
    $this->honor_list=$honor_list;
    $this->honor_pic = M('ads')->where('cat_id=5')->order('sort_order asc , add_time desc')->select();

    $limit      = $this->limit? $this->limit : 10;

    import('ORG.Util.Page2');// 导入分页类
    $count      = M('article')->where('cat_id=4')->count();// 查询满足要求的总记录数 $map表示查询条件
    $Page       = new Page($count,$limit);// 实例化分页类 传入总记录数
    $Page->setConfig('theme',$this->pageTheme);
    $this->assign('page',$Page);

    $recruit_list = M('article')->where('cat_id=4')->order('sort_order asc , add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    foreach ($recruit_list as $key => $value) {
      $recruit_list[$key]['add_time'] = time();
    }
    $this->recruit_list = $recruit_list;
    $this->province = M('region')->where('parent_id=1')->order('region_id asc')->select();
    //banner图
    $this->ban = M('ads')->find(6);

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

    if($cat_info['cat_desc']){
      $this->site_description = $cat_info['cat_desc'];
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
    $this->ban = M('ads')->find(10);
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
      echo "<li class='l2'><span>". $value['z_name'] ."</span><i>". $value['z_loca'] ."</i><em>".$value['z_tel']."</em></li>";
    }
  }

  //获取地区列表
  public function get_location1($id){
    $location_list = M('article')->where("city=$id")->select();
    foreach ($location_list as $key => $value) {
      echo "<li class='l2'><span>". $value['z_name'] ."</span><i>". $value['z_loca'] ."</i><em>".$value['z_tel']."</em></li>";
    }
  }

  //获取地区列表
  public function get_location2($key){
    $location_list = M('article')->where("cat_id=5 and z_name like '%$key%'")->select();
    
    foreach ($location_list as $key => $value) {
      echo "<li class='l2'><span>". $value['z_name'] ."</span><i>". $value['z_loca'] ."</i><em>".$value['z_tel']."</em></li>";
    }
  }

  public function news() {
    $cat_id = $_GET['cat_id'];
    //网站标题 关键字 描述

    $cat_id = isset($cat_id) ? $cat_id : 16;
    $cat_info = M('articlecat')->where(array('cat_id'=>$cat_id))->find();
    if($cat_info['cat_en_name']=="press"){
      $tpm="press";
      $this->limit=6;
    }else if($cat_id == 56 || $cat_id == 58 || $cat_id == 59 || $cat_id == 60){
      $tpm = 'video';
      $this->limit = 9;

      if($cat_id == 56){
        $cat_id = 58;
      }
      $this->sub_nav = M('articlecat')->where('parent_id=56')->select();
    }else{
      $tpm = "news";
    }

    $this->hover = 3;
    
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
    $t = time();
    $where = "is_open=1 and ".$t.">f_time";
 
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

    //$num=M('article')->count();
    $limit      = $this->limit? $this->limit : 5;

    import('ORG.Util.Page2');// 导入分页类
    $count      = M('article')->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
    $Page       = new Page($count,$limit);// 实例化分页类 传入总记录数
    $Page->setConfig('theme',$this->pageTheme);
    $this->assign('page',$Page);
    //print_r($count);
    //banner图
    $this->ban = M('ads')->find(7);

    $article_list = M('article')->where($where)->order(' is_top desc,sort_order asc , add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

    foreach ($article_list as $key => $value) {
      $article_list[$key]['tip_list'] = explode(',', $value['tip']);
    }
    $this->article_list=$article_list;

    $this->assign('totalPage',ceil($count/$limit));
    $this->cat_id = $cat_id;
    $this->display($tpm);
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
  	
  	$old = array(430,429,425,422,420,419,418,417,416,415,411,409,408,407,406,405,404,403,402,401,400,399,397,396,395,394,393,391,390,389,388,385,381,380,385,381,380,375,374,373,366,365,364,363,360,353,342,331,328,322,303,302,297,296,295,431,414,413,387,386,376,372,371,370,367,357,354,345,344,336,321,304,225,224,223,222,221,220,217,215,428,427,426,423,412,410,398,392,384,382,369,362,361,359,358,352,350,348,347,346,343,340,332,330,326,323,320,315,314,313,311,310,308,305,301,299,298,291,289,288,286,285,284,283,282,281,280,279,278,277,276,275,274,273,272,271,270,269,268,267,266,265,264,263,262,261,258,257,256,209,207,206,204,203,201,199,377,368,356,349,341,339,338,337,335,334,333,327,319,316,312,309,255,254,253,252,251,250,249,247,246,245,244,243,242,241,240,239,238,237,236,235,234,233,232,231,230,229,228,227,226,219,218,216,214,211);
    $new = array(792,793,794,86,84,797,835,836,837,838,839,840,841,842,845,846,847,848,849,851,852,853,854,855,858,859,861,862,863,864,865,866,868,869,870,871,872,894,895,902,903,904,907,908,909,911,912,913,914,915,917,913,918,803,804,805,806,807,808,106,813,104,814,815,816,817,818,819,822,823,824,825,826,828,829,830,831,832,919,920,921,922,923,924,925,926,111,928,933,934,935,936,938,939,940,941,942,943,944,945,946,950,951,952,953,954,955,956,957,958,959,960,961,962,963,964,965,966,969,970,971,972,973,974,975,976,977,978,979,980,981,982,983,983,984,988,989,990,991,992,993,994,995,996,997,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,1023,1024,1025,1026,1027,1031,1032,1033,1034,1035,843,1050,1051,1052,1053,1054,1055,1056,1057,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1071,1072,1073,1074,1075,1076,1077,1078,1079,1080,1086,1087,1088,1089,1090,1091,1092,1094,1095);

    $_k = array_search($_GET['id'], $old);
    if($_k!==false){
    	header("Location:/article/".$new[$_k].".html",true,301);
    }

    $article_id = $_GET['id']+0;
    $cat_id     = $_GET['cat_id']+0;
    $detail = M('article')->where("article_id=$article_id and is_open=1")->find();
    $this->hover = 3;
    $site_config = include WEB_ROOT . 'Common/systemConfig.php';
    //面包屑导航
    $this->ur_here = $this->ur_here . ' > ' . $detail['title'];

    //网站标题 关键字 描述
    $this->site_title = $detail['title'] . '-诗尼曼全屋定制';

    $article_link =$this->get_article_link();
    
    //遍历关键词库  
    foreach ($article_link as $k => $v) {  
      //查找第一次出现的关键词并替换加上对应的链接  
      $detail['content']= preg_replace('/'.$v['name'].'/','<a href="'.$v['link'].'" target="_blank">' . $v['name'] . '</a>',$detail['content'],1); 
    }  
    
    /*if($detail['web_title']){
      $this->site_title = $detail['web_title'];
    }else{
      $this->site_title = $this->site_info['title'];
    }*/
    if($detail['keywords']){
      $this->site_keywords = $detail['keywords'];
    }else{
      $this->site_keywords = $this->site_info['keyword'];
    }
    if($detail['descricat_descption']){
      $this->site_description = $detail['description'];
    }else{
      $this->site_description = $this->site_info['description'];
    }
    $detail['tip_list'] = explode(',', $detail['tip']);
    //上一篇 
    $front=M('article')->where("article_id<".$article_id. " and cat_id=".$detail['cat_id'])->order('article_id desc')->limit('1')->find(); 
    
    $this->assign('front',$front); 
    //下一篇 
    $after=M('article')->where("article_id>".$article_id. " and cat_id=".$detail['cat_id'])->order('article_id asc')->limit('1')->find(); 
    
    $this->assign('after',$after);

    //banner图
    $this->ban = M('ads')->find(7);
    
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

  //在线报刊专辑 
  public function press_album(){
    $condition['article_id']=intval($_GET['id']);
    if(!$condition['article_id'])$this->error('错误：你的访问的产品不存在或未开放！');
    $album=M('article')->where($condition)->find();
    if(!$album)$this->error('错误：你的访问的产品不存在或未开放！');
    $albums=unserialize($album['original_img']);
    $albums_num=count($albums);
    // 对数组值排序
    foreach ($albums as $key=>$value){
      $yeshu[$key] = $value['yeshu'];
    }
    array_multisort($yeshu,SORT_NUMERIC,SORT_ASC,$albums);
    for ($i=0; $i < $albums_num; $i++) { 
      $albums[$i]['wee']=date('w',strtotime($albums[$i]['addtime']));
      $albums[$i]['add_time']=strtotime($albums[$i]['addtime']);
    }

    // 赋值大写版页
    $Num=array(0=>'一',1=>'二',2=>'三',3=>'四',4=>'五',5=>'六',6=>'七',7=>'八',8=>'九',9=>'十',10=>'十一',11=>'十二',12=>'十三',13=>'十四',14=>'十五',15=>'十六',16=>'十七',17=>'十八',18=>'十九',19=>'二十');
    
    for ($k=0; $k < $albums_num ; $k++) { 
      $albums[$k]['ban']=$Num[$k];
    }
    $this->assign('albums',$albums);
    $this->assign('albums_num',$albums_num);
    $this->display();
  }  
}