<style>
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
</style>
<!-- START CUSTOM TABS -->
      <h2 class="page-header">List News</h2>

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pending (1)</a></li>
              <li><a href="#tab_2" data-toggle="tab">Approved (1)</a></li>
              <li><a href="#tab_3" data-toggle="tab">Rejected (1)</a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
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
                    
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
            </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
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
                    <button type="submit" class="btn btn-default"><i class="fa fa-trash"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-download"></i></button>
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
            </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
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
                    <button type="submit" class="btn btn-default"><i class="fa fa-trash"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-check"></i></button>
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
            </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->