<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_interface extends MY_Controller {

	function __construct(){

		parent::__construct();
	}

	public function redactorUploadImage(){

		$uploadPath = getcwd().'/download/';
		$fileName = $this->uploadSingleImage($uploadPath);
		$file = array(
			'filelink'=>base_url('download/'.$fileName)
		);
		echo stripslashes(json_encode($file));
	}

	public function sendCallbackMessage(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'Error. Try again.');
		if($this->postDataValidation('callback') === TRUE):
			$json_request['status'] = $this->parseAndSendMail($this->uri->language_string,$_POST);
		endif;
		echo json_encode($json_request);
	}

	/******************************************** admin interface *******************************************************/
	/********** brends ************/
	public function insertBrend(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('brend') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($brendID = $this->ExecuteCreatingBrend($_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if(isset($_FILES['file']['tmp_name'])):
					$this->uploadBrendLogo($brendID);
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Фабрика (бренд) добавлена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/brends?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function updateBrend(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('brend') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($this->ExecuteUpdatingBrend($this->input->get('id'),$_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if(isset($_FILES['file']['tmp_name'])):
					$this->load->model('brends');
					$oldImage = $this->brends->value($this->input->get('id'),'logo');
					$this->filedelete(getcwd().'/'.$oldImage);
					$json_request['responsePhotoSrc'] = base_url($this->uploadBrendLogo($this->input->get('id')));
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Фабрика (бренд) cохранена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/brends?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function removeBrend(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->deleteBrend($this->input->post('id'))):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Фабрика (бренд) удалена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/brends?mode=list');
		endif;
		echo json_encode($json_request);
	}

	private function ExecuteCreatingBrend($post){
		if(isset($post['file'])):
			unset($post['file']);
		endif;
		if($brendID = $this->insertItem(array('insert'=>$post,'model'=>'brends'))):
			return $brendID;
		endif;
		return FALSE;
	}

	private function ExecuteUpdatingBrend($id,$post){

		if(isset($post['file'])):
			unset($post['file']);
		endif;
		$post['id'] = $id;
		$this->updateItem(array('update'=>$post,'model'=>'brends'));
		return TRUE;
	}

	private function uploadBrendLogo($id){

		$responsePhotoSrc = '';
		$resultUpload = $this->uploadSingleImage(getcwd().'/img/partners/');
		if($resultUpload['status'] == TRUE):
			$this->load->model('brends');
			$responsePhotoSrc = 'img/partners/'.$resultUpload['uploadData']['file_name'];
			$this->brends->updateField($id,'logo',$responsePhotoSrc);
		endif;
		return $responsePhotoSrc;
	}

	private function deleteBrend($id){

		$this->load->model(array('brends'));
		$logo = $this->brends->getWhere($id);
		$this->filedelete(getcwd().'/'.$logo['logo']);
		return $this->brends->delete($id);
	}



	/********** news ************/
	public function insertNews(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('news') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены поля формы'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;

        $urlstr = $_POST['url'];
        if(!$urlstr)
            $urlstr = $_POST['ru_title2'];
        if (preg_match('/[^A-Za-z0-9_\-]/', $urlstr)) {
            $urlstr = translitIt($urlstr);
            $urlstr = preg_replace('/[^A-Za-z0-9_\-]/', '', $urlstr);
        }
        if(!$urlstr)
            $urlstr = $_POST['en_title2'];
        $_POST['url'] = $urlstr;

		if($newsID = $this->ExecuteCreatingNews($_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				#if(isset($_FILES['file']['tmp_name'])): ## double checking... WAT?
					$this->uploadNewsMainImage($newsID);
				#endif;
			endif;

            ## Если передана галерея - пересобираем массив переданных файлов, т.к. CI_Upload умеет работать только с одномерным массивом каждого файла
            #print_r($_FILES); #die;
            $key = 'files';
            if (!empty($_FILES[$key]) && count(@$_FILES[$key]['name'])) {
            	foreach ($_FILES[$key]['name'] as $f => $file) {
            		$_FILES[$key . $f] = array(
            		    'name'     => $_FILES[$key]['name'][$f],
            		    'type'     => $_FILES[$key]['type'][$f],
            		    'tmp_name' => $_FILES[$key]['tmp_name'][$f],
            		    'error'    => $_FILES[$key]['error'][$f],
            		    'size'     => $_FILES[$key]['size'][$f],
            		);
            	}
            	#unset($_FILES['files']);
            	$this->uploadNewsImages($newsID, $key);
            }
            #print_r($_FILES); die;

			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Новость добавлена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/news?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function updateNews(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'','redirect'=>site_url(ADMIN_START_PAGE));
#print_r($_POST); #die;
        #$_POST['en_full'] = addslashes($_POST['en_full']);
		if($this->postDataValidation('news') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		$newsID = $this->input->get('id');
#print_r($_FILES); #die;
#print_r($_POST); die;

        $urlstr = $_POST['url'];
        if(!$urlstr)
            $urlstr = $_POST['ru_title2'];
        if (preg_match('/[^A-Za-z0-9_\-]/', $urlstr)) {
            $urlstr = translitIt($urlstr);
            $urlstr = preg_replace('/[^A-Za-z0-9_\-]/', '', $urlstr);
        }
        if(!$urlstr)
            $urlstr = $_POST['en_title2'];
        $_POST['url'] = $urlstr;

		if($this->ExecuteUpdatingNews($newsID, $_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				#if(isset($_FILES['file']['tmp_name'])):
					$this->load->model('news');
					$oldImage = $this->news->value($newsID, 'image');
					$this->filedelete(getcwd().'/'.$oldImage);
					$json_request['responsePhotoSrc'] = base_url($this->uploadNewsMainImage($newsID));
				#endif;
			endif;

            ## Если передана галерея - пересобираем массив переданных файлов, т.к. CI_Upload умеет работать только с одномерным массивом каждого файла
            #print_r($_FILES); #die;
            $key = 'files';
            if (!empty($_FILES[$key]) && count(@$_FILES[$key]['name'])) {
            	foreach ($_FILES[$key]['name'] as $f => $file) {
            		$_FILES[$key . $f] = array(
            		    'name'     => $_FILES[$key]['name'][$f],
            		    'type'     => $_FILES[$key]['type'][$f],
            		    'tmp_name' => $_FILES[$key]['tmp_name'][$f],
            		    'error'    => $_FILES[$key]['error'][$f],
            		    'size'     => $_FILES[$key]['size'][$f],
            		);
            	}
            	#unset($_FILES['files']);
            	$this->uploadNewsImages($newsID, $key);
            }
            #print_r($_FILES); die;

            #print_r( $this->input->post('del_img') ); die;
            ## Удаляем отмеченные изображения для текущей новости
            #print_r( count($this->input->post('del_img')) ); die;
            if ( is_array($this->input->post('del_img')) && count($this->input->post('del_img')) > 0 ) {            	foreach ($this->input->post('del_img') as $img_name) {            		$fn = getcwd().'/img/news/'.$newsID.'/'.$img_name;
            		#echo $fn; die;            		if (file_exists($fn))                		unlink($fn);
            	}
            }

			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Новость обновлена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/news?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function removeNews(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->deleteNews($this->input->post('id'))):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Новость удалена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/news?mode=list');
		endif;
		echo json_encode($json_request);
	}

	private function ExecuteCreatingNews($post){
		if(isset($post['file']))
			unset($post['file']);
		if(isset($post['files']))
			unset($post['files']);
		$post['added'] = date("Y-m-d H:i:s");
		if($newsID = $this->insertItem(array('insert'=>$post,'model'=>'news'))):
			return $newsID;
		endif;
		return FALSE;
	}

	private function ExecuteUpdatingNews($id,$post){

		if(isset($post['file']))
			unset($post['file']);
		if(isset($post['files']))
			unset($post['files']);
		if(isset($post['del_img']))
			unset($post['del_img']);

		$post['id'] = $id;
		$this->updateItem(array('update'=>$post,'model'=>'news'));
		return TRUE;
	}

	private function uploadNewsMainImage($id){
		$responsePhotoSrc = '';
		$resultUpload = $this->uploadSingleImage(getcwd().'/img/news/'.$id);
#print_r($resultUpload); die;
		if($resultUpload['status'] == TRUE):
			$this->load->model('news');
			$responsePhotoSrc = 'img/news/'.$id.'/'.$resultUpload['uploadData']['file_name'];
			$this->news->updateField($id,'image',$responsePhotoSrc);
		endif;
		return $responsePhotoSrc;
	}

	private function uploadNewsImages($id, $key){
		$responsePhotoSrc = '';
		$resultUpload = $this->uploadImages(getcwd().'/img/news/'.$id, $key);
		return $resultUpload['status'];
		/*
		if($resultUpload['status'] == TRUE):
			$this->load->model('news');
			$responsePhotoSrc = 'img/news/'.$id.'/'.$resultUpload['uploadData']['file_name'];
			$this->news->updateField($id,'image',$responsePhotoSrc);
		endif;
		return $responsePhotoSrc;
		*/
	}

	private function deleteNews($id){

		$this->load->model(array('news'));
		foreach (glob(getcwd().'/img/news/'.$id.'/*') as $file)
		    unlink($file);
	    @rmdir(getcwd().'/img/news/'.$id.'/');
		return $this->news->delete($id);
	}



	/********** factory ************/
	public function insertFactory(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('factory') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($brendID = $this->ExecuteCreatingFactory($_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if(isset($_FILES['file']['tmp_name'])):
					$this->uploadFactoryLogo($brendID);
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Фабрика добавлена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/factory?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function updateFactory(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('factory') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($this->ExecuteUpdatingFactory($this->input->get('id'),$_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if(isset($_FILES['file']['tmp_name'])):
					$this->load->model('factory');
					$oldImage = $this->factory->value($this->input->get('id'),'logo');
					$this->filedelete(getcwd().'/'.$oldImage);
					$json_request['responsePhotoSrc'] = base_url($this->uploadFactoryLogo($this->input->get('id')));
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Фабрика cохранена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/factory?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function removeFactory(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->deleteFactory($this->input->post('id'))):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Фабрика удалена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/factory?mode=list');
		endif;
		echo json_encode($json_request);
	}

	private function ExecuteCreatingFactory($post){
		if(isset($post['file'])):
			unset($post['file']);
		endif;
		if($brendID = $this->insertItem(array('insert'=>$post,'model'=>'factory'))):
			return $brendID;
		endif;
		return FALSE;
	}

	private function ExecuteUpdatingFactory($id,$post){

		if(isset($post['file'])):
			unset($post['file']);
		endif;
		$post['id'] = $id;
		$this->updateItem(array('update'=>$post,'model'=>'factory'));
		return TRUE;
	}

	private function uploadFactoryLogo($id){

		$responsePhotoSrc = '';
		$resultUpload = $this->uploadSingleImage(getcwd().'/img/factory/');
		if($resultUpload['status'] == TRUE):
			$this->load->model('factory');
			$responsePhotoSrc = 'img/factory/'.$resultUpload['uploadData']['file_name'];
			$this->factory->updateField($id,'logo',$responsePhotoSrc);
		endif;
		return $responsePhotoSrc;
	}

	private function deleteFactory($id){

		$this->load->model('factory');
		$logo = $this->factory->getWhere($id);
		$this->filedelete(getcwd().'/'.$logo['logo']);
		return $this->factory->delete($id);
	}

	/********** categories ************/
	public function insertCategory(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('category') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($categoryID = $this->ExecuteCreatingCategory($_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if($this->imageManupulation($_FILES['file']['tmp_name'],'width',TRUE,583,390)):
					$this->uploadCategoryLogo($categoryID);
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Категория добавлена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/categories?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function updateCategory(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('category') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($this->ExecuteUpdatingCategory($this->input->get('id'),$_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if($this->imageManupulation($_FILES['file']['tmp_name'],'width',TRUE,583,390)):
					$this->load->model('categories');
					$oldImage = $this->categories->value($this->input->get('id'),'logo');
					$this->filedelete(getcwd().'/'.$oldImage);
					$json_request['responsePhotoSrc'] = base_url($this->uploadCategoryLogo($this->input->get('id')));
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Категория cохранена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/categories?mode=list');
		endif;
		echo json_encode($json_request);
	}

	public function removeCategory(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->deleteCategory($this->input->post('id'))):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Категория удалена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/categories?mode=list');
		endif;
		echo json_encode($json_request);
	}

	private function ExecuteCreatingCategory($post){

		if(isset($post['file'])):
			unset($post['file']);
		endif;
		if($categoryID = $this->insertItem(array('insert'=>$post,'model'=>'categories'))):
			return $categoryID;
		endif;
		return FALSE;
	}

	private function ExecuteUpdatingCategory($id,$post){

		if(isset($post['file'])):
			unset($post['file']);
		endif;
		$post['id'] = $id;
		$this->updateItem(array('update'=>$post,'model'=>'categories'));
		return TRUE;
	}

	private function uploadCategoryLogo($id){

		$responsePhotoSrc = '';
		$resultUpload = $this->uploadSingleImage(getcwd().'/img/categories/');
		if($resultUpload['status'] == TRUE):
			$this->load->model('categories');
			$responsePhotoSrc = 'img/categories/'.$resultUpload['uploadData']['file_name'];
			$this->categories->updateField($id,'logo',$responsePhotoSrc);
		endif;
		return $responsePhotoSrc;
	}

	private function deleteCategory($id){

		$this->load->model(array('categories'));
		$category = $this->categories->getWhere($id);
		$this->filedelete(getcwd().'/'.$category['logo']);
		return $this->categories->delete($id);
	}

	/*****************************/
	/********** collections ************/
	public function insertCollection(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>site_url(ADMIN_START_PAGE));
		if($this->postDataValidation('collection') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($collectionID = $this->ExecuteCreatingCollection($_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if($this->imageManupulation($_FILES['file']['tmp_name'],'width',TRUE,290,180)):
					$this->uploadCollectionLogo($collectionID,$_POST['url']);
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Коллекция добавлена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/collections/add?mode=insert&brend='.$this->input->post('brend').'&category='.$this->input->post('category').'&id='.$collectionID.'&step=2');
		endif;
		echo json_encode($json_request);
	}

	public function updateCollection(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','redirect'=>FALSE);
		if($this->postDataValidation('collection') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($this->ExecuteUpdatingCollection($this->input->get('id'),$_POST)):
			if(isset($_FILES['file']['tmp_name'])):
				if($this->imageManupulation($_FILES['file']['tmp_name'],'width',TRUE,290,180)):
					$this->load->model('collections');
					$oldImage = $this->collections->value($this->input->get('id'),'logo');
					$this->filedelete(getcwd().'/'.$oldImage);
					$json_request['responsePhotoSrc'] = base_url($this->uploadCollectionLogo($this->input->get('id'),$_POST['url']));
				endif;
			endif;
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Коллекция cохранена';
		endif;
		echo json_encode($json_request);
	}

	public function removeCollection(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->deleteCollection($this->input->post('id'))):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Коллекция удалена';
			$json_request['redirect'] = site_url(ADMIN_START_PAGE.'/collections?mode=list&brend='.$this->input->post('brend').'&category='.$this->input->post('category'));
		endif;
		echo json_encode($json_request);
	}
	/*------------------------------------*/
	public function collectionUploadImage(){

		if(!$this->input->is_ajax_request() && !$this->input->get_request_header('X-file-name',TRUE)):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'');
		$uploadPath = 'img/collections';
		$this->load->model('collections');
		if($collectionUrl = $this->collections->value($this->input->get('id'),'url')):
			$uploadPath = $uploadPath.'/'.$collectionUrl;
		endif;
		if($this->imageManupulation($_FILES['file']['tmp_name'])):
			$resultUpload = $this->uploadSingleImage(getcwd().'/'.$uploadPath);
			$json_request['status'] = $resultUpload['status'];
			$size = ($this->input->get('size') !== FALSE)?$this->input->get('size'):340;
			if($this->imageManupulation($_FILES['file']['tmp_name'],NULL,TRUE,$size,$size,TRUE)):
				$thumbNailUpload = $this->uploadSingleImage(getcwd().'/'.$uploadPath.'/thumbnail');
			endif;
			if($resultUpload['status'] == TRUE && $thumbNailUpload['status'] == TRUE):
				$json_request['status'] = TRUE;
				$json_request['responsePhotoSrc'] = $this->saveCollectionImage($uploadPath,$size,$resultUpload['uploadData'],$thumbNailUpload['uploadData']);
			else:
				$json_request['responseText'] = $resultUpload['message'];
			endif;
		endif;
		echo json_encode($json_request);
	}

	public function collectionRemoveImage(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->input->post('resourceID') != FALSE):
			$this->load->model('collections_images');
			$resource = $this->collections_images->getWhere($this->input->post('resourceID'));
			$this->filedelete(getcwd().'/'.$resource['resource']);
			$this->filedelete(getcwd().'/'.$resource['thumbnail']);
			$this->collections_images->delete($this->input->post('resourceID'));
			$json_request['status'] = TRUE;
		endif;
		echo json_encode($json_request);
	}

	public function collectionImageCaption(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE);
		if($this->postDataValidation('image_caption') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		$this->load->model('collections_images');
		$this->collections_images->updateField($_POST['id'],'ru_caption',$_POST['ru_caption']);
		$this->collections_images->updateField($_POST['id'],'en_caption',$_POST['en_caption']);
		$this->collections_images->updateField($_POST['id'],'number',$_POST['number']);
		$json_request['status'] = TRUE;
		echo json_encode($json_request);
	}

	private function saveCollectionImage($path,$size,$resource,$thumbnail){

		$this->load->model('collections_images');
		$number = $this->collections_images->getNextNumber(array("collection"=>$this->input->get('id')));
		$resourceData = array("collection"=>$this->input->get('id'),'number'=>$number,'grid'=>$size,'thumbnail'=>$path.'/thumbnail/'.$thumbnail['file_name'],"resource"=>$path.'/'.$resource['file_name']);
		/**************************************************************************************************************/
		if($resourceID = $this->insertItem(array('insert'=>$resourceData,'model'=>'collections_images'))):
			$this->load->helper('string');
			$html = '<img class="img-rounded" src="'.base_url($resourceData['thumbnail']).'" alt="" />';
			$html .= '<a href="#" data-resource-id="'.$resourceID.'" class="delete-resource-item">&times;</a>';
			return $html;
		else:
			return '';
		endif;
	}
	/*------------------------------------*/
	private function ExecuteCreatingCollection($post){

		if(isset($post['file'])):
			unset($post['file']);
		endif;
		if($collectionID = $this->insertItem(array('insert'=>$post,'model'=>'collections'))):
			return $collectionID;
		endif;
		return FALSE;
	}

	private function ExecuteUpdatingCollection($id,$post){

		if(isset($post['file'])):
			unset($post['file']);
		endif;
		$post['id'] = $id;
		$this->updateItem(array('update'=>$post,'model'=>'collections'));
		return TRUE;
	}

	private function uploadCollectionLogo($id,$collectionURL = ''){

		$responsePhotoSrc = '';
		$path = 'img/collections/'.$collectionURL;
		$resultUpload = $this->uploadSingleImage(getcwd().'/'.$path);
		if($resultUpload['status'] == TRUE):
			$this->load->model('collections');
			$responsePhotoSrc = $path.'/'.$resultUpload['uploadData']['file_name'];
			$this->collections->updateField($id,'logo',$responsePhotoSrc);
		endif;
		return $responsePhotoSrc;
	}

	private function deleteCollection($id){

		$this->load->model(array('collections','collections_images'));
		$collection = $this->collections->getWhere($id);
		$images = $this->collections_images->getWhere(NULL,array('collection'=>$id),TRUE);
		for($i=0;$i<count($images);$i++):
			$this->filedelete(getcwd().'/'.$images[$i]['thumbnail']);
			$this->filedelete(getcwd().'/'.$images[$i]['resource']);
		endfor;
		$this->filedelete(getcwd().'/'.$collection['logo']);
		$this->collections_images->delete(NULL,array('collection'=>$id));
		return $this->collections->delete($id);
	}
	/* -------------------------------------------------------------- */
	public function updatePage(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->postDataValidation('page') === FALSE):
			$json_request['responseText'] = $this->load->view('html/validation-errors',array('alert_header'=>'Неверно заполнены обязательные поля'),TRUE);
			echo json_encode($json_request);
			return FALSE;
		endif;
		if($this->ExecuteUpdatingPage($this->input->get('id'),$_POST)):
			$json_request['status'] = TRUE;
			$json_request['responseText'] = 'Cтраница cохранена';
		endif;
		echo json_encode($json_request);
	}

	public function pageUploadResources(){

		if(!$this->input->is_ajax_request() && !$this->input->get_request_header('X-file-name',TRUE)):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'','responsePhotoSrc'=>'');
		$uploadPath = 'img/fotorama';
		$this->load->model('collections');
		if($this->imageManupulation($_FILES['file']['tmp_name'],NULL,TRUE,1920,1080)):
			$resultUpload = $this->uploadSingleImage(getcwd().'/'.$uploadPath);
			$json_request['status'] = $resultUpload['status'];
			if($this->imageManupulation($_FILES['file']['tmp_name'],NULL,TRUE,170,170,TRUE)):
				$thumbNailUpload = $this->uploadSingleImage(getcwd().'/'.$uploadPath.'/thumbnail');
			endif;
			if($resultUpload['status'] == TRUE && $thumbNailUpload['status'] == TRUE):
				$json_request['status'] = TRUE;
				$json_request['responsePhotoSrc'] = $this->savePageResource($uploadPath,$resultUpload['uploadData'],$thumbNailUpload['uploadData']);
			else:
				$json_request['responseText'] = 'Ошибка при загрузке';
			endif;
		else:
			$json_request['responseText'] = $this->getFileUploadErrorMessage($_FILES['file']);
		endif;
		echo json_encode($json_request);
	}

	public function removePageResource(){

		if(!$this->input->is_ajax_request()):
			show_error('В доступе отказано');
		endif;
		$json_request = array('status'=>FALSE,'responseText'=>'');
		if($this->input->post('resourceID') != FALSE):
			$this->load->model('page_resources');
			$resourcePath = getcwd().'/'.$this->page_resources->value($this->input->post('resourceID'),'resource');
			$this->page_resources->delete($this->input->post('resourceID'));
			$this->filedelete($resourcePath);
			$json_request['status'] = TRUE;
		endif;
		echo json_encode($json_request);
	}

	private function ExecuteUpdatingPage($id,$post){

		$post['id'] = $id;
		if(isset($post['content'])):
			$post['content'] = json_encode($post['content']);
		endif;
		$this->updateItem(array('update'=>$post,'model'=>'pages'));
		return TRUE;
	}

	private function savePageResource($path,$resource,$thumbnail){

		$this->load->model('page_resources');
		$number = $this->page_resources->getNextNumber(array("url"=>$this->uri->segment(3)));
		$resourceData = array("url"=>$this->uri->segment(3),'number'=>$number,'thumbnail'=>$path.'/thumbnail/'.$thumbnail['file_name'],"resource"=>$path.'/'.$resource['file_name']);
		/**************************************************************************************************************/
		if($resourceID = $this->insertItem(array('insert'=>$resourceData,'model'=>'page_resources'))):
			$this->load->helper('string');
			$html = '<img class="img-rounded" src="'.base_url($resourceData['thumbnail']).'" alt="" />';
			$html .= '<a href="#" data-resource-id="'.$resourceID.'" class="delete-resource-item">&times;</a>';
			return $html;
		else:
			return '';
		endif;
	}

	/* -------------------------------------------------------------- */
}



function translitIt($str) {
    $tr = array(
        "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
        "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
        "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
        "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
        "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
        "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
        "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", 
        "."=> "", "/"=> "-", " "=> "-"
    );
    return mb_strtolower(strtr($str,$tr));
}
