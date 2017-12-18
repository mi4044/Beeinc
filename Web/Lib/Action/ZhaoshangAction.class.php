<?php 
/**
 * 招商加盟控制器
 ***********************************************
 * @author   wangjiaFred@outlook.com
 * @date 2016/8/12	蜜蜂科技 
 * *********************************************
 */
class ZhaoshangAction extends CommonAction
{
	public function index()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	public function join()
	{
		$num = $this->usernumber();
		$this->assign('num',$num );//用户数量
		$this->display();
	}
	Public function uploadpic(){
    	import('ORG.Net.UploadFile');
    	$upload = new UploadFile();
    	$upload->autoSub = true;
    	$upload->subType = 'custom';
    	if($upload->upload('.././ht/Public/Source/Zhaoshang/')){
    		$info = $upload->getUploadFileInfo();
    	}
    	$file_newname = $info['0']['savename'];
    	$MAX_SIZE = 90000000;
    	if($info['0']['type'] !='image/jpeg' && $info['0']['type'] !='image/jpg' && $info['0']['type'] !='image/bmp' && $info['0']['type'] != 'image/png' && $info['0']['type'] != 'image/x-png'){
    		echo "2";exit;
    	}
    	if($info['0']['size']>$MAX_SIZE)
    		echo "上传的文件大小超过了规定大小";
    	if($info['0']['size'] == 0)
    		echo "请选择上传的文件";
    	switch($info['0']['error'])
    	{
    		case 0:
    			echo $file_newname;
    			break;
    		case 1:
    			echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
    			break;
    		case 2:
    			echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
    			break;
    		case 3:
    			echo "文件只有部分被上传";
    			break;
    		case 4:
    			echo "没有文件被上传";
    			break;
    	}
    }
	Public function insert(){
		//接收值
		if(empty($_POST['company_name']))
		{
			$this->error('公司名称不能为空！');
		}
		if(empty($_POST['company_addr']))
		{
			$this->error('公司地址不能为空！');
		}
		if(empty($_POST['product']))
		{
			$this->error('代理产品不能为空！');
		}else
		{
			$product=json_encode($_POST['product']);
		}
		if(empty($_POST['card_image']))
		{
			$this->error('法人代表身份证照不能为空！');
		}
		if(empty($_POST['licence_image']))
		{
			$this->error('营业执照不能为空！');
		}
		if(empty($_POST['tax_reg_certificate']))
		{
			$this->error('税务登记证不能为空！');
		}
		$data['province']=$_POST['province'];
		$data['city']=$_POST['city'];
		$data['product']=$product;
		$data['realname']=$_POST['realname'];
		$data['department']=$_POST['department'];
		$data['mobile']=$_POST['mobile'];
		$data['email']=$_POST['email'];
		$data['qq']=$_POST['qq'];
		$data['company_name']=$_POST['company_name'];
		$data['company_addr']=$_POST['company_addr'];
		$data['represent_name']=$_POST['represent_name'];
		$data['companysite']=$_POST['companysite'];
		$data['telephone']=$_POST['telephone'];
		$data['business']=$_POST['business'];
		$data['invest']=$_POST['invest'];
		$data['market_research']=$_POST['market_research'];
		$data['measure']=$_POST['measure'];
		$data['card_image']=$_POST['card_image'];
		$data['licence_image']=$_POST['licence_image'];
		$data['tax_reg_certificate']=$_POST['tax_reg_certificate'];
		$data['other_info']=$_POST['other_info'];
		//存入数据
		$id=M('zhaoshang')->add($data);
		if(!empty($id))
		{
			$card_image = preg_replace('/./','.././ht',$data['card_image'],1);
			$licence_image = preg_replace('/./','.././ht',$data['licence_image'],1);
			$tax_reg_certificate = preg_replace('/./','.././ht',$data['tax_reg_certificate'],1);
			M('file_upload_log')->where('name ='.$card_image)->delete();
			M('file_upload_log')->where('name ='.$licence_image)->delete();
			M('file_upload_log')->where('name ='.$tax_reg_certificate)->delete();
			$this->success('提交申请成功！',U('index/index'));
		}else
		{
			$this->error('提交申请失败！');
		}

	}

}

?>
