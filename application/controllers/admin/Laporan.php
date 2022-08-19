<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('kuesioner_model');
        $this->load->model('jawaban_model');
        $this->load->model('dimensi_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function dashboard()
    {
        $this->load->view('dashboard');
    }
    public function index()
    {
        // $data['kuesioner'] = $this->kuesioner_model->get_kuesioner();
        // $data = $this->kuesioner_model->index();
        $data = $this->jawaban_model->index();
        $data['jawaban'] = json_decode(json_encode($data), true);
        $data['kuesioner'] = $this->kuesioner_model->getAll();

        $this->load->view('admin/laporan/index', $data);
    }

    public function harapan()
    {
        // $data['kuesioner'] = $this->kuesioner_model->get_kuesioner();
        // $data = $this->kuesioner_model->index();
        $data = $this->jawaban_model->harapan();
        $data['jawaban'] = json_decode(json_encode($data), true);
        $data['kuesioner'] = $this->kuesioner_model->getAll();

        $this->load->view('admin/laporan/harapan', $data);
    }

    public function dataFuzifikasiPersepsi()
    {

        // mencari id kuesionernya 
        $data['jawaban'] = $this->jawaban_model->index();

        // $data['jawaban'][] = json_decode(json_encode( $data), true);
        $data['fuzzifikasi1'] = array();
        $data['fuzzifikasi2'] = array();
        $data['fuzzifikasi3'] = array();
        $data['dimensi_id_persepsi'] = array();
        $data['kuesioner_id_persepsi'] = array();
        // $batasBawah[]=array();
        // echo "<br>";

        // langkah rumus batas bawah 

        for ($i1 = 0; $i1 < count($data['jawaban']); $i1++) {
            $data['dimensi_id_persepsi'][] = $data['jawaban'][$i1]['dimensi_id'];
            $data['kuesioner_id_persepsi'][] = $data['jawaban'][$i1]['kuesioner_id'];

            // echo "<br>";
            if ($data['jawaban'][$i1]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi1'] * 1;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi2'] * 3;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi3'] * 5;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi4'] * 7;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi5'] * 9;
            }
        }
        // langkah rumus batas bawah 


        // echo "<br>";


        // langkah rumus batas  tengah
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 2.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 4.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 6.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 8.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 10.5;
            }
        }

        // langkah rumus batas  tengah


        // langkah rumus batas  atas
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 4;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 6;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 8;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 10;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 12;
            }
        }
        // ($data['fuzzifikasi3']);

        // langkah rumus batas  atas


        // // langkah rumus batas bawah sum untuk nanti di bagi dengan jumlah data
        for ($sum = 0; $sum < count($data['jawaban']); $sum++) {

            if ($data['jawaban'][$sum]['nilaiPersepsi1'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi1'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi2'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi2'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi3'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi3'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi4'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi4'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi5'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi5'];
            }
        }
        return $data;
    }


    public function fuzifikasiPersepsi()
    {
        $data['persepsi'] = array($this->dataFuzifikasiPersepsi());

        $data['jawaban'] = $this->jawaban_model->index();
        // (count($data['jawaban']));
        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {

            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }
        // langkah mencari pembagi batas bawah 

        $chunkSize = 5;

        foreach ($data['persepsi'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagi[] = array_slice($data['persepsi'][0]['allSum'], $key, $chunkSize);
            }
        }

        $data['rumusBatasBawahBagi'] = $rumusBatasBawahBagi;
        foreach ($data['rumusBatasBawahBagi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawah'][$key] = array_sum($value);
        }

        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah
        foreach ($data['persepsi'][0]['fuzzifikasi1'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasBawah[] = array_slice($data['persepsi'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }
        $data['batasBawah'] = $batasBawah;
        foreach ($data['batasBawah'] as $key => $value) {
            $data['batasBawah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengah[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengah'] = $batasTengah;
        foreach ($data['batasTengah'] as $key => $value) {
            $data['batasTengah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // ($data['batasTengah']);
        // proses pembagi batas tengah


        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtas[] = array_slice($data['persepsi'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }
        $data['batasAtas'] = $batasAtas;
        foreach ($data['batasAtas'] as $key => $value) {
            $data['batasAtas'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah




        $this->load->view('admin/laporan/fuzifikasiPersepsi', $data);
    }



    public function dataFuzifikasiHarapan()
    {

        $data['jawaban'] = $this->jawaban_model->harapan();


        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {

            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }

        // $data['jawaban'][] = json_decode(json_encode( $data), true);
        // ($data['jawaban']);
        $data['fuzzifikasi1'] = array();
        $data['fuzzifikasi2'] = array();
        $data['fuzzifikasi3'] = array();
        $data['dimensi_id_harapan'] = array();
        $data['kuesioner_id_harapan'] = array();

        // langkah rumus batas bawah 

        for ($i1 = 0; $i1 < count($data['jawaban']); $i1++) {
            $data['dimensi_id_harapan'][] = $data['jawaban'][$i1]['dimensi_id'];
            $data['kuesioner_id_harapan'][] = $data['jawaban'][$i1]['kuesioner_id'];

            // ($i1);
            // echo "<br>";
            if ($data['jawaban'][$i1]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi1'] * 1;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi2'] * 3;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi3'] * 5;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi4'] * 7;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi5'] * 9;
            }
        }
        // langkah rumus batas bawah 


        // langkah rumus batas  tengah
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 2.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 4.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 6.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 8.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 10.5;
            }
        }

        // langkah rumus batas  tengah


        // langkah rumus batas  atas
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 4;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 6;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 8;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 10;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 12;
            }
        }
        // ($data['fuzzifikasi3']);

        // langkah rumus batas  atas


        // // langkah rumus batas bawah sum untuk nanti di bagi dengan jumlah data
        for ($sum = 0; $sum < count($data['jawaban']); $sum++) {

            if ($data['jawaban'][$sum]['nilaiPersepsi1'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi1'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi2'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi2'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi3'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi3'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi4'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi4'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi5'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi5'];
            }
        }
        return $data;
    }
    public function dataFuzifikasiPersepsiGap()
    {
        $data['jawaban'] = $this->jawaban_model->gap();

        $data['fuzzifikasi1'] = array();
        $data['fuzzifikasi2'] = array();
        $data['fuzzifikasi3'] = array();
        $batasBawah[] = array();
        //   echo "<br>";

        //   langkah rumus batas bawah 
        $data['fuzzifikasi1'] = array();
        $data['fuzzifikasi2'] = array();
        $data['fuzzifikasi3'] = array();

        for ($i1 = 0; $i1 < count($data['jawaban']); $i1++) {
            // echo "<br>";
            if ($data['jawaban'][$i1]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi1'] * 1;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi2'] * 3;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi3'] * 5;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi4'] * 7;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi5'] * 9;
            }
        }
        // langkah rumus batas bawah 


        // echo "<br>";


        // langkah rumus batas  tengah
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 2.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 4.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 6.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 8.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 10.5;
            }
        }

        // langkah rumus batas  tengah


        // langkah rumus batas  atas
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 4;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 6;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 8;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 10;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 12;
            }
        }
        // ($data['fuzzifikasi3']);

        // langkah rumus batas  atas


        // // langkah rumus batas bawah sum untuk nanti di bagi dengan jumlah data
        for ($sum = 0; $sum < count($data['jawaban']); $sum++) {

            if ($data['jawaban'][$sum]['nilaiPersepsi1'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi1'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi2'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi2'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi3'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi3'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi4'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi4'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi5'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi5'];
            }
        }
        return $data;
    }
    public function dataFuzifikasiHarapanGap()
    {
        // (count($data['jawaban']));



        $data['jawaban'] = $this->jawaban_model->gapHarapan();

        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {

            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }

        // $data['jawaban'][] = json_decode(json_encode( $data), true);
        // ($data['jawaban']);
        $data['fuzzifikasi1'] = array();
        $data['fuzzifikasi2'] = array();
        $data['fuzzifikasi3'] = array();

        // langkah rumus batas bawah 

        for ($i1 = 0; $i1 < count($data['jawaban']); $i1++) {
            // ($i1);
            // echo "<br>";
            if ($data['jawaban'][$i1]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi1'] * 1;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi2'] * 3;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi3'] * 5;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi4'] * 7;
            }
            if ($data['jawaban'][$i1]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi1'][] = $data['jawaban'][$i1]['nilaiPersepsi5'] * 9;
            }
        }
        // langkah rumus batas bawah 


        // langkah rumus batas  tengah
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 2.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 4.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 6.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 8.5;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi2'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 10.5;
            }
        }

        // langkah rumus batas  tengah


        // langkah rumus batas  atas
        for ($i2 = 0; $i2 < count($data['jawaban']); $i2++) {


            if ($data['jawaban'][$i2]['nilaiPersepsi1'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi1'] * 4;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi2'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi2'] * 6;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi3'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi3'] * 8;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi4'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi4'] * 10;
            }
            if ($data['jawaban'][$i2]['nilaiPersepsi5'] !== null) {
                $data['fuzzifikasi3'][] = $data['jawaban'][$i2]['nilaiPersepsi5'] * 12;
            }
        }
        // ($data['fuzzifikasi3']);

        // langkah rumus batas  atas


        // // langkah rumus batas bawah sum untuk nanti di bagi dengan jumlah data
        for ($sum = 0; $sum < count($data['jawaban']); $sum++) {

            if ($data['jawaban'][$sum]['nilaiPersepsi1'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi1'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi2'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi2'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi3'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi3'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi4'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi4'];
            }
            if ($data['jawaban'][$sum]['nilaiPersepsi5'] !== null) {
                $data['allSum'][] = $data['jawaban'][$sum]['nilaiPersepsi5'];
            }
        }
        return $data;
    }
    public function fuzifikasiHarapan()
    {

        $data['jawaban'] = $this->jawaban_model->harapan();

        $data['persepsi'] = array($this->dataFuzifikasiHarapan());

        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {
            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }

        // langkah mencari pembagi batas bawah 

        $chunkSize = 5;

        foreach ($data['persepsi'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagi[] = array_slice($data['persepsi'][0]['allSum'], $key, $chunkSize);
            }
        }

        $data['rumusBatasBawahBagi'] = $rumusBatasBawahBagi;
        foreach ($data['rumusBatasBawahBagi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawah'][$key] = array_sum($value);
        }

        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah
        foreach ($data['persepsi'][0]['fuzzifikasi1'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasBawah[] = array_slice($data['persepsi'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }
        $data['batasBawah'] = $batasBawah;
        foreach ($data['batasBawah'] as $key => $value) {
            $data['batasBawah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengah[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengah'] = $batasTengah;
        foreach ($data['batasTengah'] as $key => $value) {
            $data['batasTengah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah


        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtas[] = array_slice($data['persepsi'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }
        $data['batasAtas'] = $batasAtas;
        foreach ($data['batasAtas'] as $key => $value) {
            $data['batasAtas'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah



        $this->load->view('admin/laporan/fuzifikasiHarapan', $data);
    }


    public function defuzifikasiPersepsi()
    {
        $data['persepsi'] = array($this->dataFuzifikasiPersepsi());
        // die();
        $data['jawaban'] = $this->jawaban_model->index();

        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {

            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }
        // langkah mencari pembagi batas bawah 
        $chunkSize = 5;

        foreach ($data['persepsi'][0]['allSum'] as $key => $value) {
            // echo "</br>";
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagi[] = array_slice($data['persepsi'][0]['allSum'], $key, $chunkSize);
            }
        }


        $data['rumusBatasBawahBagi'] = $rumusBatasBawahBagi;
        foreach ($data['rumusBatasBawahBagi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawah'][$key] = array_sum($value);
        }
        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah


        foreach ($data['persepsi'][0]['fuzzifikasi1'] as $key => $value) {

            if ($key % $chunkSize === 0) {
                $batasBawah[] = array_slice($data['persepsi'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }

        // $data['kuesioner_id'] = $persepsi_kuesioner_id;

        $data['batasBawah'] = $batasBawah;

        foreach ($data['batasBawah'] as $key => $value) {
            $data['batasBawah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengah[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengah'] = $batasTengah;
        foreach ($data['batasTengah'] as $key => $value) {
            $data['batasTengah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtas[] = array_slice($data['persepsi'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }

        $data['batasAtas'] = $batasAtas;
        foreach ($data['batasAtas'] as $key => $value) {
            $data['batasAtas'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        $iterasi = 0;

        // proses pembagi batas tengah
        // batas tengah di tambah batas atas lalu di bagi 2
        // mencari defuzifikasi persepsi
        // die();
        for ($iterasi = 0; $iterasi < count($data['batasAtas']); $iterasi++) {

            // $data['dimensi_persepsi'][]=$data['persepsi'][0]['dimensi_id_persepsi']
            // $batasBawah[] = array_slice($data['persepsi'][0]['fuzzifikasi1'], $key, $chunkSize);

            $data['hasilDefuzifikasi'][$iterasi] = $data['batasTengah'][$iterasi] + $data['batasAtas'][$iterasi];
            $data['hasilDefuzifikasi'][$iterasi] = $data['hasilDefuzifikasi'][$iterasi] / 2;
        }
        // $data['dimensi_persepsi']=$data['persepsi'][0]['dimensi_id_persepsi'];


        $data['rankValues'] = array();
        $value = $data['batasAtas'];

        $ordered_values = $value;
        rsort($ordered_values);

        foreach ($value as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $data['rankValues'][] = ((int) $key + 1);
        }



        $this->load->view('admin/laporan/defuzifikasiPersepsi', $data);
    }

    public function defuzifikasiHarapan()
    {

        $data['jawaban'] = $this->jawaban_model->harapan();

        $data['harapan'] = array($this->dataFuzifikasiHarapan());

        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {
            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }

        // langkah mencari pembagi batas bawah 

        $chunkSize = 5;

        foreach ($data['harapan'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagi[] = array_slice($data['harapan'][0]['allSum'], $key, $chunkSize);
            }
        }

        $data['rumusBatasBawahBagi'] = $rumusBatasBawahBagi;
        foreach ($data['rumusBatasBawahBagi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawah'][$key] = array_sum($value);
        }

        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah
        foreach ($data['harapan'][0]['fuzzifikasi1'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasBawah[] = array_slice($data['harapan'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }
        $data['batasBawah'] = $batasBawah;
        foreach ($data['batasBawah'] as $key => $value) {
            $data['batasBawah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['harapan'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengah[] = array_slice($data['harapan'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengah'] = $batasTengah;
        foreach ($data['batasTengah'] as $key => $value) {
            $data['batasTengah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah


        // proses pembagi batas tengah


        //batas atas harapan
        foreach ($data['harapan'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtas[] = array_slice($data['harapan'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }
        $data['batasAtas'] = $batasAtas;
        foreach ($data['batasAtas'] as $key => $value) {
            $data['batasAtas'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah

        for ($iterasi = 0; $iterasi < count($data['batasAtas']); $iterasi++) {
            $data['hasilDefuzifikasi'][$iterasi] = $data['batasTengah'][$iterasi] + $data['batasAtas'][$iterasi];
            $data['hasilDefuzifikasi'][$iterasi] = $data['hasilDefuzifikasi'][$iterasi] / 2;
        }

        //batas atas harapan


        $data['rankValues'] = array();
        $value = $data['batasAtas'];

        $ordered_values = $value;
        rsort($ordered_values);

        foreach ($value as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $data['rankValues'][] = ((int) $key + 1);
        }


        $this->load->view('admin/laporan/defuzifikasiHarapan', $data);
    }




    public function gapPvp()
    {
        $data['persepsi'] = array($this->dataFuzifikasiPersepsi());
        $data['harapan'] = array($this->dataFuzifikasiHarapan());

        $data['jawaban'] = $this->jawaban_model->index();
        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {

            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }

        // langkah mencari pembagi batas bawah 
        $chunkSize = 5;
        // persepsi Chunk /pemecahan array

        foreach ($data['persepsi'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagiPersepsi[] = array_slice($data['persepsi'][0]['allSum'], $key, $chunkSize);
            }
        }

        $data['rumusBatasBawahBagiPersepsi'] = $rumusBatasBawahBagiPersepsi;
        foreach ($data['rumusBatasBawahBagiPersepsi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawahPersepsi'][$key] = array_sum($value);
        }

        // langkah mencari pembagi batas bawah persepsi 
        // persepsi Chunk /pemecahan array


        // proses pembagi batas bawah persepsi
        foreach ($data['persepsi'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengahPersepsi[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengahPersepsi'] = $batasTengahPersepsi;
        foreach ($data['batasTengahPersepsi'] as $key => $value) {
            $data['batasTengahPersepsi'][$key] = array_sum($value) / $data['semuaRumusBawahPersepsi'][$key];
        }

        // proses pembagi batas bawah persepsi

        // proses pembagi batas atas persepsi
        foreach ($data['persepsi'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtasPersepsi[] = array_slice($data['persepsi'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }

        $data['batasAtasPersepsi'] = $batasAtasPersepsi;
        foreach ($data['batasAtasPersepsi'] as $key => $value) {
            $data['batasAtasPersepsi'][$key] = array_sum($value) / $data['semuaRumusBawahPersepsi'][$key];
        }

        $iterasiPersepsi = 0;
        $iterasiHarapan = 0;
        $iterasiGap = 0;

        // proses pembagi batas atas persepsi
        // batas tengah di tambah batas atas lalu di bagi 2
        // mencari defuzifikasi persepsi
        for ($iterasiPersepsi = 0; $iterasiPersepsi < count($data['batasAtasPersepsi']); $iterasiPersepsi++) {
            $data['hasilDefuzifikasiPersepsi'][$iterasiPersepsi] = $data['batasTengahPersepsi'][$iterasiPersepsi] + $data['batasAtasPersepsi'][$iterasiPersepsi];
            $data['hasilDefuzifikasiPersepsi'][$iterasiPersepsi] = $data['hasilDefuzifikasiPersepsi'][$iterasiPersepsi] / 2;
        }

        // proses pembagi batas atas persepsi


        // harapan Chunk /pemecahan array

        foreach ($data['harapan'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagiHarapan[] = array_slice($data['harapan'][0]['allSum'], $key, $chunkSize);
            }
        }
        $data['rumusBatasBawahBagiHarapan'] = $rumusBatasBawahBagiHarapan;
        foreach ($data['rumusBatasBawahBagiHarapan'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawahHarapan'][$key] = array_sum($value);
        }

        // langkah mencari pembagi batas bawah 

        // harapan Chunk /pemecahan array

        // proses pembagi batas bawah tengah Harapan
        foreach ($data['harapan'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengahHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengahHarapan'] = $batasTengahHarapan;
        foreach ($data['batasTengahHarapan'] as $key => $value) {
            $data['batasTengahHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahPersepsi'][$key];
        }

        // proses pembagi batas bawah tengah Harapan

        // (count($data['harapan'][0]['fuzzifikasi3']));
        //batas atas harapan
        foreach ($data['harapan'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtasHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }
        $data['batasAtasHarapan'] = $batasAtasHarapan;
        foreach ($data['batasAtasHarapan'] as $key => $value) {
            $data['batasAtasHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahHarapan'][$key];
        }
        // proses pembagi batas tengah


        //  $data['batasAtasHarapan'][$iterasiHarapan]
        for ($iterasiHarapan = 0; $iterasiHarapan < count($data['batasAtasHarapan']); $iterasiHarapan++) {
            $data['hasilDefuzifikasiHarapan'][$iterasiHarapan] = $data['batasTengahHarapan'][$iterasiHarapan] + $data['batasAtasHarapan'][$iterasiHarapan];
            $data['hasilDefuzifikasiHarapan'][$iterasiHarapan] = $data['hasilDefuzifikasiHarapan'][$iterasiHarapan] / 2;
        }

        $countGap = 0;

        if (count($data['batasAtasHarapan']) > count($data['batasAtasPersepsi'])) {
            $countGap = count($data['batasAtasHarapan']);
        } else {
            $countGap = count($data['batasAtasPersepsi']);
        }


        for ($iterasiGap = 0; $iterasiGap < $countGap; $iterasiGap++) {
            $data['gapPvp'][$iterasiGap] =  $data['hasilDefuzifikasiPersepsi'][$iterasiGap] -  $data['hasilDefuzifikasiHarapan'][$iterasiGap];
        }


        $data['rankValuesGap'] = array();
        $valueGap = $data['gapPvp'];

        $ordered_values = $valueGap;
        rsort($ordered_values);

        foreach ($valueGap as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $data['rankValuesGap'][] = ((int) $key + 1);
        }

        $this->load->view('admin/laporan/gapPvp', $data);
    }
    public function CariDimensi($request)
    {
        return $request;
    }


    public function gapPd()
    {
        $data['dimensi_hardocde'] = array(
            'Realiability',
            'Tangible',
            'Assurance',
            'Responsiveness',
            'Empathy'
        );
        // getAll
        $data['dimensi'] = $this->dimensi_model->getAll();

        $data['persepsi'] = array($this->dataFuzifikasiPersepsi());
        $data['harapan'] = array($this->dataFuzifikasiHarapan());
        $data['jawaban'] = $this->jawaban_model->index();
        // echo "</br>";


        // echo "</br>";

        $chunkSize = 5;

        foreach ($data['persepsi'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagi[] = array_slice($data['persepsi'][0]['allSum'], $key, $chunkSize);
            }
        }


        $data['rumusBatasBawahBagi'] = $rumusBatasBawahBagi;
        foreach ($data['rumusBatasBawahBagi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawah'][$key] = array_sum($value);
        }
        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah


        foreach ($data['persepsi'][0]['fuzzifikasi1'] as $key => $value) {

            if ($key % $chunkSize === 0) {
                $batasBawah[] = array_slice($data['persepsi'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }


        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengah[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }

        foreach ($data['persepsi'][0]['dimensi_id_persepsi'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                // $batasTengah[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
                $batasTengah_id[] = array_slice($data['persepsi'][0]['dimensi_id_persepsi'], $key, $chunkSize);
            }
        }
        // $batasTengah_id[]=array_slice($data['persepsi'][0]['dimensi_id_persepsi'], $key, $chunkSize);

        $data['batasTengah'] = $batasTengah;
        $data['batasTengah_id'] = $batasTengah_id;
        foreach ($data['batasTengah'] as $key => $value) {
            $data['batasTengah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtas[] = array_slice($data['persepsi'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }

        $data['batasAtas'] = $batasAtas;
        foreach ($data['batasAtas'] as $key => $value) {
            $data['batasAtas'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        $iterasi = 0;

        // proses pembagi batas tengah
        // batas tengah di tambah batas atas lalu di bagi 2
        // mencari defuzifikasi persepsi

        $dataHasilPersepsi['nilai'] = array();

        for ($iterasi = 0; $iterasi < count($data['batasAtas']); $iterasi++) {
            $dataHasilPersepsi['nilai'][] = (number_format($data['batasTengah'][$iterasi], 2, '.', '') + number_format($data['batasAtas'][$iterasi], 2, '.', '')) / 2;
            $dataHasilPersepsi['id'] = $data['persepsi'][0]['dimensi_id_persepsi'];
        }


        $data['dimensi_persepsi'] = $data['persepsi'][0]['dimensi_id_persepsi'];

        $chunkSize = 5;
        $result = array();
        $result_id = array();
        for ($iterasi2 = 0; $iterasi2 < count($dataHasilPersepsi['nilai']); $iterasi2++) {


            $id = $dataHasilPersepsi['id'][$iterasi2];
            // $result_id[$id][] = $dataHasilPersepsi['id'][$iterasi2];
            $result[$id][] = $dataHasilPersepsi['nilai'][$iterasi2];
            $result_id[] = $id;
        }

        $new = array();
        $new2 = array();
        $dimension_persepsi = array();

        foreach ($result as $key => $value) {

            $new[] = array('id' => $key, 'quanity' => array_sum($value), 'dibagi' => (array_sum($value)) / count($value), 'count' => count($value));

            $new2[] = (array_sum($value)) / count($value);
            $dimension_persepsi[] =  $key;
        }
        // echo '<pre>';

        $data['dimension_persepsi'] =   array_unique($dimension_persepsi);

        $data['hasilDefuzifikasiPersepsi'] = $new2;



        $data['dimensi_query'] = $this->dimensi_model->CariDimensi($data['dimension_persepsi']);
        $data['dimensi_query'] = json_decode(json_encode($data['dimensi_query']), true);


        foreach ($data['harapan'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagiHarapan[] = array_slice($data['harapan'][0]['allSum'], $key, $chunkSize);
            }
        }


        $data['rumusBatasBawahBagiHarapan'] = $rumusBatasBawahBagiHarapan;
        foreach ($data['rumusBatasBawahBagiHarapan'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawahHarapan'][$key] = array_sum($value);
        }
        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah


        foreach ($data['harapan'][0]['fuzzifikasi1'] as $key => $value) {

            if ($key % $chunkSize === 0) {
                $batasBawahHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }


        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['harapan'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengahHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengahHarapan'] = $batasTengahHarapan;
        foreach ($data['batasTengahHarapan'] as $key => $value) {
            $data['batasTengahHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahHarapan'][$key];
        }
        // proses pembagi batas tengah

        // proses pembagi batas tengah
        foreach ($data['harapan'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtasHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }

        $data['batasAtasHarapan'] = $batasAtasHarapan;
        foreach ($data['batasAtasHarapan'] as $key => $value) {
            $data['batasAtasHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahHarapan'][$key];
        }
        $iterasi = 0;

        // proses pembagi batas tengah
        // batas tengah di tambah batas atas lalu di bagi 2
        // mencari defuzifikasi persepsi

        $dataHasilHarapan['nilai'] = array();

        for ($iterasi = 0; $iterasi < count($data['batasAtasHarapan']); $iterasi++) {
            $dataHasilHarapan['nilai'][] = (number_format($data['batasTengahHarapan'][$iterasi], 2, '.', '') + number_format($data['batasAtasHarapan'][$iterasi], 2, '.', '')) / 2;

            $dataHasilHarapan['id'] = $data['harapan'][0]['dimensi_id_harapan'];
        }

        $data['dimensi_persepsi'] = $data['harapan'][0]['dimensi_id_harapan'];

        $chunkSize = 5;
        $resultHarapan = array();
        for ($iterasi2 = 0; $iterasi2 < count($dataHasilHarapan['nilai']); $iterasi2++) {


            $id = $dataHasilHarapan['id'][$iterasi2];
            $resultHarapan[$id][] = $dataHasilHarapan['nilai'][$iterasi2];
        }

        $newHarapan = array();
        $newHarapan2 = array();
        foreach ($resultHarapan as $key => $value) {

            $newHarapan[] = array('id' => $key, 'quanity' => array_sum($value), 'dibagi' => (array_sum($value)) / count($value), 'count' => count($value));

            $newHarapan2[] = (array_sum($value)) / count($value);
        }
        // echo '<pre>';

        $data['hasilDefuzifikasiHarapan'] = $newHarapan2;





        // membagi hasilDefuzifikasiPersepsi dengan dimensi id yang sama
        // jumlahkan semua hasilDefuzifikasiPersepsi dengan dimensi yang sama lalu bagi dengan banyaknya dimensi id yang sama 
        // 10+11/2
        $chunkSize = 5;


        $countGap = 0;

        if (count($data['hasilDefuzifikasiHarapan']) > count($data['hasilDefuzifikasiPersepsi'])) {
            $countGap = count($data['hasilDefuzifikasiHarapan']);
        } else {
            $countGap = count($data['hasilDefuzifikasiPersepsi']);
        }

        for ($iterasiGap = 0; $iterasiGap < $countGap; $iterasiGap++) {
            $data['gapPd'][$iterasiGap] =  $data['hasilDefuzifikasiPersepsi'][$iterasiGap] -  $data['hasilDefuzifikasiHarapan'][$iterasiGap];
        }


        // ($data['gapPd']);

        $data['rankValuesGapPd'] = array();
        $valueGap = $data['gapPd'];

        $ordered_values = $valueGap;
        rsort($ordered_values);

        foreach ($valueGap as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $data['rankValuesGapPd'][] = ((int) $key + 1);
        }

        $this->load->view('admin/laporan/gapPd', $data);
    }
    public function gapPvpPdf()
    {

        $data['persepsi'] = array($this->dataFuzifikasiPersepsi());
        $data['harapan'] = array($this->dataFuzifikasiHarapan());

        $data['jawaban'] = $this->jawaban_model->index();
        for ($kuesion = 0; $kuesion < count($data['jawaban']); $kuesion++) {

            $data['kuesioner'][] = $data['jawaban'][$kuesion]['kode'];
        }

        // langkah mencari pembagi batas bawah 
        $chunkSize = 5;
        // persepsi Chunk /pemecahan array

        foreach ($data['persepsi'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagiPersepsi[] = array_slice($data['persepsi'][0]['allSum'], $key, $chunkSize);
            }
        }

        $data['rumusBatasBawahBagiPersepsi'] = $rumusBatasBawahBagiPersepsi;
        foreach ($data['rumusBatasBawahBagiPersepsi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawahPersepsi'][$key] = array_sum($value);
        }

        // langkah mencari pembagi batas bawah persepsi 
        // persepsi Chunk /pemecahan array


        // proses pembagi batas bawah persepsi
        foreach ($data['persepsi'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengahPersepsi[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengahPersepsi'] = $batasTengahPersepsi;
        foreach ($data['batasTengahPersepsi'] as $key => $value) {
            $data['batasTengahPersepsi'][$key] = array_sum($value) / $data['semuaRumusBawahPersepsi'][$key];
        }

        // proses pembagi batas bawah persepsi

        // proses pembagi batas atas persepsi
        foreach ($data['persepsi'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtasPersepsi[] = array_slice($data['persepsi'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }

        $data['batasAtasPersepsi'] = $batasAtasPersepsi;
        foreach ($data['batasAtasPersepsi'] as $key => $value) {
            $data['batasAtasPersepsi'][$key] = array_sum($value) / $data['semuaRumusBawahPersepsi'][$key];
        }

        $iterasiPersepsi = 0;
        $iterasiHarapan = 0;
        $iterasiGap = 0;

        // proses pembagi batas atas persepsi
        // batas tengah di tambah batas atas lalu di bagi 2
        // mencari defuzifikasi persepsi
        for ($iterasiPersepsi = 0; $iterasiPersepsi < count($data['batasAtasPersepsi']); $iterasiPersepsi++) {
            $data['hasilDefuzifikasiPersepsi'][$iterasiPersepsi] = $data['batasTengahPersepsi'][$iterasiPersepsi] + $data['batasAtasPersepsi'][$iterasiPersepsi];
            $data['hasilDefuzifikasiPersepsi'][$iterasiPersepsi] = $data['hasilDefuzifikasiPersepsi'][$iterasiPersepsi] / 2;
        }

        // proses pembagi batas atas persepsi


        // harapan Chunk /pemecahan array

        foreach ($data['harapan'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagiHarapan[] = array_slice($data['harapan'][0]['allSum'], $key, $chunkSize);
            }
        }
        $data['rumusBatasBawahBagiHarapan'] = $rumusBatasBawahBagiHarapan;
        foreach ($data['rumusBatasBawahBagiHarapan'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawahHarapan'][$key] = array_sum($value);
        }

        // langkah mencari pembagi batas bawah 

        // harapan Chunk /pemecahan array

        // proses pembagi batas bawah tengah Harapan
        foreach ($data['harapan'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengahHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengahHarapan'] = $batasTengahHarapan;
        foreach ($data['batasTengahHarapan'] as $key => $value) {
            $data['batasTengahHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahPersepsi'][$key];
        }

        // proses pembagi batas bawah tengah Harapan

        // (count($data['harapan'][0]['fuzzifikasi3']));
        //batas atas harapan
        foreach ($data['harapan'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtasHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }
        $data['batasAtasHarapan'] = $batasAtasHarapan;
        foreach ($data['batasAtasHarapan'] as $key => $value) {
            $data['batasAtasHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahHarapan'][$key];
        }
        // proses pembagi batas tengah


        //  $data['batasAtasHarapan'][$iterasiHarapan]
        for ($iterasiHarapan = 0; $iterasiHarapan < count($data['batasAtasHarapan']); $iterasiHarapan++) {
            $data['hasilDefuzifikasiHarapan'][$iterasiHarapan] = $data['batasTengahHarapan'][$iterasiHarapan] + $data['batasAtasHarapan'][$iterasiHarapan];
            $data['hasilDefuzifikasiHarapan'][$iterasiHarapan] = $data['hasilDefuzifikasiHarapan'][$iterasiHarapan] / 2;
        }

        $countGap = 0;

        if (count($data['batasAtasHarapan']) > count($data['batasAtasPersepsi'])) {
            $countGap = count($data['batasAtasHarapan']);
        } else {
            $countGap = count($data['batasAtasPersepsi']);
        }

        for ($iterasiGap = 0; $iterasiGap < $countGap; $iterasiGap++) {
            $data['gapPvp'][$iterasiGap] =  $data['hasilDefuzifikasiPersepsi'][$iterasiGap] -  $data['hasilDefuzifikasiHarapan'][$iterasiGap];
        }

        $data['rankValuesGap'] = array();
        $valueGap = $data['gapPvp'];

        $ordered_values = $valueGap;
        rsort($ordered_values);

        foreach ($valueGap as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $data['rankValuesGap'][] = ((int) $key + 1);
        }



        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-Gap-PVP.pdf";
        $this->pdf->load_view('admin/laporan/gapPvpPdf', $data);
    }

    public function gapPdPdf()
    {
        $data['dimensi'] = $this->dimensi_model->getAll();
        $data['persepsi'] = array($this->dataFuzifikasiPersepsi());
        $data['harapan'] = array($this->dataFuzifikasiHarapan());
        $data['jawaban'] = $this->jawaban_model->index();
        // echo "</br>";

        // echo "</br>";

        $chunkSize = 5;

        foreach ($data['persepsi'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagi[] = array_slice($data['persepsi'][0]['allSum'], $key, $chunkSize);
            }
        }


        $data['rumusBatasBawahBagi'] = $rumusBatasBawahBagi;
        foreach ($data['rumusBatasBawahBagi'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawah'][$key] = array_sum($value);
        }
        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah


        foreach ($data['persepsi'][0]['fuzzifikasi1'] as $key => $value) {

            if ($key % $chunkSize === 0) {
                $batasBawah[] = array_slice($data['persepsi'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }


        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengah[] = array_slice($data['persepsi'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengah'] = $batasTengah;
        foreach ($data['batasTengah'] as $key => $value) {
            $data['batasTengah'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        // proses pembagi batas tengah

        // proses pembagi batas tengah
        foreach ($data['persepsi'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtas[] = array_slice($data['persepsi'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }

        $data['batasAtas'] = $batasAtas;
        foreach ($data['batasAtas'] as $key => $value) {
            $data['batasAtas'][$key] = array_sum($value) / $data['semuaRumusBawah'][$key];
        }
        $iterasi = 0;

        // proses pembagi batas tengah
        // batas tengah di tambah batas atas lalu di bagi 2
        // mencari defuzifikasi persepsi

        $dataHasilPersepsi['nilai'] = array();

        for ($iterasi = 0; $iterasi < count($data['batasAtas']); $iterasi++) {
            $dataHasilPersepsi['nilai'][] = (number_format($data['batasTengah'][$iterasi], 2, '.', '') + number_format($data['batasAtas'][$iterasi], 2, '.', '')) / 2;
            $dataHasilPersepsi['id'] = $data['persepsi'][0]['dimensi_id_persepsi'];
        }

        $data['dimensi_persepsi'] = $data['persepsi'][0]['dimensi_id_persepsi'];

        $chunkSize = 5;
        $result = array();
        for ($iterasi2 = 0; $iterasi2 < count($dataHasilPersepsi['nilai']); $iterasi2++) {


            $id = $dataHasilPersepsi['id'][$iterasi2];
            $result[$id][] = $dataHasilPersepsi['nilai'][$iterasi2];
        }

        $new = array();
        $new2 = array();
        $dimension_persepsi = array();

        foreach ($result as $key => $value) {

            $new[] = array('id' => $key, 'quanity' => array_sum($value), 'dibagi' => (array_sum($value)) / count($value), 'count' => count($value));

            $new2[] = (array_sum($value)) / count($value);
            $dimension_persepsi[] =  $key;
        }
        // echo '<pre>';

        $data['hasilDefuzifikasiPersepsi'] = $new2;
        $data['dimension_persepsi'] = $dimension_persepsi;
        // $data['hasilDefuzifikasiPersepsi'] = $new2;


        // harapan




        foreach ($data['harapan'][0]['allSum'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $rumusBatasBawahBagiHarapan[] = array_slice($data['harapan'][0]['allSum'], $key, $chunkSize);
            }
        }


        $data['rumusBatasBawahBagiHarapan'] = $rumusBatasBawahBagiHarapan;
        foreach ($data['rumusBatasBawahBagiHarapan'] as $key => $value) {
            // ($value);  
            $data['semuaRumusBawahHarapan'][$key] = array_sum($value);
        }
        // langkah mencari pembagi batas bawah 

        // proses pembagi batas bawah


        foreach ($data['harapan'][0]['fuzzifikasi1'] as $key => $value) {

            if ($key % $chunkSize === 0) {
                $batasBawahHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi1'], $key, $chunkSize);
            }
        }


        // proses pembagi batas bawah

        // proses pembagi batas tengah
        foreach ($data['harapan'][0]['fuzzifikasi2'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasTengahHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi2'], $key, $chunkSize);
            }
        }
        $data['batasTengahHarapan'] = $batasTengahHarapan;
        foreach ($data['batasTengahHarapan'] as $key => $value) {
            $data['batasTengahHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahHarapan'][$key];
        }
        // proses pembagi batas tengah

        // proses pembagi batas tengah
        foreach ($data['harapan'][0]['fuzzifikasi3'] as $key => $value) {
            if ($key % $chunkSize === 0) {
                $batasAtasHarapan[] = array_slice($data['harapan'][0]['fuzzifikasi3'], $key, $chunkSize);
            }
        }

        $data['batasAtasHarapan'] = $batasAtasHarapan;
        foreach ($data['batasAtasHarapan'] as $key => $value) {
            $data['batasAtasHarapan'][$key] = array_sum($value) / $data['semuaRumusBawahHarapan'][$key];
        }
        $iterasi = 0;

        // proses pembagi batas tengah
        // batas tengah di tambah batas atas lalu di bagi 2
        // mencari defuzifikasi persepsi

        $dataHasilHarapan['nilai'] = array();

        for ($iterasi = 0; $iterasi < count($data['batasAtasHarapan']); $iterasi++) {
            $dataHasilHarapan['nilai'][] = (number_format($data['batasTengahHarapan'][$iterasi], 2, '.', '') + number_format($data['batasAtasHarapan'][$iterasi], 2, '.', '')) / 2;

            $dataHasilHarapan['id'] = $data['harapan'][0]['dimensi_id_harapan'];
        }

        $data['dimensi_persepsi'] = $data['harapan'][0]['dimensi_id_harapan'];

        $chunkSize = 5;
        $resultHarapan = array();
        for ($iterasi2 = 0; $iterasi2 < count($dataHasilHarapan['nilai']); $iterasi2++) {


            $id = $dataHasilHarapan['id'][$iterasi2];
            $resultHarapan[$id][] = $dataHasilHarapan['nilai'][$iterasi2];
        }

        $newHarapan = array();
        $newHarapan2 = array();
        foreach ($resultHarapan as $key => $value) {

            $newHarapan[] = array('id' => $key, 'quanity' => array_sum($value), 'dibagi' => (array_sum($value)) / count($value), 'count' => count($value));

            $newHarapan2[] = (array_sum($value)) / count($value);
        }
        // echo '<pre>';

        $data['hasilDefuzifikasiHarapan'] = $newHarapan2;


        $data['dimension_persepsi'] =   array_unique($dimension_persepsi);

        $data['hasilDefuzifikasiPersepsi'] = $new2;



        $data['dimensi_query'] = $this->dimensi_model->CariDimensi($data['dimension_persepsi']);
        $data['dimensi_query'] = json_decode(json_encode($data['dimensi_query']), true);




        // membagi hasilDefuzifikasiPersepsi dengan dimensi id yang sama
        // jumlahkan semua hasilDefuzifikasiPersepsi dengan dimensi yang sama lalu bagi dengan banyaknya dimensi id yang sama 
        // 10+11/2
        $chunkSize = 5;


        $countGap = 0;

        if (count($data['hasilDefuzifikasiHarapan']) > count($data['hasilDefuzifikasiPersepsi'])) {
            $countGap = count($data['hasilDefuzifikasiHarapan']);
        } else {
            $countGap = count($data['hasilDefuzifikasiPersepsi']);
        }

        for ($iterasiGap = 0; $iterasiGap < $countGap; $iterasiGap++) {

            $data['gapPd'][$iterasiGap] =  $data['hasilDefuzifikasiPersepsi'][$iterasiGap] -  $data['hasilDefuzifikasiHarapan'][$iterasiGap];
        }


        $data['rankValuesGapPd'] = array();
        $valueGap = $data['gapPd'];

        $ordered_values = $valueGap;
        rsort($ordered_values);

        foreach ($valueGap as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $data['rankValuesGapPd'][] = ((int) $key + 1);
        }



        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data-Gap-PD.pdf";
        $this->pdf->load_view('admin/laporan/gapPdPdf', $data);
    }





    public function inputdata()
    {
        $data['dimensi'] = $this->dimensi_model->getAll();
        // ($data);
        $this->load->view('admin/kuesioner/tambahdata', $data);
    }

    public function simpandata()
    {
        // $this->dimensi_id = 
        // ($this->detail = $post['detail']);

        $kuesioner = $this->kuesioner_model;
        $validation = $this->form_validation;
        $validation->set_rules($kuesioner->rules());

        if ($validation->run()) {
            $kuesioner->simpan();
            $this->session->set_flashdata('success', 'Data Berhasil disimpan!');
            redirect(site_url('admin/kuesioner/inputdata'));
        }

        redirect(site_url('admin/kuesioner/inputdata'));
    }
}
