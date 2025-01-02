<style>
	.justify-text {
		text-align: justify;
	}
</style>

<div class="container mt-4">
	<h1 class="text-center mb-4"><?php echo $film->judul; ?></h1>

	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo $film->gambar; ?>" alt="<?php echo $film->judul; ?>" class="img-fluid rounded shadow">
				</div>

				<div class="col-md-8">
					<h2>Informasi Film</h2>
					<ul class="list-group">
						<li class="list-group-item"><strong>Judul:</strong> <?php echo $film->judul; ?></li>
						<li class="list-group-item"><strong>Genre:</strong> <?php echo $film->genre; ?></li>
						<li class="list-group-item"><strong>Durasi:</strong> <?php echo $film->durasi; ?> menit</li>
						<li class="list-group-item"><strong>Sinopsis:</strong>
							<p class="justify-text"><?php echo nl2br(htmlspecialchars($film->sinopsis)); ?></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-lg-8">
			<h2>Jadwal Tayang</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nama Cinema</th>
						<th>Tanggal</th>
						<th>Jam Tayang</th>
						<th>Kursi Tersedia</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $film->namaCinema; ?></td>
						<td><?php echo date('d M F', strtotime($film->tanggal)); ?></td>
						<td><?php echo date('H:i', strtotime($film->jamTayang)) . ' WIB'; ?></td>
						<td><?php echo ($film->jumlahKursi - $film->kursiTerjual); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h4>Order Tiket</h4>
				</div>
				<div class="card-body">
					<form action="<?= base_url('jadwal/order'); ?>" method="POST" onsubmit="return validateOrder()">
						<div class="mb-3">
							<label for="jumlahKursi" class="form-label"><strong>Jumlah Kursi</strong></label>
							<input type="number" id="jumlah" name="jumlah" class="form-control" min="1" max="<?php echo ($film->jumlahKursi - $film->kursiTerjual); ?>" required>
						</div>
						<div class="mb-3">
							<label for="nomorKursi" class="form-label"><strong>Nomor Kursi</strong></label>
							<input type="text" id="no_kursi" name="no_kursi" class="form-control" placeholder="contoh: A1, A2, A3" required>
						</div>
						<input type="hidden" name="idJadwal" value="<?php echo $film->id; ?>">
						<input type="hidden" name="stok" id="stok" value="<?php echo ($film->jumlahKursi - $film->kursiTerjual); ?>">
						<div class="d-grid">
							<button type="submit" class="btn btn-primary btn-block">Pesan Tiket</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function validateOrder() {
		const jumlah = parseInt(document.getElementById('jumlah').value, 10);
		const stok = parseInt(document.getElementById('stok').value, 10);

		if (jumlah > stok) {
			alert('Jumlah kursi yang dipesan melebihi stok yang tersedia!');

			return false;
		} else if (jumlah < 1) {
			alert('Isikan jumlah dengan benar');

			return false;
		}

		return true;
	}
</script>