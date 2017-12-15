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
        $logo1 = M('ads')->where('ads_id=164')->find();
        $this->assign('logoo', json_encode($logo1));
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);
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
//        $quan = M('article')->where()->where()->order('sort_order asc')->limit(4)->select();
        $this->assign('caid', 90);
        $this->assign('catid', 15);
        $this->display(':center');
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
            $this->success('您的订单已提交，请耐心等待工作人员联系！');
        }else{
            $this->error('网络错误！');
        }
    }


}