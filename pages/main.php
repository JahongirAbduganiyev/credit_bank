<?php
    include("db_kassa.php");
    $sql = $con->query("SELECT * FROM `client` where filial_nomi='{$filial_kodi}'");
    $res = $sql->num_rows;

    $sql1 = $con->query("SELECT * FROM `client` where status=1 and filial_nomi='{$filial_kodi}'");
    $res1 = $sql1->num_rows;

    $sql2 = $con->query("SELECT sum(summa) as jami, sum(oldindan_tolov) as o_jami FROM `shartnoma_info` where filial_nomi='{$filial_kodi}'");
    $res2 = $sql2->fetch_array();
    $k_jami = $res2['jami'] - $res2['o_jami'];

    $jami_sum = 0; $jami_tolov = 0;
    foreach ($sql as $value){
        $sql4 = $con->query("SELECT * FROM muddati_o_tani where status = 0 and client_id='{$value["id"]}'");
        $res4 = $sql4->fetch_array();
        $jami_sum += intval($res4['qarzdorlik']);

        $sql5 = $con->query("SELECT * FROM depozit where client_id='{$value["id"]}'");
        $res5 = $sql5->fetch_array();
        $jami_tolov += intval($res5['kirim']);
    }


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4><?=$res?> <sub style="font-size: 20px">(<?=$res1?>)</sub></h4>

                            <p>Mijozlar Soni</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4><?=number_format($k_jami, 0, ',', ' ')?></h4>

                            <p>Jami Kredit Summa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4><?=number_format($jami_tolov, 0, ',', ' ')?></h4>

                            <p>Qaytarilgan To'lovlar</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-undo-alt"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4><?=number_format($jami_sum, 0, ',', ' ')?></h4>

                            <p>Muddati o'tgan To'lovlar</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-stopwatch"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>