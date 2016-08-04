<style type="text/css">
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
</style>

<div class="container">
  <h1>List User</h1>
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <!--  <h3 class="box-title">Responsive Hover Table</h3> -->

             <!--  <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>id Level</th>
                  <th>Kategori</th>
                  <th>id Kategori</th>
                  <th></th>
                  <th></th>
                </tr>
                <?php foreach ($user_list as $u_key){ ?>
                <tr>
                  <td><?php echo $u_key->iduser; ?></td>
                  <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->username; ?></td>
                  
                  <td><?php echo $u_key->level; ?></td>
                  <td><?php echo $u_key->level_idlevel ?></td>
                 <td><?php echo $u_key->kategori; ?></td>
                 <td><?php echo $u_key->kategori_idkategori; ?></td>

                   <td><a href="<?=base_url()?>admin/edit_user/<?php echo $u_key->iduser; ?>" type="submit" name="edit" value="edit" class="fa fa-pencil"> </a></td>
                   <td><a href="<?=base_url()?>admin/delete_user/<?php echo $u_key->iduser; ?>" type="submit" name="delete" value="delete" class="fa fa-trash" <?php echo $u_key->iduser;?> > </a></td>
                </tr>
                
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>