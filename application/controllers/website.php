<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Website extends CI_Controller {

	private $template = 'jdcms';

	function __construct() {
		parent::__construct();
		$this->template = jd_sysconfig("sy_template_dir");
	}

	public function index() {
		$this->load->view($this->template."/index.php");
	}

	public function article(){
		$id = $this->uri->segment(2,'');
		if(!empty($id)){
			$article = jd_article($id);
			if(!empty($article)){
				//增加一次点击
				$this->db->query("UPDATE articles SET click = (click + 1)  WHERE id = ?",array($article->id));
				$category = jd_category($article->cid);
				$data = array('article'=>$article,'category'=>$category);

				if(!empty($article->template)){
					$this->load->view($this->template.'/'.$article->template,$data);
				}else{
					$this->load->view($this->template.'/'.$category->template_content,$data);
				}
			}else{
				echo "没有找到对应的文章";
			}
		}else{
			echo "参数错误";
		}
	}

	public function product(){
		$id = $this->uri->segment(2,'');
		if(!empty($id)){
			$query = $this->db->query("select * from products where id = ?",array($id));
			$product = $query->row();
			if(!empty($product)){
				//增加一次点击
				$this->db->query("UPDATE articles SET click = (click + 1)  WHERE id = ?",array($article->id));

				if(!empty($product->template)){
					$this->load->view($this->template.'/'.$product->template);
				}else{
					$category = jd_category($product->cid);
					$data = array("product"=>$product,"category"=>$category);
					$this->load->view($this->template.'/'.$category->template_content,$data);
				}
			}else{
				echo "没有找到对应的文章";
			}
		}else{
			echo "参数错误";
		}
	}

	public function category(){
		$id = $this->uri->segment(2,'');
		$start = $this->uri->segment(3,0);
		if(!empty($id)){
			$category = jd_category($id);
			if(!empty($category)){
				$data = array('category'=>$category,'start'=>intval($start));
				//判断是否是封面
				if($category->is_cover){
					$this->load->view($this->template.'/'.$category->template_index,$data);
				}else{
					$this->load->view($this->template.'/'.$category->template_list,$data);
				}
			}else{
				echo "没有找到对应的分类";
			}
		}else{
			echo "分类参数错误";
		}
	}

	public function publish(){
		$ip = $this->getRealIpAddr();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$cid = isset($_POST['cid'])?$_POST['cid']:'';
			$title = isset($_POST['title'])?$_POST['title']:'';
			$content = isset($_POST['content'])?$_POST['content']:'';
			if(!empty($title) && !empty($content)){
				$query = $this->db->query("select count(*) as count from articles where keywords = '$ip'");
				$count = $query->row()->count;
				if($count<20){
					$time = date('Y-m-d H:i:s');
					$data = array($cid,$title,'匿名用户',$content,$time,$time,1,$ip);
					$this->db->query("INSERT INTO articles(cid,title,author,content,createtime,updatetime,visible,keywords) VALUES(?,?,?,?,?,?,?,?);",$data);
				}
			}
			$this->load->view($this->template.'/publish.php',array("info"=>"你发表成功，请等待管理员审核！"));

		}else{
			$this->load->view($this->template.'/publish.php');
		}
	}

	private function getRealIpAddr(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			//这里用来判断是否使用代理服务器
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}
