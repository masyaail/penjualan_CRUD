<div class="content-wrapper">
    <section class="content">
    <h2>Edit Data Penjualan</h2>
        <form action="<?php echo base_url('penjualan/update/' . $penjualan['id']); ?>" method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="<?php echo $penjualan['nama_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="<?php echo $penjualan['stok']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jumlah Terjual</label>
                <input type="number" name="jumlah_terjual" class="form-control" value="<?php echo $penjualan['jumlah_terjual']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" class="form-control" value="<?php echo $penjualan['tanggal_transaksi']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Barang</label>
                <input type="text" name="jenis_barang" class="form-control" value="<?php echo $penjualan['jenis_barang']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </section>
</div>