
<?php
    use options\Connection;
    use options\Ajax;
    use options\Script;
    use options\User;
    use options\Money;

    $db = new Connection();
    $ajax = new Ajax();
    $user = new User();
    
    Script::setPage($_GET['a']);

    if(!isset($_REQUEST['client_id'])){
        return T_CONTINUE;
    }

    $client_id = $_GET['client_id'];
    $shartnoma_info = $db->query("SELECT * FROM `shartnoma_info` WHERE `client_id`='{$client_id}'");
    $client_credit = $db->query("SELECT * FROM credit_tani WHERE client_id = {$client_id}");
    $client_foiz = $db->query("SELECT * FROM credit_foiz WHERE client_id = {$client_id}");
    $client = $db->query("SELECT * FROM client WHERE id = {$client_id} AND filial_nomi='{$user->filial_kodi}'");
    $tranzaksiya_history = $db->query("SELECT * FROM `kassa` WHERE client_id = {$client_id} ORDER BY id DESC");

    // Bugungi holatga creditni yopilishi uchun.
    $tani_qoldiq = $db->query("SELECT SUM(oylik_tani) as qoldiq, oylik_tani FROM `credit_tani` WHERE client_id = {$client_id} AND status = 0");
    $foiz_qoldiq = $db->query("SELECT (kunlik_foiz*kun) as qoldiq, kunlik_foiz FROM `credit_foiz` WHERE client_id = {$client_id}");
    $muddati_tani_qoldiq = $db->query("SELECT SUM(qarzdorlik) as qoldiq FROM muddati_o_tani WHERE client_id = {$client_id} AND status = 0");
    $muddati_foiz_qoldiq = $db->query("SELECT SUM(qarzdorlik) as qoldiq FROM muddati_o_foiz WHERE client_id = {$client_id} AND status = 0");

    if(isset($_REQUEST['tolov']) && isset($_REQUEST['status'])){

        $summa = $_REQUEST['summa'];
        $izoh = $_REQUEST['izoh'];
        $izoh = 'KREDIT YOPILDI: '.$izoh;
        $turi = $_REQUEST['turi'];

        $db->autocommit(false);
        try{
            $all_query_ok=true;

            $insert_kredit_yopish = $db->query("
                INSERT INTO `kassa` (
                    `id`, 
                    `sana`, 
                    `client_id`, 
                    `summa`, 
                    `tolov_turi`, 
                    `kir_chiq_status`, 
                    `tasdiq_status`, 
                    `filial_kodi`, 
                    `insert_user_id`, 
                    `update_user_id`, 
                    `izox`) 
                VALUES (
                    NULL, 
                    current_timestamp(), 
                    '{$client_id}', 
                    '{$summa}', 
                    '{$turi}', 
                    '0', 
                    '1', 
                    '{$user->filial_kodi}', 
                    '{$user->user_id}', 
                    '0', 
                    '{$izoh}');
                ") ? null : $all_query_ok=false;

                $db->query("
                    UPDATE `credit_tani`
                        SET `status` = '1' 
                        WHERE `credit_tani`.`client_id` = {$client_id};
                ") ? null : $all_query_ok=false;
                
                $db->query("
                    UPDATE `credit_foiz` 
                        SET `kun` = '0' 
                        WHERE `credit_foiz`.`client_id` = {$client_id};
                ") ? null : $all_query_ok=false;

                $db->query("
                    UPDATE `muddati_o_foiz` 
                        SET `status` = '1' 
                        WHERE `muddati_o_foiz`.`client_id` = {$client_id};
                ") ? null : $all_query_ok=false;

                $db->query("
                    UPDATE `muddati_o_tani` 
                        SET `status` = '1' 
                        WHERE `muddati_o_tani`.`client_id` = {$client_id};
                ") ? null : $all_query_ok=false;

                $db->query("
                    UPDATE `client` 
                        SET `status` = '1' 
                        WHERE `client`.`id` = {$client_id};
                ") ? null : $all_query_ok=false;


            if(!$all_query_ok){
                throw new Exception("Kreditni yopishda xatolik ! Qaytda urining");
            }
            
            $db->commit();
            
        }catch(Exception $e){
            ?>
                <script !src="">
                    alert("<?=$e->getMessage()?>");
                </script>
            <?php
        }

        ?><script> window.location.href = "index.php?a=haridor&client_id=<?=$client_id?>";</script><?php

        return 0;
    }

    if(isset($_REQUEST['tolov'])){
        $summa = $_REQUEST['summa'];
        $izoh = $_REQUEST['izoh'];
        $turi = $_REQUEST['turi'];

        $db->autocommit(false);
        try{
            $all_query_ok=true;

            $insert_vviden = $db->query("
                INSERT INTO `kassa` (
                    `id`, 
                    `sana`, 
                    `client_id`, 
                    `summa`, 
                    `tolov_turi`, 
                    `kir_chiq_status`, 
                    `tasdiq_status`, 
                    `filial_kodi`, 
                    `insert_user_id`, 
                    `update_user_id`, 
                    `izox`) 
                VALUES (
                    NULL, 
                    current_timestamp(), 
                    '{$client_id}', 
                    '{$summa}', 
                    '{$turi}', 
                    '0', 
                    '0', 
                    '{$user->filial_kodi}', 
                    '{$user->user_id}', 
                    '0', 
                    '{$izoh}');
                ") ? null : $all_query_ok=false;

            if(!$all_query_ok){
                throw new Exception("Malumotlar qabul qilishda xatolik ! Qaytda urining");
            }
            
            $db->commit();
            
        }catch(Exception $e){
            ?>
                 <script !src="">
                    alert("<?=$e->getMessage()?>");
                </script>
            <?php
        }

        ?><script> window.location.href = "index.php?a=haridor&client_id=<?=$client_id?>";</script><?php
        
        return 0;
    }


    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'] ?? null;
        $status = null;
        $delete = $_REQUEST['delete'] ?? null;

        if($delete){ $status = 2;}

        $db->autocommit(false);
        try{
            $all_query_ok=true;

            $db->query("
              UPDATE `kassa` 
              SET 
                `tasdiq_status` = '{$status}',
                `update_user_id` = '{$user->user_id}',
              WHERE 
                `kassa`.`id` IN({$id})
            ") ? null : $all_query_ok=false;

            if(!$all_query_ok){
                throw new Exception("Malumotni o'chirishda xatolik ! Qaytda urining");
            }
            
            $db->commit();

        }catch(Exception $e){
            ?>
                <script !src="">
                    alert("<?=$e->getMessage()?>");
                </script>
            <?php
        }
        
        ?><script>window.location.href = "index.php?a=haridor&client_id=<?=$client_id?>";</script><?php

        return 0;
    }


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Haridor:  <?=$client[0]['fish']?></h1>
            <h5 class="mt-2 d-none">
                Kredit yopilishi <span class="badge badge-success">bugungi holatga</span><br>
                Tani:  <b style="color:blue"><?=$tani_qoldiq[0]['qoldiq'] ?? 0?></b> so'm <br>
                Foizi:  <b style="color:blue"><?=$foiz_qoldiq[0]['qoldiq'] ?? 0?></b> so'm <br>
                Tanidan o'tkan:  <b style="color:blue"><?=$muddati_tani_qoldiq[0]['qoldiq'] ?? 0?></b> so'm <br>
                Foizidan o'tkan:  <b style="color:blue"><?=$muddati_foiz_qoldiq[0]['qoldiq'] ?? 0?></b> so'm <br>
                Summa: <b style="color:blue"><?=$tani_qoldiq[0]['qoldiq']+$foiz_qoldiq[0]['qoldiq']+$muddati_tani_qoldiq[0]['qoldiq']+$muddati_foiz_qoldiq[0]['qoldiq']?></b> so'm
            </h5>
            <p>
                <?php
                    // echo "<pre>";
                        // print_r($ajax->getAjax());
                        // print_r($user->user_name);
                        // print_r($user->filial_kodi);
                        // print_r($user->user_id);
                        // print_r(Ajax::requestSave());
                        // print_r($name);
                    // echo "</pre>";
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
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-credit-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kredit summasi</span>
                        <span class="info-box-number"><?=Money::convert($shartnoma_info[0]['summa'], 'UZS') ?? 0?></span>
                        <span class="info-box-number">Boshlang'ich to'lov:   <?=Money::convert($shartnoma_info[0]['oldindan_tolov'], 'UZS') ?? 0?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-credit-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tanidan qoldiq</span>
                    <span class="info-box-number"><?=Money::convert($tani_qoldiq[0]['qoldiq'], 'UZS') ?? 0?></span>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-percent"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Foiz summasi</span>
                    <span class="info-box-number"><?=Money::convert($foiz_qoldiq[0]['qoldiq'], 'UZS') ?? 0?></span>
                </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-money-bill-wave"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Prasrochka</span>
                        <span class="info-box-number"><?=Money::convert(($muddati_tani_qoldiq[0]['qoldiq']+$muddati_foiz_qoldiq[0]['qoldiq']), 'UZS') ?? 0?></span>
                    </div>

                    <!-- <span class="info-box-icon bg-danger "><i class="fas fa-money-bill-alt"></i></i></span> -->

                    <div class="info-box-content" style="font-size: 14px;">
                        <span class="info-box-text">Tanidan o'tkan</span>
                        <span class="info-box-text">Foizidan o'tkan</span>
                        <span class="info-box-number"><?php //=Money::convert($muddati_tani_qoldiq[0]['qoldiq'], 'UZS') ?? 0?></span>
                    </div>
                    <div class="info-box-content">
                        <!-- <span class="info-box-text">Foizidan o'tkan</span> -->
                        <span class="info-box-number"><?=Money::convert($muddati_tani_qoldiq[0]['qoldiq'], 'UZS') ?? 0?></span>
                        <span class="info-box-number"><?=Money::convert($muddati_foiz_qoldiq[0]['qoldiq'], 'UZS') ?? 0?></span>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-dollar-sign"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Oylik to'lov</span>
                        
                        <span class="info-box-number"><?=Money::convert(($tani_qoldiq[0]['oylik_tani']+($foiz_qoldiq[0]['kunlik_foiz']*30)), 'UZS')?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-dollar-sign"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Yopilish summasi</span>
                        <?php
                            $sum = $tani_qoldiq[0]['qoldiq']+$foiz_qoldiq[0]['qoldiq']+$muddati_tani_qoldiq[0]['qoldiq']+$muddati_foiz_qoldiq[0]['qoldiq'];
                        ?>
                        <span class="info-box-number"><?=Money::convert($sum, 'UZS')?></span>
                    </div>
                </div>
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
                <div class="card-header p-2 d-flex justify-content-between bd-highlight mb-3">
                    <ul class="nav nav-pills col-10">
                        <li class="nav-item"><a class="nav-link active" href="#grafik" data-toggle="tab">Grafik</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tolovtarixi" data-toggle="tab">To'lovlari</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Kreditlari</a></li>
                    </ul>
                    <button type="button" id="salom" class="btn btn-success btn-sm col-2" data-toggle="modal" data-target="#modal-default">
                        To'lov qilish
                    </button>
                </div><!-- /.card-header -->
                <div class="card-body" style="padding: 0;">
                    <div class="tab-content">
                        <div class="active tab-pane" id="grafik">
                            <table class="table table-sm d-none">
                                <thead>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Sana</th>
                                        <th>Oylik tani</th>
                                        <th>Oylik foiz</th>
                                        <th>Oylik to'lov</th>
                                        <th style="width: 60px;" class="text-center">To'landi</th>
                                        <!-- <th>Holati</th>
                                        <th style="width: 40px">Status</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $tani = 0;
                                        $foiz = 0;
                                        $sum = 0;
                                    ?>
                                    <?php foreach($client_credit as $row):?>
                                    <?php
                                        $tani += $row['oylik_tani'];
                                        $foiz += $client_foiz[0]['kunlik_foiz']*30;
                                        $sum = $row['oylik_tani']+($client_foiz[0]['kunlik_foiz']*30);
                                    ?>
                                    <tr>
                                        <td class="text-center"><?=$row['id']?></td>
                                        <td ><?=$row['tolov_sana']?></td>
                                        <td><?=$row['oylik_tani']?></td>
                                        <td><?=($client_foiz[0]['kunlik_foiz']*30)?></td>
                                        <td><?=($row['oylik_tani']+($client_foiz[0]['kunlik_foiz']*30))?></td>
                                        <td class="text-center">
                                            <?php
                                                if($row['status'] == 1){
                                                    echo '<span class="badge bg-success">OK</span>';
                                                }
                                            ?>
                                        </td>
                                        <!-- <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">50%</span></td> -->
                                    </tr>  
                                    <?php endforeach;?>
                                    <tr>
                                        <td rowspan="0"></td>
                                        <td><b>Umumiy</b></td>
                                        <td><?=$tani?></td>
                                        <td><?=$foiz?></td>
                                        <td><?=$sum?></td>
                                        <td></td>
                                        <!-- <td>
                                            <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">50%</span>
                                        </td> -->
                                    </tr>  
                                </tbody>
                            </table>
                        </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tolovtarixi">
                        <div class="card" style="margin: 0;">
                            <div class="card-header">
                                <h3 class="card-title">To'lovlar tarixi</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body table-responsive pt-0" style="height: 600px;">
                                <table class="table table-bordered table-hover table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sana</th>
                                            <th>Summa</th>
                                            <th>Tolov turi</th>
                                            <th style="width: 15px;">Status</th>
                                            <th style="width: 15px;">Pechat</th>
                                            <th style="width: 15px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tranzaksiya_history as $tranz):?>
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td style="width: 10px;"><?=$tranz['id']?></td>
                                            <td><?=$tranz['sana']?></td>
                                            <td><?=$tranz['summa']?></td>
                                            <td><?=$tranz['tolov_turi']?></td>
                                            <td class="text-center">
                                                <?php if($tranz['tasdiq_status'] == '1'):?>
                                                    <span class="badge badge-success "><span class="fa fa-check"></span></span>
                                                <?php elseif($tranz['tasdiq_status'] == '2'):?>
                                                    <span class="badge badge-danger "><span class="fa fa-times"></span></span>
                                                <?php elseif($tranz['tasdiq_status'] == '0'):?>
                                                    <span class="badge badge-warning "><span class="fa fa-spinner"></span></span>
                                                <?php endif;?>
                                            </td>
                                            <td class="text-center">
                                                <!-- <a href="?a=haridorlar" class="btn btn-info btn-sm"><i class="fas fa-print"></i></a> -->
                                                <form action="plugins\exelphp\excelphp.php" id="kivitansiya">
                                                    <!-- <input type="hidden" name="x_r" value="0"> -->
                                                    <input type="hidden" name="anketa" value="<?=$client[0]['client_kodi']?>">
                                                    <input type="hidden" name="filial_kodi" value="<?=$user->filial_kodi?>">
                                                    <!-- <input type="hidden" name="kassir" value="<?php //$user->user_name?>"> -->
                                                    <input type="hidden" name="tolov_summa" value="<?=$tranz['summa']?>">
                                                    <input type="hidden" name="mijoz_fish" value="<?=$client[0]['fish']?>">
                                                    <input type="hidden" name="tolov_turi" value="<?=$tranz['tolov_turi']?>">
                                                    <button class="btn btn-info btn-sm" id=""><i class="fas fa-print"></i></button>
                                                </form>
                                            </td>   
                                            <td class="text-center">
                                                <?php 
                                                    $date = new DateTime($tranz['sana']);
                                                    $date = $date->format('d-m-Y');
                                                    $today = date('d-m-Y');
                                                ?>
                                                <?php if($tranz['tasdiq_status'] == '1' && $date == $today):?>
                                                    <a href="?a=haridor&client_id=<?=$client_id?>&delete=true&id=<?=$tranz['id']?>"><i class="fas fa-trash-alt"></i></a>
                                                <?php endif;?> 
                                            </td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td colspan="6">
                                                <p>
                                                <?=$tranz['izox']?>
                                                </p>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        Kreditlari
                    </div>
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
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

                        <h3 class="profile-username text-center"><?=$client[0]['fish']?></h3>

                        <p class="text-muted text-center"><?=$client[0]['manzil']?></p>
                        <p class="text-muted text-center"><b><?=$client[0]['sana']?></b> kuni <b><?=$client[0]['filial_nomi']?></b> filialdan tovar sotib olgan</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Telefon</b> <a class="float-right"><?=$client[0]['tel_nomer']?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Mo'ljal</b> <a class="float-right"><?=$client[0]['moljal']?></a>
                            <li class="list-group-item">
                                <b>Client ID</b> <a class="float-right"><?=$client[0]['client_kodi']?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Credit ID</b> <a class="float-right"><?=$client[0]['credit_kodi']?></a>
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
                
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

 
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
                <form action="#" method="GET" id="tolov">
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
                        <button type="submit" class="btn btn-primary" id="tolovButton">To'lov</button>
                    </div>
                </form>
                
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

