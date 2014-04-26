<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 工具类
* Fren by 14-4-14
*/
class Tools {

	/**
	* 检查封面是否存在，没有重新创建个封面，递归一次
	* @path 原本的图片
	* @cover 封面的图片
	* @widthClass 宽的class名
	* @width 宽度
	* @sflag 递归flag
	* return true or false；
	*/
	public function ckCover($path,$cover,$widthClass,$width,$sflag=FALSE){
		$CI =& get_instance();
		//
		if (file_exists($cover)) {
			return TRUE;
		} else {
			$config['image_library'] = 'gd2';
			//$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['height'] = 1000;
			$config['master_dim'] = 'auto';

			$config['source_image'] = $path;
			$config['width'] = $width;
			$config['new_image'] = $cover;

			$CI->load->library('image_lib');
			/* 注意:这里官方文档给出的demo有问题，直接用libray加载$config，会无法批量处理图片*/
			$CI->image_lib->initialize($config);
			$error = $CI->image_lib->resize();
			$CI->image_lib->clear();
			//生成缩略图
			if (!$error) {
			    if ($sflag) {
				    $this->ckCover($path,$cover,$widthClass,$width,FALSE);
				} else {
					log_message("error" , "make cover is error! please check class Tools and function ckCover;");
					return FALSE;				
				}
			} else {
				return TRUE;
			}

		}		
	}

	/**
	* 生成指定数量的随机数，上限<生成数量的话，以生成数量为上限
	* @minRand 随机数下限
	* @maxRand 随机数上限
	* @count 生成数量
	* return array
	*/
	public function mkRandomNumber($minRand = 0, $maxRand = 1, $count = 1){
		$count = $maxRand < $count ? $maxRand : $count;
		$result = array();
		for ($i=0; $i < $count ; $i++) { 
			$rand = rand($minRand , $maxRand);
			if(in_array($rand,$result)){
				$i--;
			} else {
				$result[] = $rand;
			}
		}
		return array_unique($result);
	}

	/**
	* 得到指定图片的高
	* @path 图片路径
	* return string
	*/
	public function getImgHeight($path){
		return getimagesize($path)[1];
	}

	/**
	* 随机宽度
	* return obj
	*/
	public function getRandWidth(){
		$array = array('width' => 100 ,'width2' => 220);
		$class = array_rand($array , 1);
		$result = new stdClass;
		$result->class = $class;  
		$result->width = $array[$class];
		return $result;
	}

	/**
	* 按一定规则计算出宽度
	* return obj
	*/
	public function getRandWidthByNumber($number){
		$array = array('width' => 100 ,'width2' => 220);
		$class = array_rand($array , 1);
		$result = new stdClass;
		
		if ($number % 2 == 0){
			$result->class = 'width';  
			$result->width = 100;
		} else {
			$result->class = 'width2';  
			$result->width = 220;
		}
		return $result;
	}

	/**
	* 在a字符串中插入指定的b字符串
	* @str 原始字符串
	* @ist_str 需要的插入的字符串
	* @index 插入的位置
	* return string
	*/
	public function str_insert($str = '', $ist_str = '', $index = 0){
		return substr($str, 0 , $index).$ist_str.substr($str, $index , strlen($str));
	}
}
?>