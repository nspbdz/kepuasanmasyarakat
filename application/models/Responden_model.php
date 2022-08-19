<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Responden_model extends CI_Model {
    private $_table = "responden";

    public $id;
    // public $kode;
    // public $pertanyaan;

    public function rules(){
        return [
            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'jenis_kelamin',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],

            
        ]; 
    }

    public function getAll(){
        $this->db->order_by('id','desc');        
        return $this->db->get($this->_table)->result();
    }

    public function getDesc(){
        $this->db->from($this->_table);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function getByID($id){
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function simpan(){

        // $this->session->userdata('nama');
        // $post = $this->session->userdata();
        $post = $this->input->post();
        $this->id ="";
        $this->nama = $post['nama'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->alamat = $post['alamat'];
        $this->pekerjaan = $post['pekerjaan'];
        
        // $this->tanggal = $post['tanggal'];
       
        $this->db->insert($this->_table, $this);

    }


    public function updatedata(){
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama = $post['nama'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->alamat = $post['alamat'];
        $this->kritik = $post['kritik'];
        // $this->tanggal = $post['tanggal'];

        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function hapus($id){
        return $this->db->delete($this->_table, array('id' => $id));
    }
    function get_responden(){
        
        $this->db->from('responden'); 
        $this->db->select('*'); 
        $this->db->order_by('id','asc');   
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

}

?>