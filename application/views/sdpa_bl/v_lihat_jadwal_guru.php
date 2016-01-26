<div class="x_title">
  <h2>Jadwal Mengajar</h2>
  <div class="clearfix"></div>
</div>

<table id="example" class="table table-striped responsive-utilities jambo_table">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kelas</th>
			<th>Mata Pelajaran</th>
			<th>Ruang</th>
			<th>Hari</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1; 
			foreach ($isi4 as $key2) { 
		?>

		<tr>
			<td><?= $no++; ?></td>
			<td><?= $key2['nm_kelas']; ?></td>
			<td><?= $key2['nm_mapel']; ?></td>
			<td><?= $key2['ruang']; ?></td>
			<td><?= $key2['hari']; ?></td>
		</tr>

		<?php 
			} 
		?>
	</tbody>
</table>