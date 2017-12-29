<?php

class ServiceAction extends CommonAction
{

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        //网站logo
        $logo1 = M('ads')->where('ads_id=164')->find();
        $logo1['original_img'] = __ROOT__.'/'.$logo1['original_img'];
        $this->assign('logo',$logo1);
        //微信
        $wx = M('ads')->where('ads_id=30')->find();
        $wx['original_img'] = __ROOT__.'/'.$wx['original_img'];
        $this->assign('wx',$wx);
        //定制分类
        $goodscat = M('goodstype')->select();
        $this->assign('goodscat',$goodscat);
        $goodImg = M('ads')->where('cat_id=27')->order('sort_order asc')->limit(1)->select();
        $this->assign('goodImg',$goodImg);
        //联系我们
        $goodImgArr = M('ads')->where('cat_id=31')->order('sort_order asc')->limit(6)->select();
        foreach($goodImgArr as $key=>$val){
            $goodImgArr['k'.$key] = $val;
        }
        $this->assign('goodImgArr',$goodImgArr);
        //10环
        $ten = M('article')->where('cat_id=75')->find();
        $this->assign('ten',$ten);
        //banner
        $fuwu = M('ads')->where('ads_id=163')->find();
        $this->assign('fuwu',$fuwu);
        $this->assign('catid',66);
        $this->display(':server');
    }

    public function insert_order(){
        $data['type']		= $this->_post("type");
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
            echo json_encode(['code'=>1,'msg'=>'您的留言已经提交成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'网络错误！']);
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
            echo json_encode(['code'=>1,'msg'=>'提交成功，感谢您的反馈！']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'网络错误！']);
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
        $data['type']		= $this->_post("type");
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
            echo json_encode(['code'=>1,'msg'=>'您的投诉已提交，请耐心等待工作人员联系！']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'网络错误！']);
        }

    }
}