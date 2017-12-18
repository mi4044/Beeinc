<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// |         lanfengye <zibin_5257@163.com>
// +----------------------------------------------------------------------

class Pager {
  
    // 默认列表每页显示行数
    public $pagesize = 20;
    // 起始行数
    public $firstRow=0;
    // 分页总页面数
    public $pagecount=0 ;
    // 总行数
    public $recordcount=0 ;
    // 当前页数
    public $pageindex=0;
    // 数据
    public $data=false;
    
  

    /**
     * 架构函数
     * @access public
     * @param array $recordcount  总的记录数
     * @param array $pageindex  当前页
     * @param array $pagesize  每页显示记录数     
     */
    public function __construct($recordcount,$pageindex,$pagesize) {
    	
    	if(!empty($pageindex))
    	{
    		$this->pageindex = $pageindex+1;
    	}
    	else 
    	{
    		$this->pageindex  = 1;
    	}
    	
    	if(!empty($pagesize))
    	{
    		$this->pagesize = $pagesize;
    	}
    	else 
    	{
    		$this->pagesize = 20;
    	}
    	
    	$this->recordcount = $recordcount;
        	    	
    	if(empty($recordcount))
    	{
    		$this->pagecount = 1;
    	}
    	else
    	{
    		if($recordcount%$pagesize>0)
    		{
    			$pagecount =floor ($this->recordcount/$this->pagesize)+1;
    		}
    		else
    		{
    			$pagecount = floor($this->recordcount/$this->pagesize);
    		}
    		 
    		if($pagecount<1)
    		{
    			$this->pagecount=1;
    		}
    		else 
    		{
    			$this->pagecount = $pagecount;
    		}
    	}
    	 	
    	
    	$this->firstRow = ($this->pageindex-1)* $this->pagesize;   
    }

    
    public function CreateResult($result,$max_id=false)
    {
    	$data = array();
    	$data["pageindex"]=$this->pageindex;
    	$data["pagesize"]=$this->pagesize;
    	$data["pagecount"]=$this->pagecount;
    	if(empty($result))
    	{
    		$result =array();
    	}
    	$data["data"]=$result;
    	if(!empty($max_id))
    	{
    		$data["max_id"]=$max_id;   
    	}	
    	return $data;	
    }
}
