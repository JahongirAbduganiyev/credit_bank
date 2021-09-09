<?php
    use options\Connection;

    $db = new Connection();
    $viden = $db->query("SELECT * FROM `qora_tolov_tarix`");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>To'lovlar</h1>
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
                    <form action="#" class="col-2" action="GET">
                      <div class="btn-group container">
                              <input type="hidden" name="a" value="tolovstatus">
                              <button type="submit" id="checkbutton" class="btn btn-success"><i class="fas fa-check"></i></button>
                              <button type="submit" id="deletebutton" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
                            <th style="width:10px;">ID</th>
                            <th>Sana</th>
                            <th>Summasi</th>
                            <th>Izox</th>
                            <th>Turi</th>
                            <th style="width: 25px;">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($viden as $tolov):?>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkrow" type="checkbox" id="check_<?=$tolov['id']?>">
                                    <label for="check_<?=$tolov['id']?>" class="custom-control-label"> </label>
                                </div>
                            </td>
                            <td><?=$tolov['id']?></td>
                            <td><?=$tolov['sana']?></td>
                            <td><?=$tolov['tolov_summa']?></td>
                            <td><?=$tolov['izox']?></td>
                            <td><?=$tolov['tolov_turi']?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info btn-sm add_<?=$tolov['id']?> add" title="Kreditni yopish" >
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm delete_<?=$tolov['id']?> delete" title="Kreditni yopish" >
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
                            <th>Summasi</th>
                            <th>Izox</th>
                            <th>Turi</th>
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