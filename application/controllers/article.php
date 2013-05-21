<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Article extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$cid = $this -> uri -> segment(3, 1);
		$cid = empty($_GET['cid'])?$cid:$_GET['cid'];
		$start = intval($this -> uri -> segment(4, 0),0);
		$limit = 15;
		if($cid == 1){
			$query = $this->db->query("select count(*) as count from articles");
			$count = $query->row()->count;
			$query = $this->db->query("select * from articles order by sort desc,id desc limit ?,?",array($start,$limit));
			$rows = $query->result();
		}else{
			$query = $this->db->query("select count(*) as count from articles where cid = ?",array($cid));
			$count = $query->row()->count;
			$query = $this->db->query("select * from articles where cid = ? order by sort desc,id desc limit ?,?",array($cid,$start,$limit));
			$rows = $query->result();
		}
		$this -> load -> view('admin/admin-article.php', array('rows'=>$rows,'cid' => $cid, 'start' => $start, 'limit' => $limit, 'count' => $count));
		// 记录当前请求路径
		$this -> session -> set_userdata('cur_url', "/article/index/$cid/$start");
	}

	public function add($cid) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$uploadfile = jd_upload('uploadfile');
			if(!empty($uploadfile['file_name'])){
				$_POST['preimg'] = jd_show_image($uploadfile['file_name']);
			}
			$_POST['createtime'] = date('Y-m-d H:i:s');
			$_POST['updatetime'] = date('Y-m-d H:i:s');
			$this -> db -> insert('articles', $_POST);
			$this -> redirect_history();
		} else {
			$this -> load -> view('admin/admin-article-add.php', array('cid' => $cid));
		}
	}

	public function update($cid, $id) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$uploadfile = jd_upload('uploadfile');
			if(!empty($uploadfile['file_name'])){
				$_POST['preimg'] = jd_show_image($uploadfile['file_name']);
			}
			$visible = empty($_POST['visible'])?0:$_POST['visible'];
			$content = ascii_to_entities($_POST['content']);
			$this -> db -> update('articles', array('cid'=>$_POST['cid'],'alias'=>$_POST['alias'],'visible'=>$visible,'title' => $_POST['title'], 'keywords' => $_POST['keywords'], 'description' => $_POST['description'], "preimg" =>$_POST['preimg'], 'content' => $content,'template'=>$_POST['template']), array('id' => $id));
			$this -> redirect_history();
		} else {
			$archive = jd_article($id);
			$archive->content = entities_to_ascii($archive->content);
			$this -> load -> view("admin/admin-article-update.php", array('archive' => $archive));
		}
	}

	public function delete($cid, $id) {
		$this -> db -> delete('articles', array('id' => $id));
		$this -> redirect_history();
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
		$this -> db -> update('articles', array('sort' => $_POST['sort']), array('id' => $_POST['id']));
		echo $_POST['sort'];
	}
}
