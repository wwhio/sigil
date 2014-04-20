<?php
/**
* 测试ci框架model读取数据
*/
class Comic_test extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function test_select(){
		$this->db->select("*");
		$query=$this->db->get("comic_main");
		return $query->result();
	}

	function test_count(){
		$query = $this->db->query("select count(*) as test from comic_main");
		return $query->result();
	}

	function mk_testData(){
		$comicNumber = 1000; //1000本漫画
		$comicPages = 100; //每本100页
		$comicChapter = 10; //每10页一章
		//插入漫画
		for ($i=1; $i <= $comicNumber; $i++) { 
			$data = array('comic_name' => '漫画'.$i, 'comic_state' => 0);
			$this->db->insert("comic_main" , $data);
		}

		//插入章节
		for ($i=1; $i <= $comicNumber; $i++){
			$chapter = 1;
			for ($j=1; $j <= $comicPages ; $j++) { 
				if (($j % 10) ==0){
					$data = array('chapter_label' => '第'.$chapter.'章', 'chapter_cover' => '封面'.$chapter.'.jpg');
					$this->db->insert("comic_chapters" , $data);
					$chapter++;
				}
			}
		}

		//插入页
		for ($i=1; $i <= $comicNumber; $i++){
			$chapter = 1;
			for ($j=1; $j <= $comicPages ; $j++) { 
				$data = array('page_comic_id' => $i, 'page_chapter_id' => $chapter , 'page_path' => $j.'.jpg');
				$this->db->insert("comic_pages" , $data);
				if (($j % 10) ==0){
					$chapter++;
				}
			}
		}
		return "mk test Data success!";		
	}
}

?>
<!-- 
DELETE FROM `comic_pages` WHERE 1;

DELETE FROM `comic_chapters` WHERE 1;

DELETE FROM `comic_main` WHERE 1;


ALTER TABLE `comic_chapters` AUTO_INCREMENT =1 ;
ALTER TABLE `comic_main` AUTO_INCREMENT =1 ;
ALTER TABLE `comic_pages` AUTO_INCREMENT =1 ; 

SELECT * FROM comic_pages cp left join comic_main cm on cp.page_comic_id = cm.comic_id left join comic_chapters cc on cp.page_chapter_id = cc.chapter_id group by cm.comic_id
1000，100，10 ＝ select time 0.094
SELECT * FROM comic_pages cp left join comic_main cm on cp.page_comic_id = cm.comic_id left join comic_chapters cc on cp.page_chapter_id = cc.chapter_id where cm.comic_id = 1 group by cc.chapter_id
1000，100，10 ＝ select time 0.072
-->