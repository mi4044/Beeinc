<?php 
/**
 * 个人中心控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/23	蜜蜂科技 
 * *********************************************
 */
class PersonalcenterAction extends CommonAction
{
	//默认展示账户基本信息
	public function index()
	{
		//类型：0：账户信息，1：充值记录，2：订单记录，3：找回激活码，4：产品管理，
		$type = $_REQUEST['type'];
		$userid=$_SESSION['userid'];
		if(empty($userid))
		{
			$this->redirect('public/login');
		}
		if(empty($type)||$type==0)
		{
			$map['user.status']=1;
			$map['user.id']=$userid;
			$data=M('user')->join('left join user_balance ON user.id = user_balance.userid')->field('user.*,user_balance.balance')->where($map)->find();
			$data['username']=empty($data['mobile']) ? $data['email'] :$data['mobile'];
			$data['email']=empty($data['email']) ? '您未绑定邮箱' :$data['email'];
			if(empty($data['balance']))
			{
				$data['balance']=0;
				$data['balance']=number_format($data['balance'],2);
			}
			
			//var_dump($data);
		}elseif($type==1)
		{
			$map['user_id']=$userid;
			$data=M('rechargelog')->where($map)->select();
			
			var_dump($data);
		}elseif($type==2)
		{
			
			$map['user_id']=$userid;
			$data=M('order')->where($map)->select();
			
			
		}elseif($type==3)
		{
			
			$checkVerifyCode = verify_code('check');
			if ($checkVerifyCode === 0) {
				$this->error('验证码错误！');
			} elseif ($checkVerifyCode === -1) {
				$this->error('验证码过期！');
			}elseif($checkVerifyCode === 1)
			{
				//验证通过将激活码通过短信发送至用户手机
				$userid=$_SESSION['userid'];
				$data=M('user')->where('id = '.$userid)->find();
				$code=M('active_code')->field('activeCode')->where('userId = '.$userid)->find();
				if($data['mobile']<>'')
				{
					$send_result = sendSMS($_POST['account'], str_replace('{x}', $code, C('SMS_TPL_VERIFY_CODE')));
				}else
				{
					$send_result = sendEmail($_POST['account'], C('EMAIL_TPL_VERIFY_CODE_TITLE'), str_replace('{x}', $code, C('EMAIL_TPL_VERIFY_CODE')));
				}
				if($send_result === true)
				{
					$this->success('验证通过',index/index);
					exit;
				}	
			}
		}elseif($type==4)
		{
			$map['belong']=$userid;
			$data=M('product')->where($map)->select();
		}
		
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data',$data);
		$this->display();
		
	}
	//充值记录
	public function rechargerecord()
	{
		$userid=$_SESSION['userid'];
		//$userid=174;
		if(empty($userid))
		{
			$this->redirect('public/login');
		}
		$map['user_id']=$userid;
		// 计算总数
		$count = M('rechargelog')->where($map)->count();
		// 导入分页类
		import("ORG.Util.Page");
		// 实例化分页类
		$p = new Page($count, 10);
		// 分页显示输出
		$page = $p->show();
		//var_dump($page);
		// 当前页数据查询
		$data=M('rechargelog')->where($map)->order('create_time desc')->limit($p->firstRow.','.$p->listRows)->select();
		foreach($data as $k=>$v)
		{
			$data[$k]['create_time']=date("Y-m-d H:m:s",$v['create_time']);
		}
		//var_dump($data);
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data',$data);
		$this->assign('page',$page);
		$this->display();
	}
	//订单记录
	public function orderrecord()
	{
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data',$data);
		$this->display();
	}
	//产品管理
	public function productmanage()
	{
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data',$data);
		$this->display();
	}
	
	public function showinfo()
	{
		//类型：0：账户信息，1：充值记录，2：订单记录，3：找回激活码，4：产品管理，
		$type = $_REQUEST['type'];
		$userid=$_SESSION['userid'];
		if(empty($userid))
		{
			$this->redirect('public/login');
		}
		if(empty($type)||$type==0)
		{
			$map['user.status']=1;
			$map['user.id']=$userid;
			$data=M('user')->join('left join user_balance ON user.id = user_balance.userid')->field('user.*,user_balance.balance')->where($map)->find();
			$data['username']=empty($data['mobile']) ? $data['email'] :$data['mobile'];
			$data['email']=empty($data['email']) ? '您未绑定邮箱' :$data['email'];
			if(empty($data['balance']))
			{
				$data['balance']=0;
				$data['balance']=number_format($data['balance'],2);
			}
			//var_dump($data);
			$this->ajaxreturn($data);
			//var_dump($data);
		}elseif($type==1)
		{
			$map['user_id']=$userid;
			$data=M('rechargelog')->where($map)->select();
			
			var_dump($data);
		}elseif($type==2)
		{
			
			$map['user_id']=$userid;
			$data=M('order')->where($map)->select();
			
			
		}elseif($type==3)
		{
			
			$checkVerifyCode = verify_code('check');
			if ($checkVerifyCode === 0) {
				$this->error('验证码错误！');
			} elseif ($checkVerifyCode === -1) {
				$this->error('验证码过期！');
			}elseif($checkVerifyCode === 1)
			{
				//验证通过将激活码通过短信发送至用户手机
				$userid=$_SESSION['userid'];
				$data=M('user')->where('id = '.$userid)->find();
				$code=M('active_code')->field('activeCode')->where('userId = '.$userid)->find();
				if($data['mobile']<>'')
				{
					$send_result = sendSMS($_POST['account'], str_replace('{x}', $code, C('SMS_TPL_VERIFY_CODE')));
				}else
				{
					$send_result = sendEmail($_POST['account'], C('EMAIL_TPL_VERIFY_CODE_TITLE'), str_replace('{x}', $code, C('EMAIL_TPL_VERIFY_CODE')));
				}
				if($send_result === true)
				{
					$this->success('验证通过',index/index);
					exit;
				}	
			}
		}elseif($type==4)
		{
			$map['belong']=$userid;
			$data=M('product')->where($map)->select();
		}
		
		//$this->ajaxreturn($data);

	}
	
	
	//用户上传产品
	function addproduct()
    {
		
	}
	//查看产品详情
	function viewproductinfo()
    {
		$id = $_REQUEST['id'];
		$data=M('product')->where('id = '.$id)->select();
		$this->assign('data',$data);
		$this->display();

	}
	//修改产品信息
	function editproductinfo()
    {
		
	}
	
}

?>
