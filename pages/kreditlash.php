<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Yangi client yaratish</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" id="client_kodi" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" id="search_client" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                    <tr class="text-center">
                        <th>Client ID</th>
                        <th>Credit ID</th>
                        <th>FISH</th>
                        <th>Sana</th>
                        <th>Summa</th>
                        <th>Muddat</th>
                        <th>Oldindan to'lov</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="text-center" id="client_table">

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-body">
                <p id="modal_text"></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">NO</button>
                <button type="button" id="insert_ok" class="btn btn-outline-light">YES</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>