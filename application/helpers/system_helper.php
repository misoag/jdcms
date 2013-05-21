<?php
function jd_ci() {
	return ($ci = &get_instance());
}

function jd_baseurl_admin() {
	return base_url('application/views/admin') . '/';
}

function jd_baseurl_template() {
	return base_url('application/views/') . '/' . jd_sysconfig('sy_template_dir') . '/';
}
//URL同意采用字符串alias的方式
function jd_article_url($id){
	if(is_object($id)){
		if(!empty($id->alias)){
			$id = $id->alias;
		}else{
			$id = $id->id;
		}
	}elseif(is_numeric($id)){
		$article = jd_article($id);
		if(!empty($article) && !empty($article->alias)){
			$id = $article->alias;
		}
	}
	return site_url("art/$id");
}

function jd_product_url($id){
	if(is_object($id)){
		if(!empty($id->alias)){
			$id = $id->alias;
		}else{
			$id = $id->id;
		}
	}elseif(is_numeric($id)){
		$product = jd_product($id);
		if(!empty($product) && !empty($product->alias)){
			$id = $product->alias;
		}
	}
	return site_url("pro/$id");
}

function jd_category_url($id){
	if(is_object($id)){
		if(!empty($id->alias)){
			$id = $id->alias;
		}else{
			$id = $id->id;
		}
	}elseif(is_numeric($id)){
		$category = jd_category($id);
		if(!empty($category) && !empty($category->alias)){
			$id = $category->alias;
		}
	}
	return site_url("cat/$id");
}



function jd_sysconfig($name, $value = 0) {
	$query =    jd_ci() -> db -> get_where('sysconfig', array('name' => $name));
	$row = $query -> row();
	if (!empty($row)) {
		return $row -> value;
	} else {
		return $value;
	}
}

function jd_web_title(){
	return jd_sysconfig('sy_webname');
}
function jd_web_keywords(){
	return jd_sysconfig('sy_keywords');
}
function jd_web_description(){
	return jd_sysconfig('sy_description');
}

function jd_category($id) {
	if(is_numeric($id)){
		$query = jd_ci()->db->query("select * from category where id = ?",array($id));
	}else{
		$query = jd_ci()->db->query("select * from category where alias = ?",array($id));
	}
	return $query -> row();
}

function jd_category_list($pid) {
	if(is_numeric($pid)){
		$query = jd_ci()->db->query("select * from category where pid = ? order by sort desc",array($pid));
		return $query->result();
	}else{
		$query = jd_ci()->db->query("select * from category where alias = ?",array($pid));
		if($category = $query->row()){
			$query = jd_ci()->db->query("select * from category where pid = ? order by sort desc",array($category->id));
			return $query->result();
		}
	}
}

function jd_category_count($pid) {
	$query = jd_ci()->db->query("select count(*) as count from category where pid = ?",array($pid));
	return $query->row()->count;
}

function jd_article($id) {
	if(is_numeric($id)){
		$query = jd_ci()->db->query("select * from articles where id = ?",array($id));
	}else{
		$query = jd_ci()->db->query("select * from articles where alias = ?",array($id));
	}
	return $query->row();
}

function jd_articles($cid,$start,$limit){
	if(is_numeric($cid)){
		if($cid ==1){
			$query = jd_ci()->db->query("select * from articles where visible=0 order by sort desc,id desc limit ?,?",array($start,$limit));
		}else{
			$query = jd_ci()->db->query("select * from articles where cid = ? and visible=0 order by sort desc,id desc limit ?,?",array($cid,$start,$limit));
		}
	}else{
		if($cid == 'article'){
			$query = jd_ci()->db->query("select * from articles where visible=0 order by sort desc,id desc limit ?,?",array($start,$limit));
		}else{
			$query = jd_ci()->db->query("select * from category where alias = ?",array($cid));
			if($category = $query->row()){
				$query = jd_ci()->db->query("select * from articles where cid = ? and visible=0 order by sort desc,id desc limit ?,?",array($category->id,$start,$limit));
			}
		}
	}
	$rows = $query->result();
	return $rows;
}

function jd_article_count($cid){
	if($cid == 1){
		$query = jd_ci()->db->query("select count(id) as count from articles");
	}else{
		$query = jd_ci()->db->query("select count(id) as count from articles where cid = ?",array($cid));
	}
	return $query->row()->count;
}

function jd_product($id){
	if(is_numeric($id)){
		$query = jd_ci()->db->query("select * from products where id = ?",array($id));
	}else{
		$query = jd_ci()->db->query("select * from products where alias = ?",array($id));
	}
	//查询图片
	if($row = $query->row()){
		$query = jd_ci()->db->query("select * from image where aid = ?",array($row->id));
		$row->images = $query->result();
		return $row;
	}
}

function jd_products($cid,$start,$limit){
	if(is_numeric($cid)){
		if($cid == 2){
			$query = jd_ci()->db->query("select * from products order by sort desc,id desc limit ?,?",array($start,$limit));
		}else{
			$query = jd_ci()->db->query("select * from products where cid = ? order by sort desc,id desc limit ?,?",array($cid,$start,$limit));
		}
	}else{
		if($cid == 'product'){
			$query = jd_ci()->db->query("select * from products order by sort desc,id desc limit ?,?",array($start,$limit));
		}else{
			$query = jd_ci()->db->query("select * from category where alias = ?",array($cid));
			if($category = $query->row()){
				$query = jd_ci()->db->query("select * from products where cid = ? order by sort desc,id desc limit ?,?",array($category->id,$start,$limit));
			}
		}
	}
	$rows= $query->result();
	return $rows;
}

function jd_product_count($cid){
	if($cid == 2){
		$query = jd_ci()->db->query("select count(id) as count from products");
	}else{
		$query = jd_ci()->db->query("select count(id) as count from products where cid = ?",array($cid));
	}
	return $query->row()->count;
}

function jd_pagination($baseurl, $total, $limit, $segment) {
	jd_ci() -> load -> library('pagination');
	$config['base_url'] = site_url($baseurl);
	$config['total_rows'] = $total;
	$config['num_links'] = '6';
	$config['uri_segment'] = $segment;
	$config['per_page'] = $limit;
	$config['first_link'] = '首页';
	$config['last_link'] = '尾页';
	jd_ci() -> pagination -> initialize($config);
	$links = jd_ci() -> pagination -> create_links();
	return $links;
}
function jd_pagination_products($category,$limit){
	$cid = $category->id;
	if(!empty($category->alias)){
		$cid = $category->alias;
	}
	return jd_pagination("/cat/$cid/", jd_product_count($category->id), $limit,3);
}
function jd_pagination_articles($category,$limit){
	$cid = $category->id;
	if(!empty($category->alias)){
		$cid = $category->alias;
	}
	return jd_pagination("/cat/$cid/", jd_article_count($category->id), $limit,3);
}

function jd_upload($field_name) {
	jd_ci() -> load -> library('upload');
	$config['upload_path'] = str_replace("\\", "/", FCPATH . "uploads" . '/');
	$config['allowed_types'] = '*';
	$config['max_size'] = '10240';
	$config['max_width'] = '10240';
	$config['max_height'] = '10240';
	$config['encrypt_name'] = true;
	jd_ci() -> upload -> initialize($config);
	//upload
	if (jd_ci() -> upload -> do_upload($field_name)) {
		return    jd_ci() -> upload -> data();
	} else {
		return    null;
	}
}

function jd_delete_file($file_name){
	$file = str_replace("\\", "/", FCPATH . $file_name);
	if (file_exists($file)) {
		$result=unlink ($file);
		echo $result;
	}
}

function jd_show_image($filename) {
	return base_url("uploads/$filename");
}

if (!function_exists('jd_category_select')) {
	$select_html = "";
	function jd_category_select($pid, $selected = 1) {
		static $deep = 0;
		global $select_html;

		$prefix = _prefix($deep);

		$category = jd_category($pid);
		if (!empty($category) ) {
			if ($selected == $category -> id) {
				$select_html .= "<option value='{$category->id}' selected='selected'>{$prefix}$category->title</option>";
			} else {
				$select_html .= "<option value='{$category->id}'>{$prefix}$category->title</option>";
			}
		}
		$count = jd_category_count($pid);
		if ($count > 0) {
			$categories = jd_category_list($pid);
			foreach ($categories as $category) {
				$deep++;
				jd_category_select($category -> id, $selected);
			}
		}
		$deep--;
		return $select_html;
	}

	function _prefix($deep) {
		$prefix = '';
		for ($i = 0; $i < $deep; $i++) {
			$prefix .= '&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		return $prefix . '┗';
	}
}


/**
 * 截取“中文”字符串
 * Enter description here ...
 * @param unknown_type $str
 * @param unknown_type $length
 * @param unknown_type $append
 * @return string
 */
function jd_substr($str, $length = 0, $append = true) {
	$str = trim ( $str );
	$strlength = strlen ( $str );

	if ($length == 0 || $length >= $strlength) {
		return $str;
	} elseif ($length < 0) {
		$length = $strlength + $length;
		if ($length < 0) {
			$length = $strlength;
		}
	}

	if (function_exists ( 'mb_substr' )) {
		$newstr = mb_substr ( $str, 0, $length, 'utf-8' );
	} elseif (function_exists ( 'iconv_substr' )) {
		$newstr = iconv_substr ( $str, 0, $length, 'utf-8' );
	} else {
		$newstr = substr ( $str, 0, $length );
	}

	if ($append && $str != $newstr) {
		$newstr .= '...';
	}

	return $newstr;
}


?>