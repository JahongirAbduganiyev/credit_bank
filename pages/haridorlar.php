<?php
    use options\Connection;
    use options\Script;

    Script::setPage($_GET['a']);

    $db = new Connection();
    $clients = $db->query("SELECT * FROM `client` WHERE filial_nomi='buvayda'");
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
                                    <button type="button" class="btn btn-info" name="client" value="<?=$client['id']?>" title="Grafik ko'rish" data-toggle="modal" data-target="#modal-grafik">
                                        <i class="fas fa-clipboard-list"></i>
                                    </button>
                                    <a href="?a=haridor&client_id=<?=$client['id']?>" class="btn btn-info" title="Kreditni yopish">
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


<!-- MODALLAR OYNASI -->
<div class="modal fade" id="modal-grafik">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->