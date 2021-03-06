<?php
    include("db_kassa.php");

    //$filial_kodi = '100';
    $filial = array();
    $filial_id = $con->query("SELECT * FROM `client` WHERE filial_nomi='{$filial_kodi}'");
    $n = 0;
    while ($row = $filial_id->fetch_array()){
        $filial[$n] = $row['id'];
        $n++;
    }

    /*echo "<pre>";
    print_r($filial);
    echo "</pre>";*/

    $pras = $con->query("select client_id from prasrochka");
    $clients_id = array();
    $i = 0;
    while ($r = $pras->fetch_array()){
        if ($filial[$i] == $r['client_id']){
            $clients_id[$i] = $r['client_id'];
            $i++;
        }
    }

    $clients_info = array();
    for ($k = 0; $k < count($clients_id); $k++){
        $foiz_sum = 0; $tani_sum = 0;
        $info = $con->query("select * from client WHERE id=".$clients_id[$k]);
        while ($row = $info->fetch_array()){
            array_push($clients_info, $row);
        }

        $info1 = $con->query("select * from muddati_o_tani WHERE status=0 and client_id=".$clients_id[$k]);
        while ($row = $info1->fetch_array()){
            $tani_sum += $row['qarzdorlik'];
        }
        array_push($clients_info[$k], $tani_sum);

        $info2 = $con->query("select * from muddati_o_foiz WHERE status=0 and client_id=".$clients_id[$k]);
        while ($row = $info2->fetch_array()){
            $foiz_sum += $row['qarzdorlik'];
        }
        array_push($clients_info[$k], $foiz_sum);

        $info3 = $con->query("select * from prasrochka WHERE client_id=".$clients_id[$k]);
        while ($row = $info3->fetch_array()){
            array_push($clients_info[$k], $row['status']);
        }
    }

    /*echo '<pre>';
    print_r($clients_id);
    echo '</pre>';*/


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Prasrochka</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Prasrochka</li>
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
                            <h3 class="card-title">To'lov muddati o'tgan xaridorlar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                <thead>
                                <tr>
                                    <th>Client ID</th>
                                    <th>Credit ID</th>
                                    <th>FISH</th>
                                    <th>Tani</th>
                                    <th>Foiz</th>
                                    <th>Jami qarz</th>
                                    <th>Telefon</th>
                                    <th>Status</th>
                                    <th style="width: 60px;">Sozlash</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clients_info as $value): if(($value[11]+$value[12])>0){ ?>
                                    <tr>
                                        <th><?= $value['client_kodi']?></th>
                                        <th><?= $value['credit_kodi']?></th>
                                        <th><?= $value['fish']?></th>
                                        <th><?= number_format($value[11], 2, ',', ' ')?></th>
                                        <th><?= number_format($value[12], 2, ',', ' ')?></th>
                                        <th><?= number_format($value[11]+$value[12], 2, ',', ' ')?></th>
                                        <th><?= $value['tel_nomer']?></th>
                                        <th><?= $value[13]?></th>
                                        <th>
                                            <div class="btn-group">
                                                <button type="button" id="fgg" class="btn btn-info" title="Sms send">
                                                    <i class="fas fa-clipboard-list"></i>
                                                </button>
                                                <a href="?a=haridor&client_id=<?=$value['id']?>" class="btn btn-info" title="Profile">
                                                    <i class="fas fa-user-cog"></i>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                    <?php } endforeach; ?>
                                </tbody>
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