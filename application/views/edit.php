<div class="content-wrapper">
    <section class="content">
        <?php foreach ($mahasiswa as $mhs) { ?>
        <form action="<?php echo base_url().'mahasiswa/update'; ?>" method="post">
            <div class="form-grup">
                <label>Nama Mahasiswa</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id?>">
                <input type="text" name="nama" class="form-control" value="<?php echo $mhs->nama?>">
            </div>
            <div class="form-grup">
                <label>NIM Mahasiswa</label>
                <input type="text" name="nim" class="form-control" value="<?php echo $mhs->nim?>">
            </div>
            <div class="form-grup">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="<?php echo $mhs->jurusan?>">
            </div>
            <div class="form-grup">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $mhs->alamat?>">
            </div>
            <button type="reset" class="btn btn-danger mt-3">Reset</button>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        <?php } ?>
    </section>
</div>