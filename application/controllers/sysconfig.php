<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Sysconfig extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$query = $this -> db -> get('sysconfig');
		$rows = $query -> result();
		$this -> load -> view('admin/admin-sysconfig.php', array('rows' => $rows));
	}

	function save() {
		foreach ($_POST as $key => $value) {
			$this -> db -> update('sysconfig', array('value' => $value), array('name' => $key));
		}
		redirect('sysconfig');
	}

}
?>