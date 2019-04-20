<div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="text-center">
                            <img src="<?php echo base_url('foto/'.$this->session->userdata('gambar')); ?>" class="user-image img-responsive img-thumbnail" />
                            <p style="font-size: 25px;color: blue"><?php echo $this->session->userdata('nama_karyawan') ?></p>
                        </li>
                        <br>
                        <?php
                            if ($this->session->userdata('level')=='operator') {            
                        ?>
                        <li>
                            <a href="<?php echo base_url().'dashboard_op'; ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <?php } ?>
                        <?php
                            if ($this->session->userdata('level')=='admin') {            
                        ?>
                        <li>
                            <a href="<?php echo base_url().'dasboard'; ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <?php } ?>
                        <?php
                            if ($this->session->userdata('level')=='admin') {            
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Data Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url().'c_barang'; ?>">Barang</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'c_bagian' ?>">Bagian</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'c_karyawan' ?>">Karyawan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'c_pelanggan' ?>">Pelanggan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php } ?>
                        <?php
                            if ($this->session->userdata('level')=='operator') {            
                        ?>
                        <li>
                            <a href="<?php echo base_url().'c_pelanggan' ?>">Pelanggan</a>
                        </li>
                        <?php 
                            }
                         ?>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Penjualan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url().'c_penjualan' ?>">Transaksi Penjualan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'c_penjualan/data_penjualan' ?>">Detail Penjualan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Pembelian<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url().'c_pembelian' ?>">Transaksi Pembelian</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'c_pembelian/data_pembelian' ?>">Detail Pembelian</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                            if ($this->session->userdata('level')=='admin') {            
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i>Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url().'c_penjualan/laporan_penjualan' ?>">Laporan Penjualan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'c_pembelian/laporan_pembelian' ?>">Laporan Pembelian</a>
                                </li>
                            </ul>
                            <?php
                                }
                             ?>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->