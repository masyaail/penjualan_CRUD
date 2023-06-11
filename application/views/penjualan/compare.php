<div class="content-wrapper">
    <section class="content">
    <h2>Perbandingan Jenis Barang</h2>

    <form action="<?php echo base_url('penjualan/compare'); ?>" method="get">
    <div class="form-group">    
        <select name="jenis_barang" class="form-control">
        <?php foreach ($jenis as $data) : ?>
            <option value="<?php echo $data['jenis_barang']; ?>"><?php echo $data['jenis_barang']; ?></option>
        <?php endforeach; ?>
        </select>
        <!-- <select name="jenis_barang" class="form-control">
            <option value="Sayuran">Sayuran</option>
            <option value="Pembersih">Pembersih</option>
            <option value="Obat">Obat</option>
            <option value="Makanan">Makanan</option>
        </select> -->
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="start_date"  class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="end_date"  class="form-control">
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Bandingkan</button>
    </form>
        

    <br>       

    <h3>Data Transaksi Terbanyak:</h3>
    <?php if ($top_penjualan) : ?>
        <p>Nama Barang: <?php echo $top_penjualan['nama_barang']; ?></p>
        <p>Jumlah Terjual: <?php echo $top_penjualan['jumlah_terjual']; ?></p>
        <p>Tanggal Transaksi: <?php echo $top_penjualan['tanggal_transaksi']; ?></p>
    <?php else : ?>
    <p>Tidak ada data transaksi.</p>
    <?php endif; ?>

    <h3>Data Transaksi Terendah:</h3>
    <?php if ($bottom_penjualan) : ?>
        <p>Nama Barang: <?php echo $bottom_penjualan['nama_barang']; ?></p>
        <p>Jumlah Terjual: <?php echo $bottom_penjualan['jumlah_terjual']; ?></p>
        <p>Tanggal Transaksi: <?php echo $bottom_penjualan['tanggal_transaksi']; ?></p>
    <?php else : ?>
    <p>Tidak ada data transaksi.</p>
    <?php endif; ?>
    </section>
</div>