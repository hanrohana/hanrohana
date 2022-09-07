<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Create</i>
                </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $value) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $value->telepon ?></td>
                            <td><?= $value->level == 1 ? "Admin" : "User" ?></td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('user/del') ?>" method="POST">
                                    <a href="<?= site_url('user/edit/' . $value->id) ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"> Update</i>
                                    </a>
                                    <input type="hidden" name="user_id" value="<?= $value->id ?>">
                                    <button onclick="return confrim('Apakah anda yakin akan hapus ID ini')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>