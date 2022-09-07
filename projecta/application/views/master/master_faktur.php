<section class="content-header">
    <h1>
        Master
        <small>Faktur</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i></a></li>
        <li class="active">Data Faktur</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Faktur BK</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: auto; height: 750px; overflow-x: auto; overflow-y: auto;">
            <table class="table table-bordered table-striped" id="table1" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NO.FAKTUR</th>
                        <th>TGL.FAKTUR</th>
                        <th>NO.PO</th>
                        <th>NO.GR</th>
                        <th>STORE</th>
                        <th>KD.STORE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $value) : ?>
                        <tr>
                            <td style="width:5% ;"><?= $no++ ?>.</td>
                            <td><?= $value->NOFAKTUR ?></td>
                            <td><?= $value->TGLFAKTUR ?></td>
                            <td><?= substr(preg_replace("/[^0-9]/", "", $value->PONO), 0, 5) ?></td>
                            <td><?= $value->PONO ?></td>
                            <td><select name="nama_store" class="form-control">
                                    <?php foreach ($store->result() as $key => $data) : ?>
                                        <option value="<?= $data->id ?>" selected><?= $data->store ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>