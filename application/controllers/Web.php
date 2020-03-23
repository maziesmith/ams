<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		//redirect('authenticate/uc');
		$this->load->model('my_model','mm');
	if(!$this->session->userdata('usr_')) {redirect('authenticate/login');}
	}
	
	function index()
	{
		$data['menu'] = $this->mm->get_menu();
		$this->load->view('home', $data);
	}
	function insert_session()
	{
	$a = $this->mm->insert_session();
	if($a == true)
	{
		redirect('web');	
	}
	else
	{
		redirect('web/manage_session');
	}
	}
	function add_faculty()
	{
		$a = $this->mm->add_faculty();
		if($a == true)
		{
		
			redirect('web/add_fac');
		}
		else
		{
		 redirect('web/add_fac');
		}
	}
	function add_subject()
	{
		$a = $this->mm->add_subject();
		if($a == true)
		{
		
			redirect('web/add_sub');
		}

	}
	function add_subfaculty()
	{
		$a = $this->mm->add_subfaculty();
		if($a == true)
		{
		
			redirect('web/add_fac');
		}

	}
	
	function add_student()
	{
		$a = $this->mm->add_student();
		if($a == true)
		{
		redirect('web');
		}
		else
		{
		redirect('web/add_std');
		}
		
	}
	function add_parent()
	{
		$a = $this->mm->add_parent();
		if($a == true)
		{
		redirect('web');
		}
		else
		{
		redirect('web/add_par');
		}
	}
	function contact(){
	$this->load->view('contact');
	}
	function add_std()
	{
	$this->load->view('add_std');
	}
	function add_par()
	{
	$this->load->view('add_par');
	}
	function add_fac()
	{
	$this->load->view('add_fac');
	}
	function add_sub()
	{
	$this->load->view('add_sub');
	}
	function mark_attendance()
	{
		$id = $this->input->get('id');
		$r['a'] = $this->mm->b();
	$r['s'] = $this->mm->a($id);
	$r['save'] = $this->mm->mark_attendance();
	$this->load->view('mark_attendance',$r);
	}
	function view_attend()
	{
	$r['a'] = $this->mm->b();
	$this->load->view('view_attend',$r);
	}
	function std_view_attend()
	{
	$this->load->view('std_view_attend');
	}
	function view_profilefac()
	{
	$r['x'] = $this->mm->view_profilefac();
	$r['y'] = $this->mm->view_profilefac1();
	$this->load->view('view_profilefac',$r);
	}
	
	function view_profilestd()
	{
	$id = $this->input->get('id');
	$r['save1'] = $this->mm->stdsubdata($id);
	$r['save'] = $this->mm->view_profilestd();
	$this->load->view('view_profilestd',$r);
	}
	
	function view_profilepar()
	{
		
		$r['save'] = $this->mm->view_profile();
		$this->load->view('view_profilepar',$r);
	}
	function feedback()
	{
	$this->load->view('give_feedback');
	}
	function generate_report()
	{
	$this->load->view('generate_report');
	}
	function view_feedback()
	{
	$a['data'] = $this->mm->feedback();
	$this->load->view('view_feedback',$a);
	}
	function deletedata()
	{
		$id = $this->input->get('id');
		$this->mm->deleterecord($id);
		redirect('web/view_feedback');
	}
	
	function manage_session()
	{
		$this->load->view('manage_session');
	}
	
	function test()
	{
		$data['session'] = $this->mm->getsession();
		$data['user_status'] = $this->mm->getUsrStatus();
		$data['login_record'] = $this->mm->getLoginData();
		
		$this->load->view('test', $data);
	}
	
	function give_feedback()
	{
		$this->mm->give_feedback();
		redirect('web/feedback');
	}
	
}
