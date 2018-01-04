<?php

class AdsAction extends CommonAction {
	public function _initialize() {
		parent::_initialize();	
	}
	/**
      +----------------------------------------------------------
     * 广告图列表
      +----------------------------------------------------------
     */
    public function index() {
		
		$cat_id = empty($_REQUEST['cat_id']) ? 2 : intval($_REQUEST['cat_id']);
        $data = $this->getTree2(0,1,$cat_id);
        $this->assign("data",$data);

		$M_Ads  = M('Ads');
		$adsList = $M_Ads->where(array('cat_id'=>$cat_id))->order('sort_order asc')->select();
		$counts = count($adsList);
		$this->assign("counts",$counts);
		$this->assign("adsList",$adsList);
        $this->display();
    }
	

	
	/**
      +----------------------------------------------------------
     * 添加广告图页面
      +----------------------------------------------------------
     */
	public function add(){
		/* 权限判断 */
//		$cat_id=empty($_GET['cat_id'])?0:intval($_GET['cat_id']);
//		$this->assign("cat_id",$cat_id);

        $data = $this->getTree2(0,1,0);
        $this->assign("data",$data);

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
		$ads_id=empty($_GET['id'])?0:intval($_GET['id']);
		$M_Ads = M("Ads");
		$info = $M_Ads->where("ads_id=".$ads_id)->find();
        $data = $this->getTree2(0,1,$info['cat_id']);
        $this->assign("data",$data);
		
		$this->assign("cat_id", $info['cat_id']);
		$this->assign("info", $info);
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
		
		$M_Ads = M("Ads");
		
		$data['link']       = $this->_post("link","","");
        $data['link2']       = $this->_post("link2","","");
		$data['description']= $this->_post("description","","");
		$data['title']		= $this->_post("title","","");
		$data['en_title']	= $this->_post("en_title","","");
		$data['cat_id']     = $this->_post("cat_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		$data['add_time']   = time();
		$data['img_size']   = $this->_post('img_size','trim','');
		$data['article_id']   = $this->_post('article_id','intval',0);
		if(empty($data['cat_id'])) $this->error('请选择分类！！');
		
		if(!empty($_FILES['ads_img']['tmp_name'])){
			$thumbPath='Uploads/Banner/thumb_img/';
			$originalPath='Uploads/Banner/original_img/';
			$thumbPrefix='ads_';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
		}

		
		$insertId=$M_Ads->data($data)->add();
		if($insertId){
			parent::admin_log($_POST['description'],'add','ads');
			$this->success('添加成功！！',U('Ads/add/',array('cat_id'=>$data['cat_id'])));
		}else{
			$this->error('添加失败！！',U('Ads/add/',array('cat_id'=>$data['cat_id'])));
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
		
		$M_Ads = M("Ads");
		$ads_id         	= $this->_post("ads_id","intval",0);
		$data['link']       = $this->_post("link","","");
        $data['link2']       = $this->_post("link2","","");
		$data['description']= $this->_post("description","","");
		$data['title']		= $this->_post("title","","");
		$data['en_title']	= $this->_post("en_title","","");
		$data['cat_id']     = $this->_post("cat_id","intval",0);
		$data['sort_order'] = $this->_post("sort_order","intval",0);
		$data['is_open']    = $this->_post("is_open","intval",1);
		$data['img_size']   = $this->_post('img_size','trim','');
		$data['article_id']   = $this->_post('article_id','intval',0);

        if(empty($data['cat_id'])) $this->error('请选择分类！！');

		if(!empty($_FILES['ads_img']['tmp_name'])){
			$thumbPath='Uploads/Banner/thumb_img/';
			$originalPath='Uploads/Banner/original_img/';
			$upfile=parent::upload(array('jpg', 'gif', 'png', 'jpeg'),$originalPath,'time',false);
			$data['original_img']  = $upfile[0]['savepath'].$upfile[0]['savename'];
			$data['thumb_img']     = $thumbPath.$thumbPrefix.$upfile[0]['savename'];
			
			/* 删除旧图片 */
			$oldRow=$M_Ads->where(array('ads_id'=>$ads_id))->find();
			if ($oldRow['thumb_img'] != ''){
				@unlink("./".$oldRow['thumb_img']);
				@unlink("./".$oldRow['original_img']);
			}
		}
		
		
		$updateId=$M_Ads->where(array('ads_id'=>$ads_id))->save($data);
		
		if($updateId){
			parent::admin_log($_POST['description'],'edit','ads');
			$this->success('修改成功！！',U('Ads/index/',array('cat_id'=>$_POST['cat_id'])));
		}else{
			$this->error('修改失败！！',U('Ads/index/',array('cat_id'=>$_POST['cat_id'])));
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
		$M_Ads = M("Ads");
		$ads_id = $_REQUEST['ads_id']+0;
		$oldRow = $M_Ads->where("ads_id=" . $ads_id)->find();
		if ($M_Ads->where("ads_id=" . $ads_id)->delete()) {
			parent::admin_log(addslashes($oldRow['description']),'remove','ads');
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
	 * 广告图分类管理
	+----------------------------------------------------------
	 */
	public function catList() {
        $data = $this->getTrees(0,1);
		$this->assign("data",$data);
		$this->display();
	}

    function getTrees($pid=0,$num=1){
        $list=M('image_cat')->where("parentid=$pid")->order('id desc')->select();
        $tree='';
        $strGang=str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $num-1);
        $num++;
        foreach ($list as $key=>$v){
            $tree.="<tr><td class='visible-lg visible-md'>{$v['id']}</td><td class='text-left'>{$strGang}<span class='green'>{$v['catname']}</span>&nbsp;</td><td><a title='编辑' href='" . U('Ads/edit_cat', array('id' => $v['id'])) . "' ><img width=\"16\" height=\"16\" border=\"0\" src='__PUBLIC__/Admin/Img/icon_edit.gif'></a>&nbsp;<a href='javascript:;' onclick='delAds('".$v['id']."')' title='删除'></a><img width=\"16\" height=\"16\" border=\"0\" src='__PUBLIC__/Admin/Img/icon_drop.gif'></td></tr>";
            //找第一级的子分类
            $optionSon=$this->getTrees($v['id'],$num);
            $tree.=$optionSon;
        }
        return $tree;
    }
    function getTree2($pid=0,$num=1,$selectId=0){
        $list=M('image_cat')->where("parentid=$pid")->select();
        $tree='';
        $strGang=str_repeat('&nbsp;&nbsp;', $num-1);
        $num++;
        foreach ($list as $key=>$v){
            if($v['id']==$selectId){
                $tree.="<option selected='selected' value='{$v['id']}'>{$strGang}{$v['catname']}</option>";
            }else{
                $tree.="<option value='{$v['id']}'>{$strGang}{$v['catname']}</option>";
            }
            //找第一级的子分类
            $optionSon=$this->getTree2($v['id'],$num,$selectId);
            $tree.=$optionSon;
        }
        return $tree;
    }
    /**
    +----------------------------------------------------------
     * 添加广告图分类管理
    +----------------------------------------------------------
     */
    public function add_cat() {
        $data = $this->getTree2(0,1,0);
        $this->assign("data",$data);
        $this->display();
    }
    public function insert_cat(){
        $data['parentid'] = $this->_post("parentid");
        $data['catname'] = $this->_post("catname");
        if(empty($data['catname'])) $this->error('分类为必填项');
        $re = M('image_cat')->data($data)->add();
        if($re){
            $this->success('添加成功！！',U('Ads/catList'));
        }else{
            $this->error('添加失败！！');
        }
    }

    /**
    +----------------------------------------------------------
     * 修改广告图分类管理
    +----------------------------------------------------------
     */
    public function edit_cat() {
        $id=empty($_GET['id'])?0:intval($_GET['id']);
        $list = M('image_cat')->where("id=$id")->find();
        $data = $this->getTree2(0,1,$list['parentid']);
        $this->assign("data",$data);
        $this->assign("list",$list);
        $this->display();
    }
    public function update_cat(){
        $data['parentid'] = $this->_post("parentid");
        $data['catname'] = $this->_post("catname");
        $id = $this->_post("id");
        if(empty($data['catname'])) $this->error('分类为必填项');
        $re = M('image_cat')->where(array('id'=>$id))->save($data);
        if($re !== false){
            $this->success('编辑成功！！',U('Ads/catList'));
        }else{
            $this->error('编辑失败！！',U('Ads/catList'));
        }

    }
    /**
    +----------------------------------------------------------
     * 删除广告图分类管理
    +----------------------------------------------------------
     */
    public function del_cat(){
        $id = $_REQUEST['id'];
        $data = M('image_cat')->where(array('parentid'=>$id))->find();
        if($data) $this->error('该分类下还有子分类，不允许删除');
        $re = M('image_cat')->where(array('id'=>$id))->delete();
        if($re){
            $this->success('删除成功！！',U('Ads/catList'));
        }else{
            $this->error('删除失败！！',U('Ads/catList'));
        }
    }

}