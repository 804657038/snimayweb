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
        $logo1 = M('ads')->where('ads_id=160')->find();
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
        $key = $_GET['key'];
        $cat_id2 = $_GET['cat_id2'];
        $cat_id3 = $_GET['cat_id3'];
        $cat_id4 = $_GET['cat_id4'];
        $push_catid = array();
        $push_catid[0] = $cat_id2;
        $push_catid[1] = $cat_id3;
        $push_catid[2] = $cat_id4;
        $html = '';
        $where = "is_open=1";
        if($cat_id2){
            $where .= " and FIND_IN_SET($cat_id2,cat_id)";
            $title = M('goods_ground')->where(array('id'=>$cat_id2))->getField('title');
            $html .= '<div class="hasChoice schoice"><p>'.$title.'</p><a href="javascript:;" class="sclose cat_id2" index="'.$cat_id2.'"></a></div>';
        }
        if($cat_id3){
            $where .= " and FIND_IN_SET($cat_id3,cat_id)";
            $title3 = M('goods_ground')->where(array('id'=>$cat_id3))->getField('title');
            $html .= '<div class="hasChoice schoice"><p>'.$title3.'</p><a href="javascript:;" class="sclose cat_id3" index="'.$cat_id3.'"></a></div>';
        }
        if($cat_id4){
            $where .= " and FIND_IN_SET($cat_id4,cat_id)";
            $title4 = M('goods_ground')->where(array('id'=>$cat_id4))->getField('title');
            $html .= '<div class="hasChoice schoice"><p>'.$title4.'</p><a href="javascript:;" class="sclose cat_id4" index="'.$cat_id4.'"></a></div>';
        }
        $map = array();
        if($key != ''){
            $map['title|keywords'] =array('like','%'.$key.'%');
        }
        $order = 'sort_order asc,add_time desc';

        $count 		= M('goods')->where($where)->where($map)->count();
        $page 		= new Page($count,9);
        $showPage 	= $page->show();
        $good = M('goods')->where($where)->where($map)->order($order)->field('goods_id,goods_img,title')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("page", $showPage);
        $this->assign("good", $good);
        $this->assign("push_catid", json_encode($push_catid));
        $this->assign("htmlList", $html);


        $this->assign('catid', 65);
        $this->display(':business');
    }



    //详情
    public function getGoodsDetail(){
        //网站logo
        $logo1 = M('ads')->where('ads_id=161')->find();
        $this->assign('logo1',json_encode($logo1));
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);
        $logo2 = M('ads')->where('ads_id=160')->find();
        $this->assign('logo2',json_encode($logo2));

        $goods_id = $_GET['id']+0;
        $detail = M('goods')->where("goods_id=$goods_id and is_open=1")->find();

        //面包屑导航
        $this->ur_here = $this->ur_here . ' > ' . $detail['title'];

        $detail_cat = explode(',', $detail['cat_id']);

        foreach ($detail_cat as $key => $value) {
            if($key>3) continue;
            $detail['cat_list'][] = M('goods_ground')->where('id='.$value)->getField('title');
        }

        $detail_color = explode(',', $detail['color']);
        if(!empty($detail['mesa'])){
            $detail_mesa = explode(',', $detail['mesa']);
        }else{
            $detail_mesa=null;
        }

        foreach ($detail_color as $key => $value) {
            $detail['color_list'][$key]['co']=M('goods_color')->where('id='.$value)->getField('img');
            $detail['color_list'][$key]['tit']=M('goods_color')->where('id='.$value)->getField('title');
        }

        if(count($detail_mesa)>=1){
            $detail['is_mesa']=1;
            foreach($detail_mesa as $key=>$value){
                $detail['mesa_list'][$key]['title']=M('goods_mesa')->where('id='.$value)->getField('title');
                $detail['mesa_list'][$key]['img']=M('goods_mesa')->where('id='.$value)->getField('img');
            }
        }else{
            $detail['is_mesa']=0;
        }

        $mucai_list = explode(',', $detail['mucai']);
        foreach ($mucai_list as $key => $value) {
            $detail['mucai_list'][]=$value;
        }

        if($detail){
            $detail['images'] = M('goodsimg')->where("goods_id=".$detail['goods_id'])->order('sort_order asc,id desc')->select();
            $this->assign('detail',$detail);

            $cat_info = M('goodscat')->where(array('cat_id'=>$detail['cat_id']))->find();
            $this->assign('cat_info',$cat_info);

            M('goods')->where("goods_id=".$detail['goods_id'])->setInc('hit');
        }else{
            $this->error('错误：你的访问的产品不存在或未开放！');
        }

        $this->assign('catid', 65);
        $this->display(':businessDetail');
    }
}