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
        $logo1 = M('ads')->where('ads_id=164')->find();
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);
        //banner
        $guanyu = M('ads')->where('ads_id=179')->find();
        $this->assign('guanyu', $guanyu);
        //公益理念
        $gy = M('ads')->where('ads_id=180')->find();
        $this->assign('gy', $gy);

        $this->assign('catid', 62);
        $this->display(':social');
    }


}