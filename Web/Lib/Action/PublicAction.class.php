<?php
/**
 * 公共控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/5	蜜蜂科技 
 * *********************************************
 */
class PublicAction extends CommonAction
{
	public function login()
	{	
		
		header("Access-Control-Allow-Origin:*");
		if (IS_POST)
		{
			$array = I('post.');
			if(checkIsMobileOrEmail($array['username'])===1)
			{
				$condition['mobile'] = $array['username'];
			}elseif(checkIsMobileOrEmail($array['username'])===2)
			{
				$condition['email'] = $array['username'];
			}else
			{
				$data['status']=1;
				$data['msg']='用户名不正确';
				$this->ajaxReturn($data);
			}
			$account = M('user')->where($condition)->find();
			if (!$account || $account['password'] != md5($array['password']))
			{
				$data['status']=2;
				$data['msg']='用户名或密码错误';
				$this->ajaxReturn($data);	
			}
			session('userid',$account['id']);
			session ('username',$account['account']);
			$data['status']=3;
			$data['msg']='登录成功';
			$path=S('login_in_url');
			$data['redirect_url']=$path;
			S('login_in_url',null);
			$this->ajaxReturn($data);
		}
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->display();
	}
	
	//退出登录
	public function logout() 
	{
		session('userid',null); //注销uid,account
		session('username',null);
		header("location:".U('public/login'));
		//redirect('index/index');
		exit;
	}
	//忘记密码
	public function forgetpwd() 
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//忘记密码获取验证码
	function getVerifyCode()
    {
        $accountType = checkIsMobileOrEmail($_POST['account']);
        if ($accountType == 0)
		{
			$data['status']=0;
			$this->ajaxReturn($data);
		}
        $model = M('user');
        $type = $accountType == 1 ? 'mobile' : 'email';
        $user = $model->where($type . '="' . $_POST['account'] . '"')->find();
        if (is_null($user))
		{
			$data['status']=0;
			$this->ajaxReturn($data);
		}
        $verifyCode = verify_code();
        if ($accountType === 2)
            $send_result = sendEmail($_POST['account'], C('EMAIL_TPL_VERIFY_CODE_TITLE'), str_replace('{x}', $verifyCode, C('EMAIL_TPL_VERIFY_CODE')));
        else
            $send_result = sendSMS($_POST['account'], str_replace('{x}', $verifyCode, C('SMS_TPL_VERIFY_CODE')));
        if ($send_result === true) {
			session('uid',$user['id']);
			$data['status']=1;
			$this->ajaxReturn($data);
            //return true;
        } else {
			$data['status']=0;
			$this->ajaxReturn($data);
            //return false;
        }
    }
	//检查验证码是否正确
	function checkVerifyCode()
    {
        $checkVerifyCode = verify_code('check');
        if ($checkVerifyCode === 0) {
            $this->error('验证码错误！');
        } elseif ($checkVerifyCode === -1) {
            $this->error('验证码过期！');
        }else
		{
			//$this->redirect('public/login');
			//$this->redirect('public/updatepwd');
			//$this->success('验证通过',index/index);
			return true;
			//exit;
		}
		
		
	}
	//修改密码
	function updatepwd()
    {
		if($this->checkVerifyCode()==true)
		{
			$num = $this->usernumber();
			$this->assign('num',$num );//用户数量	
			$this->display();
		}else
		{
			$this->error('验证失败！');
		}
		
		
		/*
		$userid=$_SESSION['userid'];
		$password=$_POST['password'];
		$confpassword=$_POST['confpassword'];
		if($password<>$confpassword)
		{
			$this->error('两次密码不相同！');
		}
        //if (checkPassword($_POST['password']) === false) $this->error('密码不合法！');
        $data = array(
            'password' => ($_POST['password']),
            'updateTime' => time(),
        );
		
        if (($rs = M('user')->where('id=' . $userid)->save($data)) === false)
            $this->error('修改失败');
		else
			$this->success('修改成功');
			unset($_SESSION['userid']);
			*/
		
    }
	//重置密码
	public function resetpwd()
	{	
		$userid=$_SESSION['uid'];
		$password=$_POST['password'];
		$confpassword=$_POST['confirm_password'];
		if($password<>$confpassword)
		{
			$this->error('两次密码不相同！');
		}
		$data = array(
            'password' => md5($_POST['password']),
            'updateTime' => time(),
        );
		if (($rs = M('user')->where('id=' . $userid)->save($data)) === false)
            $this->error('重置失败');
		else
			$this->success('重置成功',U('public/login'));
			unset($_SESSION['uid']);
	}
	//搜索
	public function search()
	{
		if(IS_POST)
		{
			$keyword = I('post.keyword');
			$keyword = (isset($keyword)&&trim($keyword)!=''&&!is_null($keyword))?trim($keyword):'';
			
			
		}
		
	}
	
	
}

?>