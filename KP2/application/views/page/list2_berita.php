<style>
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
</style>
<div class="container">
  <h1>List News</h1>
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-tools">
                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID Berita</th>
                  <th>Judul Berita</th>
                  <th>Creator</th>
                  <th>Time Created</th>
                  <th> </th>
                </tr>
                <?php foreach ($berita_list as $u_key){ ?>
                <tr>
                  <td><?php echo $u_key->idberita; ?></td>
                  <td><?php echo $u_key->judul; ?></td>
                  <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                  <td>
                    <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-trash"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-check"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-download"></i></button>
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>