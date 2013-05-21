<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$this -> load -> view('admin/admin-category.php');
	}

	function add($pid) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this -> db -> insert('category', $_POST);
			$this -> index();
		} else {
			$this -> load -> view('admin/admin-category-add.php', array('pid' => $pid));
		}
	}

	function update($pid) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this -> db -> update('category', $_POST, array('id' => $pid));
			$this -> index();
		} else {
			$query = $this -> db -> get_where("category", array('id' => $pid));
			$category = $query -> row();
			$this -> load -> view('admin/admin-category-update.php', array('category' => $category));
		}
	}

	function delete($id) {
		//如果有子分类，则要先删除子分类才行
		$count = jd_category_count($id);
		if ($count == 0) {
			$category = jd_category($id);
			switch ($category->model) {
				case 1 :
					$this -> db -> delete('articles', array('cid' => $id));
					break;
				case 2 :
					$this -> db -> delete('products', array('cid' => $id));
					break;
			}
			$this -> db -> delete('category', array('id' => $id));
			$this -> index();
		}else{
			echo "请先删除子分类";
		}
	}

	function ajax_update_sort() {
		$this -> db -> update('category', array('sort' => $_POST['sort']), array('id' => $_POST['id']));
		echo $_POST['sort'];
	}

	function ajax_update_alias() {
		$this -> db -> update('category', array('alias' => $_POST['alias']), array('id' => $_POST['id']));
		echo $_POST['alias'];
	}

}
?>