<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$cid = $this -> uri -> segment(3, 2);
		$cid = empty($_GET['cid'])?$cid:$_GET['cid'];
		$start = intval($this -> uri -> segment(4, 0),0);
		$limit = 10;
		if($cid == 2){
			$query = $this->db->query("select count(*) as count from products");
			$count = $query->row()->count;
			$query = $this->db->query("select * from products order by sort desc,id desc limit ?,?",array($start,$limit));
			$rows = $query->result();
		}else{
			$query = $this->db->query("select count(*) as count from products where cid = ?",array($cid));
			$count = $query->row()->count;
			$query = $this->db->query("select * from products where cid = ? order by sort desc,id desc limit ?,?",array($cid,$start,$limit));
			$rows = $query->result();
		}
		$this -> load -> view('admin/admin-product.php', array('rows'=>$rows,'cid' => $cid, 'start' => $start, 'limit' => $limit, 'count' => $count));
		// 记录当前请求路径
		$this -> session -> set_userdata('cur_url', "/product/index/$cid/$start");
	}

	public function add($cid) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$uploadfile = jd_upload('uploadfile');
			if(!empty($uploadfile['file_name'])){
				$_POST['preimg'] = jd_show_image($uploadfile['file_name']);
			}else{
				$_POST['preimg']='';
			}
			
			$date = date('Y-m-d H:i:s');
			$data = array($_POST['cid'],$_POST['alias'],$_POST['title'],$_POST['keywords'],$_POST['description'],$_POST['content'],$_POST['preimg'],$date,$date,$_POST['template']);
			$this->db->query("INSERT INTO `products` (`cid`,`alias`, `title`, `keywords`, `description`, `content`,`preimg`, `createtime`, `updatetime`,`template`) VALUES (?,?,?,?,?,?,?,?,?,?)",$data);			
			$aid = $this->db->insert_id();
			//修改图片
			$tmp_aid = $_POST['tmp_aid'];
			if($tmp_aid<0){
				$this->db->query("update image set aid = ? where aid = ?",array($aid,$tmp_aid));
			}
			$this -> redirect_history();
		} else {
			$this -> load -> view('admin/admin-product-add.php', array('cid' => $cid));
		}
	}

	public function update($cid, $id) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$uploadfile = jd_upload('uploadfile');
			if(!empty($uploadfile['file_name'])){
				$_POST['preimg'] = jd_show_image($uploadfile['file_name']);
			}
			
			$this -> db -> update('products', array('cid'=>$_POST['cid'],'alias'=>$_POST['alias'],'title' => $_POST['title'], 'keywords' => $_POST['keywords'], 'description' => $_POST['description'], 'content' => $_POST['content'],'preimg'=>$_POST['preimg'],'template'=>$_POST['template']), array('id' => $id));
			$this -> redirect_history();
		} else {
			$archive = jd_product($id);
			$this -> load -> view("admin/admin-product-update.php", array('archive' => $archive));
		}
	}

	public function delete($cid, $id) {
		$this -> db -> delete('products', array('id' => $id));
		//删除图片
		$query = $this->db->query("select * from image where aid = $id");
		$rows = $query->result();
		foreach ($rows as $image){
			jd_delete_file("uploads/$image->linkl");
		}
		$this->db->query("delete from image where aid = $id");
		//END 删除图片
		$this -> redirect_history();
	}

	public function ajax_delete_image($id) {
		$query = $this->db->query("select * from image where id = ?",array($id));
		$image = $query->row();
		$this -> db -> delete('image', array('id' => $id));
		jd_delete_file("uploads/$image->linkl");
		echo true;
	}

	public function ajax_upload_image($aid) {
		$data = jd_upload('Filedata');
		$linkr = jd_show_image($data['file_name']);
		$this -> db -> insert('image', array('aid' => $aid, 'linkr' => $linkr, 'linkl' => $data['file_name']));
		$data['file_name'] = $linkr;
		echo json_encode($data);
	}

	private function redirect_history() {
		$cur_url = $this -> session -> userdata('cur_url');
		if (!empty($cur_url)) {
			redirect($cur_url);
		} else {
			redirect("article/index");
		}
	}
	
	public function ajax_update_sort(){
		$this -> db -> update('products', array('sort' => $_POST['sort']), array('id' => $_POST['id']));
		echo $_POST['sort'];
	}
}
