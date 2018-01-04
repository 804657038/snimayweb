<?php
class CgAction extends CommonAction{
    public function cgzs(){

        $this->display("mobile");
    }
    public function mobile(){

        $db=M('article');
        $imgs_db=M('articleimg');
        $cat=M('articlecat');
        $cat_content=$cat->where(array('cat_id'=>42))->getField("content");

        $act=$_GET['act'];

        if($act=="app"){

            $code=array(
                'code'=>1,
                'msg'=>$cat_content
            );
            echo json_encode($code);
            exit;

        }elseif($act=="province"){
            $province=$this->province;
            $province_array=array();
            foreach ($province as $k=>$v){
                $province_array[$k]['id']=$v['region_id'];
                $province_array[$k]['name']=$v['region_name'];
            }
            echo json_encode($province_array);
            exit;
        }elseif($act=="three"){ //品牌力
            $ppl=$db->where(array('cat_id'=>30))->limit(9)->select(array('order'=>"sort_order ASC,add_time DESC"));
            $ppl_arr=array();
            foreach ($ppl as $k=>$v){
                $ppl_arr[$k]['title']=$v['title'];
                $ppl_arr[$k]['thumb']= 'http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$v['original_img'];
            }
            echo json_encode($ppl_arr);
            exit;
        }elseif($act=="four"){  //产品力和设计团队
            $cpl=$db->where(array('cat_id'=>43))->limit(4)->select(array('order'=>"sort_order ASC,add_time DESC"));
            $acp_arr=array();
            foreach($cpl as $k=>$v){
                $acp_arr[$k]['title']=$v['title'];
                $acp_arr[$k]['thumb']='http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$v['original_img'];
            }
            $count=count($acp_arr);
            $round=round($count/2);
            $num=1;
            $list1=array();
            $list2=array();
            foreach ($acp_arr as $k=>$v){
                if($num<=$round){
                    $list1[]=$v;
                }else{
                    $list2[]=$v;
                }
                $num++;
            }
            $sj=$db->where(array('cat_id'=>44))->find(array('order'=>"sort_order ASC,add_time DESC"));  //设计
            $code=array(
                'list1'=>$list1,
                'list2'=>$list2,
                'four_img'=>'http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$sj['original_img']
            );
            echo json_encode($code);
            exit;
        }elseif($act=="five"){
            $ysl=$db->where(array('cat_id'=>33))->select(array('order'=>"sort_order ASC,add_time DESC"));  //营销力
            $ysl_array=array();
            foreach ($ysl as $k=>$v){
                $ysl_array[$k]['title']=$v['title'];
                $imgs=$imgs_db->where('article_id='.$v['article_id'])->getField('original_img');

                $ysl_array[$k]['thumb']='http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$imgs;

            }
            $qwfg_id=$db->where(array('cat_id'=>34))->getField("article_id"); //全网覆盖
            $qwfg=$imgs_db->where('article_id='.$qwfg_id)->select(array('order'=>"sort_order asc,id desc"));
            $qw_array=array();
            foreach ($qwfg as $k=>$v){
                $qw_array[$k]['thumb']='http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$v['original_img'];
            }
            $code=array(
                'list1'=>$ysl_array,
                'list2'=>$qw_array
            );

            echo json_encode($code);
            exit;
        }elseif($act=="six"){
            $tdl=$db->where(array('cat_id'=>45))->select(array('order'=>"sort_order ASC,add_time DESC")); //团队力
            $tdl_array=array();
            foreach ($tdl as $k=>$v){
                $tdl_array[$k]['title']=$v['title'];
                $tdl_array[$k]['content']=$v['content'];
                $tdl_array[$k]['thumb']='http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$v['original_img'];
            }
            $ms=$db->where(array('cat_id'=>46))->select(array('order'=>"sort_order ASC,add_time DESC")); //团队力
            $ms_array=array();
            foreach ($ms as $k=>$v){
                $ms_array[$k]['title']=$v['title'];
                $ms_array[$k]['thumb']='http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$v['original_img'];
            }

            $code=array(
                'tdl'=>$tdl_array,
                'ms'=>$ms_array
            );
            echo json_encode($code);
            exit;
        }elseif($act=="zhichi"){
            $jmzy=$db->where(array('cat_id'=>37))->limit(5)->select(array('order'=>"sort_order ASC,add_time DESC"));
            $jmzy_arr=array();
            $num=0;
            $thead=unserialize($jmzy[0]['attr']);
            foreach ($jmzy as $k=>$v){
                if($k>=1){

                    $jmzy_arr[$num]["title"]=$v['title'];
                    $tbody=unserialize($v['attr']);
                    $content=array();
                    foreach ($thead as $k2=>$v2){
                        foreach ($tbody as $k3=>$v3){
                            if($k2==$k3){
                                $content[$k2]=array($v2,$v3);
                            }
                        }
                    }
                    $jmzy_arr[$num]["content"]=$content;
                    $num++;
                }

            }
            $jmtj=$db->where(array('cat_id'=>47))->find(array('order'=>"sort_order ASC,add_time DESC"));

            $hzlc=$db->where(array('cat_id'=>48))->find(array('order'=>"sort_order ASC,add_time DESC"));
            $hzhb=$db->where(array('cat_id'=>40))->select(array('order'=>"sort_order ASC,add_time DESC"));
            $hzhb_attr=array();
            foreach ($hzhb as $k=>$v){
                $hzhb_attr[$k]['thumb']='http://'.$_SERVER['HTTP_HOST'].__ROOT__."/".$v['original_img'];
            }
            $code=array(
                'jmzy'=>$jmzy_arr,
                'jmtj'=>$jmtj,
                'hzlc'=>$hzlc,
                'hzhb'=>$hzhb_attr
            );
            echo json_encode($code);
            exit;
        }
    }
    public function getRegion(){

        $region_id=(int)$_GET['region_id'];
        $region_list = M('region')->where("parent_id=$region_id")->select();
        $region_array=array();

        foreach ($region_list as $key => $value) {
            $region_array[$key]['id']=$value['region_id'];
            $region_array[$key]['name']=$value['region_name'];
        }
        echo json_encode($region_array);
        exit;
    }

    //添加留言
    public function addMessage(){
        import('ORG.Net.IpLocation');
        $ipcongf=new IpLocation;
        $addres=$ipcongf->getlocation();
        $data = M('guestbook')->create();
        foreach($data as $v){
            if(empty($v)){

                echo $this->getErro(0,'请认真填写各项内容，再提交!');
                exit;
            }
        }

        //if (!is_email($data['email'])) $this->error('邮箱格式错误！');

        if (!is_phone($data['phone'])){
            echo $this->getErro(0,'电话格式错误!');
            exit;
        }

        $data['add_time'] = time();
        $data['address']=$addres['country'].'.'.$addres['area'];
        if(M('guestbook')->add($data)){
            echo $this->getErro(1,'您的留言已经提交，感谢您的反馈!');
            exit;
        }else{
            echo $this->getErro(0,'网络错误!');
            exit;
        }
    }
    private function getErro($code=0,$msg=""){
        $array=array(
            'code'=>$code,
            'msg'=>$msg,
            'time'=>date('Y-m-d H:i:s',time())
        );
        return json_encode($array);
    }
}
?>