<?php
// $start = (empty($this->input->get('start'))) ? date('Y-m-d\TH:i') : $this->input->get('start');
// $end = (empty($this->input->get('end'))) ? date('Y-m-d\TH:i', strtotime('+1 day', strtotime(date('Y-m-d\TH:i')))) : $this->input->get('end');
$start = (empty($this->input->get('start'))) ? date('Y-m-d\T00:00') : $this->input->get('start');
$end = (empty($this->input->get('end'))) ? date('Y-m-d\T23:59', strtotime('tomorrow')) : $this->input->get('end');
$string_start = strtotime($start);
$string_end = strtotime($end);
?>

<script>
  $(document).ready(function() {
    $('.data').DataTable();
  });
</script>

<form class="input-group mb-4">
  <input type="datetime-local" name="start" class="form-control" value="<?= $start; ?>">
  <input type="datetime-local" name="end" class="form-control" value="<?= $end; ?>">
  <div class="input-group-append">
    <input type="submit" class="btn btn-outline-primary" value="Filter">
  </div>
</form>

<?php foreach ($jenis as $row) {
  $jumlah_terjual = $this->db->get_where('transaksi', ['id_jenis' => $row['id'], 'tanggal >=' => $string_start, 'tanggal <=' => $string_end])->num_rows(); ?>
  <div class="card shadow-sm p-0 mb-4">
    <div class="card-header">
      <h5 class="font-weight-bold text-dark mb-0"><?= $row['nama_jenis']; ?></h5>
    </div>
    <div class="card-body">
      <b>Jumlah <?= $row['nama_jenis']; ?> Terjual: <?= $jumlah_terjual; ?></b>
    </div>
  </div>
<?php } ?>