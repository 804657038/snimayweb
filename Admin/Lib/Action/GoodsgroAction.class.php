<?php
class GoodsgroAction extends CommonAction {
  public function _initialize() {
    parent::_initialize();  
  }
  /**
      +----------------------------------------------------------
     * 招聘列表
      +----------------------------------------------------------
     */
    public function index() {
        $key = $_REQUEST['keyword'];
        $cat = $_REQUEST['cat'];
        iconv('GKB', 'utf-8', $key);
        $where = '1';
        if($key){
          
          $where .= " AND title like '%".trim($key)."%'";
        }
        if($cat){

          $where .= " AND cat_id = '".trim($cat)."'";

        }
        $this->catlist = M('goodscat')->order('cat_id desc')->select();
        $Goods_ground  = M('goods_ground');
        import('ORG.Util.Page');
        $this->count = $count =$Goods_ground->where($where)->order("id desc")->count();
        $Page  =new page($count,20);
        $this->page = $Page->show();// 分页显示输出   
        $recruitmentList = $Goods_ground->where($where)->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign("recruitmentList",$recruitmentList);
        $this->display();
    }


    public function add(){
    /* 权限判断 */
    $cat_id=empty($_GET['cat_id'])?0:intval($_GET['cat_id']);

      $this->assign("cat_select", goods_cat_list(0,$cat_id));

      $this->productcat = M('goodscat')->where('parent_id=0')->select();
      $this->gc_select = M('goodscat')->where('parent_id=0')->select();
      $property = M('goods_ground')->where(array('cat_id'=>$cat_id,'parent_id'=>0))->select();

      $one_cat=M('goodscat')->where('parent_id=0')->find(array('order'=>'sort_order ASC, cat_id ASC'));
      $this->ground = M('goods_ground')->where(array('cat_id'=>$one_cat['cat_id']))->select();
      $this->display();
  }

  /**
      +----------------------------------------------------------
     * 修改招聘页面
      +----------------------------------------------------------
     */
  public function edit(){
    /* 权限判断 */
    $recruitment_id=empty($_GET['id'])?0:intval($_GET['id']);

    $M_Guestbook  = M('goods_ground');

    $info = $M_Guestbook->where("id=".$recruitment_id)->find(); 
    
    $this->info_arr = $M_Guestbook->where(array("cat_id"=>$info['cat_id'],'parent_id'=>0))->select(); 

    $this->gc_select = M('goodscat')->where('parent_id=0')->select();
    $one_cat=M('goodscat')->where('parent_id=0')->find(array('order'=>'sort_order ASC, cat_id ASC'));
    $this->ground = M('goods_ground')->where(array('cat_id'=>$one_cat['cat_id']))->select();
    $this->assign("info", $info);

    $this->display();
  }


  public function select_cat(){
    $cat_id = $_GET['cat_id'];
    $cat_select = M('goods_ground')->where(array('cat_id'=>$cat_id,'parent_id'=>0))->select();
    $html = '<select name="parent_id" class="add_select"><option value="0">请选择...</option>'; 
    foreach ($cat_select as $key => $value) {
       $html .= "<option value='".$value['id']."'>".$value['title']."</option>";               
    }
    $html .="</select>";
    echo $html;
  }

  public function insert(){
    $M_Goods = M("goods_ground");

    $data = $M_Goods->create();

    $data['title']     = trim($_POST['title']);
    $data['parent_id'] = trim($_POST['parent_id']);
    $data['cat_id']    = trim($_POST['cat_id']);
    $data['parent_id']=isset($_POST['parent_id'])?trim($_POST['parent_id']):0;
    $p_id=trim($_POST['p_id']);
    if($data['parent_id']!=0&&$p_id==$data['cat_id']){
        $this->error('不支持相同分类的上级绑定',U('Goodsgro/add/'));
    }
    if($data['parent_id']!=0){
        $afterrow=$M_Goods->where(array('id'=>$data['parent_id']))->setField('chi_id',1);
    }
    $cat_name_s  = M('goodscat')->where(array('cat_id'=>$_POST['cat_id']))->find();
    $data['cat_name'] =$cat_name_s ['cat_name'];
    $insertId=$M_Goods->add($data);
    
    if($insertId){
      parent::admin_log($_POST['title'],'add','goods');

      $this->success('添加成功！！',U('Goodsgro/index'));
    }else{
      $this->error('添加失败！！',U('Goodsgro/add/'));
    }
    exit();
  }

  public function update(){
    /* 权限判断 */
    $M_Goods = M("goods_ground");
    $data = $M_Goods->create();
    $data['title']     = trim($_POST['title']);
    $data['parent_id'] = trim($_POST['parent_id']);
    $data['cat_id']    = trim($_POST['cat_id']);
    $cat_name_s  = M('goodscat')->where(array('cat_id'=>$_POST['cat_id']))->find();
    $data['cat_name'] =$cat_name_s ['cat_name'];
    $goods_id =$_POST['id'];

    $data['parent_id']=isset($_POST['parent_id'])?trim($_POST['parent_id']):0;
    $p_id=trim($_POST['p_id']);
    if($data['parent_id']!=0&&$p_id==$data['cat_id']){
      $this->error('不支持相同分类的上级绑定',U('Goodsgro/add/'));
    }
    $res=$M_Goods->where(array('id'=>$goods_id))->find();
    $parent_id=$res['parent_id'];
    $count=$M_Goods->where(array('parent_id'=>$parent_id))->count();
    if($data['parent_id']!=$res['parent_id']&&$count==1){
        $afterrow=$M_Goods->where(array('id'=>$parent_id))->setField('chi_id',0);
    }else if($data['parent_id']!=0){
        $afterrow=$M_Goods->where(array('id'=>$data['parent_id']))->setField('chi_id',1);
    }
    $afterrow=$M_Goods->where(array('id'=>$goods_id))->save($data);
    //print_r(M()->getlastSql());exit();
    if($afterrow){
      parent::admin_log($data['title'],'edit','goods');
      $this->success('修改成功！！',U('Goodsgro/index/',array('action'=>'edit','cat_id'=>$data['cat_id'])));
    }else{
      $this->error('修改失败！！',U('Goodsgro/index/',array('action'=>'edit','cat_id'=>$data['cat_id'])));
    }
    exit();
  }
  
  /**
      +----------------------------------------------------------
     * 删除招聘
      +----------------------------------------------------------
     */
  public function del() {
    /* 权限判断 */
    $M_Guestbook  = M('goods_ground');
    $id= intval($_GET['id']);
    $oldRow = $M_Guestbook->where("id=".$id)->find();
    if ($M_Guestbook->where("id=".$id)->delete()) {
      parent::admin_log(addslashes($oldRow['description']),'remove','recruitment');
      $this->success("成功删除",U("Goodsgro/index"));
    } else {
      $this->error("删除失败，可能是不存在该ID的记录",U("Goodsgro/index"));
    }  
    }

    public function batch(){
      $M_Guestbook  = M('goods_ground');
      if ($_POST['type'] == 'button_remove')
      {
        if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
        {
          $this->error('请选择至少一条记录！');
        }
        $M_Guestbook->where('goods_id '.db_create_in(join(',', $_POST['checkboxes'])))->delete();
      }
    $this->success('批量操作成功！');
}
}
?>