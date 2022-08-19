<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RespondenUser extends CI_Controller{
    public function __construct(){
        
        parent::__construct();
        $this->load->model('responden_model');
        $this->load->model('kuesioner_model');
        $this->load->model('dimensi_model');
        $this->load->model('nilai_model');
        $this->load->model('jawaban_model');
        $this->load->library('form_validation');   
        $this->load->helper('url');    
        $this->load->library('session');
    }
    public function form()
    {
        // mengambil id si pe respon untuk dikirim ke  jawaban_form line 71

        $data['responden'] = $this->session->userdata();

        $data['kuesioner'] = $this->kuesioner_model->get_kuesioner();
        // $data['responden'] = $this->responden_model->getDesc();
        $data['nilai'] = $this->nilai_model->getAll();
        // print_r($data['nilai']);
        // print_r($data['kuesioner']);
        
        $data['jawaban'] = array(
            array("id"=>1, "nama" =>"1" ),
            array("id"=>2, "nama" =>"2" ),
            array("id"=>3, "nama" =>"3" ),
            array("id"=>4, "nama" =>"4" ),
            array("id"=>5, "nama" =>"5" ),
            );
        

        $this->load->view('jawaban_Form', $data);
    }

    public function index()
	{
        $this->load->view("Data_responden_form");
	}
    

    public function inputdata(){
        $data['dimensi'] = $this->dimensi_model->getAll();
        // print_r($data);
        $this->load->view('admin/kuesioner/tambahdata' , $data);
    }

    public function simpandata(){
        // userId would be the name of the session variable, 
        // and myId would be the value.
    //     print_r($this->input->post());
    //   die();

        $responden = $this->responden_model;
        $validation = $this->form_validation;
        $validation->set_rules($responden->rules());
        if ($validation->run()){
        $responden->simpan();            
        $data['responden'] =$responden->getDesc();
     
        $post = $this->input->post();

        $newdata = array(
            'id'  =>  $data['responden'][0]->id,
            'nama'  => $post['nama'],
            'jenis_kelamin'  => $post['jenis_kelamin'],
            'alamat'  => $post['alamat'],
            'pekerjaan'  => $post['pekerjaan'],
        );

        $this->session->set_userdata($newdata);
        redirect(site_url('kuesioner/form'));   
        }
        else{
            $this->load->view('/');
        }

      
    }
    public function simpanjawaban(){
      
        // mengambil id si pe respon untuk  create()

        // $responden = $this->responden_model;
        // $responden->simpan();    
        
        $jawaban = $this->jawaban_model;
        $jawaban->simpan();      
        $this->session->set_flashdata('success','Data Berhasil disimpan!');
        redirect(site_url('/'));  

            
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