<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Responden extends CI_Controller{
    public function __construct(){
        
        parent::__construct();
        $this->load->model('responden_model');
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
        $data['responden'] = $this->responden_model->get_responden();
        // print_r($data);
        // print_r(count($data['responden']));

        $this->load->view('admin/responden/index', $data);
    }

    public function inputdata(){
        $data['dimensi'] = $this->dimensi_model->getAll();
        // print_r($data);
        $this->load->view('admin/kuesioner/tambahdata' , $data);
    }

    public function simpandata(){
        // $this->dimensi_id = 
        // print_r($post['dimensi_id']);
        // print_r($this->detail = $post['detail']);
        
        $responden = $this->responden_model;
        $validation = $this->form_validation;
        $validation->set_rules($responden->rules());

        if ($validation->run()){
            $responden->simpan();            
            $this->session->set_flashdata('success','Data Berhasil disimpan!');
            redirect(site_url('admin/responden/inputdata'));   
            
        }

        redirect(site_url('admin/responden/'));
             
    }

    // public function editdata($id = null){
    //     if(!isset($id)) redirect('kuesioner/inputdata');

    //     $data['kuesioner'] = $this->kuesioner_model->getByID($id);
    //     $data['dimensi']=$this->dimensi_model->getAll();
    //     // print_r($dimensi);
    //     if (!$data['kuesioner']) show_404();

    //     $this->load->view('admin/kuesioner/editdata',$data);
    // }

    // public function updatedata(){
        
    //     $kuesioner = $this->kuesioner_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($kuesioner->rules());

    //     if ($validation->run()){
    //         $kuesioner->updatedata();
    //         $this->session->set_flashdata('success','Data Berhasil diperbaharui');            
    //         redirect(site_url('admin/kuesioner'));
    //     }
    
    // }    

    // public function hapusdata($id = null){
    //     if (!isset($id)) show_404();

    //     if ($this->kuesioner_model->hapus($id)){
    //         $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
    //         redirect(site_url('admin/kuesioner'));
    //     }
    // }
}