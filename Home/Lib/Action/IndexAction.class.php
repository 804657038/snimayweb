<?php
class IndexAction extends CommonAction {
	public function __construct() {
		parent::__construct();
	}

    public function index() {
        //导航索引ID
        $this->nid = 1;

        //网站标题 关键字 描述
        $this->site_title       = $this->site_info['title'];
        $this->site_keywords    = $this->site_info['keyword'];
        $this->site_description = $this->site_info['description'];
        
        /************************轮播图*****************************/
        $this->banner_list      = M('ads')->where('cat_id=2')->order('sort_order asc,ads_id asc')->select();

        $this->ban_list         = M('ads')->where('cat_id=7')->order('ads_id asc')->select();

        $this->ban_list1         = M('ads')->where('cat_id=8')->order('ads_id asc')->select();
        //FBO项目
        //$this->fbo_projects     = array_slice($this->all_cats[4]['sub_cat'], 0, 3);
        $this->fbo_projects     = M('ads')->where('cat_id=6')->limit(3)->select();

        //产品服务
        $this->rec_services     = $this->all_cats[1]['sub_cat'];

        //新闻中心
        $this->rec_articles     = M('article')->field('article_id,title,short,original_img,add_time')->where('is_recommend=1')->order('sort_order asc,article_id desc')->limit(3)->select();

        $index_pro = M('goods')->where('is_recommend = 1')->limit(6)->select();

        foreach ($index_pro as $key => $value) {

            $index_pro[$key]['cat_list'] = explode(',', $value['cat_id']);

            foreach ($index_pro[$key]['cat_list'] as $k => $v) {

                $index_pro[$key]['cat_name'][] = M('goods_ground')->where('id='.$v)->getField('title');

            }
            
            $index_pro[$key]['img_list'] = M('goodsimg')->where('goods_id='.$value['goods_id'])->order('sort_order asc')->select();
        }
        $this->index_pro = $index_pro;
        
        $this->display();
    }
    
}
?>