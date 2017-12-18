<?php 
/**
 * 客户帮助
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/6	蜜蜂科技 
 * *********************************************
 */
class HelpAction extends CommonAction
{
	public function index()
	{
		
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->display();
	}
	public function questionlist()
	{
		//问题分类
		$cate = M('commonproblem')->field('title')->where('status = 1')->select();
		//var_dump($cate);
		for($i=0;$i<count($cate);$i++)
		{
			$map['title']=$cate[$i]['title'];
			$map['status']=1;
			$problem[$i] = M('commonproblem')->where($map)->find();
			$problem[$i]['content'] = str_replace('./Public/Source/Commonproblem/',C('WEB_URL').'/Public/Source/Commonproblem/',$problem[$i]['content']);
		}
		//var_dump($problem);
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('problem', $problem );
		$this->assign('cate', $cate );
		$this->display();
	}
	public function sqsm()
	{
		//soft_cate:0石全石美,1蜜蜂软件
		//软件使用说明书分类
		$where['soft_cate']=0;
		$where['status']=1;
		$cate = M('softinstruction')->field('type')->where($where)->select();
		$this->assign('cate', $cate );
		for($i=0;$i<count($cate);$i++)
		{
			$map['type']=$cate[$i]['type'];
			$map['soft_cate']=0;
			$sqsm[$i] = M('softinstruction')->where($map)->where('status = 1')->find();
			$sqsm[$i]['content'] = str_replace('./Public/Source/Softinstruction/',C('WEB_URL').'/Public/Source/Softinstruction/',$sqsm[$i]['content']);
			
		}
		//var_dump($sqsm);
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('sqsm', $sqsm );
		$this->display();
	}
	public function mfrj()
	{
		//soft_cate:0石全石美,1蜜蜂软件
		//软件使用说明书分类
		$where['soft_cate']=1;
		$where['status']=1;
		$cate = M('softinstruction')->field('type')->where($where)->select();
		$this->assign('cate', $cate );
		for($i=0;$i<count($cate);$i++)
		{
			$map['type']=$cate[$i]['type'];
			$map['soft_cate']=1;
			$mfrj[$i] = M('softinstruction')->where($map)->where('status = 1')->find();
			$mfrj[$i]['content'] = str_replace('./Public/Source/Softinstruction/',C('WEB_URL').'/Public/Source/Softinstruction/',$mfrj[$i]['content']);
			
		}
		//var_dump($mfrj);
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('mfrj', $mfrj );
		$this->display();
	}
	public function videolist()
	{
		$videolist = M('videoteach')->where('status = 1')->select();
		for($i=0;$i<count($videolist);$i++)
		{
			$videolist[$i]['create_time']=date('Y/m/d',$videolist[$i]['create_time']) ;
			$videolist[$i]['cover']=C('WEB_URL').$videolist[$i]['cover'];
		}
		
		//var_dump($videolist);
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('videolist', $videolist);
		$this->display();
	}
	public function video()
	{
		if(empty($_REQUEST['id']))
		{
			//$this->error('参数错误！');
		}
		$id = $_REQUEST['id'];
		$video = M('videoteach')->where('id = '.$id)->find();
		$video['create_time']=date('Y/m/d',$video['create_time']);
		$filename = $video['video'];
		$video['ext'] = pathinfo($filename,PATHINFO_EXTENSION);
		$video['video']=C('WEB_URL').$video['video'];
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('video', $video);
		
		$this->display();
	}
	public function feedback()
    {
        header("Access-Control-Allow-Origin:*");
        if($_POST)
        {
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
            $data['create_time']=time();
            $id = M('web_feedback')->add($data);
            if(!empty($id))
            {
                $res['status']=1;
                $res['msg']='反馈成功';
                $this->ajaxReturn($res);
                //$this->success('反馈成功');
                //exit;
            }
            $res['status']=0;
            $res['msg']='反馈失败';
            $this->ajaxReturn($res);
            //$this->error('反馈失败！');
        }
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->display();
    }

}


?>