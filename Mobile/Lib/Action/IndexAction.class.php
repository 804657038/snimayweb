<?php
class IndexAction extends CommonAction {
	public function __construct() {
		parent::__construct();
	}

    public function index() {
        //网站标题 关键字 描述
        $this->site_title       = $this->site_info['title'];
        $this->site_keywords    = $this->site_info['keyword'];
        $this->site_description = $this->site_info['description'];

        /************************轮播图*****************************/
        $this->banner_list      = M('ads')->where('cat_id=9')->order('sort_order asc,ads_id asc')->select();

        //业务中心
        $this->acat = M('articlecat')->where('parent_id=65')->order('sort_order asc')->select();
        //加入诗尼曼
        $this->join_list      = M('ads')->where('ads_id=209')->find();
        $this->jon_lt      = M('ads')->where('cat_id=39')->order('sort_order asc,ads_id asc')->select();
        $this->jon_list      = json_encode(M('ads')->where('cat_id=39')->order('sort_order asc,ads_id asc')->select());
        //8大空间
        $this->eights = M('articlecat')->where('parent_id=117')->order('sort_order asc')->select();
        $this->eights_list = json_encode(M('articlecat')->where('parent_id=117')->order('sort_order asc,ads_id asc')->select());
        $this->e_list      = M('ads')->where('ads_id=213')->find();
        //资讯中心
        $this->zx = M('ads')->where('cat_id=26')->order('sort_order asc,ads_id asc')->select();

        $this->display(':index');
    }

}
