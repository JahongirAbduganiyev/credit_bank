
<?php
    
    use options\Connection;
    $db = new Connection();

    $client_id = $_GET['client_id'];
    $client = $db->query("SELECT * FROM credit_tani WHERE client_id = {$client_id}");

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Haridor:  Ahrorbek Davronov</h1>
            <p>
                <?php
                    // echo "<pre>";
                    //     print_r($new->query("SELECT * FROM `client`"));
                    //     print_r($config);
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
                            <th>Oylik tani</th>
                            <th>To'landi</th>
                            <th>Holati</th>
                            <th style="width: 40px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($client as $row):?>
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

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                <form>
                    <input type="hidden" name="a" value="haridor">
                    <input type="hidden" name="client_id" value="<?=$_REQUEST['client_id']?>">
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

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tolov" value="naqd" checked>
                                        <label class="form-check-label">Naqd</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tolov" value="plastik">
                                        <label class="form-check-label">Plastik</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status">
                                        <label class="form-check-label">Kredit yopish</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer justify-content-end">
                        <button type="submit" class="btn btn-primary">To'lash</button>
                    </div> -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->