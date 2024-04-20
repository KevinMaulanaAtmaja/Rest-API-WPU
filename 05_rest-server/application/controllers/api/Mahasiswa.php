<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';


class Mahasiswa extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mhs');
        $this->methods['index_get']['limit'] = 20;
        $this->methods['index_delete']['limit'] = 1;
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $m = $this->mhs->getMahasiswa();
        } else {
            $m = $this->mhs->getMahasiswa($id);
        }

        if ($m) {
            return $this->response([
                'status' => true,
                'data' => $m,
            ], REST_Controller::HTTP_OK);
        } else {
            return $this->response([
                'status' => false,
                'data' => 'Id not found!',
            ], REST_Controller::HTTP_NOT_FOUND);
        }

        // var_dump($m);
    }


    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'data' => 'Provide an Id!',
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->mhs->deleteMahasiswa($id) == 1) {
                $this->response([
                    'status' => true,
                    'id' =>  $id,
                    'message' =>  'deleted',
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'data' => 'Id not found!',
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


    public function index_post()
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan'),
        ];


        if ($this->mhs->createMahasiswa($data) == 1) {
            $this->response([
                'status' => true,
                'data' =>  'New mahasiswa has been created!',
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Failed to create new data!',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan'),
        ];


        if ($this->mhs->updateMahasiswa($data, $id) == 1) {
            $this->response([
                'status' => true,
                'data' =>  'Data mahasiswa has been updated!',
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Failed to update data!',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
