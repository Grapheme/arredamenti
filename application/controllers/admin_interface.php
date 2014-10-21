<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_interface extends MY_Controller{

	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;
	var $brendPosition = array('Не отображать','Отображать во всех местах','Отображать только на главной','Отображать только на "О компании"');

	function __construct(){

		parent::__construct();
		if(!$this->loginstatus):
			redirect('');
		endif;
	}

	/******************************************** cabinet *******************************************************/
	public function controlPanel(){

		$this->load->view("admin_interface/cabinet/control-panel");
	}
	/********************************************* brends *******************************************************/
	public function brends(){

		$this->load->model('brends');
		$pagevar = array(
			'brends' => $this->brends->getAll(),
		);
		$this->load->view("admin_interface/brends/list",$pagevar);
	}

	public function addBrend(){

		$this->load->helper('form');
		$this->load->view("admin_interface/brends/add");
	}

	public function editBrend(){

		$this->load->helper('form');
		$this->load->model('brends');
		$pagevar['brend'] = $this->brends->getWhere($this->input->get('id'));
		$this->load->view("admin_interface/brends/edit",$pagevar);
	}

	/********************************************* news *******************************************************/
	public function news(){

		$this->load->model('news');
		$pagevar = array(
			'news' => $this->news->getAll(),
		);
		$this->load->view("admin_interface/news/list", $pagevar);
	}

	public function addNews(){

		$this->load->helper('form');
		$this->load->view("admin_interface/news/add");
	}

	public function editNews(){

		$this->load->helper('form');
		$this->load->model('news');
		$pagevar['news'] = $this->news->getWhere($this->input->get('id'));
		$this->load->view("admin_interface/news/edit",$pagevar);
	}
	/********************************************* factory *******************************************************/
	public function factory(){

		$this->load->model('factory');
		$pagevar = array(
			'factory' => $this->factory->getAll(),
		);
		$this->load->view("admin_interface/factory/list",$pagevar);
	}

	public function addFactory(){

		$this->load->helper('form');
		$this->load->view("admin_interface/factory/add");
	}

	public function editFactory(){

		$this->load->helper('form');
		$this->load->model('factory');
		$pagevar['factory'] = $this->factory->getWhere($this->input->get('id'));
		$this->load->view("admin_interface/factory/edit",$pagevar);
	}
	/******************************************* categories ******************************************************/
	public function categories(){

		$this->load->model('categories');
		$pagevar = array(
			'categories' => $this->categories->getAll(),
		);
		$this->load->view("admin_interface/categories/list",$pagevar);
	}

	public function addСategory(){

		$this->load->helper('form');
		$this->load->view("admin_interface/categories/add");
	}

	public function editCategory(){

		$this->load->helper('form');
		$this->load->model('categories');
		$pagevar['category'] = $this->categories->getWhere($this->input->get('id'));
		$this->load->view("admin_interface/categories/edit",$pagevar);
	}
	/****************************************** collections *****************************************************/
	public function collections(){

		if($this->input->get('mode') === FALSE):
			redirect(ADMIN_START_PAGE.'/collections?mode=list');
		endif;
		if($this->input->get('category') !== FALSE && is_numeric($this->input->get('category')) === FALSE):
			redirect(ADMIN_START_PAGE.'/collections?mode=list');
		endif;
		if($this->input->get('broker') !== FALSE && is_numeric($this->input->get('broker')) === FALSE):
			redirect(ADMIN_START_PAGE.'/collections?mode=list');
		endif;
		$this->load->model(array('collections','brends','categories'));
		$pagevar = array(
			'brends' => $this->brends->getAll(),
			'categories' => $this->categories->getAll(),
			'collections' => array(),
		);
		if($this->input->get('category') !== FALSE && $this->input->get('brend') === FALSE):
			$pagevar['collections'] = $this->collections->getWhere(NULL,array('category'=>$this->input->get('category')),TRUE);
		elseif($this->input->get('category') === FALSE && $this->input->get('brend') !== FALSE):
			$pagevar['collections'] = $this->collections->getWhere(NULL,array('brend'=>$this->input->get('brend')),TRUE);
		elseif($this->input->get('category') !== FALSE && $this->input->get('brend') !== FALSE):
			$pagevar['collections'] = $this->collections->getWhere(NULL,array('brend'=>$this->input->get('brend'),'category'=>$this->input->get('category')),TRUE);
		else:
			$pagevar['collections'] = $this->collections->getWhere();
		endif;
		$this->load->view("admin_interface/collections/list",$pagevar);
	}

	public function addCollection(){

		$this->load->helper('form');
		$this->load->model(array('brends','categories','collections','collections_images'));
		if($this->input->get('id') !== FALSE && $this->input->get('step') > 1 && is_numeric($this->input->get('id')) !== FALSE):
			if(!$this->collections->getWhere($this->input->get('id'),array('brend'=>$this->input->get('brend'),'category'=>$this->input->get('category')))):
				redirect(ADMIN_START_PAGE.'/collections?mode=list');
			endif;
		endif;
		$pagevar = array(
			'brends' => $this->brends->getAll(),
			'categories' => $this->categories->getAll(),
			'images' => $this->collections_images->getWhere(NULL,array('collection'=>$this->input->get('id')),TRUE)
		);
		$this->load->view("admin_interface/collections/add",$pagevar);
	}

	public function editCollection(){

		$this->load->helper('form');
		$this->load->model(array('brends','categories','collections','collections_images'));
		$pagevar = array(
			'brends' => $this->brends->getAll(),
			'categories' => $this->categories->getAll(),
			'collection' => $this->collections->getWhere($this->input->get('id')),
			'images' => $this->collections_images->getWhere(NULL,array('collection'=>$this->input->get('id')),TRUE)
		);
		$this->load->view("admin_interface/collections/edit",$pagevar);
	}

	public function collectionUpdateThumbnails(){

		$start_time = microtime(true);
		echo 'Начало работы: '.date("d.m.Y H:i:s").'<br/>';flush();
		echo "\n---------------------------------------------<br/>\n";flush();
		$this->load->model('collections_images');
		if($images = $this->collections_images->getAll()):
			$tmpFile = getcwd().'/img/temp/image.tmp';
			for($i=0;$i<count($images);$i++):
				$filePath = getcwd().'/'.$images[$i]['resource'];
				if(file_exists($filePath)):
					if(copy($filePath,$tmpFile)):
						$grid = (!empty($images[$i]['grid']))?$images[$i]['grid']:340;
						if($this->imageManupulation($tmpFile,'width',TRUE,$grid,$grid,TRUE)):
							if(copy($tmpFile,$images[$i]['thumbnail'])):
								echo $images[$i]['resource'].'<br/>';flush();
								echo print_r(getimagesize($tmpFile)).'<br/>';flush();
								echo '------------------------<br/>';flush();
							endif;
						endif;
					endif;
				endif;
			endfor;
			$this->filedelete($tmpFile);
		endif;
		echo "\n---------------------------------------------\n<br/>";flush();
		$exec_time = round((microtime(true) - $start_time),2);
		echo "Скрипт выполнен за: $exec_time сек.\n";
		echo '<br/>Конец работы: '.date("d.m.Y H:i:s");flush();
	}

	/********************************************* pages *********************************************************/
	public function pages(){

		$this->load->model('pages');
		$pagevar = array(
			'pages' => $this->pages->getAll(),
		);
		$this->load->view("admin_interface/pages/list",$pagevar);
	}

	public function editPages(){

		if($this->input->get('id') === FALSE || is_numeric($this->input->get('id')) === FALSE):
			redirect(ADMIN_START_PAGE);
		endif;
		$this->load->model(array('pages','page_resources'));
		$this->load->helper('form');
		$pagevar = array(
			'content' => $this->pages->getWhere($this->input->get('id')),
			'images' => array(),
			'pageTitle' => ''
		);
		if($pagevar['content']):
			$pagevar['pageTitle'] = $pagevar['content']['ru_title'] .' ('.$pagevar['content']['en_title'].')';
			$pagevar['contentData'] = json_decode($pagevar['content']['content'],TRUE);
		endif;
		if($this->input->get('mode') == 'text'):
			switch($pagevar['content']['url']):
				case 'home': $this->load->view("admin_interface/pages/edit/home",$pagevar);break;
				case 'catalog-mebeli':$this->load->view("admin_interface/pages/edit/catalog",$pagevar);break;
				case 'magazin-italianskoi-mebeli': $this->load->view("admin_interface/pages/edit/about",$pagevar);break;
				case 'partnership': $this->load->view("admin_interface/pages/edit/partnership",$pagevar);break;
				case 'factories':$this->load->view("admin_interface/pages/edit/about",$pagevar);break;
				case 'contacts':$this->load->view("admin_interface/pages/edit/contacts",$pagevar);break;
				default: redirect(ADMIN_START_PAGE); break;
			endswitch;
		elseif($this->input->get('mode') == 'image'):
			$pagevar['images'] = $this->page_resources->getWhere(NULL,array('url'=>$pagevar['content']['url']),TRUE);
			$this->load->view("admin_interface/pages/images",$pagevar);
		else:
			redirect(ADMIN_START_PAGE);
		endif;
	}
}