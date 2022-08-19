<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    
    public function dashboard()
    {
        $this->load->view('dashboard');

    }
    public function index()
	{
        // load view admin/overview.php
        $this->load->view("Data_responden_form");
	}
}