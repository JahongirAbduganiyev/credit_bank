
<?php

    use options\Connection;
    use options\Ajax;
    // use options\Script;

    $db = new Connection();
    $ajax = new Ajax();
    // $s = new Script();

    if(!isset($_REQUEST['client_id'])){
        return T_CONTINUE;
    }

    $client_id = $_GET['client_id'];
    $client_credit = $db->query("SELECT * FROM credit_tani WHERE client_id = {$client_id}");
    $client = $db->query("SELECT * FROM client WHERE id = {$client_id}");

    if(isset($_REQUEST['tolov'])){
        $summa = $_REQUEST['summa'];
        $izoh = $_REQUEST['izoh'];
        $turi = $_REQUEST['turi'];

        // $db->autocommit(false);
        // try{
        //     $insert_depozit = $db->query("
        //         INSERT INTO `depozit` (
        //             `id`, 
        //             `client_id`, 
        //             `sana`, 
        //             `kirim`, 
        //             `chiqim`, 
        //             `qoldiq`, 
        //             `izox`, 
        //             `filial_nomi`) 
        //         VALUES (
        //             NULL, 
        //             '{$client_id}', 
        //             current_timestamp(), 
        //             '{$summa}',
        //             '0', 
        //             '{$summa}', 
        //             'client to\'lov\r\n', 
        //             'buvayda');
        //     ");

        //     $insert_tolov_tarix = $db->query("
        //     INSERT INTO `tolov_tarix` (
        //         `id`, 
        //         `sana`, 
        //         `client_id`, 
        //         `summa`, 
        //         `tolov_turi`, 
        //         `izox`) 
        //     VALUES (
        //         NULL, 
        //         current_timestamp(), 
        //         '{$client_id}', 
        //         '{$summa}', 
        //         '{$turi}', 
        //         '{$izoh}');
        //     ");
        // }catch(){

        // }


    }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Haridor:  <?=$client['fish']?></h1>
            <p>
                <?php
                    echo "<pre>";
                        // print_r($new->query("SELECT * FROM `client`"));
                        print_r($ajax->getAjax());
                        // print_r($s::show());
                    echo "</pre>";
                ?> 
            </p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
              <li class="breadcrumb-item active">Haridor</li>
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
          <div class="col-md-8 ">
            
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <h3 class="card-title col-10">
                        Grafik
                    </h3>
                    <button type="button" class="btn btn-success btn-sm col-2" data-toggle="modal" data-target="#modal-default">
                        To'lov qilish
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Sana</th>
                            <th>Oylik to'lov</th>
                            <th>To'landi</th>
                            <th>Holati</th>
                            <th style="width: 40px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($client_credit as $row):?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['tolov_sana']?></td>
                            <td><?=$row['oylik_tani']?></td>
                            <td><?=$row['sondirilgan_tani']?></td>
                            <td>
                                <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: <?=($row['sondirilgan_tani']*100/$row['oylik_tani'])?>%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger"><?=($row['sondirilgan_tani']*100/$row['oylik_tani'])?>%</span></td>
                        </tr>  
                        <?php endforeach;?>
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-4 justify-content-center">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="../../dist/img/user4-128x128.jpg"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?=$client['fish']?></h3>

                        <p class="text-muted text-center"><?=$client['manzil']?></p>
                        <p class="text-muted text-center"><b><?=$client['sana']?></b> kuni <b><?=$client['filial_nomi']?></b> filialdan tovar sotib olgan</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Telefon</b> <a class="float-right"><?=$client['tel_nomer']?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Mo'ljal</b> <a class="float-right"><?=$client['moljal']?></a>
                            <li class="list-group-item">
                                <b>Client ID</b> <a class="float-right"><?=$client['client_kodi']?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Credit ID</b> <a class="float-right"><?=$client['credit_kodi']?></a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>SMS</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">To'lovlar tarixi</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td>Approved</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="5">
                                        <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- MODALLAR OYNASI -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">To'lov qilish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="GET">
                    <input type="hidden" name="a" value="haridor">
                    <input type="hidden" name="client_id" value="<?=$_REQUEST['client_id']?>">
                    <input type="hidden" name="tolov" value="true">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Summa</label>
                                    <input type="text" name="summa" class="form-control" placeholder="Kiriting ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Izoh</label>
                                    <textarea class="form-control" name="izoh" rows="2" placeholder="Kiriting ..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <select class="form-control" name="turi">
                                        <option value="naqd">Naqd</option>
                                        <option value="plastik">Plastik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" id="status" type="checkbox" name="status">
                                        <label class="form-check-label" for="status">Kredit yopish</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">To'lov</button>
                    </div>
                </form>
                
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

