<?php
class SpreeAction extends Action {
	
	private $appkey = 'GIFT';
	private $appsecret = '50e7e901ab895e6c5311cf94b6e969e8';
	private $url = 'http://39.108.156.196';
	//private $url = 'http://113.107.7.78:8081';
	private $redirect_uri = '';
	private $spree_user = array();
	
	public function __construct() {
		$this->spree_user = cookie('spree_user');
		
		if($this->spree_user) {
			$time = time() * 1000;
			$this->redirect_uri = '?timestamp='.$time.'&appkey='.$this->appkey.'&sign='.md5($this->appsecret.$this->appkey.$this->spree_user['userId'].$time);
		}
	}
	
	public function gift() {
		//cookie('spree_user',NULL);
		
		if(!$this->spree_user) {
			$this->redirect('Spree/login');
		}
		$this->assign('cook',$this->spree_user);
		$this->assign('redirect_uri',$this->redirect_uri);
		$this->js_config();
		$this->display();
	}

	public function gift_detail() {
		
		if(!$this->spree_user) {
			$this->redirect('Spree/login');
		}
		$this->assign('cook',cookie('spree_user'));
		$this->assign('redirect_uri',$this->redirect_uri);
		$this->js_config();
		$this->display();
	}
	
	public function login() {
		
		if(IS_POST) {
			$name = $this->_post('name');
			$password = $this->_post('password');
			$tip = array('error'=>1) ;
			
			if(!$name or !$password) {
				$tip['msg'] = '请先填写账号密码!';
				$this->ajaxReturn($tip,'JSON');
			}
			
			$time = time() * 1000;
			
			$post_data = array(
				'userAccount'=>$name,
				'password'=>md5($password),
			);
			
			$header_arr = array(
				'Content-Type: application/json; charset=utf-8',
			);

			$url = $this->url.'/api/gift/login?timestamp='.$time.'&appkey='.$this->appkey.'&sign='.md5($this->appsecret.$this->appkey.$time);
			$res = pcurl($url,json_encode($post_data),$header_arr);
			
			$res = json_decode($res,true);
			
			if($res['success'] == 'true' && $res['code'] == '0') {
				cookie('spree_user',$res['attributes'],3600);
				$tip = array('error'=>0) ;
				$this->ajaxReturn($tip,'JSON');
				
			} else {
				$tip['msg'] = $res['message'];
				$this->ajaxReturn($tip,'JSON');
			}
			
		} else {
			if(cookie('spree_user')) {
				$this->redirect('Spree/gift');
			}
			
			$this->js_config();
			$this->display();
		}
	}
	
	public function logout() {
		cookie('spree_user',NULL);
		$this->redirect('Spree/login');
	}

	private function js_config() {
		import("ORG.Wx.Jssdk");
		$jssdk = new JSSDK("wx6b9860fd89fbbf52", "1ec720aece1244d5d089b7df02bc631d");
		$signPackage = $jssdk->GetSignPackage();
		
		 echo '<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
            <script>
                wx.config({
                    debug: false,
                    appId: "'.$signPackage["appId"].'",
                    timestamp: "'.$signPackage["timestamp"].'",
                    nonceStr: "'.$signPackage["nonceStr"].'",
                    signature: "'. $signPackage["signature"].'",
                    jsApiList: ["hideAllNonBaseMenuItem,hideOptionMenu"]
                });
				  
				wx.ready(function(){
					wx.hideAllNonBaseMenuItem();
					wx.hideOptionMenu();
				});
            </script>';
	}
}