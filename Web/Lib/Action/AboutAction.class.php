<?php 
/**
 * 关于我们
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/9	蜜蜂科技 
 * *********************************************
 */
class AboutAction extends CommonAction
{
	public function index()
	{
		
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
    //留言
    public function leavemessage()
    {
        header("Access-Control-Allow-Origin:*");
        if($_POST)
        {
			if(empty($_POST['name'])||empty($_POST['content']))
            {
                $res['status']=4;
                $res['msg']='留言内容不能为空';
                $this->ajaxReturn($res);
            }
            if(!empty($_POST['email']))
            {
                if(checkEmail($_POST['email'])==false)
                {
                    $res['status']=2;
                    $res['msg']='邮箱不合法';
                    $this->ajaxReturn($res);
                }
            }
			if(!empty($_POST['mobile']))
            {
				if(checkPhone($_POST['mobile'])==false)
				{
					$res['status']=3;
					$res['msg']='手机号不合法';
					$this->ajaxReturn($res);
				}
			}
            $data['name']=$_POST['name'];
            $data['email']=$_POST['email'];
            $data['mobile']=$_POST['mobile'];
            $data['content']=$_POST['content'];
            $data['addtime']=time();
            $id = M('leavemessage')->add($data);
            if(!empty($id))
            {
                $res['status']=1;
                $res['msg']='留言成功';
                $this->ajaxReturn($res);
                //$this->success('留言成功');
                //exit;
            }
            $res['status']=0;
            $res['msg']='留言失败';
            $this->ajaxReturn($res);
            //$this->error('留言失败！');
        }
    }

	public function team()
	{
		$num = $this->usernumber();
		$data=M('teamintro')->where('status = 1')->select();
		foreach($data as $k=>$v)
		{
			$data[$k]['image']=C('WEB_URL').$v['image'];
		}
		$this->assign('num',$num );//用户数量
		$this->assign('data',$data);
		$this->display();
	}
	public function cooperation()
	{
		//行业类别1：地板，2：陶瓷，3：石材，4：木门
		//地板行业
		$floor=M('partner')->where('type = 1')->select();
		foreach($floor as $k=>$v)
		{
			$floor[$k]['logo']=C('WEB_URL').$v['logo'];
		}
		//陶瓷行业
		$ceramics=M('partner')->where('type = 2')->select();
		foreach($ceramics as $k=>$v)
		{
			$ceramics[$k]['logo']=C('WEB_URL').$v['logo'];
		}
		//石材行业
		$stone=M('partner')->where('type = 3')->select();
		foreach($stone as $k=>$v)
		{
			$stone[$k]['logo']=C('WEB_URL').$v['logo'];
		}
		//木门行业
		$timber=M('partner')->where('type = 4')->select();
		foreach($timber as $k=>$v)
		{
			$timber[$k]['logo']=C('WEB_URL').$v['logo'];
		}
		$num = $this->usernumber();
		$this->assign('floor',$floor);
		$this->assign('ceramics',$ceramics);
		$this->assign('stone',$stone);
		$this->assign('timber',$timber);
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	
}


?>