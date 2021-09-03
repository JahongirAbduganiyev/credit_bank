<?php

include('../db_sotuv.php');

if (isset($_POST["client_kodi"])) {
    $res1 = $con1->query("SELECT * FROM `haridor_malumoti` left JOIN shartnoma_savdo ON haridor_malumoti.h_id=shartnoma_savdo.har_id left JOIN shartnoma_jami ON haridor_malumoti.h_id=shartnoma_jami.H_ID where haridor_malumoti.anketa_nomer='{$_POST["client_kodi"]}'");
    //$r    = $res1->fetch_object();
    if ($res1) {
        /*$client_kodi = $r->anketa_nomer;
        $credit_kodi = '01';
        $fish = $r->fish;
        $sh_sana = $r->sanasi;
        $sh_summa = $r->jami_savdo;
        $sh_muddat = $r->muddati;
        $oldindan_tolov = $r->oylik_maoshi;*/
        $credit_kodi = '01';
        $table = "";
        while ($r = mysqli_fetch_object($res1)){
            $table = "
                <tr id=".$r->id.">
                    <th id='client_id'>" . $r->anketa_nomer . "</th>
                    <th>" . $credit_kodi . "</th>
                    <th>" . $r->fish . "</th>
                    <th>" . $r->sanasi . "</th>
                    <th>" . number_format($r->jami_savdo, 2, ',', ' ') . "</th>
                    <th>" . $r->muddati . "</th>
                    <th>" . number_format($r->oylik_maoshi, 2, ',', ' ') . "</th>
                    <th><button type=\"button\" id=\"insert_button\" class=\"btn btn-block bg-gradient-info btn-sm\">Insert</button></th>    
                </tr>";
        }

        echo $table;
    }

}
