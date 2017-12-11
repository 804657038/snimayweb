<?php

class ServiceAction extends CommonAction
{

    public function __construct() {
        parent::__construct();
    }

    public function insert_order(){
        $data['type']		= $this->_post("type","intval",1);
        $data['username']		= $this->_post("username");
        $data['phone']		= $this->_post("phone");
        $data['J_Address']		= $this->_post("J_Address");
        $data['contact_time']		= $this->_post("contact_time");
        $data['addr']		= $this->_post("addr");
        $data['content'] = $this->_post("content");
        $data['add_time']   = time();
        $data['ip']   = get_ip();
        $pel="/^1[3|5|7|8]\d{9}$/";
        if(empty($data['type'])) $this->error('请选择类型');
        if(empty($data['username'])) $this->error('请填写姓名');
        if(empty($data['phone'])) $this->error('请填写手机号码');
        if(empty($data['J_Address'])) $this->error('请填写购买城市');
        if(empty($data['contact_time'])) $this->error('请填写联系时间');
        if(empty($data['addr'])) $this->error('请填写安装地址');
        if(empty($data['content'])) $this->error('请填写留言');
        if(!preg_match($pel, $data['phone'])) $this->error('手机号码格式不正确');
        if(strlen($data['content']) > 140 || strlen($data['content']) < 10) $this->error('输入长度在10-140之间');
        $p = explode(' ',$data['J_Address']);
        $province = $p[0];
        $city = $p[1];
        $area = $p[2];
        $region = M('region');
        $province=str_replace('省','',$province);
        $city=str_replace(['市','自治区'],'',$city);
        $map['region_name'] = array('like',"%{$province}%");
        $prov=$region->where($map)->field('region_id,parent_id')->find();

        $cap['region_name'] = array('like',"%{$city}%");
        $cap['parent_id'] = array('eq',"{$prov['region_id']}");
        $c=$region->where($cap)->field('region_id,parent_id')->find();

        $ap['region_name'] = array('like',"%{$area}%");
        $ap['parent_id'] = array('eq',"{$c['region_id']}");
        $a=$region->where($ap)->field('region_id,parent_id')->find();

        $data['province'] = $prov['region_id'];
        $data['city'] = $c['region_id'];
        $data['area'] = $a['region_id'];
        unset($data['J_Address']);
        $order = M('order');
        $re = $order->add($data);
        if($re){
            $this->success('您的订单已提交，请耐心等待工作人员联系！');
        }else{
            $this->error('网络错误！');
        }
    }

    public function insert_feeback(){
        $data['username']		= $this->_post("username");
        $data['phone']		= $this->_post("phone");
        $data['addr']		= $this->_post("addr");
        $data['content'] = $this->_post("content");
        $data['add_time']   = time();
        $data['ip']   = get_ip();
        $pel="/^1[3|5|7|8]\d{9}$/";
        if(empty($data['username'])) $this->error('请填写姓名');
        if(empty($data['phone'])) $this->error('请填写手机号码');
        if(empty($data['addr'])) $this->error('请填写地址');
        if(empty($data['content'])) $this->error('请填写问题描述');
        if(!preg_match($pel, $data['phone'])) $this->error('手机号码格式不正确');
        if(strlen($data['content']) > 140 || strlen($data['content']) < 10) $this->error('输入长度在10-140之间');
        $feeback = M('feeback');
        $re = $feeback->add($data);
        if($re){
            $this->success('提交成功，感谢您的反馈！');
        }else{
            $this->error('网络错误！');
        }
    }

    public function insert_complain(){
        $data['type']		= $this->_post("type","intval",1);
        $data['username']		= $this->_post("username");
        $data['phone']		= $this->_post("phone");
        $data['J_Address']		= $this->_post("J_Address");
        $data['contact_time']		= $this->_post("contact_time");
        $data['addr']		= $this->_post("addr");
        $data['content'] = $this->_post("content");
        $data['file'] = $this->_post("file");
        var_dump($data);die;
        if(!empty($_FILES['file']['tmp_name'])){
            $originalPath='Uploads/Complain/file/';
            $upfile = upload(array(),$originalPath,'time',false);
            $data['file']  = $upfile[0]['savepath'].$upfile[0]['savename'];
        }
        $data['add_time']   = time();
        $data['ip']   = get_ip();
        $pel="/^1[3|5|7|8]\d{9}$/";
        if(empty($data['type'])) {openWindow('请选择类型！',U('Index/index'));}
        elseif(empty($data['username'])) {openWindow('请填写姓名！',U('Index/index'));}
        elseif(empty($data['phone'])) {openWindow('请填写手机号码！',U('Index/index'));}
        elseif(empty($data['J_Address'])) {openWindow('请填写购买城市！',U('Index/index'));}
        elseif(empty($data['contact_time'])) {openWindow('请填写联系时间！',U('Index/index'));}
        elseif(empty($data['addr'])) {openWindow('请填写安装地址！',U('Index/index'));}
        elseif(empty($data['content'])) {openWindow('请填写留言！',U('Index/index'));}
        elseif(!preg_match($pel, $data['phone'])) {openWindow('手机号码格式不正确！',U('Index/index'));}
        elseif(strlen($data['content']) > 140 || strlen($data['content']) < 10) {openWindow('输入长度在10-140之间！',U('Index/index'));};
        $result = getRegionId($data['J_Address']);
        die;
        $data['province'] = $result['province'];
        $data['city'] = $result['city'];
        $data['area'] = $result['area'];
        unset($data['J_Address']);
        $order = M('complain');
        $re = $order->add($data);
        if($re){
            openWindow('您的投诉已提交，请耐心等待工作人员联系！',U('Index/index'));
        }else{
            openWindow('网络错误！',U('Index/index'));
        }

    }
}