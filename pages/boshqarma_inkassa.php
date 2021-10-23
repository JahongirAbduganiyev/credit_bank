<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Boshqarmaga Inkassa </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh Sahifa</a></li>
                        <li class="breadcrumb-item active">Boshqarmaga Prixod</li>
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
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Boshqarmaga Inkassa</h3>
                        </div>
                        <div class="card-body"> 
                           <table id="example1" class="table table-bordered table-striped text-center" style="font-size: 14px;">
                                    <thead>
                                    <tr class="text-center">
                                        <th>№</th>                                        
                                        <th>Kodi</th>
                                        <th>Sana</th>
                                        <th>ID</th>    
                                        <th>Summa</th>    
                                        <th>Filiali</th>                                                                                                           
                                        <th >Status</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" >                                    
                                    <?php   $row1 = BoshqarmaSelect($filial_kodi);?>
                                    <?php $a=1; ?>
                                    <?php foreach($row1 as $r1):?>
                                            <tr style="text-align:center;" id="qat<?=$r1['id']?>">
                                                    <td ><?=$a?></td>                                                      
                                                    <td ><span class='badge badge-secondary bdgid'><?=$r1['id']?></span></td>
                                                    <td ><?=$r1['sana']?></td>
                                                    <td ><?=$r1['client_id']?></td>
                                                    <td ><?=number_format($r1['summa'],0,'.',' ')?></td>
                                                    <td ><?=$r1['filial_kodi']?></td>  
                                                    <td ><?php if($r1['tasdiq_status']==0){ echo "<span class='badge badge-warning '><span class='fa fa-spinner'></span></span>"; }elseif($r1['tasdiq_status']==2){ echo "<span class='badge badge-danger '><span class='fa fa-times'></span></span>"; }else{echo "<span class='badge badge-success '><span class='fa fa-check'></span></span>";} ?></td>                                  

                                            </tr>  
                                        <?php $a++; ?>
                                    <?php endforeach;?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Bugungi Kassa</h3>
                        </div>
                        <div class="card-body">
                            <table id="example7" class="table table-bordered table-striped text-center dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th>№</th>
                                            <th>Kodi</th>
                                            <th>Sana</th>
                                            <th>User_ID</th>
                                            <th>Summa</th>
                                            <th>Filiali</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" >                                    
                                    <?php   $row1 = KassaSelect($filial_kodi);?>
                                    <?php $a=1; ?>
                                    <?php foreach($row1 as $r1):?>
                                        <tr style="text-align:center;" id="qat<?=$r1['id']?>">
                                                <td ><?=$a?></td>                                                      
                                                <td ><span class='badge badge-warning'><?=$r1['id']?></span></td>
                                                <td ><?=$r1['sana']?></td>
                                                <td ><?=$r1['client_id']?></td>
                                                <td ><?=number_format($r1['summa'],0,'.',' ')?></td>
                                                <td ><?=$r1['filial_kodi']?></td>                                                                            
                                                <td ><?php if($r1['tasdiq_status']==0){ echo "<span class='badge badge-warning '><span class='fa fa-spinner'></span></span>"; }elseif($r1['tasdiq_status']==2){ echo "<span class='badge badge-danger '><span class='fa fa-times'></span></span>"; }else{echo "<span class='badge badge-success '><span class='fa fa-check'></span></span>";} ?></td>                                    
                                        </tr>  
                                        <?php $a++; ?>
                                    <?php endforeach;?>
                                    </tbody>
                            </table>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Boshqarmaga Inkassa</h3>
                    </div>
                    <!-- /.card-header -->                    
                    <!-- form start -->
                    <form method="POST" id="bform">
                        <div class="card-body">
                        <div class="form-group">
                                <label >Bugungi Yo'ldagi Summa</label>
                                <input  readonly type="text" name="kutish_summa" id="kutish_summa" class="number-separator form-control border border-warning" value=" <?= number_format(KutishSumma($filial_kodi),0,'.',' '); ?>">
                            </div>
                          
                            <div class="form-group">
                                <label >Kassa Qoldiq</label>
                                <input required readonly type="text" name="jami_summa" id="jami_summa" class="number-separator form-control border border-success" value="<?= number_format(JamiSumma($filial_kodi),0,'.',' '); ?>">
                              
                            </div>                            
                            <div class="form-check mb-lg-2">
                                <input type="checkbox" class="form-check-input" id="toliq_kirim">
                                <label class="form-check-label" for="toliq_kirim">To'liq Kirim Qilish</label>
                            </div>
                            <div class="form-group">
                                <label>Boshqarmaga Kirim Qilish</label>
                                <input  required type="text" class="form-control number-separator" name="kirim_summa" id="bkirim_summa" >
                                <input type="hidden" name="insert_user_id" value="<?=$user_id;?>">
                            </div>
                            <div class="form-group">
                                <label>Izox</label>
                                <textarea required type="text" class="form-control" name="izox" id="izox"></textarea>
                            </div>             
                         </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" name="tasdiq" class="btn btn-primary" id="btntas" value="Tasdiqlash">
                            <input type="reset" class="btn btn-danger" value="Bekor Qilish">
                        </div>
                    </form>                  
                    </div>
                    <?php InkassaInsert($filial_kodi); ?>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->            
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>