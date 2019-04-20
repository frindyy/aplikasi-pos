<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Barang</h1>
        </div>
           <form action="<?php echo base_url().'c_barang/proses_edit_barang' ?>" method="post">
           <div class="col-lg-8">
           <!-- kode Barang (disabled) -->
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Barang</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kode Barang" name="kd_barang" value="<?php echo $barang['kd_barang']; ?>" readonly>
              </div>
            <!-- Input Nama Barang -->
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Barang</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Barang" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>">
                <div style="color: red"><?php echo form_error('nama_barang'); ?></div>
              </div>
              <!-- Input Ukuran Kaos -->
              <div class="form-group">
                <label for="exampleInputPassword1">Ukuran Kaos</label>
                <select name="ukuran" class="form-control" required>
                  <option value="">Ukuran Kaos</option>
                  <option value="S" <?php echo set_select('ukuran','S'); ?> <?php if($barang['ukuran'] == 'S'){ echo 'selected'; } ?>>S</option>
                  <option value="M" <?php echo set_select('ukuran','M'); ?> <?php if($barang['ukuran'] == 'M'){ echo 'selected'; } ?>>M</option>
                  <option value="L" <?php echo set_select('ukuran','L'); ?> <?php if($barang['ukuran'] == 'L'){ echo 'selected'; } ?>>L</option>
                  <option value="XL" <?php echo set_select('ukuran','XL'); ?> <?php if($barang['ukuran'] == 'XL'){ echo 'selected'; } ?>>XL</option>
                  <option value="XXL" <?php echo set_select('ukuran','XXL'); ?> <?php if($barang['ukuran'] == 'XXL'){ echo 'selected'; } ?>>XXL</option>
                </select>
              </div>
            <!-- Input Warna Kaos -->
              <div class="form-group">
                <label for="exampleInputPassword1">Warna Kaos</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Warna Kaos" name="warna" value="<?php echo $barang['warna']; ?>">
                <div style="color: red"><?php echo form_error('warna'); ?></div>
              </div>
            <!-- Input Harga beli barang -->
              <div class="form-group">
                <label for="exampleInputPassword1">Harga Beli</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Rp. Harga Beli" name="harga_beli" value="<?php echo $barang['harga_beli']; ?>">
                <div style="color: red"><?php echo form_error('harga_beli'); ?></div>
              </div>
            <!-- Input Harga Jual barang -->
              <div class="form-group">
                <label for="exampleInputPassword1">Harga Jual</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Rp. Harga Jual" name="harga_jual" value="<?php echo $barang['harga_jual']; ?>">
                <div style="color: red"><?php echo form_error('harga_jual'); ?></div>
              </div>
            <!-- Input Stock barang -->
              <div class="form-group">
                <label for="exampleInputPassword1">Stock Kaos</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Stock kaos" name="stock" value="<?php echo $barang['stock']; ?>">
                <div style="color: red"><?php echo form_error('stock'); ?></div>
              </div>
              <button type="submit" class="btn btn-primary">Edit</button>
              <a href="<?php echo base_url().'c_barang' ?>" class="btn btn-warning">Cancel</a>
              </div>
          </form>
            </div> 
            </div>