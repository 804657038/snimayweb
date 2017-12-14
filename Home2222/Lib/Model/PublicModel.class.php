<?php

class PublicModel extends Model {
	
	/**
      +----------------------------------------------------------
     * 验证管理员登录信息
      +----------------------------------------------------------
     */
	public function auth($datas){
		$datas = $_POST;
		$M = M("dealer_principal");
		if ( $M->where("`tel`='" . $datas['tel'] . "'")->count()>=1) {
			$info = $M->where("`tel`='" . $datas["tel"] . "'")->find();		
			if (md5($info['pwd']) == md5($datas['pwd']) && $info['tel'] == $datas['tel']) {
				// 登录成功
				// $action_list = M('role')->where('role_id='.$info['role_id'])->getField('action_list');
				self::set_admin_session($info['id'], $info['p_name']);
				// 更新最后登录时间和IP
				// $data['last_login']=time();
				// $data['last_ip']=real_ip();
				// $M->where(array('id='.$_SESSION['business_id']))->save($data);
                return array('status' => 1, 'info' => "登录成功！");
            } else {
                return array('status' => 0, 'info' => "账号或密码错误！");
            }
		} else {
            return array('status' => 0, 'info' => "账号或密码错误！");
        }
	}

	/**
      +----------------------------------------------------------
     * 设置管理员的session内容
      +----------------------------------------------------------
     */
	private function set_admin_session($user_id, $username)
	{
		session('business_id',   $user_id);
		session('business_name', $username);
		session('last_access',  time());
	}
}

?>
