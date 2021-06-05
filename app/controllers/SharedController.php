<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * articles_tag_value_exist Model Action
     * @return array
     */
	function articles_tag_value_exist($val){
		$db = $this->GetModel();
		$db->where("tag", $val);
		$exist = $db->has("articles");
		return $exist;
	}

	/**
     * articles_tag_option_list Model Action
     * @return array
     */
	function articles_tag_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT id AS value , name AS label FROM tags ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

}
