<?php if ($this->session->flashdata('success')) { ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <strong>Aksi Berhasil!</strong>
    <br />
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
<?php } ?>
<?php if ($this->session->flashdata('danger')) { ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Aksi Berhasil!</strong>
    <br />
    <?= $this->session->flashdata('danger'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
<?php } ?>
<div class="card card-body shadow-sm">
  <form action="<?= base_url('beli_barang/beli_barang'); ?>" method="post">
    <b>Pilih Barang</b>
    <select class="form-control" name="id_barang" required>
      <?php foreach ($barang as $o) {
        // $o_jenis = $this->db->get_where('jenis', ['id' => $o['id_jenis']])->row_array();
        // echo '<option value="' . $o['id'] . '">' . $o_jenis['nama_jenis'] . ' - ' . ' - ' . $o['nama_barang'] . ' (stok: ' . $o['stok'] . ')</option>';
        // echo '<option value="' . $o['id'] . '">' . $o['nama_barang'] . ' - Rp' . rupiah($o['harga_satuan']) . ',00 (stok: ' . $o['stok'] . ')</option>';
        echo '<option value="' . $o['id'] . '">Rp' . rupiah($o['harga_satuan']) . ',00 - ' . $o['nama_barang'] . ' (stok: ' . $o['stok'] . ')</option>';
      } ?>
    </select>
    <br />
    <b>Kuantitas</b> (masukkan angka saja, contoh: 10)
    <input type="number" class="form-control" placeholder="Kuantitas" name="kuantitas" required>
    <br />
    <button type="submit" class="btn btn-primary">Beli</button>
  </form>
</div>