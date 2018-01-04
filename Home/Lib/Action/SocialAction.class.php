<?php
class SocialAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //网站logo
        $logo1 = M('ads')->where('ads_id=161')->find();
        $this->assign('logo1',json_encode($logo1));
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);
        $logo2 = M('ads')->where('ads_id=160')->find();
        $this->assign('logo2',json_encode($logo2));
        //banner
        $guanyu = M('ads')->where('ads_id=179')->find();
        $this->assign('guanyu', $guanyu);
        //公益理念
        $gy = M('ads')->where('ads_id=180')->find();
        $this->assign('gy', $gy);
        //公益之路
        $article = M('article')->where('cat_id=86')->order('article_id desc')->select();
        foreach($article as $k=>$v){
            $n = explode('-',date('Y-m-d',$v['add_time']));
            $t[$k] = $n[0];
        }
        $year = array_unique($t);
        $count = count($year);
        $this->assign('year',json_encode($year));
        $this->assign('count',$count);
        $gongyi = M('article')->where('cat_id=86 AND is_top=1')->order('article_id desc')->limit(1)->find();
        $this->assign('gongyi',$gongyi);
        //慈善活动
        $cishan = M('article')->where('cat_id=86')->order('article_id desc')->limit(6)->select();
        $this->assign('cishan',$cishan);
        $this->assign('catid', 62);
        $this->display(':social');
    }

    public function getGy(){
        $y = $_GET['y'];
        $start = strtotime($y.'-1-1 0:0:0');
        $end = strtotime($y.'-12-30 23:59:59');
        $where['add_time'] = array('between',array($start,$end));
        $article = M('article')->where('cat_id=86 AND is_top=1')->where($where)->order('article_id desc')->field('original_img,title,short,description')->limit(1)->find();
        echo json_encode($article);
    }


}