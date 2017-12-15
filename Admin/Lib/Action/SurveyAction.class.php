<?php
class SurveyAction extends CommonAction {
	public function _initialize() {
		parent::_initialize();	
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index(){
        $key = $_REQUEST['key'];
        $where = '';
        if($key){
            $where= "email='".$key."'";
        }
		import("ORG.Util.Page");       //载入分页类
		$count 		= M('survey')->where($where)->count();
        $page 		= new Page($count, 20);
        $showPage 	= $page->show();
		$title = M('survey')->group('email')->select();
        $this->assign("title", $title);
        $this->assign("page", $showPage);
		$this->list = M('survey')->where($where)->order('add_time desc')->limit($page->firstRow, $page->listRows)->select();

		$this->display();
	}

	public function detail(){
		$id = $_REQUEST['id'];
		$list = M('survey')->where("id=$id")->find();
		$list['add_time'] = date("Y-m-d",$list['add_time']);
		$this->assign("info", $list);
		$this->display();
	}

	/**
	 * [del description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function del($id){
		$file_url = M('survey')->where("id=$id")->getField('file_url');
		
		if(M('survey')->where("id=$id")->delete()){
			@unlink($file_url);
			$this->success('操作成功！');
		}else{
			$this->error('网络错误，请稍候再试！');
		}
	}
}
?>