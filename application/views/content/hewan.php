<script src="DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true
        });
    });
</script>
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3 btn-block">
        <a href="<?= base_url(); ?>Hewan/tambah" class="btn btn-info btn-fw"><i class="mdi mdi-library-plus"></i> Tambah Data Hewan</a>
    </div>
</div>
<div class="row">
    <?php if ($this->session->flashdata('tambah')) : ?>
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data berhasil <strong><?= $this->session->flashdata('tambah'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('hapus')) : ?>
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Data berhasil <strong><?= $this->session->flashdata('hapus'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('edit')) : ?>
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data berhasil <strong><?= $this->session->flashdata('edit'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pemilik</th>
                                <th>Nama Hewan</th>
                                <th>Jenis Hewan</th>
                                <th>Ras Hewan</th>
                                <th>Umur Hewan</th>
                                <th>Jenis Kelamin</th>
                                <th>Warna Bulu</th>
                                <th>Berat Badan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($hewan as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['nama_pemilik']; ?></td>
                                    <td><?= $value['nama_hewan']; ?></td>
                                    <td><?= $value['jenis_hewan']; ?></td>
                                    <td><?= $value['ras_hewan']; ?></td>
                                    <td><?= $value['umur']; ?></td>
                                    <td><?= $value['kelamin']; ?></td>
                                    <td><?= $value['warna_bulu']; ?></td>
                                    <td><?= $value['berat_badan']; ?></td>
                                    <td><a href="<?= base_url(); ?>Hewan/ubah/<?= $value['id_status']; ?>" class="btn btn-gradient-info btn-rounded btn-sm">Edit </a><a href="<?= base_url(); ?>Hewan/hapus/<?= $value['id_status']; ?>" class="btn btn-gradient-danger btn-rounded btn-sm" onclick="return confirm('yakin akan menghapus data?')"> Hapus</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DIV -->
            </div>
        </div>
    </div>
</div>