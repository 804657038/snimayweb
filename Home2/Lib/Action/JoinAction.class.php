<?php

class JoinAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //网站logo
        $logo1 = M('ads')->where('ads_id=160')->find();
        $this->assign('logo1',json_encode($logo1));
        $this->assign('logo2',json_encode($logo1));
        $logo1['original_img'] = __ROOT__ . '/' . $logo1['original_img'];
        $this->assign('logo', $logo1);
        //banner
        $jiaru = M('ads')->where('ads_id=177')->find();
        $this->assign('jiaru',$jiaru);
        //招聘信息
        $fl = M('article')->group('job_type')->where('cat_id=4')->field('job_type')->select();
        $location = M('article')->group('location')->where('cat_id=4')->field('location')->select();
        $this->assign("location", $location);
        $this->assign("fl", $fl);

        import("ORG.Util.Page");       //载入分页类
        $where_arr = array();
        $title = $_GET['title'];
        $addr = $_GET['addr'];
        $type = $_GET['type'];
        if($title) {
            $where_arr['title'] = array('like','%'.$title.'%');
        }
        if($addr && $addr != '选择地区') {
            $where_arr['location'] = array('eq',$addr);
        }
        if($type && $type != '职业分类') {
            $where_arr['job_type'] = array('eq',$type);
        }
        $count 		= M('article')->where('cat_id=4')->where($where_arr)->count();
        $page 		= new Page($count,6);
        $showPage 	= $page->show();
        $zp = M('article')->where('cat_id=4')->where($where_arr)->order('article_id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("page", $showPage);
        $this->assign("zp", $zp);
        $this->assign("title", $title);
        $this->assign("addr", $addr?$addr:'选择地区');
        $this->assign("type", $type?$type:'职业分类');
        $this->assign('catid', 67);
        $this->display(':join');
    }

    public function join_detail(){
        $id = $_GET['id'];
        $zpDetail = M('article')->where("article_id=$id")->find();
        $zpDetail['add_time'] = date("Y-m-d",$zpDetail['add_time']);
        $zpDetail['description'] = $zpDetail['description']?$zpDetail['description']:'暂无描述';
        echo json_encode($zpDetail);
    }

    public function uploadFile(){
        $file = $_FILES['file'];
        if(!empty($file['tmp_name'])){
            $originalPath='Uploads/Zhaopin/file/';
            $upfile = upload(array('zip', 'rar', '7z'),$originalPath,'time',false);
            $url  = $upfile[0]['savepath'].$upfile[0]['savename'];
            $name = $file['name'];
            echo json_encode(['code'=>1,'file'=>$url,'name'=>$name]);
        }else{
            echo json_encode(['code'=>0,'msg'=>'上传失败']);
        }
    }

    public function add(){
        $data['user_name']		= $this->_post("username");
        $data['phone']		= $this->_post("phone");
        $data['content']		= $this->_post("content");
        $data['file_url']		= $this->_post("file");
        $data['file_name']		= $this->_post("file_name");
        $data['email']		= $this->_post("name");
        $data['user_id'] = 0;
        $data['add_time'] = time();
        $pel="/^1[3|5|7|8]\d{9}$/";
        if(empty($data['user_name'])) $this->error('请填写姓名');
        if(empty($data['phone'])) $this->error('请填写手机号码');
        if(empty($data['content'])) $this->error('请填写留言');
        if(!preg_match($pel, $data['phone'])) $this->error('手机号码格式不正确');
        if(strlen($data['content']) > 140 || strlen($data['content']) < 10) $this->error('输入长度在10-140之间');
        $survey = M('survey');
        $re = $survey->add($data);
        if($re){
            $this->success('申请成功！');
        }else{
            $this->error('网络错误！');
        }
    }
}