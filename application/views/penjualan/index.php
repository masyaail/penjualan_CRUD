<div class="content-wrapper">
    <section class="content">
<h2>Data Penjualan</h2>

<a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mb-3">Tambah Data</a>
<br>

<form action="<?php echo base_url('penjualan/sort'); ?>" method="get">
    <div class="form-group">
        <select name="column" class="form-control">
            <option value="nama_barang">Nama Barang</option>
            <option value="tanggal_transaksi">Tanggal Transaksi</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Urutkan</button>
</form>

<form action="<?php echo base_url('penjualan/filter'); ?>" method="get">
    <div class="form-group">
        <label>Tanggal Mulai</label>
        <input type="date" name="start_date" class="form-control">
    </div>
    <div class="form-group">
        <label>Tanggal Selesai</label>
        <input type="date" name="end_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<br>

<table class="table">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Jumlah Terjual</th>
        <th>Tanggal Transaksi</th>
        <th>Jenis Barang</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
    <?php 
    $no = 1;
    foreach ($penjualan as $data) : ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama_barang']; ?></td>
        <td><?php echo $data['stok']; ?></td>
        <td><?php echo $data['jumlah_terjual']; ?></td>
        <td><?php echo $data['tanggal_transaksi']; ?></td>
        <td><?php echo $data['jenis_barang']; ?></td>
        <td>
            <a href="<?php echo base_url('penjualan/edit/' . $data['id']); ?>" class="btn btn-warning">Edit</a>
            <a href="<?php echo base_url('penjualan/delete/' . $data['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>
    </tr>
        <?php endforeach; ?>
</tbody>
</table>
<div class="row">
    <div class="col">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
</section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        `<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Data Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('penjualan/store'); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Terjual</label>
                            <input type="number" name="jumlah_terjual" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input type="text" name="jenis_barang" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>