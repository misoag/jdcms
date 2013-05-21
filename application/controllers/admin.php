<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->view("admin/admin-login.php");
	}

	function login(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$username = isset($_POST['username'])?$_POST['username']:'';
			$password = isset($_POST['password'])?$_POST['password']:'';

			if(empty($username)){
				echo "账号不能为空！";
				exit();
			}

			if(empty($password)){
				echo "密码不能为空！";
				exit();
			}
			//检查非法参数
			jd_stopattack();
				
			$query = $this->db->query("select * from users where username = ? and password = ?",array($username,md5($password)));
			if($row = $query->row()){
				$this->session->set_userdata("user",$row);
				$row->password = '';
				$this->load->view("admin/admin-main.php",array("user"=>$row));
			}else{
				$this->index();
			}
		}else{
			if($row = $this->session->userdata('user')){
				$this->load->view("admin/admin-main.php",array("user"=>$row));
			}else{
				$this->index();
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
	
	function modifyPassword(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldpassword = isset($_POST['oldpassword'])?$_POST['oldpassword']:'';
			$newpassword1 = isset($_POST['newpassword1'])?$_POST['newpassword1']:'';
			$newpassword2 = isset($_POST['newpassword2'])?$_POST['newpassword2']:'';
			if($user = $this->session->userdata("user")){
				$username = $user->username;
			}
			$query = $this->db->query("select * from users where username = ? and `password` = ?" ,array($username,md5($oldpassword)));
			//修改密码
			$info = "";
			if($query->row()){
				if(!empty($newpassword1) && $newpassword1 == $newpassword2){
					$query = $this->db->query("update users set `password` = ? where username = ?",array(md5($newpassword1),$username));
					$info = "密码修改成功!";
				}else{
					$info = "新密码为空，或两次输入的密码不一致!";
				}
			}else{
				$info = "原密码错误!";
			}
			
			$this->load->view("admin/admin_modify_pwd.php",array("info"=>$info));
		}else{
			$this->load->view("admin/admin_modify_pwd.php");
		}
	}
	 		
}