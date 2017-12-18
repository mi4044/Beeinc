<?php 
/**
 * 新闻控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/12	蜜蜂科技 
 * *********************************************
 */
class NewsAction extends CommonAction
{
	//公司新闻
	public function index()
	{
		//新闻类型：0：行业新闻，1：公司新闻，2：活动推广，3：公开课
		$map['type']=1;
		$map['status']=1;
		$data=M('webnews')->where($map)->order('create_time desc')->select();
		foreach($data as $k=>$v)
		{
			$data[$k]['cover']=C('WEB_URL').$v['cover'];
		}
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data',$data);
		$this->display();
	}
	//行业新闻
	public function ournews()
	{
		//新闻类型：0：行业新闻，1：公司新闻，2：活动推广，3：公开课
		$map['type']=0;
		$map['status']=1;
		$data=M('webnews')->where($map)->order('create_time desc')->select();
		foreach($data as $k=>$v)
		{
			$data[$k]['cover']=C('WEB_URL').$v['cover'];
		}
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('data',$data);
		$this->display();
	}
	
	public function newsinfo()
	{
		if(empty($_REQUEST['id']))
		{
			$this->redirect("index/index");
		}
		$id = $_REQUEST['id'];
		$news = M('webnews')->where('id = '.$id)->find();
		if(empty($news))
		{
			$this->redirect("index/index");
		}
		$news['create_time']=date('Y/m/d H:m:s',$news['create_time']);
		//替换图片url地址
		$news['content'] = str_replace('./Public/Source/Webnews/',C('WEB_URL').'/Public/Source/Webnews/',$news['content']);
		//右边切换栏目
		$map['type']=$news['type'];
		$map['status']=1;
		$newsmenu = M('webnews')->where($map)->order('create_time desc')->select();
		foreach($newsmenu as $k=>$v)
		{
			$newsmenu[$k]['cover']=C('WEB_URL').$v['cover'];
		}
		$num = $this->usernumber();
		$this->assign('num', $num );//用户数量
		$this->assign('news', $news );
		$this->assign('newsmenu', $newsmenu );
		$this->display();
	}
	
	
}

?>
