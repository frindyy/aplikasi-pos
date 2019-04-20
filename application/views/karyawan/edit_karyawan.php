<div id="page-wrapper">
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Karyawan</h1>
        </div>
        
           <form action="<?php echo base_url().'c_karyawan/proses_edit_karyawan' ?>" method="post" enctype='multipart/form-data'>
           <input type="hidden" name="nik_id" value="<?php echo $karyawan['nik'] ?>">
           <!-- menambahkan Data Nik -->
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Nik</label>
                <input type="number" class="form-control" placeholder="nik karyawan" name="nik" value="<?php echo $karyawan['nik'] ?>" required readonly>
              </div>
               <!-- menambahkan Data foto Karyawan -->
              <div class="form-group">
                <label for="exampleInputPassword1">Foto Karyawan</label>
                <input type="file" class="form-control" name="userfile">
                <img src="<?php echo base_url()."/foto/".$karyawan['gambar']?>" width="80">
                <p>Max 1 MB</p>
              </div>
              <!-- menambahkan Data Karyawan -->
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Karyawan</label>
                <input type="text" class="form-control"  placeholder="Nama Karyawan" name="nama_karyawan" value="<?php echo $karyawan['nama_karyawan'] ?>" required>
              </div>
              <!-- menambahkan Data Nama Bagian -->
               <div class="form-group">
                <label for="exampleInputPassword1">Nama Bagian</label>
                <select class="form-control" name="nama_bagian" required>
                    <option>nama bagian</option>
                    <?php
                        $data = $this->db->get('bagian')->result();
                        foreach ($data as $row) {
                          echo "<option value='$row->kode_bagian'";
                          echo $karyawan['kode_bagian']==$row->kode_bagian?'selected':'';
                          echo">$row->nama_bagian</option>";
                        }
                    ?>
              </select>
              </div>
              <!-- menambahkan Data Tanggal Masuk -->
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Masuk</label>
                <input type="text" class="form-control input-tanggal"  placeholder="Tanggal Masuk" name="tanggal_masuk" value="<?php echo date('d-M-Y',strtotime($karyawan['tanggal_masuk'])); ?>" required>
              </div>
              </div> <!-- End col-lg-6 -->

              <div class="col-lg-6">
              <!-- menambahkan Data Alamat -->
                <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control"  placeholder="Alamat" name="alamat" value="<?php echo $karyawan['alamat']; ?>" required>
              </div>
              <!-- menambahkan Data No telp -->
                <div class="form-group">
                <label for="exampleInputPassword1">No Telp</label>
                <input type="number" class="form-control"  placeholder="No Telp" name="no_telp" value="<?php echo $karyawan['no_telp']; ?>" required>
              </div>
              <!-- menambahkan Data username -->
                <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" class="form-control"  placeholder="Username" name="username" value="<?php echo $karyawan['username']; ?>" required>
              </div>
              <!-- menambahkan Data username -->
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" class="form-control"  placeholder="password" name="password" value="<?php echo $karyawan['pass']; ?>" required>
              </div>
              <!-- menambahkan Level -->
                <div class="form-group">
                <label for="exampleInputPassword1">Level</label>
                <select class="form-control" name="level" required>
                    <option value="">Level</option>
                    <option value="admin" <?php echo set_select('level','admin'); ?> <?php if($karyawan['level'] == 'admin'){ echo 'selected'; } ?>>admin</option>
                    <option value="operator" <?php echo set_select('level','operator'); ?> <?php if($karyawan['level'] == 'operator'){ echo 'selected'; } ?>>operator</option>
              </select>
              </div>

              </div> <!-- End col-lg-6 -->
              <div class="col-md-12">
              <div class="panel-footer" align="center">
                <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                <a href="<?php echo base_url().'c_karyawan' ?>" class="btn btn-warning">Cancel</a>
              </div> <!-- End col-lg-12 -->
              </div> <!-- End Panel footer -->
          </form>
            </div> <!-- End Row -->
            </div> <!-- End page wrapper -->