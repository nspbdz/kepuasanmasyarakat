<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Dimensi_model extends CI_Model {
    private $_table = "dimensi";

    public $id;
    public $kode;
    public $nama;
    public $detail;

    public function rules(){
        return [
            ['field' => 'kode',
            'label' => 'kode',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama', 
            'rules' => 'required'],            

            ['field' => 'detail',
            'label' => 'detail',
            'rules' => 'required'],

        ];
    }

    public function CariDimensi($request){
        $data_dimensi=array();
        foreach($request as $items ){
            $this->db->where('id =', $items);

            $data_dimensi[]= $this->db->get($this->_table)->result();

        }
        return $data_dimensi;

    }
    public function getAll(){
        $this->db->order_by('id','desc');        
        return $this->db->get($this->_table)->result();
    }

    public function getByID($id){
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function simpan(){

        $post = $this->input->post();
        $this->id ="";
        $this->nama = $post['nama'];
        $this->kode = $post['kode'];
        $this->detail = $post['detail'];
        $this->db->insert($this->_table, $this);

    }

    public function updatedata(){
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama = $post['nama'];
        $this->kode = $post['kode'];
        $this->detail = $post['detail'];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function hapus($id){
        return $this->db->delete($this->_table, array('id' => $id));
    }

}

?>