<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('penjualan_model');
    }
    
    public function index() {
        $data['penjualan'] = $this->penjualan_model->get_all_penjualan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function create() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/create');
        $this->load->view('templates/footer');
    }
    
    public function store() {
        $this->penjualan_model->insert_penjualan();
        redirect('penjualan');
    }
    
    public function edit($id) {
        $data['penjualan'] = $this->penjualan_model->get_penjualan($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/edit', $data);
        $this->load->view('templates/footer');
        
    }
    
    public function update($id) {
    $data = array(
        'nama_barang' => $this->input->post('nama_barang'),
        'stok' => $this->input->post('stok'),
        'jumlah_terjual' => $this->input->post('jumlah_terjual'),
        'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
        'jenis_barang' => $this->input->post('jenis_barang')
    );
        $this->penjualan_model->update_penjualan($id, $data);
        redirect('penjualan');
    }
    
    public function delete($id) {
        $where = array('id' => $id);
        $this->penjualan_model->delete_penjualan($where, 'penjualan');
        redirect('penjualan');
    }
    public function search() {
        $keyword = $this->input->get('keyword');
        $data['penjualan'] = $this->penjualan_model->search_penjualan($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }
      
    public function sort() {
        $column = $this->input->get('column');
        // $order = $this->input->get('order');
        $data['penjualan'] = $this->penjualan_model->sort_penjualan($column);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }
    public function compare() {
        $jenis_barang = $this->input->get('jenis_barang');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data['jenis'] = $this->penjualan_model->get_jenis_barang();
        $data['top_penjualan'] = $this->penjualan_model->get_top_penjualan($jenis_barang, $start_date, $end_date);
        $data['bottom_penjualan'] = $this->penjualan_model->get_bottom_penjualan($jenis_barang, $start_date, $end_date);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/compare', $data);
        $this->load->view('templates/footer');
    }
    public function filter() {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data['penjualan'] = $this->penjualan_model->filter_penjualan($start_date, $end_date);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }
}
?>
