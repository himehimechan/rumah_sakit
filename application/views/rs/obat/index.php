<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Obat</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="<?=base_url()?>obat/add_edit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Obat</a>
                                <br/>
                                <br/>
                                <?=$this->session->flashdata('msg')?>
                                <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th width="12">No</th>
                                        <th>Nama Obat</th>
                                        <th>Kategori</th>
                                        <th>Satuan</th>
                                        <th>Harga Obat</th>
                                        <th width="90">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($data_obat as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$no?></td>
                                                    <td><?php echo $row['nama_obat'];?></td>
                                                    <td><?php echo $row['kategori_obat'];?></td>
                                                    <td><?php echo $row['satuan_barang'];?></td>
                                                    <td><?php echo $row['harga'];?></td>
                                                    <td><a href="<?php echo base_url()?>obat/add_edit/<?php echo $row['id']; ?>" 
                                                    class="btn btn-info btn-sm" title="edit"><i class="fa fa-pencil"></i></a> 
                                                    <a href="<?=base_url()?>obat/delete_data/<?=$row['id'];?>" onclick="return confirm('Are you sure to delete data?')" 
                                                    class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            $no++;} 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>