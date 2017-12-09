<?php

class DealerModel extends Model {
  /**
   +----------------------------------------------------------
   * 文章列表
   +----------------------------------------------------------
   */
  public function listDealer($firstRow = 0, $listRows = 20 , $filter = array()) {
    $M_Dealer = M("Dealer");
    $where = '';
    if($filter['key_type'] && !empty($filter['keyword'])){
      if($filter['key_type'] == 1){
        $where .= " AND principal_id LIKE '%".$filter['keyword']."%'";
      }else if($filter['key_type'] == 2){
        $where .= " AND team_id LIKE '%".$filter['keyword']."%'";
      }else if($filter['key_type'] == 3){
        $where .= " AND shopname LIKE '%".$filter['keyword']."%'";
      }
    }
    /*if (!empty($filter['keyword']))
    {
      $where = " AND project LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
    }*/
    if ($filter['store_type'])
    {
      $where .= " AND store_type = " . $filter['store_type'];
    }
    if ($filter['province'])
    {
      $where .= " AND province =" . $filter['province'];
    }
    if ($filter['city'])
    {
      $where .= " AND city =" . $filter['city'];
    }
    if ($filter['district'])
    {
      $where .= " AND district =" . $filter['district'];
    }
    if ($filter['team'])
    {
      $where .= " AND team_id =" . $filter['team'];
    }
    if ($filter['principal'])
    {
      $where .= " AND principal_id =" . $filter['principal'];
    }
    if ($filter['schedule'])
    {
      $where .= " AND schedule =" . $filter['schedule'];
    }
    
    /* 获取文章数据 */
    $sql = 'SELECT * '.
           'FROM ' . C('DB_PREFIX') . 'dealer_data '.
           'WHERE 1 ' .$where. ' ORDER by '.$filter['sort_by'].' '.$filter['sort_order'].', add_time DESC ' . 
           ' LIMIT '.$firstRow.','.$listRows;

    //echo $sql;

    $result = $M_Dealer->query($sql);
    foreach($result as $key => $value){
      if($value['store_type'] == 1){
        $result[$key]['store_type_name'] = '衣柜';
      }else if($value['store_type'] == 2){
        $result[$key]['store_type_name'] = '橱柜';
      }else if($value['store_type'] == 3){
        $result[$key]['store_type_name'] = '衣柜+橱柜';
      }

      $province = array_filter(explode(',', $value['province']));
      $city = array_filter(explode(',', $value['city']));
      $district = array_filter(explode(',', $value['district']));
      $town = array_filter(explode(',', $value['town']));

      $result[$key]['province_name'] = M('region_province')->where('province_id='.$province[0])->getField('province_name');
      $result[$key]['city_name'] = M('region_city')->where('city_id='.$city[0])->getField('city_name');
      $result[$key]['district_name'] = M('region_country')->where('country_id='.$district[0])->getField('country_name');
      $result[$key]['town_name'] = M('region_town')->where('town_id='.$town[0])->getField('town_name');

      /*$result[$key]['team_name'] = M('dealer_team')->where('id='.$value['team_id'])->getField('t_name');
      $result[$key]['principal_name'] = M('dealer_principal')->where('id='.$value['principal_id'])->getField('p_name');*/

      if($value['schedule'] == 1){
        $result[$key]['schedule_name'] = '已下厂';
      }else if($value['schedule'] == 2){
        $result[$key]['schedule_name'] = '正在设计平面图';
      }else if($value['schedule'] == 3){
        $result[$key]['schedule_name'] = '正在设计施工图';
      }else if($value['schedule'] == 4){
        $result[$key]['schedule_name'] = '正在设计样柜图';
      }else if($value['schedule'] == 5){
        $result[$key]['schedule_name'] = '待客户确认平面图';
      }else if($value['schedule'] == 6){
        $result[$key]['schedule_name'] = '待客户确认施工图';
      }else if($value['schedule'] == 7){
        $result[$key]['schedule_name'] = '待客户确认样柜图';
      }else if($value['schedule'] == 8){
        $result[$key]['schedule_name'] = '待审核图纸';
      }else if($value['schedule'] == 9){
        $result[$key]['schedule_name'] = '待审核报价';
      }else if($value['schedule'] == 10){
        $result[$key]['schedule_name'] = '正在计料';
      }else if($value['schedule'] == 11){
        $result[$key]['schedule_name'] = '待优化';
      }else if($value['schedule'] == 12){
        $result[$key]['schedule_name'] = '已退出';
      }else if($value['schedule'] == 13){
        $result[$key]['schedule_name'] = '已开店';
      }else if($value['schedule'] == 14){
        $result[$key]['schedule_name'] = '未回传图纸';
      }
    }

    return $result;
  }
  
  /**
   +----------------------------------------------------------
   * 文章总数
   +----------------------------------------------------------
   */
  public function listDealerCount($filter = array()) {
    $M_Dealer = M("Dealer");
    $where = '';
    if (!empty($filter['keyword']))
    {
      $where = " AND project LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
    }
    if ($filter['store_type'])
    {
      $where .= " AND store_type = " . $filter['store_type'];
    }
    if ($filter['province'])
    {
      $where .= " AND province =" . $filter['province'];
    }
    if ($filter['city'])
    {
      $where .= " AND city =" . $filter['city'];
    }
    if ($filter['district'])
    {
      $where .= " AND district =" . $filter['district'];
    }
    if ($filter['team'])
    {
      $where .= " AND team =" . $filter['team'];
    }
    if ($filter['principal'])
    {
      $where .= " AND principal =" . $filter['principal'];
    }
    if ($filter['schedule'])
    {
      $where .= " AND schedule =" . $filter['schedule'];
    }

    $sql = 'SELECT COUNT(id) AS count FROM ' . C('DB_PREFIX') . 'dealer_data WHERE 1 ' .$where;
    
    $count = $M_Dealer->query($sql);

    return $count[0]['count'];
  }  
}

?>
