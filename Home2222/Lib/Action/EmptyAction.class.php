<?php
class EmptyAction extends CommonAction{
    public function index(){
        //header("Location:404.htm",true,301);
        header('HTTP/1.1 404 Not Found'); 
		header("status: 404 Not Found");
        $this->display("Public:404");
    }
}
?>