<?php
class UploadAction extends CommonAction {
    public function index(){
        if (!empty($_FILES)) {
            import("ORG.Net.UploadFile");
            import("ORG.Image");
            $upload = new UploadFile(); // 实例化上传类
            $upload->maxSize = 500000; // 设置附件上传大小
            $upload->saveRule = 'uniqid';
            $upload->uploadReplace = true;
            $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->savePath = 'Uploads/cg/'; // 设置附件上传目录
            if (!$upload->upload()) { // 上传错误提示错误信息
                $error['msg'] = $upload->getErrorMsg();
                $error['status'] = 0;
                /*echo '<script type="text/javascript">alert("'.$error['message'].'");</script>';*/
                echo json_encode($error);
                exit;
            } else {
                // 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
                $info[0]['file'] = trim($info[0]['savepath'].$info[0]['savename'],'.');
                $code=array(
                    'status'=>1,
                    'img'=>__ROOT__.'/'.$info[0]['file'],
                    'url'=> $info[0]['file']
                );

                echo json_encode($code);
                //echo '<script>parent.set('.json_encode($info[0]).')</script>';
                exit;
            }
        }
    }


    public function rmimg(){
        $img_url=trim($_POST['img_url']);
        $code=array();
        if(unlink("./".$img_url)){
            $code['status']=1;
        }else{
            $code['status']=0;
            $code['msg']="网络错误，删除失败";
        };
        echo json_encode($code);
    }
}
?>