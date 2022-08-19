<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller{
    public function __construct(){
        
        parent::__construct();
        $this->load->model('kuesioner_model');
        $this->load->model('dimensi_model');
        $this->load->library('form_validation');   
        $this->load->helper('url');    
        
    }
    public function dashboard()
    {
        $this->load->view('dashboard');

    }
    public function index(){
        $data['kuesioner'] = $this->kuesioner_model->get_kuesioner();
        
        $this->load->view('admin/kuesioner/index', $data);
    }

    public function inputdata(){
        $data['dimensi'] = $this->dimensi_model->getAll();
        // print_r($data);
        $this->load->view('admin/kuesioner/tambahdata' , $data);
    }

    public function simpandata(){
        // $this->dimensi_id = 
        // print_r($this->detail = $post['detail']);
        
        $kuesioner = $this->kuesioner_model;
        $validation = $this->form_validation;
        $validation->set_rules($kuesioner->rules());

        if ($validation->run()){
            $kuesioner->simpan();            
            $this->session->set_flashdata('success','Data Berhasil disimpan!');
            redirect(site_url('admin/kuesioner/inputdata'));   
            
        }

        redirect(site_url('admin/kuesioner/inputdata'));
             
    }

    public function editdata($id = null){
   
        if(!isset($id)) redirect('kuesioner/inputdata');

        $data['kuesioner'] = $this->kuesioner_model->getByID($id);
        $data['dimensi']=$this->dimensi_model->getAll();
        // print_r($dimensi);
        if (!$data['kuesioner']) show_404();

        $this->load->view('admin/kuesioner/editdata',$data);
    }

    public function updatedata(){
        // print_r( $this->input->post());
        // die();
        $kuesioner = $this->kuesioner_model;
        $validation = $this->form_validation;
        $validation->set_rules($kuesioner->rules());

        if ($validation->run()){
            $kuesioner->updatedata();
            $this->session->set_flashdata('success','Data Berhasil diperbaharui');            
            redirect(site_url('admin/kuesioner'));
        }
    
    }    

    public function hapusdata($id = null){
        if (!isset($id)) show_404();

        if ($this->kuesioner_model->hapus($id)){
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
            redirect(site_url('admin/kuesioner'));
        }
    }
}