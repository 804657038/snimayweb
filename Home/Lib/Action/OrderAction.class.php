<?php
class OrderAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        //网站logo
        $logo1 = M('ads')->where('ads_id=164')->find();
        $logo1['original_img'] = __ROOT__.'/'.$logo1['original_img'];
        $this->assign('logo',$logo1);
        //banner
        $fuwu = M('ads')->where('ads_id=163')->find();
        $this->assign('fuwu',$fuwu);
        $this->assign('catid',66);
        $this->display(':order');
    }

    public function getOrder(){
        $phone = $_GET['phone'];
        $url = "http://39.108.156.196:8080/gw/getOrderList.php?phone=".$phone;
        $data = https_request($url);
        $data = ltrim($data,'(');
        $data = rtrim($data,')');
        echo $data;
    }

    public function getOrderResult(){
        $code = $_GET['code'];
        $url = "http://113.107.7.78:8081/httpservice/api/mes/getOrderProcess?mergeNumber=".$code;
        $data = https_request($url);
        $data = ltrim($data,'(');
        $data = rtrim($data,')');
        echo $data;
    }
}