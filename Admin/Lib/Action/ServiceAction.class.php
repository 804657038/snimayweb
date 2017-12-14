<?php

class ServiceAction extends CommonAction
{
    public function _initialize()
    {
        parent::_initialize();
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
    public function del_orderAll(){
        $M_Ads = M("order");
        $ids = $_REQUEST['ids'];
        $idArr = explode(',',$ids);
        $map['id']  = array('in',$idArr);
        if ($M_Ads->where($map)->delete()) {
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
    public function del_feebackAll(){
        $M_Ads = M("feeback");
        $ids = $_REQUEST['ids'];
        $idArr = explode(',',$ids);
        $map['id']  = array('in',$idArr);
        if ($M_Ads->where($map)->delete()) {
            $this->success("成功删除");
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }

    /**
     * +----------------------------------------------------------
     * 投诉管理
     * +----------------------------------------------------------
     */
    public function complain(){
        import("ORG.Util.Page");       //载入分页类
        $where_arr = array();
        if($_GET['start_date'] or $_GET['end_date']) {
            $where_arr['add_time'] = array(array('egt',strtotime($_GET['start_date'])),array('elt',strtotime($_GET['end_date']." 23:59:59")),'and');
        }

        $count 		= M('complain')->where($where_arr)->count();
        $page 		= new Page($count, 20);
        $showPage 	= $page->show();
        $this->assign("page", $showPage);
        $pager = $_GET['is_excel'] ? 0 : $page->firstRow.','.$page->listRows;
        $recruitmentList = M('complain')->where($where_arr)->order('add_time desc')->limit($pager)->select();
        foreach ($recruitmentList as $k => $v) {
            $recruitmentList[$k]['add_time'] = date("Y-m-d",$v['add_time']);
            $recruitmentList[$k]['province'] = M('region')->where('region_id='.$v['province'])->getField('region_name');
            $recruitmentList[$k]['city']     = M('region')->where('region_id='.$v['city'])->getField('region_name');
            $recruitmentList[$k]['area']     = M('region')->where('region_id='.$v['area'])->getField('region_name');
        }
        if($_GET['is_excel']) {
            $title = "投诉列表.csv";
            $content[0][0]='姓名';
            $content[0][1]='手机';
            $content[0][2]='定制类型';
            $content[0][3]='联系时间';
            $content[0][4]='详细地址';
            $content[0][5]='问题描述';
            foreach($recruitmentList as $k=>$v){
                $province=$this->strG($v['province']);
                $city=$this->strG($v['city']);
                $area=$this->strG($v['area']);
                $addr=$this->strG($v['addr']);
                $ms=$this->strG($v['content']);
                $address = $province.' '.$city.' '.$area.' '.$addr;
                $content[$k+1][0] = $v['username'];
                $content[$k+1][1] = $v['phone'];
                $content[$k+1][2] = $v['type'];
                $content[$k+1][3] = $v['contact_time'];
                $content[$k+1][4] = $address;
                $content[$k+1][5] = $ms;
            }
            $this->exactCsv($content,$title);
        } else {
            $this->assign("list", $recruitmentList);
            $this->display();
        }
    }
    public function complainDetail(){
        $id = $_REQUEST['id'];
        $list = M('complain')->where("id=$id")->find();
        $list['add_time'] = date("Y-m-d",$list['add_time']);
        $list['province'] = M('region')->where('region_id='.$list['province'])->getField('region_name');
        $list['city']     = M('region')->where('region_id='.$list['city'])->getField('region_name');
        $list['area']     = M('region')->where('region_id='.$list['area'])->getField('region_name');
        $this->assign("info", $list);
        $this->display();
    }
    public function del_complain(){
        $M_Ads = M("complain");
        $id = $_REQUEST['id'];
        $oldRow = $M_Ads->where("id=" . $id)->find();
        if ($M_Ads->where("id=" . $id)->delete()) {
            parent::admin_log(addslashes($oldRow['content']),'remove','complain');
            /* 删除旧图片 */
            @unlink("./".$oldRow['file']);
            $this->success("成功删除");
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }
    }
    public function del_complainAll(){
        $M_Ads = M("complain");
        $ids = $_REQUEST['ids'];
        $idArr = explode(',',$ids);
        $map['id']  = array('in',$idArr);
        $oldRow = $M_Ads->where($map)->select();
        if ($M_Ads->where($map)->delete()) {
            foreach($oldRow as $k=>$v){
                parent::admin_log(addslashes($v['content']),'remove','complain');
                /* 删除旧图片 */
                @unlink("./".$v['file']);
            }
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