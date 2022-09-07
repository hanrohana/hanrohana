<section class="content-header">
    <h1>
        Master
        <small>Store</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-bitbucket"></i></a></li>
        <li class="active">Store</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= ucfirst($page) ?> Store</h3>
            <div class="pull-right">
                <a href="<?= site_url('master/master_store') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i>
                </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('config/store/process') ?>" method="POST">
                        <div class="form-group">
                            <label>Kode *</label>
                            <input type="hidden" name="storeid" value="<?= $row->id ?>">
                            <input type="text" name="kodestore" value="<?= $row->kode ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Store *</label>
                            <input type="text" name="namastore" value="<?= $row->store ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status *</label>
                            <select name="active" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1" <?= $row->active == '1' ? 'selected' : '' ?>>Aktif</option>
                                <option value="0" <?= $row->active == '0' ? 'selected' : '' ?>>Non-Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>