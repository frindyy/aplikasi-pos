<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Pelanggan</h1>
        </div>
           <form action="<?php echo base_url().'c_pelanggan/edit_proses' ?>" method="post">
           <div class="col-lg-8">
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Pelanggan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan'] ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Pelanggan</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Pelanggan" name="nama_pelanggan" value="<?php echo $pelanggan['nm_pelanggan']; ?>">
                <div style="color: red"><?php echo form_error('nama_pelanggan'); ?></div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat Pelanggan</label> <br>
                <textarea name="alamat" cols="90" rows="3" placeholder="Alamat Pelanggan"><?php echo $pelanggan['alamat']; ?></textarea>
                <div style="color: red"><?php echo form_error('alamat'); ?></div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nomor Telepon</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="No Telepon" name="no_telp" value="<?php echo $pelanggan['no_telp']; ?>">
                <div style="color: red"><?php echo form_error('no_telp'); ?></div>
              </div>
              <button type="submit" class="btn btn-primary">Edit</button>
              <a href="<?php echo base_url().'c_pelanggan' ?>" class="btn btn-warning">Cancel</a>
              </div>
          </form>
            </div> 
            </div>