<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Ubah Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <!-- Looping data kosan -->
                <?php 
                    foreach ($data_penjualan as $row) {
                        $id = $row->id;
                        $id_pelanggan = $row->id_pelanggan;
                        $id_produk = $row->id_produk; 
                        $kode_pelanggan = $row->kode_pelanggan;
                        $kode_produk = $row->kode_produk;
                        $nama_pelanggan = $row->nama_pelanggan;
                        $nama_produk = $row->nama_produk;
                        $ukuran_bouquet = $row->ukuran_bouquet; 
                        $harga_bouquet = $row->harga_bouquet;
                        $harga_penjualan = $row->harga_penjualan;
                        $jumlah = $row->jumlah;
                    }
                ?>
              <!-- form start -->
              <form action="<?=base_url('penjualan/update')?>" method="post">
              <?= csrf_field() ?>
                <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-2">
                      <input type="hidden" class="form-control" id="id" name="id" value="<?=$id?>" readonly>                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?=$nama_pelanggan.' ('.$kode_pelanggan.')'?>" readonly>                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?=$nama_produk.' ('.$kode_produk.')'?>" readonly>                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <?php
                            //jika set value namakosan tidak kosong maka isi $nama diganti dengan isian dari user
                            if(strlen(set_value('jumlah'))>0){
                            $jumlah = set_value('jumlah');
                            }
                        ?>
                      <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah" value="<?=$jumlah?>">
                      <div class="invalid-feedback" id="errorjumlah"></div>
                        <?php 
                        // contoh mendapatkan error per komponen
                        if(isset($validation)){
                            if($validation->getError('jumlah')) {?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-invalid
                                    document.getElementById('jumlah').setAttribute("class", "form-control is-invalid");
                                    document.getElementById('errorjumlah').innerHTML = "<?=$validation->getError('jumlah'); ?>";
                                    // serta tambahkan div class invalid
                                </script>
                            <?php 
                            }else{
                                // tidak ada error di nama_kos maka nilai is-invalid dihapuskan
                                ?>
                                <script>
                                    // modifikasi elemen class input form untuk nama_kos menjadi is-valid
                                    document.getElementById('jumlah').setAttribute("class", "form-control is-valid");
                                    document.getElementById('errorjumlah').innerHTML = "";
                                    // serta tambahkan div class is valid
                                </script>
                                <?php
                            }
                        }?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Bouquet</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="harga" name="harga" value="<?=$harga_bouquet?>" readonly>                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Penjualan</label>
                     <div class="col-sm-6">
                     <?php
                            //jika set value namakosan tidak kosong maka isi $nama diganti dengan isian dari user
                            if(strlen(set_value('harga_penjualan'))>0){
                            $harga_penjualan = set_value('harga_penjualan');
                            }
                        ?>
                        <input type="text" class="form-control" id="harga_penjualan" name="harga_penjualan" placeholder="Harga Penjualan" value="<?=$harga_penjualan?>" readonly>
                    </div>
                </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->