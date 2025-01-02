<div class="container mt-4">
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>Judul Film</th>
							<th>Cinema</th>
							<th>Jadwal Tayang</th>
							<th>No. Kursi</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($order as $data) : ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data->judul; ?></td>
								<td><?= $data->namaCinema; ?></td>
								<td><?= date('d M Y', strtotime($data->tanggal)) . ' - ' . date('H:i', strtotime($data->jamTayang)) . ' WIB'; ?></td>
								<td><?= $data->no_kursi; ?></td>
								<td><?= $data->jumlah; ?></td>
								<td><?= 'Rp. 40.000'; ?></td>
								<td><?= 'Rp. ' . number_format($data->harga, 0, ',', '.'); ?></td>
								<td>
									<div class="btn-group">
										<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit" data-id="<?= $data->id; ?>" data-jumlah="<?= $data->jumlah; ?>" data-no_kursi="<?= $data->no_kursi; ?>" title="Edit Data"><i class="fas fa-edit"></i></a>
										<a href="<?= base_url('order/delete/' . $data->id); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin data akan dihapus?')" title="Hapus Data"><i class="fas fa-trash"></i></a>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-edit" method="POST" action="<?= base_url('order/update'); ?>">
				<div class="modal-body">
					<input type="hidden" name="id" id="id">

					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input type="number" name="jumlah" id="jumlah" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="no-kursi">No. Kursi</label>
						<input type="text" name="no_kursi" id="no-kursi" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$('#modal-edit').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var jumlah = button.data('jumlah');
		var no_kursi = button.data('no_kursi');

		var modal = $(this);
		modal.find('#id').val(id);
		modal.find('#jumlah').val(jumlah);
		modal.find('#no-kursi').val(no_kursi);
	});
</script>