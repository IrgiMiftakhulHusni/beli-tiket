<style>
	.card-img-top {
		width: 100%;
		height: 300px;
		object-fit: cover;
	}
</style>

<div class="container mt-4">
	<div class="row">
		<?php foreach ($jadwal as $dt) : ?>
			<div class="col-md-4 mb-4">
				<div class="card">
					<a href="<?= base_url('jadwal/detail/' . $dt->id); ?>">
						<img src="<?= $dt->gambar; ?>" class="card-img-top" alt="<?= $dt->judul; ?>">
					</a>
					<div class="card-body">
						<h5 class="card-title"><?= $dt->judul; ?></h5>
						<table class="table table-bordered">
							<tbody>
								<tr>
									<th>Durasi</th>
									<td><?= $dt->durasi; ?> menit</td>
								</tr>
								<tr>
									<th>Tanggal</th>
									<td><?= date('d M Y', strtotime($dt->tanggal)); ?></td>
								</tr>
								<tr>
									<th>Jam Tayang</th>
									<td><?= date('H:i', strtotime($dt->jamTayang)) . ' WIB'; ?></td>
								</tr>
							</tbody>
						</table>
						<a href="<?= base_url('jadwal/detail/' . $dt->id); ?>" class="btn btn-primary">Pesan Tiket</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>