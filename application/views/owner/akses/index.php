  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Data Akses</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <!-- Main row -->

        <div class="row">
          <div class="col">
          <div class="card">

            <div class="card-body">
              <a href="<?=base_url('aksesowner/akses_add')?>" class="btn btn-primary mb-3"><i class="nav-icon far fas fa-plus mr-2"></i>Tambah User</a>
              <?php 
                echo $this->session->flashdata('flash');
                $this->session->unset_userdata('flash');
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1 ; foreach ($akses as $user) : ?>
                <tr>
                  <td width="50"><?=$no++?></td>
                  <td><?=$user['username']?></td>
                  <td><?=$user['password']?></td>
                  <td>
                    <?php
                    if($user['role']==1)
                    {
                      echo "Kasir";
                    }
                    if($user['role']==2)
                    {
                      echo "Koki";
                    }
                    if($user['role']==3)
                    {
                      echo "Owner";
                    }
                    ?>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col">
                        <a href="<?=base_url('aksesowner/akses_edt/').$user['username']?>" class="btn btn-block btn-warning btn-sm"><i class="nav-icon far fas fa-edit"></i></a>
                      </div>
                      <div class="col">
                        <a href="<?=base_url('aksesowner/akses_del/').$user['username']?>" class="btn btn-block btn-danger btn-sm"><i class="nav-icon far fas fa-trash"></i></a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach ; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->