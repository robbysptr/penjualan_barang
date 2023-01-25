<script>
  $(document).ready(function() {
    $('.data').DataTable();
  });
</script>
<a href="" data-toggle="modal" data-target="#modal_tambah" class="btn btn-sm btn-primary">Tambah Data</a><br /><br />
<?php if ($this->session->flashdata('success')) { ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <strong>Aksi Berhasil!</strong>
    <br />
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
<?php } ?>
<div class="card card-body shadow-sm p-0">
  <div class="table-responsive p-4">
    <table class="data table">
      <thead>
        <tr>
          <th>ID</th>
          <th class="w-100">Nama Jenis</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jenis as $row) { ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_jenis']; ?></td>
            <td nowrap>
              <a href="" data-toggle="modal" data-target="#modal_edit<?= $row['id']; ?>" class="btn btn-sm btn-info">Edit</a>
              <a href="" data-toggle="modal" data-target="#modal_hapus<?= $row['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
          <div class="modal fade" id="modal_edit<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="<?= base_url('data/edit_jenis/' . $row['id']); ?>" method="post">
                  <div class="modal-body">
                    <b>Nama Jenis</b>
                    <input type="text" class="form-control" placeholder="Nama Jenis" name="nama_jenis" value="<?= $row['nama_jenis']; ?>" required>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal fade" id="modal_hapus<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <b>Apakah Anda yakin ingin menghapus data ini?</b>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <a href="<?= base_url('data/hapus_jenis/' . $row['id']); ?>" class="btn btn-danger">Hapus</a>
                </div>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('data/tambah_jenis'); ?>" method="post">
        <div class="modal-body">
          <b>Nama Jenis</b>
          <input type="text" class="form-control" placeholder="Nama Jenis" name="nama_jenis" required>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>