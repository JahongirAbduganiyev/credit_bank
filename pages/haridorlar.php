<?php
    use options\Connection;
    use options\Script;
    use options\User;
    $user = new User();

    Script::setPage($_GET['a']);

    $db = new Connection();

    $clients = $db->query("SELECT * FROM `client` WHERE filial_nomi='{$user->filial_kodi}'");
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
                            <th>Klient kodi</th>
                            <th>Pasport</th>
                            <th>Telefon</th>
                            <th>Kredit kodi</th>
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
                            <td><?=$client['client_kodi']?></td>
                            <td><?=$client['credit_kodi']?></td>
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
                            <th>Klient kodi</th>
                            <th>Pasport</th>
                            <th>Telefon</th>
                            <th>Kredit kodi</th>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grafik jadvali</h3>
                <button type="button" class="close btn btn-sm btn-default" id="print"><i class="fas fa-print"></i> Print</button>
              </div>

              <section class="content">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
                          <div class="invoice p-3 mb-3">
                              <div class="row invoice-info">
                                  <div class="col-sm-6 invoice-col">
                                  From
                                  <address>
                                      <strong>Admin, Inc.</strong><br>
                                      795 Folsom Ave, Suite 600<br>
                                      San Francisco, CA 94107<br>
                                      Phone: (804) 123-5432<br>
                                      Email: info@almasaeedstudio.com
                                  </address>
                                  </div>
                                  
                                  <div class="col-sm-6 invoice-col">
                                  <b>Invoice #007612</b><br>
                                  <br>
                                  <b>Order ID:</b> 4F3S8J<br>
                                  <b>Payment Due:</b> 2/22/2014<br>
                                  <b>Account:</b> 968-34567
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
              </section>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Sana</th>
                      <th>Oylik tani</th>
                      <th>Oylik foiz</th>
                      <th>Oylik to'lovi</th>
                    </tr>
                  </thead>
                  <tbody id="credit_grafik"> 
                      <!-- GRAFIK YOZILADI -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">Yopish</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->