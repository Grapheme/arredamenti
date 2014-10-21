<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Guests_interface extends MY_Controller{

	var $per_page = PER_PAGE_DEFAULT;
	var $offset = 0;

	function __construct(){

		parent::__construct();

		if($this->uri->language_string === FALSE):
			$this->config->set_item('base_url',baseURL($this->baseLanguageURL.'/'));
			$this->uri->language_string = $this->baseLanguageURL;
//			redirect();
		else:
			$this->config->set_item('base_url',baseURL($this->uri->language_string.'/'));
		endif;
		$this->load->helper('language');
	}

	function page404(){

		show_404();
	}

    public function index(){

        $this->lang->load('localization/index_page',$this->languages[$this->uri->language_string]);
        $pagevar['lang'] = $this->uri->language_string;

        $this->load->model('brends');
        $pagevar['brends'] = $this->brends->getWhereIN(array('field'=>'position','where_in'=>array(1,2),'many_records'=>TRUE));
		list($pagevar['pages'],$pagevar['page'],$pagevar['images']) = $this->getPagesData('home');

		$this->load->model('news');
		$pagevar['lastnews'] = $this->news->limit(95, 0, "sort ASC, added DESC, id DESC", array($this->uri->language_string . "_title2 != " => '', "image != " => ''));

        #echo "<!--" . print_r($pagevar['lastnews'], 1) . "-->";
        #error_reporting(E_ALL);
        #ini_set("display_errors", 1);

		$this->load->view("guests_interface/index",$pagevar);
	}


	public function showNews(){

		$this->lang->load('localization/index_page', $this->languages[$this->uri->language_string]);
        $pagevar['lang'] = $this->uri->language_string;

		$pagevar['categories'] = $this->getCountCollectionsInCategory();
		list($pagevar['pages'], $pagevar['page'], $pagevar['images']) = $this->getPagesData('home');

		$this->load->model('news');
		$news = $this->news->getWhere(null, array('url' => $this->uri->segment(2), $this->uri->language_string.'_title2 !=' => ''));

		if (!@$news['id'])
            $news = $this->news->getWhere(null, array('id' => $this->uri->segment(2), $this->uri->language_string.'_title2 !=' => ''));

		if (!@$news['id'])
		    show_404();

        $pagevar['news'] = $news;

        ## Set title & description
        if ($news['ru_seo_title'] != '')
            $pagevar['page']['ru_page_title'] = $news['ru_seo_title'];
        if ($news['ru_seo_description'] != '')
            $pagevar['page']['ru_page_description'] = $news['ru_seo_description'];
        if ($news['en_seo_title'] != '')
            $pagevar['page']['en_page_title'] = $news['en_seo_title'];
        if ($news['en_seo_description'] != '')
            $pagevar['page']['en_page_description'] = $news['en_seo_description'];

        $news_imgs = glob(getcwd().'/img/news/'.$news['id'].'/*');
        foreach ($news_imgs as $i => $img) {
        	$img = str_replace(getcwd(), '', $img);
        	if (basename($img) == basename($news['image']))
        	    unset($news_imgs[$i]);
        	else
            	$news_imgs[$i] = $img;
        }
        $pagevar['news_imgs'] = $news_imgs;
        #print_r($news_imgs);

        #print_r($pagevar); die;

		$this->load->view("guests_interface/news", $pagevar);
	}

	public function catalog(){

		$this->load->helper('text');
		$this->lang->load('localization/catalog_page',$this->languages[$this->uri->language_string]);
		$pagevar['categories'] = $this->getCountCollectionsInCategory();
		list($pagevar['pages'],$pagevar['page'],$pagevar['images']) = $this->getPagesData($this->uri->segment(1));
		$this->load->view("guests_interface/catalog",$pagevar);
	}

	public function about(){

		$this->load->model('brends');
		$this->lang->load('localization/about_page',$this->languages[$this->uri->language_string]);
		$pagevar['brends'] = $this->brends->getWhereIN(array('field'=>'position','where_in'=>array(1,3),'many_records'=>TRUE));
		$pagevar['contentData'] = array();
		list($pagevar['pages'],$pagevar['page'],$pagevar['images']) = $this->getPagesData($this->uri->segment(1));
		if(isset($pagevar['page']['content'])):
			$pagevar['contentData'] = json_decode($pagevar['page']['content'],TRUE);
		endif;
		$this->load->view("guests_interface/about",$pagevar);
	}

	public function contacts(){

		$this->lang->load('localization/contacts_page',$this->languages[$this->uri->language_string]);
		list($pagevar['pages'],$pagevar['page'],$pagevar['images']) = $this->getPagesData($this->uri->segment(1));
		if(isset($pagevar['page']['content'])):
			$pagevar['contentData'] = json_decode($pagevar['page']['content'],TRUE);
		endif;
		$this->load->view("guests_interface/contacts",$pagevar);
	}

	public function factories(){

		$this->lang->load('localization/factories_page',$this->languages[$this->uri->language_string]);
		list($pagevar['pages'],$pagevar['page'],$pagevar['images']) = $this->getPagesData($this->uri->segment(1));
		if(isset($pagevar['page']['content'])):
			$pagevar['contentData'] = json_decode($pagevar['page']['content'],TRUE);
		endif;
		$this->load->model('factory');
		$pagevar['factories'] = $this->factory->getAll();
		$this->load->view("guests_interface/fabrics",$pagevar);
	}

	public function partnership(){

		$this->lang->load('localization/partnership_page',$this->languages[$this->uri->language_string]);
		list($pagevar['pages'],$pagevar['page'],$pagevar['images']) = $this->getPagesData($this->uri->segment(1));
		if(isset($pagevar['page']['content'])):
			$pagevar['contentData'] = json_decode($pagevar['page']['content'],TRUE);
		endif;
		$this->load->view("guests_interface/partnership",$pagevar);
	}

	public function collections(){

		$this->load->helper('text');
		$this->load->model('brends');
		$this->lang->load('localization/collections_page',$this->languages[$this->uri->language_string]);
		$pagevar['brends'] = array();
		if($brends = $this->getBrendsInCategory($this->uri->segment(2))):
			$pagevar['brends'] = $this->getCollectionsInCategory($this->uri->segment(2),$brends);
		endif;
		list($pagevar['categories'],$pagevar['page'],$pagevar['pages']) = $this->getCategoryDataPage($this->uri->segment(2));
		$this->load->view("guests_interface/collections",$pagevar);
	}

	public function singleCollection(){

		$this->lang->load('localization/collection_page',$this->languages[$this->uri->language_string]);
		$pagevar = array(
			'collection' => array(),
			'images' => array()
		);
		if($collection = $this->getCollection($this->uri->segment(2),$this->uri->segment(3))):
			$this->load->model('collections_images');
			$pagevar['images'] = $this->collections_images->getWhere(NULL,array('collection'=>$collection['id']),TRUE);
			$pagevar['collection'] = $collection;
			$pagevar['page'] = $collection;
		else:
			show_404();
		endif;
		$this->load->view("guests_interface/single-collection",$pagevar);
	}

	private function getPagesData($url){

		$this->load->model(array('pages','page_resources'));
		$data = array(array(),array(),array());
		if($pages = $this->pages->getAll()):
			if($data[0] = $this->TranspondIDtoIndex($pages,FALSE,'url')):
				$data[1] = (isset($data[0][$url]))?$data[0][$url]:array();
				$data[2] = $this->page_resources->getWhere(NULL,array('url'=>$url),TRUE);
			endif;
		endif;
		return $data;
	}

	private function getCategoryDataPage($url){

		$this->load->model(array('categories','pages'));
		$data = array(array(),array(),array());
		if($data[0] = $this->categories->getAll()):
			if($categories = $this->TranspondIDtoIndex($data[0],FALSE,'url')):
				$data[1] = (isset($categories[$url]))?$categories[$url]:array();
			endif;
		endif;
		if($pages = $this->pages->getAll()):
			$data[2] = $this->TranspondIDtoIndex($pages,FALSE,'url');
		endif;
		return $data;
	}

	private function getCountCollectionsInCategory(){

		$this->load->model(array('categories','collections'));
		$categories = $this->categories->getAll();
		$categoryCollections = $this->collections->getCountRecord(NULL,array('category'),'category',TRUE);
		for($i=0;$i<count($categories);$i++):
			$categories[$i]['collections'] = FALSE;
			for($j=0;$j<count($categoryCollections);$j++):
				if($categories[$i]['id'] == $categoryCollections[$j]['category']):
					$categories[$i]['collections'] = $categoryCollections[$j]['count'];
				endif;
			endfor;
		endfor;
		return $categories;
	}

	private function getBrendsInCategory($categoryURL = FALSE){

		$brends = array();
		if($categoryURL):
			$this->load->model(array('brends','categories','collections'));
			if($categoryID = $this->categories->search('url',$categoryURL)):
				if($collections = $this->collections->getWhere(NULL,array('category'=>$categoryID),TRUE,array('brend'))):
					$allBrends = $this->TranspondIDtoIndex($this->brends->getAll(),FALSE);
					for($i=0;$i<count($collections);$i++):
						if(isset($allBrends[$collections[$i]['brend']])):
							$brends[] = $allBrends[$collections[$i]['brend']];
						endif;
					endfor;
				endif;
			endif;
		endif;
		return $brends;
	}

	private function getCollectionsInCategory($categoryURL = FALSE,$brends){

		if($categoryURL && !empty($brends)):
			$this->load->model(array('categories','collections'));
			if($categoryID = $this->categories->search('url',$categoryURL)):
				$collections = $this->collections->getWhere(NULL,array('category'=>$categoryID),TRUE);
				for($i=0;$i<count($brends);$i++):
					for($j=0;$j<count($collections);$j++):
						if($collections[$j]['brend'] == $brends[$i]['id']):
							$brends[$i]['collections'][] = $collections[$j];
						endif;
					endfor;
				endfor;
			endif;
			return $brends;
		endif;
		return array();
	}

	private function getCollection($category,$collection){

		$this->load->model(array('categories','collections'));
		if($categoryID = $this->categories->search('url',$category)):
			return $this->collections->getWhere(NULL,array('category'=>$categoryID,'url'=>$collection));
		endif;
		return FALSE;
	}

	/******************************************* Авторизация и регистрация ***********************************************/

	public function signIN(){
		$this->load->view("guests_interface/accounts/signin");
	}

	public function news(){
        show_404();

		$this->load->helper('text');
		$this->lang->load('localization/catalog_page',$this->languages[$this->uri->language_string]);
		$pagevar['categories'] = $this->getCountCollectionsInCategory();
		list($pagevar['pages'],$pagevar['page'],$pagevar['images']) = $this->getPagesData($this->uri->segment(1));
		$this->load->view("guests_interface/news", $pagevar);
	}

	public function logoff(){

		$this->clearSession(FALSE);
		$this->session->unset_userdata(array('logon'=>'','profile'=>'','account'=>'','backpath'=>''));
		if(isset($_SERVER['HTTP_REFERER'])):
			redirect($_SERVER['HTTP_REFERER']);
		else:
			redirect('');
		endif;
	}
}