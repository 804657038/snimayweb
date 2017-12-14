<?php
class IndexAction extends CommonAction {
	public function __construct() {
		parent::__construct();
	}
    public function index() {
        //轮播图
        $ads = M('ads')->where('cat_id=2')->order('sort_order asc')->select();
        $this->assign('ads',$ads);
        //业务中心
        $sores = M('ads')->where('cat_id=25')->order('sort_order asc')->select();
        foreach($sores as $key=>$val){
            $soreArr['k'.$key] = $val;
        }
        $this->assign('soreArr',$soreArr);
        //资讯中心
        $zx = M('ads')->where('cat_id=26')->order('sort_order asc')->select();
        foreach($zx as $k=>$v){
            $zxArr['k'.$k] = $v;
        }
        $this->assign('zxArr',$zxArr);
        $this->assign('catid',1);
        $this->display(':index');
    }
    
}
