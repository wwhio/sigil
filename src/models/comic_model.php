<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 漫画的db实体
* Fren by 14-4-11
*/
class Comic_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	* 统计最大的漫画id
	*/
	function countMaxComicId(){
		$sql = "SELECT count(*) max_id FROM comic_main";
		$query = $this->db->query($sql);
		return $query->row()->max_id;
	}

	/**
	* 查询随机漫画
	*/
	function selectComic($arrayId=array('1')){
		$sql = 'SELECT * FROM comic_pages cp left join comic_main cm on cp.page_comic_id = cm.comic_id left join comic_chapters cc on cp.page_chapter_id = cc.chapter_id where cm.comic_id in (';
		for ($i=0; $i < sizeof($arrayId); $i++) { 
			$sql .= '?,';
		}
		$sql = substr($sql, 0 , -1);
		$sql .= ') group by cm.comic_id';
		$query = $this->db->query($sql , $arrayId);
		return $query->result();
	} 

	/**
	* 显示主页面
	*/
	function homePage(){
		$this->db->select("*");
		$query=$this->db->get("comic_main");
		return $query->result();
	}
}

?>