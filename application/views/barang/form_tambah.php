<div id="page-wrapper" style="margin-bottom: 50px">
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Barang</h1>
        </div>
           <form action="<?php echo base_url().'c_barang/tambah_proses' ?>" method="post">
           <div class="col-lg-8">
           <!-- kode Barang (disabled) -->
              <div class="form-group">
              <?php $kode_unik = $this->m_barang->buat_kode(); ?>
                <label for="exampleInputEmail1">Kode Barang</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kode Barang" name="kd_barang" value="<?php echo $kode_unik; ?>" readonly>
              </div>
            <!-- Input Nama Barang -->
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Barang</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Barang" name="nama_barang" value="<?php echo set_value('nama_barang'); ?>">
                <div style="color: red"><?php echo form_error('nama_barang'); ?></div>
              </div>
              <!-- Input Ukuran Kaos -->
              <div class="form-group">
                <label for="exampleInputPassword1">Ukuran Kaos</label>
                <select name="ukuran" class="form-control">
                  <option value="">Ukuran Kaos</option>
                  <option value="S" <?php echo set_select('ukuran','S'); ?>>S</option>
                  <option value="M" <?php echo set_select('ukuran','M'); ?>>M</option>
                  <option value="L" <?php echo set_select('ukuran','L'); ?>>L</option>
                  <option value="XL" <?php echo set_select('ukuran','XL'); ?>>XL</option>
                  <option value="XXL" <?php echo set_select('ukuran','XXL'); ?>>XXL</option>
                </select>
                <div style="color: red"><?php echo form_error('ukuran'); ?></div>
              </div>
            <!-- Input Warna Kaos -->
              <div class="form-group">
                <label for="exampleInputPassword1">Warna Kaos</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Warna Kaos" name="warna" value="<?php echo set_value('warna'); ?>">
                <div style="color: red"><?php echo form_error('warna'); ?></div>
              </div>
            <!-- Input Harga beli barang -->
              <div class="form-group">
                <label for="exampleInputPassword1">Harga Beli</label>
                <input type="number" class="form-control" id="harga_beli" placeholder="Rp. Harga Beli" name="harga_beli" value="<?php echo set_value('harga_beli'); ?>" onfocus="mulaiHitung()" onblur="berhentiHitung()">
                <div style="color: red"><?php echo form_error('harga_beli'); ?></div>
              </div>
            <!-- Input Harga Jual barang -->
              <div class="form-group">
                <label for="exampleInputPassword1">Harga Jual</label>
                <input type="number" class="form-control" id="harga_jual" placeholder="Rp. Harga Jual" name="harga_jual" value="<?php echo set_value('harga_jual'); ?>" onfocus="mulaiHitung()" onblur="berhentiHitung()">
                <div style="color: red"><?php echo form_error('harga_jual'); ?></div>
              </div>
              <!-- Input Provit -->
              <div class="form-group">
                <label for="exampleInputPassword1">Provit</label>
                <input type="number" class="form-control" id="provit" placeholder="Rp. Provit" name="provit" value="<?php echo set_value('provit'); ?>" readonly>
                <div style="color: red"><?php echo form_error('provit'); ?></div>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
              <a href="<?php echo base_url().'c_barang' ?>" class="btn btn-warning">Cancel</a>
              </div>
          </form>
            </div> 
            </div>
            <script type="text/javascript">
              function mulaiHitung(){
                Interval = setInterval("hitung()",1);
              }

              function hitung(){
                harga_jual = parseInt(document.getElementById('harga_jual').value);
                harga_beli = parseInt(document.getElementById('harga_beli').value);
                provit = harga_jual - harga_beli;
                document.getElementById('provit').value = provit;
              }

              function berhentiHitung(){
                ClearInterval(Interval);
              }
            </script>