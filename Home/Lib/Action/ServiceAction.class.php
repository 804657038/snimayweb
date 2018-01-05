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

    public function uploadFile(){
        $file = $_FILES['file'];
        if(!empty($file['tmp_name'])){
            $originalPath='Uploads/Complain/file/';
            $upfile = upload(array('zip', 'rar', '7z'),$originalPath,'time',false);
            $url  = $upfile[0]['savepath'].$upfile[0]['savename'];
            $name = $file['name'];
            echo json_encode(['code'=>1,'file'=>$url,'name'=>$name]);
        }else{
            echo json_encode(['code'=>0,'msg'=>'上传失败']);
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
        $result = getRegionId($data['J_Address']);
        $data['province'] = $result['province'];
        $data['city'] = $result['city'];
        $data['area'] = $result['area'];
        unset($data['J_Address']);
        $order = M('complain');
        $re = $order->add($data);
        if($re){
            $this->success('您的投诉已提交，请耐心等待工作人员联系！');
        }else{
            $this->error('网络错误！');
        }

    }
}