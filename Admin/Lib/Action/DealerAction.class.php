<?php

class DealerAction extends CommonAction {
  public function _initialize() {
    parent::_initialize();  
  }
  /**
   +----------------------------------------------------------
   * 客户跟进表
   +----------------------------------------------------------
   */
  public function index($cat_id=0) {
    // 筛选条件及排序
    $filter = array();
    $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
    $filter['store_type']     = empty($_REQUEST['store_type']) ? 0 : intval($_REQUEST['store_type']);
    $filter['province']     = empty($_REQUEST['province']) ? 0 : intval($_REQUEST['province']);
    $filter['city']     = empty($_REQUEST['city']) ? 0 : $_REQUEST['city'];
    $filter['district']     = empty($_REQUEST['district']) ? 0 : $_REQUEST['district'];
    $filter['team']     = empty($_REQUEST['team']) ? 0 : intval($_REQUEST['team']);
    $filter['principal']     = empty($_REQUEST['principal']) ? 0 : intval($_REQUEST['principal']);
    $filter['schedule']     = empty($_REQUEST['schedule']) ? 0 : intval($_REQUEST['schedule']);
    $filter['key_type']     = empty($_REQUEST['key_type']) ? 0 : intval($_REQUEST['key_type']);

    $filter['sort_by'] = empty($_REQUEST['sort_by']) ? 'id' : $_REQUEST['sort_by'];
    $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : $_REQUEST['sort_order'];

    $M_Dealer = M("dealer");
    $filter['record_count'] = $count = D("Dealer")->listDealerCount($filter);

    import("ORG.Util.Page");       //载入分页类
    $page = new Page($count, 20);
    $showPage = $page->show();
    
    $this->assign("filter", $filter);
    $this->assign("page", $showPage);
    $this->assign("list", D("Dealer")->listDealer($page->firstRow, $page->listRows,$filter));

    $this->team_list = M('dealer_team')->select();
    if($filter['team']){
      $this->principal_list = M('dealer_principal')->where('team='.$filter['team'])->select();
    }

    $this->province_list = M('region_province')->select();
    if($filter['province']){
      $this->city_list = M('region_city')->where('province_id='.$filter['province'])->select();
    }
    if($filter['city']){
      $this->district_list = M('region_country')->where('city_id='.$filter['city'])->select();
    }
    if($filter['district']){
      $this->town_list = M('region_town')->where('country_id='.$filter['district'])->select();
    }

    $this->display();
  }

  public function add_dealer(){
    $this->type = 'insert';

    $this->team_list = M('dealer_team')->select();
    $this->province_list = M('region_province')->select();

    $this->display('dealer_info');
  }

  public function edit_dealer(){
    $this->type = 'update';
    $id = $_GET['id'];
    $info = M('dealer_data')->where('id='.$id)->find();

    $this->province_list = M('region_province')->select();
    $this->city_list = M('region_city')->where('province_id = '.$info['province'])->select();
    $this->district_list = M('region_country')->where('city_id = '.$info['city'])->select();
    $this->town_list = M('region_town')->where('country_id = '.$info['district'])->select();

    $this->team_list = M('dealer_team')->select();
    $this->principal_list = M('dealer_principal')->where('team='.$info['team_id'])->select();

    $province_arr = array_filter(explode(',', $info['province']));
    $city_arr = array_filter(explode(',', $info['city']));
    $district_arr = array_filter(explode(',', $info['district']));
    $town_arr = array_filter(explode(',', $info['town']));
    $address_list = array();
    foreach ($province_arr as $key => $value) {
      $address_list[$key]['province'] = $value;
      $address_list[$key]['city'] = $city_arr[$key];
      $address_list[$key]['district'] = $district_arr[$key];
      $address_list[$key]['town'] = $town_arr[$key];

      $address_list[$key]['province_list'] = M('region_province')->select();
      $address_list[$key]['city_list'] = M('region_city')->where('province_id = '.$value)->select();
      $address_list[$key]['district_list'] = M('region_country')->where('city_id = '.$city_arr[$key])->select();
      $address_list[$key]['town_list'] = M('region_town')->where('country_id = '.$district_arr[$key])->select();
    }
    $this->address_list = $address_list;

    $this->info = $info;
    $this->id = $id;
    $this->display('dealer_info');
  }

  public function insert_dealer(){
    $data = M('dealer_data')->create();
    unset($data['id']);
    unset($data['add_time']);
    $province_arr = array_filter($data['province']);
    $city_arr = array_filter($data['city']);
    $district_arr = array_filter($data['district']);
    $town_arr = array_filter($data['town']);
    $data['province'] = implode(',', $data['province']);
    $data['city'] = implode(',', $data['city']);
    $data['district'] = implode(',', $data['district']);
    $data['town'] = implode(',', $data['town']);
    if(count($province_arr) != count($city_arr) || count($province_arr) != count($district_arr) || count($province_arr) != count($town_arr) || count($city_arr) != count($district_arr) || count($city_arr) != count($town_arr) || count($district_arr) != count($town_arr)){
      $this->error('所选省市区镇数量不相等，请重新选择');
    }

    $data['join_time'] = empty($_POST['join_time']) ? '' : strtotime($_POST['join_time']);
    $data['postback_time'] = empty($_POST['postback_time']) ? '' : strtotime($_POST['postback_time']);
    $data['specimen_time'] = empty($_POST['specimen_time']) ? '' : strtotime($_POST['specimen_time']);
    $data['update_time'] = empty($_POST['update_time']) ? '' : strtotime($_POST['update_time']);
    $data['offer_time'] = empty($_POST['offer_time']) ? '' : strtotime($_POST['offer_time']);
    $data['add_time'] = time();

    $insertId = M('dealer_data')->data($data)->add();
    
    if($insertId){
      $this->success('添加成功！！',U('Dealer/add_dealer'));
    }else{
      $this->error('添加失败！！',U('Dealer/add_dealer'));
    }
    exit();
  }

  public function update_dealer(){
    $data = M('dealer_data')->create();
    $id = $_POST['id'];
    unset($data['id']);
    $province_arr = array_filter($data['province']);
    $city_arr = array_filter($data['city']);
    $district_arr = array_filter($data['district']);
    $town_arr = array_filter($data['town']);
    $data['province'] = implode(',', $data['province']);
    $data['city'] = implode(',', $data['city']);
    $data['district'] = implode(',', $data['district']);
    $data['town'] = implode(',', $data['town']);
    if(count($province_arr) != count($city_arr) || count($province_arr) != count($district_arr) || count($province_arr) != count($town_arr) || count($city_arr) != count($district_arr) || count($city_arr) != count($town_arr) || count($district_arr) != count($town_arr)){
      $this->error('所选省市区镇数量不相等，请重新选择');
    }

    $data['join_time'] = empty($_POST['join_time']) ? '' : strtotime($_POST['join_time']);
    $data['postback_time'] = empty($_POST['postback_time']) ? '' : strtotime($_POST['postback_time']);
    $data['specimen_time'] = empty($_POST['specimen_time']) ? '' : strtotime($_POST['specimen_time']);
    $data['update_time'] = empty($_POST['update_time']) ? '' : strtotime($_POST['update_time']);
    $data['offer_time'] = empty($_POST['offer_time']) ? '' : strtotime($_POST['offer_time']);
    $data['add_time'] = empty($_POST['add_time']) ? '' : $_POST['add_time'];

    $insertId = M('dealer_data')->where('id='.$id)->save($data);
    
    $this->success('修改成功！！');
    exit();
  }

  public function del_dealer(){
    $id= intval($_GET['id']);

    $row = M('dealer_data')->where("id=" . $id)->find();

    if (M('dealer_data')->where("id=" . $id)->delete()) {
      $this->success("删除成功");
    } else {
      $this->error("删除失败，可能是不存在该ID的记录");
    } 
  }

  public function import_data(){
    ini_set('memory_limit','500M');
    set_time_limit(0);

    if (! empty ( $_FILES ['excel'] ['name'] ))
    {
      $tmp_file = $_FILES ['excel'] ['tmp_name'];
      $file_types = explode ( ".", $_FILES ['excel'] ['name'] );
      $file_type = $file_types [count ( $file_types ) - 1];
      /*判别是不是.xls文件，判别是不是excel文件*/
      if (strtolower ( $file_type ) != "xls" && strtolower ( $file_type ) != "xlsx")
      {
        $this->error( '不是Excel文件，重新上传');
      }

      /*设置上传路径*/
      $savePath =  'Uploads/excel/';

      /*以时间来命名上传的文件*/
      $str = date ( 'Ymdhis' );
      $file_name = $str . "." . $file_type;
       
      /*是否上传成功*/
      if (! move_uploaded_file($tmp_file, $savePath.$file_name))
      {
        $this->error ( '上传失败' );
      }
      require_once WEB_ROOT.'/Common/Extend/phpexcel/Classes/PHPExcel.php';
      require_once WEB_ROOT.'/Common/Extend/phpexcel/Classes/PHPExcel/IOFactory.php';
      require_once WEB_ROOT.'/Common/Extend/phpexcel/Classes/PHPExcel/Reader/Excel5.php';
      // $objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
      if($file_type=="xlsx"){  
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');  
      }else{  
        $objReader = PHPExcel_IOFactory::createReader('Excel5');  
      }

      $objPHPExcel = $objReader->load($savePath . $file_name); //$filename可以是上传的文件，或者是指定的文件
      $sheet = $objPHPExcel->getSheet(0); 
      $highestRow = $sheet->getHighestRow(); // 取得总行数 
      $highestColumn = $sheet->getHighestColumn(); // 取得总列数
      $k = 0; 
      
      //循环读取excel文件,读取一条,插入一条
      for($j=2;$j<=$highestRow;$j++)
      { 
        $data = array();

        $data['store_type'] = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();    // 店铺类型
        $jtime = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();    // 加盟时间
        $data['join_time'] = PHPExcel_Shared_Date::ExcelToPHP($jtime);    // 加盟时间转时间戳

        $province_str = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();    // 省
        $province_arr = array_filter(explode(',', $province_str));    // 分解字段
        $province_id = array();
        foreach($province_arr as $key => $value){
          $province_id[$key] = M('region_province')->where("province_name=".'"'.$value.'"')->getField('province_id');    // 将对应的省ID查询出来并另存为数组
        }

        $city_str = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();    // 市
        $city_arr = array_filter(explode(',', $city_str));
        $city_id = array();
        foreach($city_arr as $key => $value){
          $city_id[$key] = M('region_city')->where("city_name=".'"'.$value.'" AND province_id="'.$province_id[$key].'"')->getField('city_id');
        }

        $district_str = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();    // 区
        $district_arr = array_filter(explode(',', $district_str));
        $district_id = array();
        foreach($district_arr as $key => $value){
          $district_id[$key] = M('region_country')->where("country_name=".'"'.$value.'" AND city_id="'.$city_id[$key].'"')->getField('country_id');
        }

        $town_str = $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();    // 镇
        $town_arr = array_filter(explode(',', $town_str));
        $town_id = array();
        foreach($town_arr as $key => $value){
          $town_id[$key] = M('region_town')->where("town_name=".'"'.$value.'" AND country_id="'.$district_id[$key].'"')->getField('town_id');
        }
        if(count($province_id) != count($city_id) || count($province_id) != count($district_id) || count($province_id) != count($town_id) || count($city_id) != count($district_id) || count($city_id) != count($town_id) || count($district_id) != count($town_id)){    // 判断省市区镇的数量是否相等
          @unlink($savePath . $file_name);
          $this->error('导入失败，第'.$j.'行数据的省市区镇数量不符');
        }else{
          $data['province'] = implode(',', $province_id);    // 将省ID数组合并成字符串
          $data['city'] = implode(',', $city_id);
          $data['district'] = implode(',', $district_id);
          $data['town'] = implode(',', $town_id);
        }

        $data['u_name'] = $objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();    // 姓名
        $data['tel'] = $objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();    // 电话
        $data['IPAD'] = $objPHPExcel->getActiveSheet()->getCell("I".$j)->getValue();    // 礼品领取登记
        $data['area'] = $objPHPExcel->getActiveSheet()->getCell("J".$j)->getValue();    // 面积
        $data['team_id'] = $objPHPExcel->getActiveSheet()->getCell("K".$j)->getValue();    // 分部
        $data['principal_id'] = $objPHPExcel->getActiveSheet()->getCell("L".$j)->getValue();    // 开发人
        $data['policy'] = $objPHPExcel->getActiveSheet()->getCell("M".$j)->getValue();    // 政策支持
        $data['deposit'] = $objPHPExcel->getActiveSheet()->getCell("N".$j)->getValue();    // 保证金

        $ptime = $objPHPExcel->getActiveSheet()->getCell("O".$j)->getValue();    // 回传图纸日期
        $data['postback_time'] = PHPExcel_Shared_Date::ExcelToPHP($ptime);    // 回传图纸日期转时间戳

        $stime = $objPHPExcel->getActiveSheet()->getCell("P".$j)->getValue();    // 样柜下厂日期
        $data['specimen_time'] = PHPExcel_Shared_Date::ExcelToPHP($stime);    // 样柜下厂日期转时间戳

        $utime = $objPHPExcel->getActiveSheet()->getCell("Q".$j)->getValue();    // 更新时间
        $data['update_time'] = PHPExcel_Shared_Date::ExcelToPHP($utime);    // 更新时间转时间戳

        $data['schedule'] = $objPHPExcel->getActiveSheet()->getCell("R".$j)->getValue();    // 进度
        $data['intention'] = $objPHPExcel->getActiveSheet()->getCell("S".$j)->getValue();    // 意向书登记
        $data['information_source'] = $objPHPExcel->getActiveSheet()->getCell("T".$j)->getValue();    // 信息来源

        $otime = $objPHPExcel->getActiveSheet()->getCell("U".$j)->getValue();    // 提供日期
        $data['offer_time'] = PHPExcel_Shared_Date::ExcelToPHP($otime);    // 提供日期转时间戳

        $data['add_time'] = time();    // 添加日期

        M('dealer_data')->add($data);
      }
      $this->success('批量导入成功');
      exit();
    }
    $this->error("请先选择文件！");
  }

  public function export_data(){
    ini_set('memory_limit','500M');
    set_time_limit(0);
    $cat_name = '经销商数据表';
    //会员导出
    require_once WEB_ROOT.'/Common/Extend/phpexcel/Classes/PHPExcel.php';
    require_once WEB_ROOT.'/Common/Extend/phpexcel/Classes/PHPExcel/IOFactory.php';
    $PHPExcel = new PHPExcel();

    //设置excel属性基本信息
    $PHPExcel->getProperties()->setCreator("Neo")
    ->setLastModifiedBy("Neo")
    ->setTitle($cat_name)
    ->setSubject("经销商数据表")
    ->setDescription("")
    ->setKeywords("记录表")
    ->setCategory("");

    $PHPExcel->setActiveSheetIndex(0);
    $PHPExcel->getActiveSheet()->setTitle("经销商数据表");
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
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);//数据ID
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);//店铺类型
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);//加盟时间
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);//省
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);//市
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);//区
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);//镇
    $PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);//姓名
    $PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);//电话
    $PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);//礼品领取登记
    $PHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);//面积
    $PHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);//招商部门
    $PHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);//负责人
    $PHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);//政策支持
    $PHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);//保证金
    $PHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(40);//回传图纸日期
    $PHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);//样柜下场日期
    $PHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(40);//更新时间
    $PHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);//进度
    $PHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);//意向登记书
    $PHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);//信息来源
    $PHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(40);//提供日期
    $PHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(40);//添加日期

    // $objActSheet->getColumnDimension('B')->setAutoSize(true);   //内容自适应

    //表格标题
    $PHPExcel->getActiveSheet()->setCellValue('A3', '数据ID');
    $PHPExcel->getActiveSheet()->setCellValue('B3', '店铺类型');
    $PHPExcel->getActiveSheet()->setCellValue('C3', '加盟时间');
    $PHPExcel->getActiveSheet()->setCellValue('D3', '省');
    $PHPExcel->getActiveSheet()->setCellValue('E3', '市');
    $PHPExcel->getActiveSheet()->setCellValue('F3', '区');
    $PHPExcel->getActiveSheet()->setCellValue('G3', '镇');
    $PHPExcel->getActiveSheet()->setCellValue('H3', '姓名');
    $PHPExcel->getActiveSheet()->setCellValue('I3', '电话');
    $PHPExcel->getActiveSheet()->setCellValue('J3', '礼品领取登记');
    $PHPExcel->getActiveSheet()->setCellValue('K3', '面积');
    $PHPExcel->getActiveSheet()->setCellValue('L3', '招商部门');
    $PHPExcel->getActiveSheet()->setCellValue('M3', '负责人');
    $PHPExcel->getActiveSheet()->setCellValue('N3', '政策支持');
    $PHPExcel->getActiveSheet()->setCellValue('O3', '保证金');
    $PHPExcel->getActiveSheet()->setCellValue('P3', '回传图纸日期');
    $PHPExcel->getActiveSheet()->setCellValue('Q3', '样柜下场日期');
    $PHPExcel->getActiveSheet()->setCellValue('R3', '更新时间');
    $PHPExcel->getActiveSheet()->setCellValue('S3', '进度');
    $PHPExcel->getActiveSheet()->setCellValue('T3', '意向登记书');
    $PHPExcel->getActiveSheet()->setCellValue('U3', '信息来源');
    $PHPExcel->getActiveSheet()->setCellValue('V3', '提供日期');
    $PHPExcel->getActiveSheet()->setCellValue('W3', '添加日期');
    

    $hang = 3;
    $data_list = M('dealer_data')->order('add_time DESC, id DESC')->select();
    foreach($data_list as $value){
      $hang++;
      if($value['store_type'] == '1'){
        $store_name = '衣柜';
      }else if($value['store_type'] == '2'){
        $store_name = '橱柜';
      }

      $province_id = array_filter(explode(',', $value['province']));
      $province_name = array();
      foreach ($province_id as $k => $v) {
        $province_name[$k] = M('region_province')->where('province_id="'.$v.'"')->getField('province_name');
      }
      $province = implode(',', $province_name);

      $city_id = array_filter(explode(',', $value['city']));
      $city_name = array();
      foreach ($city_id as $k => $v) {
        $city_name[$k] = M('region_city')->where('city_id="'.$v.'"')->getField('city_name');
      }
      $city = implode(',', $city_name);

      $district_id = array_filter(explode(',', $value['district']));
      $district_name = array();
      foreach ($district_id as $k => $v) {
        $district_name[$k] = M('region_country')->where('country_id="'.$v.'"')->getField('country_name');
      }
      $district = implode(',', $district_name);

      $town_id = array_filter(explode(',', $value['town']));
      $town_name = array();
      foreach ($town_id as $k => $v) {
        $town_name[$k] = M('region_town')->where('town_id="'.$v.'"')->getField('town_name');
      }
      $town = implode(',', $town_name);

      if($value['schedule'] == '1'){
        $schedule = '已下厂';
      }else if($value['schedule'] == '2'){
        $schedule = '正在设计平面图';
      }else if($value['schedule'] == '3'){
        $schedule = '正在设计施工图';
      }else if($value['schedule'] == '4'){
        $schedule = '正在设计样柜图';
      }else if($value['schedule'] == '5'){
        $schedule = '待客户确认平面图';
      }else if($value['schedule'] == '6'){
        $schedule = '待客户确认施工图';
      }else if($value['schedule'] == '7'){
        $schedule = '待客户确认样柜图';
      }else if($value['schedule'] == '8'){
        $schedule = '待审核图纸';
      }else if($value['schedule'] == '9'){
        $schedule = '待审核报价';
      }else if($value['schedule'] == '10'){
        $schedule = '正在计料';
      }else if($value['schedule'] == '11'){
        $schedule = '待优化';
      }else if($value['schedule'] == '12'){
        $schedule = '已退出';
      }else if($value['schedule'] == '13'){
        $schedule = '已开店';
      }else if($value['schedule'] == '14'){
        $schedule = '未回传图纸';
      }

      $PHPExcel->getActiveSheet()->setCellValue('A' . ($hang), $value['id']);//用户ID
      $PHPExcel->getActiveSheet()->setCellValue('B' . ($hang), $store_name);//店铺类型
      $PHPExcel->getActiveSheet()->setCellValue('C' . ($hang), date('Y-m-d H:i:s', $value['join_time']));//加盟时间
      $PHPExcel->getActiveSheet()->setCellValue('D' . ($hang), $province);//省
      $PHPExcel->getActiveSheet()->setCellValue('E' . ($hang), $city);//市
      $PHPExcel->getActiveSheet()->setCellValue('F' . ($hang), $district);//区
      $PHPExcel->getActiveSheet()->setCellValue('G' . ($hang), $town);//镇
      $PHPExcel->getActiveSheet()->setCellValue('H' . ($hang), $value['u_name']);//姓名
      $PHPExcel->getActiveSheet()->setCellValue('I' . ($hang), $value['tel']);//电话
      $PHPExcel->getActiveSheet()->setCellValue('J' . ($hang), $value['IPAD']);//礼品领取登记
      $PHPExcel->getActiveSheet()->setCellValue('K' . ($hang), $value['area']);//面积
      $PHPExcel->getActiveSheet()->setCellValue('L' . ($hang), $value['team_id']);//招商部门
      $PHPExcel->getActiveSheet()->setCellValue('M' . ($hang), $value['principal_id']);//负责人
      $PHPExcel->getActiveSheet()->setCellValue('N' . ($hang), $value['policy']);//政策支持
      $PHPExcel->getActiveSheet()->setCellValue('O' . ($hang), $value['deposit']);//保证金
      $PHPExcel->getActiveSheet()->setCellValue('P' . ($hang), date('Y-m-d H:i:s', $value['postback_time']));//回传图纸日期
      $PHPExcel->getActiveSheet()->setCellValue('Q' . ($hang), date('Y-m-d H:i:s', $value['specimen_time']));//样柜下场日期
      $PHPExcel->getActiveSheet()->setCellValue('R' . ($hang), date('Y-m-d H:i:s', $value['update_time']));//更新时间
      $PHPExcel->getActiveSheet()->setCellValue('S' . ($hang), $schedule);//进度
      $PHPExcel->getActiveSheet()->setCellValue('T' . ($hang), $value['intention']);//意向登记书
      $PHPExcel->getActiveSheet()->setCellValue('U' . ($hang), $value['information_source']);//信息来源
      $PHPExcel->getActiveSheet()->setCellValue('V' . ($hang), date('Y-m-d H:i:s', $value['offer_time']));//提供日期
      $PHPExcel->getActiveSheet()->setCellValue('W' . ($hang), date('Y-m-d H:i:s', $value['add_time']));//添加日期
    }

    //设置单元格的格式
    // $PHPExcel->getActiveSheet()->getStyle('A1:'.$max_last)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    ob_end_clean();//清除缓冲区,避免乱码
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename=" '.$cat_name.'.xls"'); //日期为文件名后缀 
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5'); //excel5为xls格式，excel2007为xlsx格式 
    $objWriter->save('php://output');
    exit;
  }


  /**
   +----------------------------------------------------------
   * 招商团队管理
   +----------------------------------------------------------
   */
  public function team() {
    $team_list = M('dealer_team')->select();
    foreach($team_list as $key => $value){
      $team_list[$key]['sub'] = M('dealer_principal')->where('team='.$value['id'])->select();
    }

    $this->assign('team_list', $team_list);
    $this->display();
  }

  public function add_team(){
    $team_id = $_POST['team_id'];
    $p_name = $_POST['p_name'];
    $tel = $_POST['tel'];
    $pwd = $_POST['pwd'];
    $result = array('error' => 0, 'msg' => '', 'html' => '');

    if(!$team_id || !$p_name || !$tel){
      $result['error'] = 1;
      $result['msg'] = '请填写完整信息';
    }
    if(!$result['error']){
      $data = array('team'=>$team_id, 'p_name'=>$p_name, 'tel'=>$tel,'pwd'=>$pwd, 'add_time'=>time());
      $re = M('dealer_principal')->add($data);
      if($re){
        $html = '<tr><td class="b" width="10%">开发人：</td><td width="15%">'.$p_name.'</td><td class="b" width="10%">电话：</td><td width="15%">'.$tel.'</td><td class="b" width="10%">密码：</td><td width="15%">'.$pwd.'</td><td width="20%"><a href="">修改</a>|<a href="">删除</a></td></tr>';
        $result['html'] = $html;
      }else{
        $result['eroor'] = 1;
        $result['msg'] = '添加失败，发生未知错误';
      }
    }
    die(json_encode($result));
  }

  public function edit_principal(){
    $team_id = $_GET['t_id'];
    $principal_id = $_GET['p_id'];
    $p_name = $_GET['p_name'];
    $tel = $_GET['tel'];
    $pwd = $_GET['pwd'];
    $row = M('dealer_principal')->where('id='.$principal_id.' AND team='.$team_id)->find();

    if($row){
      $data = array(
        'p_name' => $p_name,
        'tel' => $tel,
        'pwd' => $pwd,
      );
      M('dealer_principal')->where('id='.$principal_id)->save($data);
      $this->success("修改成功");
    }else{
      $this->error("修改失败，可能是不存在该ID的记录");
    }
  }

  public function del_principal() {
    $M_Dealer_Principal = M("dealer_principal");
    $id= intval($_GET['id']);
    $row = $M_Dealer_Principal->where("id=" . $id)->find();

    if ($M_Dealer_Principal->where("id=" . $id)->delete()) {
      parent::admin_log(addslashes($row['p_name']),'remove','dealer');

      $this->success("成功删除");
    } else {
      $this->error("删除失败，可能是不存在该ID的记录");
    } 
  }



  /**
   +----------------------------------------------------------
   * 重点区域管理
   +----------------------------------------------------------
   */
  public function emphasis() {
    $type = $_GET['type'] ? $_GET['type'] : 1;

    $emphasis_info = M('dealer_emphasis')->where('type='.$type)->find();
    $province_arr = array_filter(explode(',', $emphasis_info['province']));
    $city_arr = array_filter(explode(',', $emphasis_info['city']));
    $district_arr = array_filter(explode(',', $emphasis_info['district']));
    $town_arr = array_filter(explode(',', $emphasis_info['town']));
    foreach ($province_arr as $key => $value) {
      $province_list[$key]['province_name'] = M('region_province')->where('province_id='.$value)->getField('province_name');
    }
    foreach ($city_arr as $key => $value) {
      $city_list[$key]['city_name'] = M('region_city')->where('city_id='.$value)->getField('city_name');
    }
    foreach ($district_arr as $key => $value) {
      $district_list[$key]['district_name'] = M('region_country')->where('country_id='.$value)->getField('country_name');
    }
    foreach ($town_arr as $key => $value) {
      $town_list[$key]['town_name'] = M('region_town')->where('town_id='.$value)->getField('town_name');
    }

    $this->province_list = $province_list;
    $this->city_list = $city_list;
    $this->district_list = $district_list;
    $this->town_list = $town_list;
    $this->store_type = $type;
    $this->display();
  }

  public function emphasis_info(){
    $type = $_GET['type'] ? $_GET['type'] : 1;
    $filtrate = $_GET['filtrate'] ? $_GET['filtrate'] : 'all';

    $this->store_type = $type;
    $this->filtrate = $filtrate;
    $this->display();
  }

  public function change_emphasis(){
    $store_type = $_POST['store_type'] ? $_POST['store_type'] : 1;
    $filtrate = $_POST['filtrate'];
    $province = empty($_POST['province']) ? '' : implode(',', $_POST['province']);
    $city = empty($_POST['city']) ? '' : implode(',', $_POST['city']);
    $district = empty($_POST['district']) ? '' : implode(',', $_POST['district']);
    $town = empty($_POST['town']) ? '' : implode(',', $_POST['town']);

    if($filtrate == 'all'){
      $data = array(
        'province' => $province,
        'city' => $city,
        'district' => $district,
        'town' => $town,
      );
    }
    if($filtrate == 'province'){
      $data = array(
        'province' => $province,
      );
    }
    if($filtrate == 'city'){
      $data = array(
        'city' => $city,
      );
    }
    if($filtrate == 'district'){
      $data = array(
        'district' => $district,
      );
    }
    if($filtrate == 'town'){
      $data = array(
        'town' => $town,
      );
    }
    /*if(!$province && !$city && !$district && !$town){
      $this->error('未选择任何区域或未作出任何修改');
    }else{*/
      M('dealer_emphasis')->where('type='.$store_type)->save($data);
      $this->success("修改成功", U('Dealer/emphasis', array('type'=>$store_type)));
    /*}*/
  }

  public function del_emphasis(){
    $store_type = $_GET['store_type'];
    $ar = $_GET['ar'];
    if($ar == 'province'){
      $data = array('province' => '');
      M('dealer_emphasis')->where('type='.$store_type)->save($data);

      $this->success("清除所选省份成功");
      exit(); 
    }
    if($ar == 'city'){
      $data = array('city' => '');
      M('dealer_emphasis')->where('type='.$store_type)->save($data);

      $this->success("清除所选城市成功");
      exit();  
    }
    if($ar == 'district'){
      $data = array('district' => '');
      M('dealer_emphasis')->where('type='.$store_type)->save($data);

      $this->success("清除所选区县成功");
      exit();  
    }
    if($ar == 'town'){
      $data = array('town' => '');
      M('dealer_emphasis')->where('type='.$store_type)->save($data);

      $this->success("清除所选乡镇成功");
      exit();  
    }
    $this->error('清除失败，发生未知错误');
  }

  /**
   +----------------------------------------------------------
   * 招商团队与开发人AJAX
   +----------------------------------------------------------
   */
  public function ajax_team(){
    $t_id = $_POST['t_id'];

    $result = array('error' => 0, 'msg' => '', 'html' => '');
    // $team_info = M('dealer_team')->where('id='.$t_id)->find();
    $principal_list = M('dealer_principal')->where('team='.$t_id)->select();
    $html = '';
    if($principal_list){
      $html .= '<option value="">选择开发人</option>';
      foreach ($principal_list as $key => $value) {
        $html .= '<option value="'.$value['id'].'">'.$value['p_name'].'</option>';
      }
    }else{
      $html .= '<option value="">该分部暂无开发人</option>';
    }
    $result['html'] = $html;

    die(json_encode($result));
  }

  /**
   +----------------------------------------------------------
   * 地区AJAX
   +----------------------------------------------------------
   */
  public function ajax_region(){
    $province = $_POST['province'] ? $_POST['province'] : 0;
    $city = $_POST['city'] ? $_POST['city'] : 0;
    $district = $_POST['district'] ? $_POST['district'] : 0;
    $type = $_POST['type'] ? $_POST['type'] : false;
    $result = array('error' => 0, 'msg' => '', 'html' => '', 'type' => $type);

    if(!$type){
      $result['error'] = 1;
      $result['msg'] = '参数错误';
    }
    if(!$result['error']){
      $html = '';
      switch ($type) {
        case 'province':
          $html .= "<option value=''>市</option>";
          $city_list = M('region_city')->where('province_id='.$province)->select();
          foreach($city_list as $value){
            $html .= "<option value='".$value['city_id']."'>".$value['city_name']."</option>";
          }
          break;
        case 'city':
          $html .= "<option value=''>区</option>";
          $district_list = M('region_country')->where('city_id='.$city)->select();
          foreach($district_list as $value){
            $html .= "<option value='".$value['country_id']."'>".$value['country_name']."</option>";
          }
          break;
        case 'district':
          $html .= "<option value=''>镇</option>";
          $town_list = M('region_town')->where('country_id='.$district)->select();
          foreach($town_list as $value){
            $html .= "<option value='".$value['town_id']."'>".$value['town_name']."</option>";
          }
          break;
      }
      $result['html'] = $html;
    }

    die(json_encode($result));
  }
  public function ajax_search(){
    $search_keywords = htmlspecialchars($_POST['search_keywords']);
    $filtrate = $_POST['filtrate'];
    $type = $_POST['store_type'];

    $emphasis_info = M('dealer_emphasis')->where('type='.$type)->find();
    $province_str = ','.$emphasis_info['province'].',';
    $city_str = ','.$emphasis_info['city'].',';
    $district_str = ','.$emphasis_info['district'].',';
    $town_str = ','.$emphasis_info['town'].',';

    $result = array('province' => '', 'city' => '', 'district' => '', 'town' => '', 'filtrate' => $filtrate);
    $province = '';
    $city = '';
    $district = '';
    $town = '';

    $province_list = M('region_province')->where("province_name LIKE '%".$search_keywords."%'")->select();
    $city_list = M('region_city')->where("city_name LIKE '%".$search_keywords."%'")->select();
    $district_list = M('region_country')->where("country_name LIKE '%".$search_keywords."%'")->select();
    $town_list = M('region_town')->where("town_name LIKE '%".$search_keywords."%'")->select();
    if($province_list){
      foreach ($province_list as $key => $value) {
        $province .= '<input type="checkbox" name="province[]" id="province_'.$value['province_id'].'" value="'.$value['province_id'].'"';
        if(strpos($province_str, ','.$value['province_id'].',') !== false){
          $province .= ' checked ';
        }
        $province .= '><label for="province_'.$value['province_id'].'">'.$value['province_name'].'</label>';
      }
    }else{
      $province = '未查询到该关键字省份！';
    }
    if($city_list){
      foreach ($city_list as $key => $value) {
        $city .= '<input type="checkbox" name="city[]" id="city_'.$value['city_id'].'" value="'.$value['city_id'].'"';
        if(strpos($city_str, ','.$value['city_id'].',') !== false){
          $city .= ' checked ';
        }
        $city .= '><label for="city_'.$value['city_id'].'">'.$value['city_name'].'</label>';
      }
    }else{
      $city = '未查询到该关键字省份！';
    }
    if($district_list){
      foreach ($district_list as $key => $value) {
        $district .= '<input type="checkbox" name="district[]" id="district_'.$value['country_id'].'" value="'.$value['country_id'].'"';
        if(strpos($district_str, ','.$value['country_id'].',') !== false){
          $district .= ' checked ';
        }
        $district .= '><label for="district_'.$value['country_id'].'">'.$value['country_name'].'</label>';
      }
    }else{
      $district = '未查询到该关键字省份！';
    }
    if($town_list){
      foreach ($town_list as $key => $value) {
        $town .= '<input type="checkbox" name="town[]" id="town_'.$value['town_id'].'" value="'.$value['town_id'].'"';
        if(strpos($town_str, ','.$value['town_id'].',') !== false){
          $town .= ' checked ';
        }
        $town .= '><label for="town_'.$value['town_id'].'">'.$value['town_name'].'</label>';
      }
    }else{
      $town = '未查询到该关键字省份！';
    }

    $result['province'] = $province;
    $result['city'] = $city;
    $result['district'] = $district;
    $result['town'] = $town;

    die(json_encode($result));
  }



























  
  /**
   +----------------------------------------------------------
   * 文章批量操作
   +----------------------------------------------------------
   */

  function batch(){
    $M_Article = M("Article");
    /* 批量删除 */
    if (isset($_POST['type']))
    {
      $in_article_ids = 'article_id '.db_create_in(join(',', $_POST['checkboxes']));

      if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
      {
        $this->error('请选择文章！');exit;
      }

      if ($_POST['type'] == 'button_remove')
      {
        $article_list = M('article')->where($in_article_ids)->select();

        M('article')->where($in_article_ids)->delete();

        foreach($article_list as $value){
          @unlink($value['original_img']);
          @unlink($value['thumb_img']);
          @unlink($value['file_url']);
          remove_content_img($value['content']);
        }
      }

      /* 批量隐藏 */
      if ($_POST['type'] == 'button_hide')
      {
        $M_Article->where($in_article_ids)->save(array('is_open'=>0));
      }

      /* 批量显示 */
      if ($_POST['type'] == 'button_show')
      {
        $M_Article->where($in_article_ids)->save(array('is_open'=>1));
      }

      //批量推荐
      if($_POST['type'] == 'button_recommend_yes'){
        M('article')->where($in_article_ids)->save(array('is_recommend'=>1));
      }

      //取消推荐
      if($_POST['type'] == 'button_recommend_no'){
        M('article')->where($in_article_ids)->save(array('is_recommend'=>0));
      }

      /* 批量移动分类 */
      if ($_POST['type'] == 'move_to')
      {
        if(!$_POST['target_cat'])
        {
          $this->error('请选择要转移的分类！');
        }
        
        foreach ($_POST['checkboxes'] AS $key => $id)
        {
          $M_Article->where($in_article_ids)->save(array('cat_id'=>$_POST['target_cat']));
        }
      }
    }

    /* 清除缓存 */
    $this->success('批量操作成功！');
  }


  /**
   * 信息批量操作
   */
  function f_batch(){
    /* 批量删除 */
    if (isset($_POST['type']))
    {
      $ids = "id in (". implode(',', $_POST['checkboxes']) .")";

      if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
      {
        $this->error('请选择至少一条记录！');exit;
      }

      if ($_POST['type'] == 'button_remove')
      {
        $list = M('formdata')->where($ids)->select();

        foreach($list as $value){
          @unlink($value['original_img']);
          @unlink($value['thumb_img']);
          remove_content_img($value['content0'].$value['content1'].$value['content2'].$value['content3'].$value['content4']);
        }


        //删除相册
        $album_list   = M('album')->where("id_value in ($ids)")->select();
        M('album')->where("id_value in ($ids)")->delete();
        foreach($album_list as $key=>$value){
          @unlink($value['original_img']);
          @unlink($value['thumb_img']);
        }

        //删除属性
        M('form_attr')->where("fid in ($ids)")->delete();

        M('formdata')->where($ids)->delete();
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
}