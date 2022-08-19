<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Jawaban_model extends CI_Model {
    private $_table = "jawaban  ";

    public $id;
    // public $kode;
    // public $pertanyaan;

    public function rules(){
        return [
            ['field' => 'kuesioner_id',
            'label' => 'kuesioner_id',
            'rules' => 'required'],
        ];
    }

    public function getAll(){
        // $query = $this->db->query("SELECT * from jawaban INNER JOIN kuesioner ON jawaban_harapan.kuesioner_id=kuesioner.id ORDER BY kuesioner_id asc ");
        $query = $this->db->query("SELECT * from jawaban INNER JOIN kuesioner ON jawaban_harapan.kuesioner_id=kuesioner.id ORDER BY kuesioner_id asc ");

        return $query->result_array();

    }
    public function index(){
      
        $query = $this->db->query("SELECT kuesioner.dimensi_id, kuesioner.kode, jawaban.id,kuesioner_id,jawaban1,jawaban2,jawaban3,jawaban4,jawaban5, SUM(jawaban1) As nilaiPersepsi1, SUM(jawaban2) As nilaiPersepsi2,jawaban3, SUM(jawaban3) As nilaiPersepsi3, SUM(jawaban4) As nilaiPersepsi4, SUM(jawaban5) As nilaiPersepsi5 FROM jawaban INNER JOIN kuesioner ON jawaban.kuesioner_id=kuesioner.id INNER JOIN dimensi ON kuesioner.dimensi_id=dimensi.id GROUP BY kuesioner_id
        ORDER BY kuesioner_id asc ");

        return $query->result_array();
    }
    

    public function harapan(){
      
        $query = $this->db->query("SELECT kuesioner.dimensi_id, kuesioner.kode, jawaban_harapan.id,kuesioner_id,jawaban1,jawaban2,jawaban3,jawaban4,jawaban5, SUM(jawaban1) As nilaiPersepsi1, SUM(jawaban2) As nilaiPersepsi2,jawaban3, SUM(jawaban3) As nilaiPersepsi3, SUM(jawaban4) As nilaiPersepsi4, SUM(jawaban5) As nilaiPersepsi5 FROM jawaban_harapan INNER JOIN kuesioner ON jawaban_harapan.kuesioner_id=kuesioner.id INNER JOIN dimensi ON kuesioner.dimensi_id=dimensi.id GROUP BY kuesioner_id
        ORDER BY kuesioner_id asc");
        return $query->result_array();
    }
    public function getDimensiId(){
        $query = $this->db->query("SELECT kuesioner.dimensi_id FROM jawaban INNER JOIN kuesioner ON jawaban.kuesioner_id=kuesioner.id GROUP BY dimensi_id ORDER BY dimensi_id asc ");

        return $query->result_array();
    }

    public function cek(){
      
        $query = $this->db->query("SELECT dimensi.id,dimensi.nama, kuesioner.dimensi_id, kuesioner.kode, jawaban.id,kuesioner_id,jawaban1,jawaban2,jawaban3,jawaban4,jawaban5, SUM(jawaban1) As nilaiPersepsi1, SUM(jawaban2) As nilaiPersepsi2,jawaban3, SUM(jawaban3) As nilaiPersepsi3, SUM(jawaban4) As nilaiPersepsi4, SUM(jawaban5) As nilaiPersepsi5 FROM jawaban INNER JOIN kuesioner ON jawaban.kuesioner_id=kuesioner.id INNER JOIN dimensi ON kuesioner.dimensi_id=dimensi.id GROUP BY kuesioner_id
        ORDER BY kuesioner_id asc ");

        return $query->result_array();
    }

    public function gap(){
      
        $query = $this->db->query("SELECT dimensi.nama, dimensi_id, COUNT(dimensi_id) AS number_of_dimension, kuesioner.kode, jawaban.id,kuesioner_id,jawaban1,jawaban2,jawaban3,jawaban4,jawaban5, SUM(jawaban1) As nilaiPersepsi1, SUM(jawaban2) As nilaiPersepsi2,jawaban3, SUM(jawaban3) As nilaiPersepsi3, SUM(jawaban4) As nilaiPersepsi4, SUM(jawaban5) As nilaiPersepsi5 FROM jawaban INNER JOIN kuesioner ON jawaban.kuesioner_id=kuesioner.id INNER JOIN dimensi ON kuesioner.dimensi_id=dimensi.id  GROUP BY dimensi_id
        ORDER BY kuesioner_id ASC
     ");

        return $query->result_array();
    }
    public function gapHarapan(){
      
        $query = $this->db->query("SELECT  dimensi_id, COUNT(dimensi_id) AS number_of_dimension_harapan, kuesioner.kode, jawaban_harapan.id,kuesioner_id,jawaban1,jawaban2,jawaban3,jawaban4,jawaban5, SUM(jawaban1) As nilaiPersepsi1, SUM(jawaban2) As nilaiPersepsi2,jawaban3, SUM(jawaban3) As nilaiPersepsi3, SUM(jawaban4) As nilaiPersepsi4, SUM(jawaban5) As nilaiPersepsi5 FROM jawaban_harapan INNER JOIN kuesioner ON jawaban_harapan.kuesioner_id=kuesioner.id  GROUP BY dimensi_id
        ORDER BY kuesioner_id ASC
     ");

        return $query->result_array();
    }


    public function getByID($id){
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function simpan(){
        
        $post = $this->input->post();
        $counter= count($post['persepsi']);

        $key=1;
        for($key=1; $key <= $counter; $key++ ){
        print_r($this->input->post('persepsi['.$key.']'));
            
            $this->id ="";
            $this->kuesioner_id =$this->input->post('kuesioner_id['.$key.']');
            $this->responden_id = $post['responden_id'];

            if((int)$post['persepsi'][$key] == 1){
            $this->jawaban1 =1;
            $this->jawaban2 =0;
            $this->jawaban3 =0;
            $this->jawaban4 =0;
            $this->jawaban5 =0;
            }

             if((int)$post['persepsi'][$key] == 2){
            $this->jawaban1 =0;
            $this->jawaban2 =1;
            $this->jawaban3 =0;
            $this->jawaban4 =0;
            $this->jawaban5 =0;
            
            }
             if((int)$post['persepsi'][$key] == 3){
            $this->jawaban1 =0;
            $this->jawaban2 =0;
            $this->jawaban3 =1;
            $this->jawaban4 =0;
            $this->jawaban5 =0;
            }
             if((int)$post['persepsi'][$key] == 4){
            $this->jawaban1 =0;
            $this->jawaban2 =0;
            $this->jawaban3 =0;
            $this->jawaban4 =1;
            $this->jawaban5 =0;


            }
             if((int)$post['persepsi'][$key] == 5){
            $this->jawaban1 =0;
            $this->jawaban2 =0;
            $this->jawaban3 =0;
            $this->jawaban4 =0;
            $this->jawaban5 =1;
            }

            $this->db->insert($this->_table, $this);
        }

        foreach ($post['harapan'] as $key => $value) {
            $this->id ="";
            $this->kuesioner_id =$this->input->post('kuesioner_id['.$key.']');
            $this->responden_id = $post['responden_id'];

            if((int)$post['harapan'][$key] == 1){
                $this->jawaban1 =1;
                $this->jawaban2 =0;
                $this->jawaban3 =0;
                $this->jawaban4 =0;
                $this->jawaban5 =0;
                }
    
                 if((int)$post['harapan'][$key] == 2){
                $this->jawaban1 =0;
                $this->jawaban2 =1;
                $this->jawaban3 =0;
                $this->jawaban4 =0;
                $this->jawaban5 =0;
                
                }
                 if((int)$post['harapan'][$key] == 3){
                $this->jawaban1 =0;
                $this->jawaban2 =0;
                $this->jawaban3 =1;
                $this->jawaban4 =0;
                $this->jawaban5 =0;
                }
                 if((int)$post['harapan'][$key] == 4){
                $this->jawaban1 =0;
                $this->jawaban2 =0;
                $this->jawaban3 =0;
                $this->jawaban4 =1;
                $this->jawaban5 =0;
    
    
                }
                 if((int)$post['harapan'][$key] == 5){
                $this->jawaban1 =0;
                $this->jawaban2 =0;
                $this->jawaban3 =0;
                $this->jawaban4 =0;
                $this->jawaban5 =1;
                }
            $this->db->insert('jawaban_harapan', $this);
        }

    }
    // $this->jawaban_harapan = $this->input->post('harapan['.$key.']');



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