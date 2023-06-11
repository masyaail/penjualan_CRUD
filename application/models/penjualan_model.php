<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {
  
  public function get_all_penjualan($keyword ='', $id = '')  
  {
    if ($keyword) {
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('tanggal_transaksi', $keyword);
    }
    if ($id) {
        $this->db->where('id', $id);
    }
    // if ($sort_by) {
    //     $this->db->order_by($sort_by);
    // }
    return $this->db->get('penjualan')->result_array();
  }
  
  public function insert_penjualan() {
    $data = array(
      'nama_barang' => $this->input->post('nama_barang'),
      'stok' => $this->input->post('stok'),
      'jumlah_terjual' => $this->input->post('jumlah_terjual'),
      'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
      'jenis_barang' => $this->input->post('jenis_barang')
    );
    
    $this->db->insert('penjualan', $data);
  }
  
  public function get_penjualan($id) {
    
    return $this->db->get_where('penjualan', array('id' => $id))->row_array();
  }
  
  public function update_penjualan($id, $data) {
    
    if($this->db->where('id', $id)){
        $this->db->update('penjualan',$data);
        return true;
    };
    return false;
  }
  
  public function delete_penjualan($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
  }

  public function search_penjualan($keyword) {
    $this->db->like('nama_barang', $keyword);
    $this->db->or_like('tanggal_transaksi', $keyword);
    $this->db->or_like('jenis_barang', $keyword);
    return $this->db->get('penjualan')->result_array();
  }
  
  public function sort_penjualan($column) {
    $this->db->order_by($column);
    return $this->db->get('penjualan')->result_array();
  }

  public function get_jenis_barang()
  {
    return $this->db->get('penjualan')->result_array();
  }

  public function get_top_penjualan($jenis_barang, $start_date, $end_date ) {

    $comparator = ['start'=>'','end'=>''];
    
    if ($start_date && $end_date){
      $comparator = ['start'=>'>=','end' => '<='];
    }

    $this->db->where('jenis_barang', $jenis_barang);
    $this->db->where('tanggal_transaksi' . $comparator['start'] , $start_date);
    $this->db->where('tanggal_transaksi '. $comparator['end'], $end_date);
    $this->db->order_by('jumlah_terjual', 'desc');
    $this->db->limit(1);
    return $this->db->get('penjualan')->row_array();
  }
  
  public function get_bottom_penjualan($jenis_barang, $start_date, $end_date ) {
    $comparator = ['start'=>'','end'=>''];
    
    if ($start_date && $end_date){
      $comparator = ['start'=>'>=','end' => '<='];
    }
    
    $this->db->where('jenis_barang', $jenis_barang);
    $this->db->where('tanggal_transaksi '. $comparator['start'], $start_date);
    $this->db->where('tanggal_transaksi '. $comparator['end'], $end_date);
    $this->db->order_by('jumlah_terjual', 'asc');
    $this->db->limit(1);
    return $this->db->get('penjualan')->row_array();
  }

  public function filter_penjualan($start_date, $end_date) {
    $this->db->where('tanggal_transaksi >=', $start_date);
    $this->db->where('tanggal_transaksi <=', $end_date);
    return $this->db->get('penjualan')->result_array();
  }

  
}
?>
