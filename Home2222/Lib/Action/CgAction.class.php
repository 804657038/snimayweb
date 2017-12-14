<?php
class CgAction extends CommonAction{

    public function index(){
        $db=M('article');
        $imgs_db=M('articleimg');
        $cat=M('articlecat');
        $this->cat_content=$cat->where(array('cat_id'=>29))->getField("content");
        $this->ppl=$db->where(array('cat_id'=>30))->limit(9)->select(array('order'=>"sort_order ASC,add_time DESC"));
        $this->cpl=$db->where(array('cat_id'=>31))->select(array('order'=>"sort_order ASC,add_time DESC"));
        $this->yfsj=$db->where(array('cat_id'=>32))->find(array('order'=>"sort_order ASC,add_time DESC"));
        $ysl=$db->where(array('cat_id'=>33))->select(array('order'=>"sort_order ASC,add_time DESC"));
        foreach ($ysl as $k=>$v){
            $ysl[$k]['imgs']=$imgs_db->where('article_id='.$v['article_id'])->field('original_img')->select(array('order'=>'sort_order desc'));
        }
        $this->ysl=$ysl;

        $qwfg_id=$db->where(array('cat_id'=>34))->getField("article_id");
        $this->qwfg=$imgs_db->where('article_id='.$qwfg_id)->order('sort_order asc,id desc')->select();

        $tdl=$db->where(array('cat_id'=>35))->select(array('order'=>"sort_order ASC,add_time DESC"));

        foreach ($tdl as $k=>$v){
            $tdl[$k]['imgs']=$imgs_db->where('article_id='.$v['article_id'])->field('original_img')->select(array('order'=>'sort_order desc'));
        }

        $this->tdl=$tdl;
        $ms_id=$db->where(array('cat_id'=>36))->getField("article_id");

        $this->ms=$imgs_db->where('article_id='.$ms_id)->select(array('order'=>'sort_order asc,id desc'));


        $jmzy=$db->where(array('cat_id'=>37))->limit(5)->select(array('order'=>"sort_order ASC,add_time DESC"));


        $jmzy_arr=array();
        foreach ($jmzy as $k=>$v){
            $jmzy_arr[$k]["title"]=$v['title'];
            $jmzy_arr[$k]["content"]=unserialize($v['attr']);
        }
        $this->jmzy=json_encode($jmzy_arr);

        $this->jmtj=json_encode($db->where(array('cat_id'=>38))->find(array('order'=>"sort_order ASC,add_time DESC")));


        $this->hzlc=json_encode($db->where(array('cat_id'=>39))->find(array('order'=>"sort_order ASC,add_time DESC")));

        $this->hzhb=$db->where(array('cat_id'=>40))->select(array('order'=>"sort_order ASC,add_time DESC"));

        $this->zcl=$db->where(array('cat_id'=>41))->limit(9)->select(array('order'=>"sort_order ASC,add_time DESC"));
        $zcl_content=array();
        foreach ($this->zcl as $k=>$v){
            $zcl_content[$k]=$v['content'];
        }
        $this->zcl_content=json_encode($zcl_content);
        $this->display();
    }


}
?>