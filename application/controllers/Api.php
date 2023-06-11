<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('penjualan_model');
    }

    public function index_get() {
        $keyword = $this->get('keyword');
        $id = $this->get('id');
        // $sort_by = $this->get('sort_by');

        $penjualan = $this->penjualan_model->get_all_penjualan($keyword, $id);
        
        if ($penjualan) {
            $this->response([
                'status' => true,
                'message' => 'Data penjualan berhasil ditemukan',
                'data' => $penjualan
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data penjualan tidak ditemukan'
            ], 404);
        }
    }

    public function index_post() {
        $data = [
            'nama_barang' => $this->post('nama_barang'),
            'stok' => $this->post('stok'),
            'jumlah_terjual' => $this->post('jumlah_terjual'),
            'tanggal_transaksi' => $this->post('tanggal_transaksi'),
            'jenis_barang' => $this->post('jenis_barang')
        ];
        if ($this->db->insert('penjualan',$data)) {
            $this->response([
                'status' => true,
                'message' => 'Data penjualan berhasil ditambahkan'
            ], 200);
        } 
        else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan data penjualan'
            ], 404);
        }
    }

    public function index_put($id) {
        // $id = $this->put('id');
        $namaBarang = $this->put('nama_barang');
        $stok = $this->put('stok');
        $jumlahTerjual = $this->put('jumlah_terjual');
        $tanggalTransaksi = $this->put('tanggal_transaksi');
        $jenisBarang = $this->put('jenis_barang');
        $data = array(
            'nama_barang' => $namaBarang,
            'stok' => $stok,
            'jumlah_terjual' => $jumlahTerjual,
            'tanggal_transaksi' => $tanggalTransaksi,
            'jenis_barang' => $jenisBarang,
        );
        if ($this->penjualan_model->update_penjualan($id,$data)) {
        // if ($this->db->update('penjualan', $data,'id ='.$id)) {
            $this->response([
                'status' => true,
                'message' => 'Data penjualan berhasil diperbarui'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data penjualan'
            ], 404);
        }
        // $this->db->where('id', $id);
        // $this->db->update('penjualan', $data);
        // $this->response([
        //     'status' => true,
        //     'message' => 'Data erhasil diperbarui'
        // ], 200);
    }

    public function index_delete($id) {
        $where = array('id' => $id);
        $deleted = $this->penjualan_model->delete_penjualan($where, 'penjualan');
        if ($deleted) {
            $this->response([
                'status' => false,
                'message' => 'Gagal menghapus data penjualan'
            ], 404);
        } else {
            $this->response([
                'status' => true,
                'message' => 'Data penjualan berhasil dihapus'
            ], 200);
        }
    }
}