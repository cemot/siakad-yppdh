<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script></head>
	<body>
		<div class="demo">

		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Profil Siswa</a></li>
				<li><a href="#tabs-2">Nilai Raport</a></li>
				<li><a href="#tabs-3">Indeks Prestasi</a></li>
			</ul>
			<div id="tabs-1">
				<?php
				$ps=mysql_query("SELECT * FROM siswa_".$_SESSION[leveluser]." WHERE id_siswa='".$_SESSION[nama_user]."'");
				$ff=mysql_fetch_array($ps);
				echo "<div class=formulir><fieldset><legend>.: Biodata Siswa :.</legend>
				<div><img class=profpic src=foto_siswa/$ff[gambar] hspace=10 align=left><br><br>
				<label>Angkatan</label>				<input type=text readonly=value size=10 value='$ff[angkatan]'><br>";
				if($_SESSION[leveluser]=='mi'){
					echo "<label>NISN</label>					<input type=text readonly=value value='$ff[nisn]'><br>
							<label>No. Ijazah</label>			<input type=text readonly=value size=40 value='$ff[no_ijazah]'><br>
							<label>Sekolah Asal</label>			<input type=text readonly=value size=40 value='$ff[asal_sekolah]'><br>";
				}elseif($_SESSION[leveluser]=='mts'){
					echo "<label>NISN</label>					<input type=text readonly=value value='$ff[nisn]'><br>
							<label>No. Ijazah</label>			<input type=text readonly=value size=40 value='$ff[no_ijazah]'><br>
							<label>Sekolah Asal</label>			<input type=text readonly=value size=40 value='$ff[asal_sekolah]'><br>";
				}
				elseif($_SESSION[leveluser]=='ma'){
					echo "<label>NISN</label>					<input type=text readonly=value value='$ff[nisn]'><br>
							<label>No. Ijazah</label>			<input type=text readonly=value size=40 value='$ff[no_ijazah]'><br>
							<label>Sekolah Asal</label>			<input type=text readonly=value size=40 value='$ff[asal_sekolah]'><br>";
				}
				
				echo "<label>NIS</label>			<input type=text readonly=value value='$ff[id_siswa]'><br>
				<label>Nama Lengkap</label>			<input type=text readonly=value size=50 value='$ff[nama_siswa]'><br>
				<label>Alamat</label>				<input type=text readonly=value size=50 value='$ff[alamat]'><br>
				<label>Rute Rumah</label>			<textarea  rows=5 cols=40 readonly=value value='$ff[denah]'></textarea><br>";
				if($_SESSION[leveluser]=='ma'){
					echo "<label>No. Telp</label>				<input type=text readonly=value size=15 value='$ff[telp]'><br>";
				}
				
				echo "<label>Tempat, Tgl Lahir</label>	<input readonly=value type=text value='$ff[tmp_lahir]'><input size=10 readonly=value type=text value='$ff[tgl_lahir]'><br>
				<label>Jenis Kelamin</label>		<input type=text readonly=value value='$ff[jns_kelamin]'><br>
				<label>Anak Ke-</label>				<input type=text readonly=value value='$ff[anak_ke]'><br>
				<label>Status keluarga</label>		<input type=text readonly=value value='$ff[status_anak]'><br>
				</fieldset>
				<fieldset><legend>.: Biodata Orang Tua :.</legend>
				<label>Nama Ayah</label>	<input type=text readonly=value size=40 value='$ff[nama_ayah]'><br>
				<label>Pekerjaan</label>	<input type=text readonly=value size=40 value='$ff[kerja_ayah]'><br>
				<label>Alamat</label>		<input type=text readonly=value size=40 value='$ff[almt_ayah]'><br>
				<label>Telp.</label>		<input type=text readonly=value size=15 value='$ff[telp_ayah]'><br>
				<label>Nama Ibu</label>		<input type=text readonly=value size=40 value='$ff[nama_ibu]'><br>
				<label>Pekerjaan</label>	<input type=text readonly=value size=40 value='$ff[kerja_ibu]'><br>
				<label>Alamat</label>		<input type=text readonly=value size=40 value='$ff[almt_ibu]'><br>
				<label>Telp.</label>		<input type=text readonly=value size=15 value='$ff[telp_ibu]'><br>
				</fieldset>
				<fieldset><legend>.: Biodata Wali :.</legend>
				<label>Nama Wali</label>	<input type=text readonly=value size=40 value='$ff[nama_wali]'><br>
				<label>Pekerjaan</label>	<input type=text readonly=value size=40 value='$ff[kerja_wali]'><br>
				<label>Alamat</label>		<input type=text readonly=value size=40 value='$ff[almt_wali]'><br>
				<label>Telp.</label>		<input type=text readonly=value size=15 value='$ff[telp_wali]'><br>
				</fieldset></div>";
				
				?>
			</div>
			<div id="tabs-2">
				<?php
					if($_SESSION[leveluser]=='tk'){
						$rt=mysql_query("SELECT subkelas FROM absensi_tk WHERE id_siswa=".$_SESSION[nama_user]."");
					}
					elseif($_SESSION[leveluser]=='ma'){
						$rt=mysql_query("SELECT kelas,jurusan FROM absensi_ma WHERE id_siswa=".$_SESSION[nama_user]."");
					}
					else{
						$rt=mysql_query("SELECT kelas FROM absensi_".$_SESSION[leveluser]." WHERE id_siswa=".$_SESSION[nama_user]."");
					}
					
					$gj=mysql_fetch_array($rt);
					echo "<div class=formulir>
						<fieldset>
							<label>Kelas</label>";	 
							if($_SESSION[leveluser]=='tk'){
								echo "<input type=text readonly=value size=20 value='$gj[subkelas]'>";
							}
							elseif($_SESSION[leveluser]=='ma'){
								echo "<input type=text readonly=value size=20 value='$gj[kelas]'><input type=text readonly=value size=10 value='$gj[jurusan]'>";
							}
							else{
								echo "<input type=text readonly=value size=20 value='$gj[kelas]'>";
							}echo "<br>
							<label>Semester</label>";
							$tm=mysql_query("SELECT m.smt, n.tahun FROM nilai_".$_SESSION[leveluser]." n, matpel_".$_SESSION[leveluser]." m 
											WHERE id_siswa='".$_SESSION[nama_user]."' AND n.kode_matpel=m.kode_matpel ORDER BY tahun DESC, smt DESC");
							$ft=mysql_fetch_array($tm);
							echo "<input type=text readonly=value size=20 value='$ft[smt]'><br>
							<label>Tahun Ajaran</label>	<input type=text readonly=value size=40 value='$ft[tahun]'><br>
						</fieldset>
						<fieldset><legend>Mata Pelajaran</legend>
							<table><th>No.</th><th>Mata Pelajaran</th><th>KKM</th><th>Nilai</th>";
							$non=1;
							$rt=mysql_query("SELECT n.nilai, m.nama_matpel, m.kkm FROM nilai_".$_SESSION[leveluser]." n, matpel_".$_SESSION[leveluser]." m 
								WHERE id_siswa='".$_SESSION[nama_user]."' AND n.kode_matpel=m.kode_matpel AND smt='$ft[smt]' AND tahun='$ft[tahun]' AND kategori='umum'");
							while($k=mysql_fetch_array($rt)){
								echo "<tr><td>$non</td><td>$k[nama_matpel]</td><td>$k[kkm]</td><td>$k[nilai]</td></tr>";
								$non++;
							}
							echo "</table>
						</fieldset>
						<fieldset><legend>Muatan Lokal</legend>
							<table><th>No.</th><th>Mata Pelajaran</th><th>KKM</th><th>Nilai</th>";
							$nod=1;
							$rk=mysql_query("SELECT n.nilai, m.nama_matpel, m.kkm FROM nilai_".$_SESSION[leveluser]." n, matpel_".$_SESSION[leveluser]." m 
								WHERE id_siswa='".$_SESSION[nama_user]."' AND n.kode_matpel=m.kode_matpel AND smt='$ft[smt]' AND tahun='$ft[tahun]' AND kategori='mulok'");
							while($kk=mysql_fetch_array($rk)){
								echo "<tr><td>$nod</td><td>$kk[nama_matpel]</td><td>$kk[kkm]</td><td>$kk[nilai]</td></tr>";
								$nod++;
							}
							echo "</table>
						</fieldset>
						<fieldset><legend>Ekstra Kurikuler</legend>
							<table><th>No.</th><th>Kegiatan</th><th>Nilai</th>";
							$nop=1;
							$rp=mysql_query("SELECT n.nilai, m.nama_ekstra FROM ekstra_".$_SESSION[leveluser]." n, ekstra m 
								WHERE id_siswa='".$_SESSION[nama_user]."' AND n.nama_ekstra=m.nama_ekstra ");
							while($kp=mysql_fetch_array($rp)){
								echo "<tr><td>$nop</td><td>$kp[nama_ekstra]</td><td>$kp[nilai]</td></tr>";
								$nop++;
							}
							echo "</table>
						</fieldset>
					</div>";
				?>
			</div>
			<div id="tabs-3">
				<?php
					echo "<table><th>No.</th><th>Tahun Ajaran</th><th>semester</th><th>Mata Pelajaran</th><th>Nilai</th>";
					$no=1;
				$rt=mysql_query("SELECT n.nilai, m.nama_matpel, m.smt, n.tahun FROM nilai_".$_SESSION[leveluser]." n, matpel_".$_SESSION[leveluser]." m 
								WHERE id_siswa='".$_SESSION[nama_user]."' AND n.kode_matpel=m.kode_matpel ORDER BY tahun ASC");
				while($k=mysql_fetch_array($rt)){
					echo "<tr><td>$no</td><td>$k[tahun]</td><td>$k[smt]</td><td>$k[nama_matpel]</td><td>$k[nilai]</td></tr>";
					$no++;
				}
				echo "</table>";
				?>
			</div>
		</div>

		</div>
	</body>
</html>