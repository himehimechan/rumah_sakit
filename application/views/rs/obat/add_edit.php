        <!-- jQuery -->
        <script src="<?=base_url()?>assets_admin/vendors/jquery/dist/jquery.min.js"></script>

        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Form <?php if($obat) { echo "Edit"; } else { echo "Registrasi"; } ?> Obat</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <?php if (validation_errors()){ ?>
                   <div style="width:500px; background-color:#FCC; padding:5px;">
                        <?php echo validation_errors(); ?> <br>
                    </div>
                <?php } ?>

                  <br/>
                  <form class="form-horizontal form-label-left" method="post" action="<?=base_url()?>obat/add_edit_save/<?php if($obat) { echo $obat[0]->id; } ?>" enctype="multipart/form-data">

                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Obat</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" placeholder="Nama Obat" name="nama" 
                          value="<?php if($obat) { echo $obat[0]->nama_obat; } ?>" >
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Harga Obat (Rp)</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="number" class="form-control" placeholder="Harga Obat" name="harga" 
                          value="<?php if($obat) { echo $obat[0]->harga; }?>" >
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Kategori Obat</label>
                        <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" name="kategori" required>
                            <option value="" disabled selected>--pilih kategori obat--</option>
                            <option value="Obat Penenang" <?php if($obat) { if($obat[0]->kategori_obat == 'Obat Penenang') { echo "selected"; } }?>>Obat Penenang</option>
                            <option value="Obat Vitamin" <?php if($obat) { if($obat[0]->kategori_obat == 'Obat Vitamin') { echo "selected"; } }?>>Obat Vitamin</option>
                            <option value="Obat Antibiotik" <?php if($obat) { if($obat[0]->kategori_obat == 'Obat Antibiotik') { echo "selected"; } }?>>Obat Antibiotik</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Satuan Obat</label>
                        <div class="col-md-9 col-sm-9 ">
                        <select class="form-control" name="satuan" required>
                          <option value="" disabled selected>--pilih satuan obat--</option>
                          <option value="Tablet" <?php if($obat) { if($obat[0]->satuan_barang == 'Tablet') { echo "selected"; } }?>>Tablet</option>
                          <option value="Sirup" <?php if($obat) { if($obat[0]->satuan_barang == 'Sirup') { echo "selected"; } }?>>Sirup</option>
                          <option value="Bubuk" <?php if($obat) { if($obat[0]->satuan_barang == 'Bubuk') { echo "selected"; } }?>>Bubuk</option>
                          <option value="Kapsul" <?php if($obat) { if($obat[0]->satuan_barang == 'Kapsul') { echo "selected"; } }?>>Kapsul</option>
                        </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                          <a href="<?=base_url()?>obat" class="btn btn-danger">Back</a>
                          <button type="reset" class="btn btn-warning">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>