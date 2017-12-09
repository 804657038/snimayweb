<?php
class GoodsmesaAction extends CommonAction {
    public function _initialize() {
        parent::_initialize();
    }
    /**台面**/
    public function index(){
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
        $goods_mesa  = M('goods_mesa');
        import('ORG.Util.Page');
        $this->count = $count =$goods_mesa->where($where)->order("id desc")->count();
        $Page  =new page($count,20);
        $this->page = $Page->show();// 分页显示输出
        $recruitmentList = $goods_mesa->where($where)->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign("recruitmentList",$recruitmentList);
        $this->display();
    }
    /**添加台面**/
    public function add(){
        /* 权限判断 */
        $cat_id=empty($_GET['cat_id'])?0:intval($_GET['cat_id']);

        $this->assign("cat_select", goods_cat_list(0,$cat_id));

        $this->productcat = M('goodscat')->where('parent_id=0')->select();
        $this->gc_select = M('goodscat')->where('parent_id=0')->select();

        $this->display();
    }

    /**插入**/
    public function insert(){
        $M_Goods = M("goods_mesa");

        $data = $M_Goods->create();

        $data['title']     = trim($_POST['title']);

        //产品图片
        if($_FILES['img']['error']===0){
            $goods_img = 'Uploads/goods/'.time().'.'.pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['img']['tmp_name'], $goods_img);
            $data['img'] = $goods_img;
        }

        $insertId=$M_Goods->add($data);

        if($insertId){
            parent::admin_log($_POST['title'],'add','goods');

            $this->success('添加成功！！',U('Goodsmesa/index'));
        }else{
            $this->error('添加失败！！',U('Goodsmesa/add/'));
        }
        exit();
    }
    /**编辑页面**/
    public function edit(){
        /* 权限判断 */
        $recruitment_id=empty($_GET['id'])?0:intval($_GET['id']);

        $M_Guestbook  = M('goods_mesa');

        $info = $M_Guestbook->where("id=".$recruitment_id)->find();

        $this->info_arr = $M_Guestbook->where(array("cat_id"=>$info['cat_id'],'parent_id'=>0))->select();

        $this->gc_select = M('goodscat')->where('parent_id=0')->select();

        $this->assign("info", $info);

        $this->display();
    }
    public function update(){
        /* 权限判断 */
        $M_Goods = M("goods_mesa");
        $data = $M_Goods->create();
        $data['title']     = trim($_POST['title']);
        $goods_id =$_POST['id'];

        //产品图片
        if($_FILES['img']['error']===0){
            $old_goods_img = $M_Goods->where(array('id'=>$goods_id))->getField('img');
            @unlink($old_goods_img);
            $goods_img = 'Uploads/goods/'.time().'.'.pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['img']['tmp_name'], $goods_img);
            $data['img'] = $goods_img;
        }

        $afterrow=$M_Goods->where(array('id'=>$goods_id))->save($data);
        //print_r(M()->getlastSql());exit();
        if($afterrow){
            parent::admin_log($data['title'],'edit','goods');
            $this->success('修改成功！！',U('Goodsmesa/index/',array('action'=>'edit','cat_id'=>$data['cat_id'])));
        }else{
            $this->error('修改失败！！',U('Goodsmesa/index/',array('action'=>'edit','cat_id'=>$data['cat_id'])));
        }
        exit();
    }
    public function del(){
        /* 权限判断 */
        $M_Guestbook  = M('goods_mesa');
        $id= intval($_GET['id']);
        $oldRow = $M_Guestbook->where("id=".$id)->find();
        if ($M_Guestbook->where("id=".$id)->delete()) {
            parent::admin_log(addslashes($oldRow['title']),'remove','recruitment');
            $this->success("成功删除",U("Goodsgro/index"));
        } else {
            $this->error("删除失败，可能是不存在该ID的记录",U("Goodsgro/index"));
        }
    }
}
?>