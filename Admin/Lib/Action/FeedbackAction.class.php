<?php
class FeedbackAction extends CommonAction {
  public function _initialize() {
    parent::_initialize();  
  }
  /**
      +----------------------------------------------------------
     * 招聘列表
      +----------------------------------------------------------
     */
    public function index() {
        $M_Guestbook  = M('Guestbook');
        $type = $_GET['type'];
       $where_arr = array();

        if($_GET['start_date'] or $_GET['end_date']) {
            $where_arr['add_time'] = array(array('egt',strtotime($_GET['start_date'])),array('elt',strtotime($_GET['end_date']." 23:59:59")),'and');
        }
        $where_arr['type'] = $type;
        import("ORG.Util.Page");       //载入分页类
        $count      = $M_Guestbook->where($where_arr)->count();// 查询满足要求的总记录数 $map表示查询条件
        $page = new Page($count, 20);
        $showPage = $page->show();
        $this->assign('page',$showPage);
        $pager = $_GET['is_excel'] ? 0 : $page->firstRow.','.$page->listRows;
        
        $recruitmentList = $M_Guestbook->where($where_arr)->order("guestbook_id desc")->limit($pager)->select();
        foreach ($recruitmentList as $k => $v) {
          $recruitmentList[$k]['add_time'] = date("Y-m-d",$v['add_time']);
          $recruitmentList[$k]['province'] = M('region')->where('region_id='.$v['province'])->getField('region_name');
          $recruitmentList[$k]['city']     = M('region')->where('region_id='.$v['city'])->getField('region_name');
          $recruitmentList[$k]['district']     = M('region')->where('region_id='.$v['district'])->getField('region_name');
        }

        if($_GET['is_excel']) {
          $this->export_guestbook($recruitmentList);
        } else {
          $this->assign("recruitmentList",$recruitmentList);
          $this->display();
        }
    }

  /**
      +----------------------------------------------------------
     * 修改招聘页面
      +----------------------------------------------------------
     */
  public function edit(){
    /* 权限判断 */
    $recruitment_id=empty($_GET['id'])?0:intval($_GET['id']);
    $M_Guestbook  = M('Guestbook');
    $info = $M_Guestbook->where("guestbook_id=".$recruitment_id)->find(); 
    $info['add_time'] = date("Y-m-d",$info['add_time']);
    $info['province'] = M('region')->where('region_id='.$info['province'])->getField('region_name');
    $info['city']     = M('region')->where('region_id='.$info['city'])->getField('region_name');
    $info['district']     = M('region')->where('region_id='.$info['district'])->getField('region_name');
    $this->assign("info", $info);
    $this->display();
  }

  public function post(){
    /* 权限判断 */
    $M_Guestbook  = M('Guestbook');
    if(IS_POST){
      $data['num1'] = $this->_post("num1","intval",0);
      $data['num2'] = $this->_post("num2","intval",0);
      $data['url']    = $this->_post("url","","");
      $data['url2']    = $this->_post("url2","","");
      M('Meeting')->where('id=1')->save($data);
    }
    $info['num1'] = M('Meeting')->where('id=1')->getField('num1');
    $info['num2'] = M('Meeting')->where('id=1')->getField('num2');
    $info['url'] = M('Meeting')->where('id=1')->getField('url');
    $info['url2'] = M('Meeting')->where('id=1')->getField('url2');
    $this->assign("info", $info);
    $this->display();
  }
      public function post2(){
    /* 权限判断 */
    $M_Guestbook  = M('Guestbook');
    if(IS_POST){
      $data['num1'] = $this->_post("num1","intval",0);
      $data['num2'] = $this->_post("num2","intval",0);
      $data['url']    = $this->_post("url","","");
      $data['url2']    = $this->_post("url2","","");
      M('Meeting')->where('id=2')->save($data);
    }
    $info['num1'] = M('Meeting')->where('id=2')->getField('num1');
    $info['num2'] = M('Meeting')->where('id=2')->getField('num2');
    $info['url'] = M('Meeting')->where('id=2')->getField('url');
    $info['url2'] = M('Meeting')->where('id=2')->getField('url2');
    $this->assign("info", $info);
    $this->display();
  }
  /**
      +----------------------------------------------------------
     * 删除招聘
      +----------------------------------------------------------
     */
  public function del() {
    /* 权限判断 */
    $M_Guestbook  = M('Guestbook');
    $guestbook_id= intval($_GET['guestbook_id']);
    $type= intval($_GET['type']);
    $oldRow = $M_Guestbook->where("guestbook_id=" . $guestbook_id)->find();
    if ($M_Guestbook->where("guestbook_id=" . $guestbook_id)->delete()) {
      parent::admin_log(addslashes($oldRow['description']),'remove','recruitment');
      /* 删除旧图片 */
      $oldRow=$M_Guestbook->where(array('guestbook_id'=>$guestbook_id))->find();
      if ($oldRow['thumb_img'] != ''){
        @unlink("./".$oldRow['thumb_img']);
        @unlink("./".$oldRow['original_img']);
      }
      $this->success("成功删除",U("Feedback/index",array('type'=>$type)));
    } else {
      $this->error("删除失败，可能是不存在该ID的记录",U("Feedback/index"));
    } 
    }

    public function join_online(){
      import("ORG.Util.Page");       //载入分页类
        $page = new Page($count, 20);
        $showPage = $page->show();
    
        $this->assign("page", $showPage);
        $this->assign("join_list", M('join_online')->order('add_time desc')->limit($page->firstRow, $page->listRows)->select());

      $this->display('join_index');
    }

    public function join_info($id){
      $this->detail = M('join_online')->where(array('id'=>$id))->find();
      $this->display();
    }

    //报名管理
    public function baoming($type=1){
      $this->list = M('baoming')->where("type=$type")->order('add_time desc')->page(1,20)->select();
      $this->display('baoming_'.$type);
    }

    //删除报名
    public function del_baoming($id){
      if(M('baoming')->where("id=$id")->delete()){
        $this->success('删除成功！');
      }else{
        $this->success('未知错误！');
      }
    }

    //报名详细
    public function baoming_detail($id){
      $this->detail = M('baoming')->find($id);
      $this->display();
    }

    //批量删除报名
    public function batch(){
      $ids = $_POST['ids'];
      if(is_array($ids)) $ids = implode(',', $ids);
      $where = "id in ($ids)";

      $batch_type = $_POST['batch_type'];

      if(!$batch_type) $this->error('请选择操作类型！');

      if($batch_type=='batch_del_baoming') M('baoming')->where($where)->delete();
      if($batch_type=='batch_del_formdata'){
        $rows = M('formdata')->where($where)->select();
        foreach($rows as $value){
          if($value['type']==6){//人才招聘
            @unlink($value['value9']);
          }
        }
        M('formdata')->where($where)->delete();
      }

      $this->success('操作成功！');
    }

    public function exactA($type=1){
      $rows = M('baoming')->field("company_name,role,name,phone,weixin,add_time")->where('type='.$type)->select();
      $fields = array('机构名称','职务','姓名','联系电话','微信妮称','添加时间');
      foreach($rows as $key=>$value){
        $value['add_time'] = date('Y-m-d H:i',$value['add_time']);
        $rows[$key] = array_values($value);
      }
      array_unshift($rows, $fields);
      $this->exactCsv($rows,'Cooperation.csv');
    }

    public function exactB($type=2){
      $rows = M('baoming')->field("child_num1,child_num2,name,phone,weixin,role,company_name,referee,add_time")->where('type='.$type)->select();
      $fields = array('家庭中0-3岁的孩子有','家庭中4-6岁的孩子有','姓名','电话','微信昵称','是孩子的','家庭企业名称','推荐人或机构','添加时间');
      foreach($rows as $key=>$value){
        $value['add_time'] = date('Y-m-d H:i',$value['add_time']);
        $rows[$key] = array_values($value);
      }
      array_unshift($rows, $fields);
      $this->exactCsv($rows,'Parent.csv');
    }

    //导出CSV
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

    //通用表单数据
    public function formdata($type=1){
      //type 1：公开日报名  2：报读狮子公学  3：活动合作
      $this->list = M('formdata')->where("type=$type")->select();
      $this->type = $type;
      $this->display();
    }


    //表单详细
    public function formdata_detail($id){
      $this->detail = M('formdata')->find($id);
      $this->type = $this->detail['type'];
      $this->display();
    }

    //删除表单
    public function del_formdata($id){
      $oldrow = M('formdata')->where("id=$id")->delete();
      if($oldrow['type']==6){//人才招聘
        @unlink($oldrow['value9']);
      }
      M('formdata')->where("id=$id")->delete();
      $this->success('操作成功！');
    }
    /**
   * 信息批量操作
   */
   function f_batch(){
    /* 批量删除 */
    if (isset($_POST['type']))
    {
      $ids = "guestbook_id in (". implode(',', $_POST['checkboxes']) .")";

      if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
      {
        $this->error('请选择至少一条记录！');exit;
      }

      if ($_POST['type'] == 'button_remove')
      {

        M('Guestbook')->where($ids)->delete();
        print_r(M()->getLastSql());exit();
      }

      /* 批量审核通过 */
      if ($_POST['type'] == 'button_pass_yes')
      {
         M('formdata')->where($ids)->save(array('state'=>3));
      }

      /* 批量审核不通过 */
      if ($_POST['type'] == 'button_pass_no')
      {
        M('formdata')->where($ids)->save(array('state'=>1));
      }

      //批量推广
      if($_POST['type'] == 'button_recommend_yes'){
        M('formdata')->where($ids)->save(array('is_recommend'=>2,'recommend_time'=>time()));
      }

      //取消推广
      if($_POST['type'] == 'button_recommend_no'){
        M('formdata')->where($ids)->save(array('is_recommend'=>0));
      }
    }

    /* 清除缓存 */
    $this->success('批量操作成功！');
  }
    private function export_guestbook($recruitmentList){
    ini_set('memory_limit','500M');
    set_time_limit(0);
    $cat_name = '留言数据表';
    require_once WEB_ROOT.'/Common/Extend/phpexcel/Classes/PHPExcel.php';
    require_once WEB_ROOT.'/Common/Extend/phpexcel/Classes/PHPExcel/IOFactory.php';
    $PHPExcel = new PHPExcel();

    $PHPExcel->getProperties()->setCreator("Neo")
    ->setLastModifiedBy("Neo")
    ->setTitle($cat_name)
    ->setSubject("留言数据表")
    ->setDescription("")
    ->setKeywords("记录表")
    ->setCategory("");

    $PHPExcel->setActiveSheetIndex(0);
    $PHPExcel->getActiveSheet()->setTitle("留言数据表");
    //填入表头主标题
    $PHPExcel->getActiveSheet()->setCellValue('A1', $cat_name);
    //填入表头副标题
    $PHPExcel->getActiveSheet()->setCellValue('A2', '操作者：'.$_SESSION['admin_name'].' 导出日期：'.date('Y-m-d',time()));
    //合并表头单元格
    $PHPExcel->getActiveSheet()->mergeCells('A1:Q1');
    $PHPExcel->getActiveSheet()->mergeCells('A2:Q2');
    
    //设置表头行高
    $PHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(40);
    $PHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(20);
    $PHPExcel->getActiveSheet()->getRowDimension(3)->setRowHeight(30);
    
    //设置表头字体
    $PHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('黑体');
    $PHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
    $PHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $PHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('宋体');
    $PHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
    $PHPExcel->getActiveSheet()->getStyle('A3:W3')->getFont()->setBold(true);
         
    // 表格宽度
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);

    $PHPExcel->getActiveSheet()->setCellValue('A3', '编号');
    $PHPExcel->getActiveSheet()->setCellValue('B3', '姓名');
    $PHPExcel->getActiveSheet()->setCellValue('C3', '联系电话');
    $PHPExcel->getActiveSheet()->setCellValue('D3', '地区');
    $PHPExcel->getActiveSheet()->setCellValue('E3', '留言时间');

    $type = $_GET['type'];

    if($type == 2 or $type == 6) {
      $PHPExcel->getActiveSheet()->setCellValue('F3', '促销活动');
    } else if($type == 4) {
       $PHPExcel->getActiveSheet()->setCellValue('F3', '来源地区');
    }

    $hang = 3;

    foreach($recruitmentList as $value){
      $hang++;
      
      $PHPExcel->getActiveSheet()->setCellValue('A' . ($hang), $value['guestbook_id']);//用户ID
      $PHPExcel->getActiveSheet()->setCellValue('B' . ($hang), $value['name']);//店铺类型
      $PHPExcel->getActiveSheet()->setCellValue('C' . ($hang), $value['phone']);//店铺类型
      $PHPExcel->getActiveSheet()->setCellValue('D' . ($hang), $value['province'].'--'.$value['city'].'--'.$value['district']);//店铺类型
      $PHPExcel->getActiveSheet()->setCellValue('E' . ($hang), $value['add_time']);//加盟时间

      if($type == 2 or $type == 6) {
        $PHPExcel->getActiveSheet()->setCellValue('F' . ($hang), $value['hd_name']);//店铺类型
      } else if($type == 4) {
        $PHPExcel->getActiveSheet()->setCellValue('F' . ($hang), $value['address']);//店铺类型
      }
    }
    ob_end_clean();//清除缓冲区,避免乱码
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename=" '.$cat_name.'.xls"'); //日期为文件名后缀 
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5'); //excel5为xls格式，excel2007为xlsx格式 
    $objWriter->save('php://output');
    exit;
  }
}
?>