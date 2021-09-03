<?php
    use options\Connection;

    $db = new Connection();
    $clients = $db->query("SELECT * FROM `client`");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Haridorlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
              <li class="breadcrumb-item active">Haridorlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Haridorlarning ma'lumotlari</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px;">ID</th>
                            <th>Haridor</th>
                            <th>Pasport</th>
                            <th>Telefon</th>
                            <th style="width: 100px;">Sozlash</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($clients as $client):?>
                        <tr>
                            <td><?=$client['id']?></td>
                            <td><?=$client['fish']?></td>
                            <td><?=$client['p_nomer']?></td>
                            <td><?=$client['tel_nomer']?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info" title="Grafik ko'rish">
                                        <i class="fas fa-clipboard-list"></i>
                                    </button>
                                    <a href="?a=haridor&client_id={$client['id']}" class="btn btn-info" title="Kreditni yopish">
                                        <i class="fas fa-user-cog"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>ID</th>
                            <th>Haridor</th>
                            <th>Pasport</th>
                            <th>Telefon</th>
                            <th>Sozlash</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>