<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Global_interface extends MY_Controller{
 	
	function __construct(){

	}
	
	public function redactorUploadImage(){
		
		if($this->loginstatus):
			$uploadPath = 'download';
			if(isset($_FILES['file']['name']) && $_FILES['file']['error'] === UPLOAD_ERR_OK):
				if($this->imageResize($_FILES['file']['tmp_name'])):
					$uploadResult = $this->uploadSingleImage(getcwd().'/'.$uploadPath);
					if($uploadResult['status'] === TRUE && !empty($uploadResult['uploadData'])):
						if($this->imageResize($_FILES['file']['tmp_name'],NULL,TRUE,100,100,TRUE)):
							$this->uploadSingleImage(getcwd().'/'.$uploadPath.'/thumbnail','thumb_'.$uploadResult['uploadData']['file_name']);
						endif;
						$file = array(
							'filelink'=>base_url($uploadPath.'/'.$uploadResult['uploadData']['file_name'])
						);
						echo stripslashes(json_encode($file));
					endif;
				endif;
			elseif($_FILES['file']['error'] !== UPLOAD_ERR_OK):
				$message['error'] = $this->getFileUploadErrorMessage($_FILES['file']);
				echo json_encode($message);
			endif;
		endif;
	}
	
	public function redactorUploadedImages(){
		
		if($this->loginstatus):
			$uploadPath = 'download';
			$fullList[0] = $fileList = array('thumb'=>'','image'=>'','title'=>'Изображение','folder'=>'Миниатюры');
			if($listDir = scandir($uploadPath)):
				$index = 0;
				foreach($listDir as $number => $file):
					if(is_file(getcwd().'/'.$uploadPath.'/'.$file)):
						$thumbnail = getcwd().'/'.$uploadPath.'/thumbnail/thumb_'.$file;
						if(file_exists($thumbnail) && is_file($thumbnail)):
							$fileList['thumb'] = site_url($uploadPath.'/thumbnail/thumb_'.$file);
						endif;
						$fileList['image'] = site_url($uploadPath.'/'.$file);
						$fullList[$index] = $fileList;
						$index++;
					endif;
				endforeach;
			endif;
			echo json_encode($fullList);
		endif;
	}
	
}