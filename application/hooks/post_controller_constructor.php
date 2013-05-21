<?php
class PostControllerConstructor {
	function check_session(){
		//在这里配置需要拦截的类
		$intercept_array = array('article','category','product','sysconfig');
		
		$class = jd_ci()->router->class;
		//检查session是否存在
		if(in_array($class, $intercept_array)){
			jd_ci()->load->library('session');
			$session = jd_ci()->session->userdata('user');
			if(empty($session)){
				redirect("/");
				exit();
			}
		}
	}
}