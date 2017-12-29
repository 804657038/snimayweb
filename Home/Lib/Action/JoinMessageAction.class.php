<?php
class JoinMessageAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        //网站logo
        $logo1 = M('ads')->where('ads_id=164')->find();
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);
        //banner
        $guanyu = M('ads')->where('ads_id=206')->find();
        $this->assign('guanyu',$guanyu);
        //定制分类
        $goodscat = M('goodstype')->select();
        $this->assign('goodscat',$goodscat);
        $this->display(':JoinMessage');
    }

    public function jm_order(){
        $data['style']		= $this->_post("type");
        $data['name']		= $this->_post("username");
        $data['phone']		= $this->_post("phone");
        $data['J_Address']		= $this->_post("J_Address");
        $data['add_time']   = time();
        $data['type']   = 1;
        $pel="/^1[3|5|7|8]\d{9}$/";
        if(empty($data['type'])) $this->error('请选择类型');
        if(empty($data['name'])) $this->error('请填写姓名');
        if(empty($data['phone'])) $this->error('请填写手机号码');
        if(empty($data['J_Address'])) $this->error('请填写地址');
        if(!preg_match($pel, $data['phone'])) $this->error('手机号码格式不正确');
        $result = getRegionId($data['J_Address']);
        $data['province'] = $result['province'];
        $data['city'] = $result['city'];
        $data['district'] = $result['area'];
        unset($data['J_Address']);
        $order = M('guestbook');
        $re = $order->add($data);
        if($re){
            echo json_encode(['code'=>1,'msg'=>'您的留言已经提交成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'网络错误！']);
        }
    }
}