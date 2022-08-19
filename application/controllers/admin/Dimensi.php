<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dimensi extends CI_Controller{
    public function __construct(){
        
        parent::__construct();
        $this->load->model('dimensi_model');
        $this->load->library('form_validation');   
        $this->load->helper('url');    
        
    }
 
    public function index(){
        
        $data['dimensi'] = $this->dimensi_model->getAll();
        // print_r(count($data));

        $this->load->view('admin/dimensi/index', $data);
    }

    public function inputdata(){
        $this->load->view('admin/dimensi/tambahdata');
    }

    public function simpandata(){
        // print_r($this->detail = $post['detail']);
        $dimensi = $this->dimensi_model;
        $validation = $this->form_validation;
        $validation->set_rules($dimensi->rules());

        if ($validation->run()){
            $dimensi->simpan();            
            $this->session->set_flashdata('success','Data Berhasil disimpan!');
            redirect(site_url('admin/dimensi/inputdata'));   
            
        }

        redirect(site_url('admin/dimensi/inputdata'));
             
    }

    public function editdata($id = null){
        if(!isset($id)) redirect('dimensi/inputdata');

        $data['dimensi'] = $this->dimensi_model->getByID($id);
        if (!$data['dimensi']) show_404();
        $this->load->view('admin/dimensi/editdata',$data);
    }

    public function updatedata(){
        
        $dimensi = $this->dimensi_model;
        $validation = $this->form_validation;
        $validation->set_rules($dimensi->rules());

        if ($validation->run()){
            $dimensi->updatedata();
            $this->session->set_flashdata('success','Data Berhasil diperbaharui');            
            redirect(site_url('admin/dimensi'));
        }
    
    }    

    public function hapusdata($id = null){
        if (!isset($id)) show_404();

        if ($this->dimensi_model->hapus($id)){
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
            redirect(site_url('admin/dimensi'));
        }
    }
}