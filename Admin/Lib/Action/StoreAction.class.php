<?php

class StoreAction extends CommonAction {
	public function _initialize() {
		parent::_initialize();	
	}
	/**
      +----------------------------------------------------------
     * 广告图列表
      +----------------------------------------------------------
     */
    public function index() {
		$keyword    	= empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
		$cat_id = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
		$M_Store  = M('Store');
		$storeList = $M_Store->where(array('cat_id'=>$cat_id))->order('sort_order asc')->select();
		$count = count($storeList);
		// $filter['record_count'] = $count = D("Store")->listGoodsCount($filter);
        import("ORG.Util.Page");       //载入分页类
        $page = new Page($count, 50);
        $showPage = $page->show();
        $condition["name"] = array("like", "%".$keyword."%");
		$storeList = $M_Store->where($condition)->limit($page->firstRow, $page->listRows)->order('sort_order,id asc')->select();
		// echo count($storeList);exit();
		// echo '<pre>';print_r($storeList);echo '</pre>';

		$counts = count($storeList);
		$this->assign("page", $showPage);
		$this->assign("counts",$counts);
		$this->assign("cat_id",$cat_id);
		$this->assign("storeList",$storeList);
        $this->display();
    }
	

	
	/**
      +----------------------------------------------------------
     * 添加广告图页面
      +----------------------------------------------------------
     */
	public function add(){
		/* 权限判断 */
		$cat_id=empty($_GET['cat_id'])?0:intval($_GET['cat_id']);
		$this->assign("cat_id",$cat_id);
		$this->assign("nav_list",$this->subCat(52));
		$this->display();
	}
	
	
	/**
      +----------------------------------------------------------
     * 修改广告图页面
      +----------------------------------------------------------
     */
	public function edit(){
		/* 权限判断 */
		$store_id=empty($_GET['id'])?0:intval($_GET['id']);
		$M_Store = M("Store");
		$info = $M_Store->where("id=".$store_id)->find();
		$M_Sale = M("Sale");
		$saleList = $M_Sale->where("store_id=".$store_id)->order('sort_order asc')->select();
		$M_Sale = M("Activity");
		$actList = $M_Sale->where("store_id=".$store_id)->order('sort_order asc')->select();
		$this->assign("cat_id", $info['cat_id']);
		$this->assign("info", $info);
		$this->assign("saleList", $saleList);
		$this->assign("actList", $actList);
		$this->assign("nav_list",$this->subCat(52));
		$this->display();
	}
	
	/**
      +----------------------------------------------------------
     * 添加广告图
      +----------------------------------------------------------
     */
	public function insert(){
		/* 权限判断 */
		// echo '<pre>';print_r($_POST);echo '</pre>';exit();
		$M_Store = M("Store");
		
		$data['name']       = $this->_post("name","","");
		$data['time']		= $this->_post("time","","");
		$data['address']	= $this->_post("address","","");
		$data['phone']		= $this->_post("phone","","");
		$data['lng']		= $this->_post("lng","","");
		$data['lat']		= $this->_post("lat","","");
		$data['cat_id']     = $this->_post("cat_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		$data['add_time']   = time();		
		
		if(!empty($_FILES['images']['tmp_name'])){
			$thumbPath='Uploads/Store/thumb_img/';
			$originalPath='Uploads/Store/original_img/';
			$thumbPrefix='ads_';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
		}
		
		
		$insertId=$M_Store->data($data)->add();
		if($insertId){
			// parent::admin_log($_POST['description'],'add','ads');
			$this->success('添加成功！！',U('Store/index/',array('cat_id'=>$data['cat_id'])));
		}else{
			$this->error('添加失败！！',U('Store/index/',array('cat_id'=>$data['cat_id'])));
		}
		exit();
	}
	/**
      +----------------------------------------------------------
     * 更新广告图
      +----------------------------------------------------------
     */
	public function update(){
		/* 权限判断 */
		
		$M_Store = M("Store");
		$store_id         	= $this->_post("id","intval",0);
		$data['name']       = $this->_post("name","","");
		$data['time']		= $this->_post("time","","");
		$data['address']	= $this->_post("address","","");
		$data['phone']		= $this->_post("phone","","");
		if(!empty($_POST['lng'])){$data['lng'] = $this->_post("lng","","");}
		
		if(!empty($_POST['lat'])){$data['lat'] = $this->_post("lat","","");}
		$data['cat_id']     = $this->_post("cat_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		// echo $store_id;exit();
		// print_r($data);exit;
		if(!empty($_FILES['images']['tmp_name'])){
			$thumbPath='Uploads/Store/thumb_img/';
			$originalPath='Uploads/Store/original_img/';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
			
			/* 删除旧图片 */
			$oldRow=$M_Store->where(array('id'=>$store_id))->find();
			if ($oldRow['thumb_img'] != ''){
				@unlink("./".$oldRow['thumb_img']);
				@unlink("./".$oldRow['original_img']);
			}
		}
		
		
		$updateId=$M_Store->where(array('id'=>$store_id))->save($data);
		
		if($updateId){
			// parent::admin_log($_POST['description'],'edit','ads');
			$this->success('修改成功！！',U('Store/index/',array('cat_id'=>$_POST['cat_id'])));
		}else{
			$this->error('修改失败！！',U('Store/index/',array('cat_id'=>$_POST['cat_id'])));
		}
		exit();
	}
	/**
      +----------------------------------------------------------
     * 删除广告图
      +----------------------------------------------------------
     */
	public function del() {
		/* 权限判断 */
		$M_Store = M("Store");
		$store_id = $_REQUEST['store_id']+0;
		$oldRow = $M_Store->where("id=" . $store_id)->find();
		if ($M_Store->where("id=" . $store_id)->delete()) {
			// parent::admin_log(addslashes($oldRow['description']),'remove','ads');
			/* 删除旧图片 */
			@unlink($oldRow['thumb_img']);
			@unlink($oldRow['original_img']);
			$this->success("成功删除");
		} else {
			$this->error("删除失败，可能是不存在该ID的记录");
		} 
    }

    	/**
      +----------------------------------------------------------
     * 添加广告图页面
      +----------------------------------------------------------
     */
	public function sale_add(){
		/* 权限判断 */
		$store_id=empty($_GET['store_id'])?0:intval($_GET['store_id']);
		$this->assign("store_id",$store_id);
		$this->assign("nav_list",$this->subCat(52));
		$this->display();
	}
		/**
      +----------------------------------------------------------
     * 添加广告图
      +----------------------------------------------------------
     */
	public function sale_insert(){
		/* 权限判断 */
		// echo '<pre>';print_r($_POST);echo '</pre>';exit();
		$M_Store = M("Sale");
		
		$data['name']       = $this->_post("name","","");
		$data['sex']		= $this->_post("sex","","");
		$data['phone']		= $this->_post("phone","","");
		$data['store_id']     = $this->_post("store_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		$data['add_time']   = time();		
		
		if(!empty($_FILES['images']['tmp_name'])){
			$thumbPath='Uploads/Sale/thumb_img/';
			$originalPath='Uploads/Sale/original_img/';
			$thumbPrefix='ads_';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
		}
		
		
		$insertId=$M_Store->data($data)->add();
		if($insertId){
			// parent::admin_log($_POST['description'],'add','ads');
			$this->success('添加成功！！',U('Store/edit/',array('id'=>$data['store_id'])));
		}else{
			$this->error('添加失败！！',U('Store/sale_add/',array('cat_id'=>$data['cat_id'])));
		}
		exit();
	}
		/**
      +----------------------------------------------------------
     * 修改导购
      +----------------------------------------------------------
     */
	public function sale_edit(){
		/* 权限判断 */
		$sale_id=empty($_GET['id'])?0:intval($_GET['id']);
		$M_Sale = M("Sale");
		$info = $M_Sale->where("id=".$sale_id)->find();
		$this->assign("cat_id", $info['cat_id']);
		$this->assign("info", $info);
		$this->assign("nav_list",$this->subCat(52));
		$this->display();
	}
	/**
      +----------------------------------------------------------
     * 更新广告图
      +----------------------------------------------------------
     */
	public function sale_update(){
		/* 权限判断 */
		
		$M_Sale = M("Sale");
		$sale_id         	= $this->_post("id","intval",0);
		$data['name']       = $this->_post("name","","");
		$data['sex']		= $this->_post("sex","","");
		$data['phone']		= $this->_post("phone","","");
		$data['store_id']   = $this->_post("store_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		$data['add_time']   = time();
		// echo $store_id;exit();
		// print_r($data);exit;
		if(!empty($_FILES['images']['tmp_name'])){
			$thumbPath='Uploads/Store/thumb_img/';
			$originalPath='Uploads/Store/original_img/';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
			
			/* 删除旧图片 */
			$oldRow=$M_Sale->where(array('id'=>$sale_id))->find();
			if ($oldRow['thumb_img'] != ''){
				@unlink("./".$oldRow['thumb_img']);
				@unlink("./".$oldRow['original_img']);
			}
		}
		
		
		$updateId=$M_Sale->where(array('id'=>$sale_id))->save($data);
		
		if($updateId){
			// parent::admin_log($_POST['description'],'edit','ads');
			$this->success('修改成功！！',U('Store/index/',array('cat_id'=>'2')));
		}else{
			$this->error('修改失败！！',U('Store/index/',array('cat_id'=>'2')));
		}
		exit();
	}
	/**
      +----------------------------------------------------------
     * 删除广告图
      +----------------------------------------------------------
     */
	public function sale_del() {
		/* 权限判断 */
		$M_Sale = M("Sale");
		$sale_id = $_REQUEST['sale_id']+0;
		$oldRow = $M_Sale->where("id=" . $sale_id)->find();
		if ($M_Sale->where("id=" . $sale_id)->delete()) {
			// parent::admin_log(addslashes($oldRow['description']),'remove','ads');
			/* 删除旧图片 */
			@unlink($oldRow['thumb_img']);
			@unlink($oldRow['original_img']);
			$this->success("成功删除");
		} else {
			$this->error("删除失败，可能是不存在该ID的记录");
		} 
    }
	/**
      +----------------------------------------------------------
     * 添加广告图页面
      +----------------------------------------------------------
     */
	public function act_add(){
		/* 权限判断 */
		$store_id=empty($_GET['store_id'])?0:intval($_GET['store_id']);
		$this->assign("store_id",$store_id);
		$this->assign("nav_list",$this->subCat(52));
		$this->display();
	}
		/**
      +----------------------------------------------------------
     * 添加广告图
      +----------------------------------------------------------
     */
	public function act_insert(){
		/* 权限判断 */
		// echo '<pre>';print_r($_POST);echo '</pre>';exit();
		$M_Store = M("Activity");
		
		$data['title']       = $this->_post("title","","");
		$data['link']		= $this->_post("link","","");
		$data['store_id']     = $this->_post("store_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		$data['add_time']   = time();		
		
		if(!empty($_FILES['images']['tmp_name'])){
			$thumbPath='Uploads/Act/thumb_img/';
			$originalPath='Uploads/Act/original_img/';
			$thumbPrefix='ads_';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
		}
		
		
		$insertId=$M_Store->data($data)->add();
		if($insertId){
			// parent::admin_log($_POST['description'],'add','ads');
			$this->success('添加成功！！',U('Store/edit/',array('id'=>$data['store_id'])));
		}else{
			$this->error('添加失败！！',U('Store/act_add/',array('cat_id'=>$data['cat_id'])));
		}
		exit();
	}
		/**
      +----------------------------------------------------------
     * 修改导购
      +----------------------------------------------------------
     */
	public function act_edit(){
		/* 权限判断 */
		$act_id=empty($_GET['id'])?0:intval($_GET['id']);
		$M_Act = M("Activity");
		$info = $M_Act->where("id=".$act_id)->find();
		// echo "<pre>";print_r($info);echo '</pre>';
		$this->assign("cat_id", $info['cat_id']);
		$this->assign("info", $info);
		$this->assign("nav_list",$this->subCat(52));
		$this->display();
	}
	/**
      +----------------------------------------------------------
     * 更新广告图
      +----------------------------------------------------------
     */
	public function act_update(){
		/* 权限判断 */
		
		$M_Sale = M("Activity");
		$sale_id         	= $this->_post("id","intval",0);
		$data['title']       = $this->_post("title","","");
		$data['link']		= $this->_post("link","","");
		$data['store_id']     = $this->_post("store_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		$data['add_time']   = time();
		// echo $store_id;exit();
		// print_r($data);exit;
		if(!empty($_FILES['images']['tmp_name'])){
			$thumbPath='Uploads/Store/thumb_img/';
			$originalPath='Uploads/Store/original_img/';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
			
			/* 删除旧图片 */
			$oldRow=$M_Sale->where(array('id'=>$sale_id))->find();
			if ($oldRow['thumb_img'] != ''){
				@unlink("./".$oldRow['thumb_img']);
				@unlink("./".$oldRow['original_img']);
			}
		}
		
		
		$updateId=$M_Sale->where(array('id'=>$sale_id))->save($data);
		
		if($updateId){
			// parent::admin_log($_POST['description'],'edit','ads');
			$this->success('修改成功！！',U('Store/index/',array('cat_id'=>'2')));
		}else{
			$this->error('修改失败！！',U('Store/index/',array('cat_id'=>'2')));
		}
		exit();
	}
	/**
      +----------------------------------------------------------
     * 删除广告图
      +----------------------------------------------------------
     */
	public function act_del() {
		/* 权限判断 */
		$M_Act = M("Activity");
		$act_id = $_REQUEST['act_id']+0;
		$oldRow = $M_Act->where("id=" . $act_id)->find();
		if ($M_Act->where("id=" . $act_id)->delete()) {
			// parent::admin_log(addslashes($oldRow['description']),'remove','ads');
			/* 删除旧图片 */
			@unlink($oldRow['thumb_img']);
			@unlink($oldRow['original_img']);
			$this->success("成功删除");
		} else {
			$this->error("删除失败，可能是不存在该ID的记录");
		} 
    }
}