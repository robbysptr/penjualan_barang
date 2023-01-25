<script>
  $(document).ready(function() {
    $('.data').DataTable();
  });
</script>
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
          <th class="w-100">Nama Barang</th>
          <?php if ($admin) { ?>
            <th>Pelanggan</th>
          <?php } ?>
          <th>Kuantitas</th>
          <th nowrap>Total Harga</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($transaksi as $row) {
          $row_barang = $this->db->get_where('barang', ['id' => $row['id_barang']])->row_array();
          if ($admin) {
            $row_user = $this->db->get_where('user', ['id' => $row['id_user']])->row_array();
          } ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row_barang['nama_barang']; ?></td>
            <?php if ($admin) { ?>
              <td><?= $row_user['nama']; ?></td>
            <?php } ?>
            <td><?= rupiah($row['kuantitas']); ?></td>
            <td>Rp<b><?= rupiah($row['total_harga']); ?></b>,00</td>
            <td nowrap><?= date('Y-m-d H.i.s', $row['tanggal']); ?></td>
            <td>
              <a href="" data-toggle="modal" data-target="#modal_hapus<?= $row['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
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
                  <a href="<?= base_url('transaksi/hapus_transaksi/' . $row['id']); ?>" class="btn btn-danger">Hapus</a>
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