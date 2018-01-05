<?php
class CenterAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //网站logo
        $logo1 = M('ads')->where('ads_id=161')->find();
        $this->assign('logo1', json_encode($logo1));
        $logo2 = M('ads')->where('ads_id=160')->find();
        $this->assign('logo2',json_encode($logo2));
        //定制留言banner
        $dz = M('ads')->where('cat_id=33')->order('sort_order asc')->select();
        $this->assign('dz',$dz);
        //次级导航
        $qw = M('articlecat')->where('parent_id=87')->order('sort_order asc')->select();
        $this->assign('qw',$qw);
        $xhx = M('articlecat')->where('parent_id=88')->order('sort_order asc')->select();
        $this->assign('xhx',$xhx);
        $qp = M('articlecat')->where('parent_id=89')->order('sort_order asc')->select();
        $this->assign('qp',$qp);
        //全屋定制
        $quan = M('article')->where('cat_id=90')->order('sort_order asc')->limit(4)->select();
        $quan1 = $quan[0];
        unset($quan[0]);
        $this->assign('quan1',$quan1);
        $this->assign('quan',$quan);
        $this->assign('caid', 90);
        //小户型拓展
        $xhux = M('article')->where('cat_id=98')->order('sort_order asc')->limit(4)->select();
        $xhux1 = $xhux[0];
        unset($xhux[0]);
        $this->assign('xhux1',$xhux1);
        $this->assign('xhux',$xhux);
        $this->assign('xcaid', 98);
        //奇葩空间利用
        $qipa = M('article')->where('cat_id=106')->order('sort_order asc')->limit(4)->select();
        $qipa1 = $qipa[0];
        unset($qipa[0]);
        $this->assign('qipa1',$qipa1);
        $this->assign('qipa',$qipa);
        $this->assign('pid', 106);


        $this->assign('catid', 15);
        $this->display(':center');
    }

    //全屋定制
    public function getQuanwu(){
        $id = $_GET['id'];
        $where['cat_id'] = array('eq',$id);
        $data = $this->getList($where);
        echo json_encode($data);
    }
    public function getList($where){
        $quan = M('article')->where($where)->order('sort_order asc')->limit(4)->select();
        $quan1 = $quan[0];
        unset($quan[0]);
        foreach($quan as $k=>$v){
            if(strstr($v['tip'],",") != ''){
                $tips = explode(',',$v['tip']);
            }else{
                $tips[] = $v['tip'];
            }
        }
        $data = [
            'quan1'=>$quan1,
            'quan'=>$quan,
            'tips'=>$tips
        ];
        return $data;
    }

    public function add_order(){
        $data['username']		= $this->_post("username");
        $data['phone']		= $this->_post("phone");
        $data['J_Address']		= $this->_post("J_Address");
        $data['add_time']   = time();
        $data['ip']   = get_ip();
        $pel="/^1[3|5|7|8]\d{9}$/";
        if(empty($data['username'])) $this->error('请填写姓名');
        if(empty($data['phone'])) $this->error('请填写手机号码');
        if(empty($data['J_Address'])) $this->error('请填写地址');
        if(!preg_match($pel, $data['phone'])) $this->error('手机号码格式不正确');
        $result = getRegionId($data['J_Address']);
        $data['province'] = $result['province'];
        $data['city'] = $result['city'];
        $data['area'] = $result['area'];
        unset($data['J_Address']);
        $order = M('order');
        $re = $order->add($data);
        if($re){
            echo json_encode(['code'=>1,'msg'=>'您的订制留言已经提交成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'网络错误！']);
        }
    }

    public function center_four(){
        //网站logo
        $logo1 = M('ads')->where('ads_id=160')->find();
        $this->assign('logo1',json_encode($logo1));
        $this->assign('logo2',json_encode($logo1));
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);

        //banner
        $cen = M('ads')->where('cat_id=38')->where('ads_id=204')->order('sort_order asc')->find();
        $this->assign('cen',$cen);

        import("ORG.Util.Page");       //载入分页类
        //公司新闻
        $key = $_GET['key'];
        $map = array();
        if($key != ''){
            $map['title'] =array('like','%'.$key.'%');
        }
        $article = M('article');
        $count1 		= $article->where('cat_id=16')->where($map)->count();
        $page1 		= new Page($count1,10);
        $showPage1 	= $page1->show();
        $xinwen = $article->where('cat_id=16')->where($map)->order('article_id desc')->limit($page1->firstRow.','.$page1->listRows)->select();
        $this->assign("page1", $showPage1);
        $this->assign("xinwen", $xinwen);
        //媒体报道
        $count2 		= $article->where('cat_id=17')->count();
        $page2 		= new Page($count2,10);
        $showPage2 	= $page2->show();
        $meiti = $article->where('cat_id=17')->order('article_id desc')->limit($page2->firstRow.','.$page2->listRows)->select();
        $this->assign("page2", $showPage2);
        $this->assign("meiti", $meiti);
        //视频中心
        $cats = $this->subCat(56);
        foreach($cats as $k=>$v){
            $cid[] = $v['cat_id'];
        }
        $map['cat_id']  = array('in',$cid);
        $video = $article->where($map)->order('article_id desc')->select();
        foreach($video as $k=>$v){
            $video[$k]['short'] = mb_substr($v['short'],0,30,'utf-8').'...';
            $vo = strstr($v['video'],"src=");
            $vv =  explode(' ',$vo);
            $video[$k]['video'] = $vv[0];
        }
        $this->assign("video", $video);
        //电子报刊
        $baokan = $article->where('cat_id=28')->order('article_id desc')->select();
        $this->assign("baokan", $baokan);

        $this->assign('catid', 15);
        $this->display(':center-four');
    }
//公司新闻
    public function getDetails(){
        $id = $_GET['id'];
        $article = M('article');
        $enart = $article->field('title,en_title,add_time,content,cat_id,article_id,sort_order,click_sum,tip')->where('is_open=1 and article_id='.$id)->find();
        $map['article_id'] = array('lt',$enart['article_id']);
        $map1['article_id'] = array('gt',$enart['article_id']);
        $prev=$article
            ->where("is_open=1 AND cat_id=16")
            ->where($map)
            ->order('article_id desc')
            ->field('title,article_id,cat_id')
            ->limit(1)
            ->find();
        $next=$article
            ->where('is_open=1 AND cat_id=16')
            ->where($map1)
            ->order('article_id asc')
            ->field('title,article_id,cat_id')
            ->limit(1)
            ->find();
        $enart['add_time'] = date("Y-m-d",$enart['add_time']);
        if(strstr($enart['tip'],",") != ''){
            $tips = explode(',',$enart['tip']);
        }else{
            $tips[] = $enart['tip'];
        }

        /*更新文章点击数*/
        $article->where("article_id=$id")->setInc('click_sum');
        $data = [
            'list'=>  $enart,
            'prev'=>$prev,
            'nextN'=>$next,
            'tips'=>$tips
        ];
        echo json_encode($data);
    }
//媒体报道
    public function getDetailmeiti(){
        $id = $_GET['id'];
        $article = M('article');
        $enart = $article->field('title,en_title,add_time,content,cat_id,article_id,sort_order,click_sum,tip')->where('is_open=1 and article_id='.$id)->find();
        $map['article_id'] = array('lt',$enart['article_id']);
        $map1['article_id'] = array('gt',$enart['article_id']);
        $prev=$article
            ->where("is_open=1 AND cat_id=17")
            ->where($map)
            ->order('article_id desc')
            ->field('title,article_id,cat_id')
            ->limit(1)
            ->find();
        $next=$article
            ->where('is_open=1 AND cat_id=17')
            ->where($map1)
            ->order('article_id asc')
            ->field('title,article_id,cat_id')
            ->limit(1)
            ->find();
        $enart['add_time'] = date("Y-m-d",$enart['add_time']);
        if(strstr($enart['tip'],",") != ''){
            $tips = explode(',',$enart['tip']);
        }else{
            $tips[] = $enart['tip'];
        }

        /*更新文章点击数*/
        $article->where("article_id=$id")->setInc('click_sum');
        $data = [
            'list'=>  $enart,
            'prev'=>$prev,
            'nextN'=>$next,
            'tips'=>$tips
        ];
        echo json_encode($data);
    }

    //电子报刊
    public function getDetailBaokan(){
        $id = $_GET['id'];
        $article = M('article');
        $enart = $article->where('is_open=1 and article_id='.$id)->find();
        $enart['add_time'] = date("Y-m-d",$enart['add_time']);
        if($enart['original_img'])  $enart['original_img']=unserialize($enart['original_img']);
        /*更新文章点击数*/
        $article->where("article_id=$id")->setInc('click_sum');
        echo json_encode($enart);
    }


}