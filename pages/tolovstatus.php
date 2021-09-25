<?php
    use options\Connection;
    use options\Script;
    use options\Ajax;
    use options\User;

    Script::setPage($_GET['a']);

    $db = new Connection();
    $ajax = new Ajax();
    $user = new User();
    
    
    if(isset($_REQUEST['add']) || isset($_REQUEST['delete'])){
        $ids = implode(',', $_REQUEST['ids']) ?? null;
        $status = null;
        $add = $_REQUEST['add'] ?? null;
        $delete = $_REQUEST['delete'] ?? null;
        if($add){ $status = 1;}
        if($delete){ $status = 2;}

        $db->autocommit(false);
        try{
            $all_query_ok=true;

            $db->query("
              UPDATE `kassa` 
              SET 
                `tasdiq_status` = '{$status}' 
              WHERE 
                `kassa`.`id` IN({$ids})
            ") ? null : $all_query_ok=false;

            foreach($_REQUEST['ids'] as $kassaid){
                $qoldiq = $db->query("
                    SELECT qoldiq FROM `depozit` 
                    WHERE 
                      client_id IN(SELECT client_id FROM `kassa` WHERE id IN({$kassaid})) 
                    ORDER BY id DESC 
                    LIMIT 1
                ");
                $qoldiq = $qoldiq[0]['qoldiq'] ?? 0;

                $db->query("
                  INSERT INTO depozit (
                    client_id, 
                    kassa_id, 
                    sana, 
                    kirim, 
                    chiqim, 
                    qoldiq, 
                    izox) 
                  SELECT 
                    kassa.client_id, 
                    kassa.id, 
                    kassa.sana, 
                    kassa.summa, 
                    0, 
                    kassa.summa+{$qoldiq}, 
                    'client tolov' 
                    FROM 
                    kassa 
                    WHERE kassa.id IN({$kassaid})
                ") ? null : $all_query_ok=false;
            }

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
        
        ?><script>window.location.href = "index.php?a=tolovstatus";</script><?php
    }

    // $viden = $db->query("SELECT * FROM `kassa` WHERE tasdiq_status=0 AND filial_kodi=100");
    $viden = $db->query("SELECT `kassa`.*, `client`.fish as fish FROM `kassa` LEFT JOIN `client` on `kassa`.client_id = `client`.id WHERE `kassa`.tasdiq_status=0 AND `kassa`.filial_kodi='{$user->filial_kodi}'");

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>To'lovlar</h1>
            <?php
                // echo "<pre>";
                    // print_r($ajax->getAjax());
                    // echo $ids;
                    // print_r(Ajax::requestSave());
                // echo "</pre>";
            ?> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">To'lovlar</li>
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
              <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <h3 class="card-title col-10">Bugungi qabul qilingan to'lovlar</h3>
                    <form action="#" class="col-2" action="GET" id="tolovstatusform">
                      <div class="btn-group container">
                              <input type="hidden" name="a" value="tolovstatus">
                              <button type="submit" id="checkbutton" name="add" disabled value="true" class="btn btn-success"><i class="fas fa-check"></i></button>
                              <button type="submit" id="deletebutton" name="delete" disabled value="true" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                      </div>
                    </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:10px;">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkall" type="checkbox" id="allcheck">
                                    <label for="allcheck" class="custom-control-label"> </label>
                                </div>
                            </th>
                            <th style="width:10px;" class="sorting sorting_desc" aria-sort="descending">ID</th>
                            <th>Sana</th>
                            <th>Xaridor</th>
                            <th>Summasi</th>
                            <th>Izox</th>
                            <th>Turi</th>
                            <th style="width: 5px">status</th>
                            <th style="width: 25px;">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($viden as $tolov):?>
                        <?php
                              $span = '';
                              switch($tolov['tasdiq_status']){
                                  case 0:  
                                    $span = '<span class="badge badge-warning "><span class="fa fa-spinner"></span></span>';
                                    break;
                              }
                        ?>
                        <tr for="check_<?=$tolov['id']?>">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkrow" type="checkbox"  id="check_<?=$tolov['id']?>">
                                    <label for="check_<?=$tolov['id']?>" class="custom-control-label"> </label>
                                </div>
                            </td>
                            <td><?=$tolov['id']?></td>
                            <td style="width: 100px;"><?=$tolov['sana']?></td>
                            <td><?=$tolov['fish']?></td>
                            <td style="width: 100px;"><?=$tolov['summa']?></td>
                            <td><?=$tolov['izox']?></td>
                            <td><?=$tolov['tolov_turi']?></td>
                            <td class="text-center"><?=$span?></td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="?a=tolovstatus&add=true&ids[]=<?=$tolov['id']?>" class="btn btn-info btn-sm add_<?=$tolov['id']?> add" title="Kreditni yopish">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="?a=tolovstatus&delete=true&ids[]=<?=$tolov['id']?>" class="btn btn-danger btn-sm delete_<?=$tolov['id']?> delete" title="Kreditni yopish" >
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkall" type="checkbox" id="customCheckbox2" id="">
                                    <label for="customCheckbox2" class="custom-control-label"> </label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Sana</th>
                            <th>Xaridor</th>
                            <th>Summasi</th>
                            <th>Izox</th>
                            <th>Turi</th>
                            <th>status</th>
                            <th>Option</th>
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