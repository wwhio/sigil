<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sigil extends CI_Controller {

	/**
	* 显示主页
	*/
	public function index(){
		$this->load->library('tools');
		$this->load->model('comic_model');

		$tools = $this->tools;
		$comic_model = $this->comic_model;

		$root = $_SERVER['DOCUMENT_ROOT'].'/sigil/';

		//随机50本漫画
		$comicArray = $comic_model->selectComic($tools->mkRandomNumber(1,$comic_model->countMaxComicId(),20));
		//循环补全数据
		$mainData = array();
		$testNumber = 0;
		foreach ($comicArray as $key => $value) {
			$comic = new stdClass;
			$testNumber++;
			$randWidth = $tools->getRandWidth();

			//漫画名称
			$comic->name = $value->comic_name;
			//漫画id
			$comic->id = $value->comic_id;

			//封面路径
			$coverPath = $root.$value->chapter_cover;
			$coverPath = $tools->str_insert($coverPath , '_'.$randWidth->class , strrpos($coverPath , '.'));
			//判断封面是否存在
			if ($tools->ckCover($value->page_path , $coverPath , $randWidth->class , $randWidth->width , TRUE)){
				$path = $value->chapter_cover;
				$comic->coverPath = $tools->str_insert($path , '_'.$randWidth->class , strrpos($path , '.'));;
				//封面高度[＋10补正]
				if ($randWidth->class == 'width')
					$comic->coverHeight = 155;
				else
					$comic->coverHeight = 320;
				//随机的宽度类型
				$comic->coverWidth = $randWidth->class;
			} else {
				$coverErrorPath = '';
				$coverErrorPath = $tools->str_insert($coverErrorPath , '_'.$randWidth->class , strrpos($coverErrorPath , '.'));
				$comic->coverPath = $coverErrorPath;
				//封面高度[＋10补正]
				$comic->coverHeight = $tools->getImgHeight($coverErrorPath)+10;
				//随机的宽度类型
				$comic->coverWidth = $randWidth->class;
			}

			//排列编号
			switch ($key) {
				// case 5:
				// 	$comic->dataNumber = sizeof($comicArray);
				// 	break;
				// case 13:
				// 	$comic->dataNumber = sizeof($comicArray)+1;
				// 	break;
				// case 35:
				// 	$comic->dataNumber = sizeof($comicArray)+2;
				// 	break;
				default:
					$comic->dataNumber = $key;
					break;
			}
			//保存数据
			$mainData[] = $comic;
		}
		//var_dump($mainData);
		$param = array('main' => $mainData);
		$this->load->view('sigil_view' , $param);
	}



	public function mark(){
		//$this->load->view('sigil_main');

		//echo $this->comic_test->mk_testData();

		// $this->load->model("comic_test");
		// $comic = array('test' => $this->comic_test->test_select());
		// $this->load->view('sigil_main' , $comic);

		// for ($i=0; $i < 2; $i++) { 

		// $path = $_SERVER['DOCUMENT_ROOT'].'/sigil/update_comic/VOL00/000'.$i.'.jpg';
		// $cover = $_SERVER['DOCUMENT_ROOT'].'/sigil/update_cover/000'.$i.'_cover_width2.jpg';
		// echo $path."<br>";
		// echo $cover."<br>";

		// $config['image_library'] = 'gd2';
		// $config['source_image'] = $path;
		// $config['create_thumb'] = TRUE;
		// $config['maintain_ratio'] = TRUE;
		// $config['width'] = 220;
		// $config['height'] = 1000;
		// $config['new_image'] = $cover;
		// $config['master_dim'] = 'auto';

		// $this->load->library('image_lib');
		// $this->image_lib->initialize($config);

		// //生成缩略图
		// if ( ! $this->image_lib->resize())
		// {
		//     echo $this->image_lib->display_errors();
		// }
		// $this->image_lib->clear();
		// }
		$objTemp = (object)array();  
		$objTemp->a = 1;  
		$objTemp->b = 2;  
		$objTemp->c = 3;  

		$objArray = array();
		for ($i=0; $i < 10 ; $i++) { 
			$init = new stdClass;  
			$init->foo = "Test data";  
			$init->d = $i; 
			$objArray[] = $init;
		}
		var_dump($objArray);

		echo "<br>";

		$this->load->library('tools');
		//生成缩略图
		for ($i=0; $i < 9; $i++) { 

			$path = $_SERVER['DOCUMENT_ROOT'].'/sigil/update_comic/VOL00/000'.$i.'.jpg';
			$cover = $_SERVER['DOCUMENT_ROOT'].'/sigil/update_cover/000'.$i.'_cover_width2.jpg';
			
			echo $this->tools->ckCover($path , $cover ,'width2',220,TRUE)?'t':'f';
			echo "<br>";
		}
		
		var_dump($this->tools->mkRandomNumber(1 , 20 , 50));

		echo "<br>";
		echo "====================";
		echo "<br>";

		//随机宽度[随机宽度，缩略图的问题？a：用生成封面解决]
		$randomWidth = array('width' => 100 ,'width2' => 220);
		$class = array_rand($randomWidth , 1);
		echo $class . '_' . $randomWidth[$class].'<br>';

		//绝对路径
		echo __FILE__.'<br>';
		echo $_SERVER['DOCUMENT_ROOT'].'<br>'; 

		//取出图片的高
		echo getimagesize($_SERVER['DOCUMENT_ROOT'].'/sigil/update_cover/0005_cover_'.$class.'_thumb.jpg')[1];

		//显示图片
		$this->load->helper('html');
		echo img('update_cover/0005_cover_'.$class.'_thumb.jpg');
		echo '<br>';

		//max id
		$this->load->model("comic_test");
		$comic = $this->comic_test->test_count();
		echo sizeof($comic).'<br>';
		foreach ($comic as $row){
		   echo $row->test;
		}
		echo '<br>';

		//随机id[漫画数低于50，解决方案？a：以漫画为准]
		$max_id = $comic[0]->test;
		$arrayId = array();
		echo $max_id;
		echo '<br>';
		for ($i=0; $i < 50; $i++) { 
			$arrayId[] = rand(1 , $max_id);
		}
		var_dump($arrayId);
		echo '<br>';

		//get max id
		$this->load->model('comic_model');
		$id = $this->comic_model->countMaxComicId();
		echo 'id:'.$id.'<br>';

		if(file_exists($_SERVER['DOCUMENT_ROOT'].'/sigil/update_cover/0005_cover_'.$class.'_thumb.jpg')) 
			echo 'true<br>'; 
		else 
			echo 'false<br>';

		//get rand comic data
		$comicData = $this->comic_model->selectComic($arrayId);
		echo $comicData[0]->page_id;

		echo "<br>";
		echo "====================";
		echo "<br>";
		var_dump($comicData);


		echo "<br>";
		//echo phpinfo();
	}
}

?>