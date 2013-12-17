<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cz_main_controller extends CI_Controller {

//-----------------------------------Index------------------------------------------------// 
    
    public function index()
    {
    // temp var //
	$page = 'home_page';
    
        
    //------------- Initialize Global Session Variable --------------------------//	
    	// init basic session information here, such as username and password and uid vars
 		$current_user = array(
			'uid' => '',
			'username' => '',
			'password' => ''
		);
		$this->session->set_userdata($current_user);
		
	//------------- Set Title for page ----------------------------------//	
    	$data['header_title'] = 'ComicZone Home';//used to set header title

    //------------- Set Navigation Buttons ------------------------------//	
		// Header links 
		$data['nav_link'] = site_url('cz_main_controller/result_page'); // set number nav  
    	$data['login_link'] = site_url('cz_main_controller/user_login'); // set login button link

    //------------- Set More Link ------------------------------//	
		// More Link    
    	$data['more_link'] = site_url('cz_main_controller/more_page'); // set login button link    	
    	
    
    //------------- Set Footer Links ------------------------------//	
		// Footer Links     
    	$data['footer_site_link'] = site_url('cz_main_controller/footer_nav_page'); // set login button link
    	$data['footer_contact_link'] = site_url('cz_main_controller/contact_admin'); // set login button link

    
    	$this->load->view('header', $data);// links to header template
        $this->load->view('pages/' . $page, $data);// links to homepage
        $this->load->view('footer', $data);// links to footer template
    	
    }// end index function





    
    
//-----------------------------------Result-----------------------------------------------//        
    
    public function result_page()
    {
	
	//------------- Get what link was clicked on in main nav -------------//

		
		$segs = $this->uri->segment_array();
		$url_segment = '';
	
	// set url_link to last segment of nav
		foreach ($segs as $segment)
		{
    		$url_segment = $segment;
		}
	
	//------------- Set some default variables --------------------------//
		
		$page = 'result_page';
		$data['nav'] = '';
	
		if ($url_segment == 'more'){
			$page = 'main_more';
		}
	
	
	//------------- Search for main nav content --------------------------//

		$begin_search = '';
		$end_search = '';
		
		if ($url_segment == 'num'){
			$data['nav'] = '0 - 9';		
			$begin_search = 0;
			$end_search = 9;
		}elseif ($url_segment == 'af'){		
			$data['nav'] = 'A - F';
			$begin_search = 'a';
			$end_search = 'f';	
		}elseif ($url_segment == 'gl'){
			$data['nav'] = 'G - L';
			$begin_search = 'g';
			$end_search = 'l';	
		}elseif ($url_segment == 'mr'){
			$data['nav'] = 'M - R';
			$begin_search = 'm';
			$end_search = 'r';	
		}elseif ($url_segment == 'sz'){
			$data['nav'] = 'S - Z';
			$begin_search = 's';
			$end_search = 'z';	
		}
	
	//Perform search of the database for nav selected
		$this->load->model('comic_data_model');// load the model for searching the db
		$results = array();	// new array to hold db query results
		foreach (range($begin_search, $end_search) as $char) {
    		//echo $char . "\n";
    		$return_value = $this->comic_data_model->get_nav_list($char);
    		if (!empty($return_value)){ // create array of arrays without empty arrays
    			array_push($results, $return_value);
    		}
		}

		$data['db_results'] = $this->comic_data_model->result_filter($results);

	//------------- Search for Search Field Results ---------------------//

		$search_item = $this->input->post('search');

		if (!empty($search_item) || $search_item === '0'){

			$results = $this->comic_data_model->get_search($search_item);

			$data['db_results'] = $this->comic_data_model->result_filter($results);


			$data['nav'] = 'Search Results';
		}
    
    //------------- Set Title for page ----------------------------------//	
    	$data['header_title'] = 'ComicZone';//used to set header title

    //------------- Set Navigation Buttons ------------------------------//	
		// Header links 
		$data['nav_link'] = site_url('cz_main_controller/result_page'); // set number nav  
    	$data['login_link'] = site_url('cz_main_controller/user_login'); // set login button link

    //------------- Other Links ------------------------------//	
		// Comic Link
		$data['comic_link'] = site_url('cz_main_controller/comic_page'); // set base comic link
		// More Link    
    	$data['more_link'] = site_url('cz_main_controller/more_page'); // set login button link    	
    	
    
    //------------- Set Footer Links ------------------------------//	
		// Footer Links     
    	$data['footer_site_link'] = site_url('cz_main_controller/footer_nav_page'); // set login button link
    	$data['footer_contact_link'] = site_url('cz_main_controller/contact_admin'); // set login button link  
    
       	
    	$this->load->view('header', $data);// links to header template
        $this->load->view('pages/' . $page, $data);// links to homepage
        $this->load->view('footer', $data);// links to footer template
    }






//-----------------------------------Comic-----------------------------------------------//        
    
    public function comic_page(){
    
    //-------------Set a few vars----------------------------------------//
 	
		$page = 'comic_page';
		$data['comic_page'] = '';



    //------------- Get what link was clicked on in main nav -------------//
	
		$segs = $this->uri->segment_array();
		$url_segment = '';
	
		// set url_link to last segment of nav
		foreach ($segs as $segment)
		{
    		$url_segment = $segment;
		}
		
		$data['comic_page'] = $url_segment;

		if ($url_segment == 'cmore'){
			$page = 'comic_more';
		}
	
 	//-------------Set Comic Nav----------------------------------------//	
	
		
		$data['fst'] = '00'.'.jpg';
		$data['pre'] = '';
		$data['nxt'] = '';
		$data['lst'] = '04'.'.jpg';
		

    	if ($url_segment === '00.jpg'){
			$data['pre'] = '00'.'.jpg';
			$data['nxt'] = '01'.'.jpg';
		}elseif ($url_segment === '01.jpg'){		
			$data['pre'] = '00'.'.jpg';
			$data['nxt'] = '02'.'.jpg';
		}elseif ($url_segment === '02.jpg'){
			$data['pre'] = '01'.'.jpg';
			$data['nxt'] = '03'.'.jpg';	
		}elseif ($url_segment === '03.jpg'){
			$data['pre'] = '02'.'.jpg';
			$data['nxt'] = '04'.'.jpg';	
		}elseif ($url_segment === '04.jpg'){
			$data['pre'] = '03'.'.jpg';
			$data['nxt'] = '04'.'.jpg';	
		}


    
    //------------- Set Title for page ----------------------------------//	
    	$data['header_title'] = 'ComicZone Final Retribution';//used to set header title

    //------------- Set Navigation Buttons ------------------------------//	
		// Header links 
		$data['nav_link'] = site_url('cz_main_controller/result_page'); // set number nav  
    	$data['login_link'] = site_url('cz_main_controller/user_login'); // set login button link
		$data['nav_link_2'] = site_url('cz_main_controller/comic_page/'); // set number nav
		
    //------------- Other Links ------------------------------//	
		// Comic Link
		$data['comic_link'] = site_url('cz_main_controller/comic_page/'); // set base comic link
		// More Link    
    	$data['more_link'] = site_url('cz_main_controller/more_page'); // set more link    	
    	
    
    //------------- Set Footer Links ------------------------------//	
		// Footer Links     
    	$data['footer_site_link'] = site_url('cz_main_controller/footer_nav_page'); // set login button link
    	$data['footer_contact_link'] = site_url('cz_main_controller/contact_admin'); // set login button link  
    
       	
    	$this->load->view('header', $data);// links to header template
        $this->load->view('pages/' . $page, $data);// links to homepage
        $this->load->view('footer', $data);// links to footer template
    }    







//-----------------------------------Footer Pages-----------------------------------------//

    public function footer_nav_page(){
    
    //------------- Get what link was clicked on in main nav -------------//
	
		$segs = $this->uri->segment_array();
		$url_segment = '';
	
	// set url_link to last segment of nav
		foreach ($segs as $segment)
		{
   	 		$url_segment = $segment;
		}  
	
    	$footer_link = $url_segment;
        
    
    //------------- Set Title for page ----------------------------------//	
    	$data['header_title'] = 'About ComicZone';//used to set header title
    
    //------------- Set Navigation Buttons ------------------------------//	
		// Header links 
		$data['nav_link'] = site_url('cz_main_controller/result_page'); // set number nav  
    	$data['login_link'] = site_url('cz_main_controller/user_login'); // set login button link
    	
    
    //------------- Set Footer Links ------------------------------//	
		// Footer Links     
    	$data['footer_site_link'] = site_url('cz_main_controller/footer_nav_page'); // set login button link
    	$data['footer_contact_link'] = site_url('cz_main_controller/contact_admin'); // set login button link
    	
    	
    	
    	$this->load->view('header', $data);// links to header template
        $this->load->view('pages/' . $footer_link, $data);// links to homepage
        $this->load->view('footer', $data);// links to footer template
    }

//-----------------------------------Contact Page-----------------------------------------//

    public function contact_admin(){


    	$data['message'] = '';


    //------------- Set Title for page ----------------------------------//	
    	$data['header_title'] = 'Contact Us';//used to set header title

    //------------- Set Navigation Buttons ------------------------------//	
		// Header links 
		$data['nav_link'] = site_url('cz_main_controller/result_page'); // set number nav  
    	$data['login_link'] = site_url('cz_main_controller/user_login'); // set login button link


    //------------- Set Footer Links ------------------------------//	
		// Footer Links     
    	$data['footer_site_link'] = site_url('cz_main_controller/footer_nav_page'); // set login button link
    	$data['footer_contact_link'] = site_url('cz_main_controller/contact_admin'); // set login button link
    	$contact_form = 'contact_form.php';

    	$this->load->view('header', $data);// links to header template
        $this->load->view('pages/' . $contact_form, $data);// links to homepage
        $this->load->view('footer', $data);// links to footer template
    }

    public function send_email(){

    	$data['message'] = '';

    	$this->load->library("form_validation");

    	$this->form_validation->set_rules("fullname", "Full Name", "required|alpha|xss_clear");
    	$this->form_validation->set_rules("email", "Email Address", "required|valid_email|xss_clean");
    	$this->form_validation->set_rules("message", "Message", "required|xss_clear  ");

    	if ($this->form_validation->run() == FALSE){

	    //------------- Set Title for page ----------------------------------//	
	    	$data['header_title'] = 'Contact Us';//used to set header title

	    //------------- Set Navigation Buttons ------------------------------//	
			// Header links 
			$data['nav_link'] = site_url('cz_main_controller/result_page'); // set number nav  
	    	$data['login_link'] = site_url('cz_main_controller/user_login'); // set login button link


	    //------------- Set Footer Links ------------------------------//	
			// Footer Links     
	    	$data['footer_site_link'] = site_url('cz_main_controller/footer_nav_page'); // set login button link
	    	$data['footer_contact_link'] = site_url('cz_main_controller/contact_admin'); // set login button link
	    	$contact_form = 'contact_form.php';

	    	$this->load->view('header', $data);// links to header template
	        $this->load->view('pages/' . $contact_form, $data);// links to homepage
	        $this->load->view('footer', $data);// links to footer template
    	} else {

    		$data["message"] = "The email has successfully been sent.";
	

    		$this->load->library("email");
    		$this->email->from(set_value("email"), set_value("fullname"));
    		$this->email->to("sampss@fullsail.edu");
    		$this->email->subject("Message from CZ");
    		$this->email->message(set_value("message"));

    		$this->email->send();

    	//------------- Set Title for page ----------------------------------//	
	    	$data['header_title'] = 'Contact Us';//used to set header title

	    //------------- Set Navigation Buttons ------------------------------//	
			// Header links 
			$data['nav_link'] = site_url('cz_main_controller/result_page'); // set number nav  
	    	$data['login_link'] = site_url('cz_main_controller/user_login'); // set login button link


	    //------------- Set Footer Links ------------------------------//	
			// Footer Links     
	    	$data['footer_site_link'] = site_url('cz_main_controller/footer_nav_page'); // set login button link
	    	$data['footer_contact_link'] = site_url('cz_main_controller/contact_admin'); // set login button link
	    	$contact_form = 'contact_form.php';

	    	//echo $this->email->print_debugger();

	    	$this->load->view('header', $data);// links to header template
	        $this->load->view('pages/' . $contact_form, $data);// links to homepage
	        $this->load->view('footer', $data);// links to footer template

    	}


    }





}// end CI controller