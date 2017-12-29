<?php
class BusinessAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //网站logo
        $logo1 = M('ads')->where('ads_id=164')->find();
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);
        //banner
        $guanyu = M('ads')->where('ads_id=207')->find();
        $this->assign('guanyu', $guanyu);
        //分类
        $goodscat = M('goodscat')->order('sort_order asc')->select();
        foreach($goodscat as $k=>$v){
            $goodscat[$k]['ground'] = M('goods_ground')->where('cat_id='.$v['cat_id'])->select();
        }
        $this->assign('goodscat', $goodscat);
        //产品
        import("ORG.Util.Page");       //载入分页类
        $count 		= M('goods')->count();
        $page 		= new Page($count,9);
        $showPage 	= $page->show();
        $good = M('goods')->order('goods_id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("page", $showPage);
        $this->assign("good", $good);

        $this->assign('catid', 65);
        $this->display(':business');
    }

    //详情
    public function getGoodsDetail(){
        $id = $_GET['id'];
        $goods = M('goods')->where('goods_id='.$id)->find();
        $this->assign("good", $goods);

        $this->assign('catid', 65);
        $this->display(':businessDetail');
    }
}