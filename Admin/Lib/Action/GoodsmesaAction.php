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
}
?>