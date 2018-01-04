<?php
class QueryAction extends CommonAction {
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
        $this->ban = M('ads')->find(36);
        //左边小广告图
        $this->ads1 = M('ads')->where('ads_id=31')->find();
    }

    public function index() {
        //网站标题 关键字 描述
        $this->title = '订单查询';   
        $this->display();
    }
    public function OrderList(){
        $this->title = '订单列表';  
        $this->display();
    }
    public function OrderDetail(){
        $this->title = '订单详情';  
        $this->display();
    }
    
}