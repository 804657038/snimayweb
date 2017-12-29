<?php

class GoodstypeAction extends CommonAction {
    public function _initialize() {
        parent::_initialize();
    }
    /**
    +----------------------------------------------------------
     * 产品分类列表
    +----------------------------------------------------------
     */
    public function index() {
        $goodscat=M("Goodstype");
        $volist=$goodscat->order('id asc')->select();
        $this->assign('list',$volist);
        $this->display();
    }



    /**
    +----------------------------------------------------------
     * ajax载入添加产品分类页面
    +----------------------------------------------------------
     */
    public function add(){
        $data = $this->getTree2(0,1,0);
        $this->assign("data",$data);
        $this->display();
    }

    public function insert(){
        $M_Ads = M("Goodstype");

        $data['parent_id']     = $this->_post("parent_id","intval",0);
        $data['type_name'] = $this->_post("type_name");
        $data['add_time']   = time();
        if(empty($data['type_name'])) $this->error('请填写产品类型！！');
        $insertId=$M_Ads->data($data)->add();
        if($insertId){
            parent::admin_log($_POST['type_name'],'add','goodstype');
            $this->success('添加成功！！',U('Goodstype/add'));
        }else{
            $this->error('添加失败！！',U('Goodstype/add'));
        }
        exit();
    }
    function getTree2($pid=0,$num=1,$selectId=0){
        $list=M('Goodstype')->where("parent_id=$pid")->select();
        $tree='';
        $strGang=str_repeat('&nbsp;&nbsp;', $num-1);
        $num++;
        foreach ($list as $key=>$v){
            if($v['id']==$selectId){
                $tree.="<option selected='selected' value='{$v['id']}'>{$strGang}{$v['type_name']}</option>";
            }else{
                $tree.="<option value='{$v['id']}'>{$strGang}{$v['type_name']}</option>";
            }
            //找第一级的子分类
            $optionSon=$this->getTree2($v['id'],$num,$selectId);
            $tree.=$optionSon;
        }
        return $tree;
    }


    /**
    +----------------------------------------------------------
     * ajax载入修改产品分类页面
    +----------------------------------------------------------
     */
    public function edit(){
        $cat_id=empty($_GET['id'])?0:intval($_GET['id']);
        $M_Goodscat = M("Goodstype");
        $cat = $M_Goodscat->where("id=".$cat_id)->find();
        $data = $this->getTree2(0,1,$cat['parent_id']);
        $this->assign("data",$data);
        $this->assign("cat", $cat);
        $this->display();
    }


    /**
    +----------------------------------------------------------
     * 更新产品分类
    +----------------------------------------------------------
     */
    public function update(){
        /* 权限判断 */
        $cat_id   = intval($_POST['id']);
        $data['type_name']   = $_POST['type_name'];
        $data['parent_id']  = intval($_POST['parent_id']);
        if(empty($data['type_name'])) $this->error('请填写产品类型！！');
        $M_Goodscat = M("Goodstype");

        $updateId=$M_Goodscat->where(array('id'=>$cat_id))->save($data);

        if($updateId !== false){
            parent::admin_log($_POST['type_name'],'edit','goodstype');
            $this->success('修改成功！！',U('Goodstype/index'));
        }else{
            $this->error('修改失败！！',U('Goodstype/index'));
        }
        exit();
    }
    /**
    +----------------------------------------------------------
     * 删除产品分类
    +----------------------------------------------------------
     */
    public function del() {
        /* 权限判断 */
        $M_Goodscat = M("Goodstype");
        $cat_id       = intval($_GET['id']);
        $cat = $M_Goodscat->where("id=".$cat_id)->find();
        if ($M_Goodscat->where("id=" . $cat_id)->delete()) {
            parent::admin_log($cat['type_name'],'remove','goodstype');
            $this->success("成功删除");
        } else {
            $this->error("删除失败，可能是不存在该ID的记录");
        }

    }

}