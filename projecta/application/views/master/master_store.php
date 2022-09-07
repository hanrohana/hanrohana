<section class="content-header">
    <h1>
        Master
        <small>Store</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i></a></li>
        <li class="active">Store</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Store</h3>
            <div class="pull-right">
                <a href="<?= site_url('master/master_add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Create</i>
                </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: auto; height: 750px; overflow-x: auto; overflow-y: auto;">
            <table class="table table-bordered table-striped" id="table1" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Store</th>
                        <th>Nama Store</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $value) : ?>
                        <tr>
                            <td style="width:5% ;"><?= $no++ ?>.</td>
                            <td><?= $value->kode ?></td>
                            <td><?= $value->store ?></td>
                            <td><?= $value->active == 1 ? "Aktif" : "Non-Aktif"  ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('config/store/edit/' . $value->id) ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Update
                                </a>
                                <a href="<?= site_url('config/store/del/' . $value->id) ?>" onclick="return confirm('Apakah Anda yakin akan menghapus store ini?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>