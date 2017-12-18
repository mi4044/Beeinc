<?php 
/**
 * 在线购买控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/12	蜜蜂科技 
 * *********************************************
 */
class OnlineAction extends CommonAction
{	
	//软件
	public function index()
	{
		//1:软件,2:硬件,3:服务
		$map['cateid']=1;
		$map['status']=1;
		$data=M('webgoods')->where($map)->order('id asc')->select();
		foreach($data as $k=>$v)
		{
			$data[$k]['image']=C('WEB_URL').$v['image'];
		}
		$sqsm=$data[0];//石全石美
		$mfrj=$data[1];//蜜蜂软件
		$num = $this->usernumber();
		$this->assign('num',$num);//用户数量
		$this->assign('sqsm',$sqsm);
		$this->assign('mfrj',$mfrj);
		$this->display();
	}
	
	//石全石美购买说明
	public function sexplain()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//石全石美购买
	public function buysqsm()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//石全石美详细信息
	public function sqsminfo()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//蜜蜂软件购买说明
	public function mexplain()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//蜜蜂软件购买
	public function buymfrj()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//蜜蜂软件详细信息
	public function mfrjinfo()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	
	//服务
	public function service()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//短信服务购买说明
	public function dexplain()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//短信服务详情
	public function messageinfo()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	
	//户型定制服务购买说明
	public function hexplain()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	//户型定制服务购买
	public function buyhxdz()
	{
		//默认欧式风格的相关情况
		$map['style']='欧式';
		$map['statu']=1;
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		//风格
		$style = M('serviceprice')->distinct(true)->field('style')->select();
		//空间(默认欧式风格的相关情况)
		$space = M('serviceprice')->where($map)->distinct(true)->field('space,price')->select();
		$this->assign('style', $style);
		$this->assign('space', $space);
		$this->display();
	}
	
	//场景定制服务购买
	public function buycjdz()
	{
		//默认欧式风格的相关情况
		$map['style']='欧式';
		$map['statu']=1;
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		//风格
		$style = M('serviceprice')->distinct(true)->field('style')->select();
		//空间(默认欧式风格的相关情况)
		$space = M('serviceprice')->where($map)->distinct(true)->field('space,price')->select();
		$this->assign('style', $style);
		$this->assign('space', $space);
		$this->display();
	}
	
	//硬件
	public function hardware()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	
	//购买定制服务
	public function customizeinfo()
	{	
		//默认欧式风格的相关情况
		$map['style']='欧式';
		$map['statu']=1;
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		//风格
		$style = M('serviceprice')->distinct(true)->field('style')->select();
		//空间(默认欧式风格的相关情况)
		$space = M('serviceprice')->where($map)->distinct(true)->field('space,price')->select();
		$this->assign('style', $style);
		$this->assign('space', $space);
		$this->display();
	}
	//获取购买定制服务空间价格
	public function getcustomizeprice()
	{	
		//默认欧式风格的相关情况
		$map['style']=$_POST['style'];
		$map['statu']=1;
		$data = M('serviceprice')->field('space,price')->where($map)->select();
		//var_dump($data);
		//$this->assign('data', $data );
		if(!empty($data))
		{
			$this->ajaxReturn($data);
		}
		//$this->display();
	}
	//登记购买人基本信息
	public function recordinfo()
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
            $id = M('ordermanage')->add($data);
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
	
	
}

?>
