<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Bagian</h1>
        </div>
           <form action="<?php echo base_url().'c_bagian/proses_edit_bagian' ?>" method="post">
           <div class="col-lg-8">
              <div class="form-group">
              <?php $kode_unik = $this->m_bagian->buat_kode(); ?>
                <label for="exampleInputEmail1">Kode Bagian</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kode Bagian" name="kode_bagian" value="<?php echo $bagian['kode_bagian']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama bagian</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Bagian" name="nama_bagian" value="<?php echo $bagian['nama_bagian']; ?>">
                <div style="color: red"><?php echo form_error('nama_bagian'); ?></div>
              </div>
              <button type="submit" class="btn btn-primary">Edit</button>
              <a href="<?php echo base_url().'c_bagian' ?>" class="btn btn-warning">Cancel</a>
              </div>
          </form>
            </div> 
            </div>