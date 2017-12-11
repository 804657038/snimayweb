<?php

class ServiceAction extends CommonAction
{
    public function _initialize()
    {
        parent::_initialize();
    }

    /**
     * +----------------------------------------------------------
     * 联系我们列表
     * +----------------------------------------------------------
     */
    public function index()
    {
        $M_Ads  = M('contact');
        $adsList = $M_Ads->order('sort_order asc')->select();
        $counts = count($adsList);
        $this->assign("counts",$counts);
        $this->assign("adsList",$adsList);
        $this->display();
    }

    public function add_contact(){
        $this->display();
    }
    public function insert_contact(){
        $M_contact = M("contact");
        $data['title']		= $this->_post("title","","");
        $data['content']		= $this->_post("content","","");
        $data['sort_order'] = $this->_post("sort_order","intval",0);
        $data['add_time']   = time();
        if(!empty($_FILES['image']['tmp_name'])){
            $originalPath='Uploads/Contact/image/';
            $upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
            $data['image']  = $upfile[0]['savepath'].$upfile[0]['savename'];
        }
        $insertId=$M_contact->data($data)->add();
        if($insertId){
            parent::admin_log($_POST['title'],'add','contact');
            $this->success('添加成功！！',U('Service/add_contact/'));
        }else{
            $this->error('添加失败！！',U('Service/add_contact/'));
        }
        exit();
    }
    public function edit_contact(){
        $ads_id=empty($_GET['id'])?0:intval($_GET['id']);
        $M_Ads = M("contact");
        $info = $M_Ads->where("id=".$ads_id)->find();
        $this->assign("info", $info);
        $this->display();
    }
    public function update_contact(){
        $M_Ads = M("contact");
        $id         	= $this->_post("id","intval",0);
        $data['content']= $this->_post("content","","");
        $data['title']		= $this->_post("title","","");
        $data['sort_order'] = $this->_post("sort_order","intval",0);
        if(!empty($_FILES['image']['tmp_name'])){
            $originalPath='Uploads/Contact/image/';
            $upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
            $data['image']  = $upfile[0]['savepath'].$upfile[0]['savename'];

            /* 删除旧图片 */
            $oldRow=$M_Ads->where(array('id'=>$id))->find();
            if ($oldRow['image'] != ''){
                @unlink("./".$oldRow['image']);
            }
        }
        $updateId=$M_Ads->where(array('id'=>$id))->save($data);

        if($updateId){
            parent::admin_log($_POST['title'],'edit','contact');
            $this->success('修改成功！！',U('Service/index/'));
        }else{
            $this->error('修改失败！！',U('Service/index/'));
        }
        exit();
    }
    public function del_contact(){
        $M_Ads = M("contact");
        $id = $_REQUEST['id'];
        $oldRow = $M_Ads->where("id=" . $id)->find();
        if ($M_Ads->where("id=" . $id)->delete()) {
            parent::admin_log(addslashes($oldRow['title']),'remove','contact');
            /* 删除旧图片 */
            @unlink("./".$oldRow['image']);
            $this->success("成功删除");
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }

    /**
     * +----------------------------------------------------------
     * 定制管理
     * +----------------------------------------------------------
     */
    public function order(){
        import("ORG.Util.Page");       //载入分页类
        $where_arr = array();
        if($_GET['start_date'] or $_GET['end_date']) {
            $where_arr['add_time'] = array(array('egt',strtotime($_GET['start_date'])),array('elt',strtotime($_GET['end_date']." 23:59:59")),'and');
        }

        $count 		= M('order')->where($where_arr)->count();
        $page 		= new Page($count, 20);
        $showPage 	= $page->show();
        $this->assign("page", $showPage);
        $pager = $_GET['is_excel'] ? 0 : $page->firstRow.','.$page->listRows;
        $recruitmentList = M('order')->where($where_arr)->order('add_time desc')->limit($pager)->select();
        foreach ($recruitmentList as $k => $v) {
            $recruitmentList[$k]['add_time'] = date("Y-m-d",$v['add_time']);
            $recruitmentList[$k]['province'] = M('region')->where('region_id='.$v['province'])->getField('region_name');
            $recruitmentList[$k]['city']     = M('region')->where('region_id='.$v['city'])->getField('region_name');
            $recruitmentList[$k]['area']     = M('region')->where('region_id='.$v['area'])->getField('region_name');
            if($v['type'] == 1){
                $recruitmentList[$k]['type'] = '大家居';
            }elseif($v['type'] == 2){
                $recruitmentList[$k]['type'] = '衣柜';
            }elseif($v['type'] == 3){
                $recruitmentList[$k]['type'] = '橱柜';
            }elseif($v['type'] == 4){
                $recruitmentList[$k]['type'] = '门窗';
            }elseif($v['type'] == 5){
                $recruitmentList[$k]['type'] = '沙发';
            }
        }
        if($_GET['is_excel']) {
            $title = "定制列表.csv";
            $content[0][0]='姓名';
            $content[0][1]='手机';
            $content[0][2]='定制类型';
            $content[0][3]='联系时间';
            $content[0][4]='详细地址';
            foreach($recruitmentList as $k=>$v){
                $province=$this->strG($v['province']);
                $city=$this->strG($v['city']);
                $area=$this->strG($v['area']);
                $addr=$this->strG($v['addr']);
                $address = $province.' '.$city.' '.$area.' '.$addr;
                $content[$k+1][0] = $v['username'];
                $content[$k+1][1] = $v['phone'];
                $content[$k+1][2] = $v['type'];
                $content[$k+1][3] = $v['contact_time'];
                $content[$k+1][4] = $address;
            }
            $this->exactCsv($content,$title);
        } else {
            $this->assign("list", $recruitmentList);
            $this->display();
        }
    }

    public function del_order(){
        $M_Ads = M("order");
        $id = $_REQUEST['id'];
        if ($M_Ads->where("id=" . $id)->delete()) {
            $this->success("成功删除");
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }

    /**
     * +----------------------------------------------------------
     * 意见反馈管理
     * +----------------------------------------------------------
     */
    public function feeback(){
        import("ORG.Util.Page");       //载入分页类
        $where_arr = array();
        if($_GET['start_date'] or $_GET['end_date']) {
            $where_arr['add_time'] = array(array('egt',strtotime($_GET['start_date'])),array('elt',strtotime($_GET['end_date']." 23:59:59")),'and');
        }
        $count 		= M('feeback')->where($where_arr)->count();
        $page 		= new Page($count, 20);
        $showPage 	= $page->show();
        $this->assign("page", $showPage);
        $pager = $_GET['is_excel'] ? 0 : $page->firstRow.','.$page->listRows;
        $recruitmentList = M('feeback')->where($where_arr)->order('add_time desc')->limit($pager)->select();

        if($_GET['is_excel']) {
            $title = "意见反馈.csv";
            $content[0][0]='姓名';
            $content[0][1]='手机';
            $content[0][2]='问题描述';
            $content[0][3]='详细地址';
            foreach($recruitmentList as $k=>$v){
                $addr=$this->strG($v['addr']);
                $desc=$this->strG($v['content']);
                $content[$k+1][0] = $v['username'];
                $content[$k+1][1] = $v['phone'];
                $content[$k+1][2] = $desc;
                $content[$k+1][3] = $addr;
            }
            $this->exactCsv($content,$title);
        } else {
            $this->assign("list", $recruitmentList);
            $this->display();
        }
    }
    public function del_feeback(){
        $M_Ads = M("feeback");
        $id = $_REQUEST['id'];
        if ($M_Ads->where("id=" . $id)->delete()) {
            $this->success("成功删除");
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }

    //导出数据
    public function exactCsv($arr,$filename='abcd.csv'){
        $fh = fopen($filename,'w+');
        foreach($arr as $value){
            fputcsv($fh, $value);
        }
        fclose($fh);
        $fh = fopen($filename,'r');
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length: ".filesize($filename));
        Header("Content-Disposition: attachment; filename=" . $filename);
        // 输出文件内容
        echo fread($fh,filesize($filename));
        fclose($fh);

        unlink($filename);
        exit;
    }

    public function strG($data){
        $data=str_replace(',','，',$data);
        $data=str_replace("\r\n",'',$data);
        $data=str_replace("\r",'',$data);
        $data=str_replace("\n",'',$data);
        $data=str_replace("\"",'',$data);
        return $data;
    }
}