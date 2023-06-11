<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_penjualan extends CI_Migration {
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }
        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nama_barang' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'stok' => array(
                                'type' => 'INT',
                                
                        ),
                        'jumlah_terjual' => array(
                                'type' => 'INT',
                                
                                
                        ),
                        'tanggal_transaksi' => array(
                                'type' => 'DATE',
                                
                                
                        ),
                        'jenis_barang' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                                
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('penjualan');
        }

        public function down()
        {
                $this->dbforge->drop_table('penjualan');
        }
    }