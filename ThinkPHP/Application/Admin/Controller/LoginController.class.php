<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
      
	  $user=I('user');
	  if($user== 'admin'){
		   $this->success('新增成功', U('Menu/index'));
	  }else{
		  $this->error('新增失败'); 
	  }
	 // $this->display();
    }
}