<?php
switch($_GET[cmd]){
default:
?>

<html>
<head>
	
</head>
<body>
	<div class="formulir">
		<form method="POST" action="?opt=input_nilai&cmd=cek">
			<fieldset><label>Pelajaran</label> <select name="matpel"><?php
			if($_SESSION[tingkat]=='tk'){
				$kls=mysql_query("SELECT DISTINCT nama_matpel FROM jadwal_tk WHERE nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_matpel]>$x[nama_matpel]</option>";
				}
			}
			if($_SESSION[tingkat]=='mi'){
				$kls=mysql_query("SELECT DISTINCT nama_matpel FROM jadwal_mi WHERE nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_matpel]>$x[nama_matpel]</option>";
				}
			}
			if($_SESSION[tingkat]=='mts'){
				$kls=mysql_query("SELECT DISTINCT nama_matpel FROM jadwal_mts WHERE nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_matpel]>$x[nama_matpel]</option>";
				}
			}
			if($_SESSION[tingkat]=='ma'){
				$kls=mysql_query("SELECT DISTINCT nama_matpel FROM jadwal_ma WHERE nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_matpel]>$x[nama_matpel]</option>";
				}
			}
		?></select><br>
		<label>Kelas</label>	<select name="kelas"><?php
			if($_SESSION[tingkat]=='tk'){
				$kls=mysql_query("SELECT DISTINCT subkelas FROM jadwal_tk WHERE nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[subkelas]>$x[subkelas]</option>";
				}
			}
			if($_SESSION[tingkat]=='mi'){
				$kls=mysql_query("SELECT DISTINCT kelas FROM jadwal_mi WHERE nama_guru='".$_SESSION[nama_user]."'ORDER BY kelas ASC");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[kelas]>$x[kelas]</option>";
				}
			}
			if($_SESSION[tingkat]=='mts'){
				$kls=mysql_query("SELECT DISTINCT kelas FROM jadwal_mts WHERE nama_guru='".$_SESSION[nama_user]."'ORDER BY kelas ASC");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[kelas]>$x[kelas]</option>";
				}
			}
			if($_SESSION[tingkat]=='ma'){
				$kls=mysql_query("SELECT DISTINCT kelas FROM jadwal_ma WHERE nama_guru='".$_SESSION[nama_user]."'ORDER BY kelas ASC");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[kelas]>$x[kelas]</option>";
				}
			}
		?></select><?php
		if($_SESSION[tingkat]=='ma'){
			echo "<label>Subkelas</label>	<select name=subkelas>";
				$kls=mysql_query("SELECT DISTINCT subkelas FROM jadwal_ma WHERE nama_guru='".$_SESSION[nama_user]."'ORDER BY kelas ASC");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[subkelas]>$x[subkelas]</option>";
				}
			echo "</select>";
			}
		?>	<input type="submit" value="Mulai"><br>
		</fieldset></form>
	</div><br>
</body>
</html>

<?php
break;

case "cek":
$mp=$_POST[matpel];
if($_SESSION[tingkat]=='tk'){
	$ft=mysql_query("SELECT kode_matpel FROM matpel_tk WHERE nama_matpel='$mp'");

	$bn=mysql_fetch_array($ft);
	$kls=$_POST[kelas];

	echo "<h3>.:: Nilai Kelas 0 $kls ::.</h3><hr><form method=POST action=./action.php?opt=input_nilai&cmd=input>
	<input type=hidden name=tingkat value=tk><input type=hidden name=matpel value=$bn[kode_matpel]>
	<table><th>no</th><th>nama</th><th>nilai</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM nilai_tk n, siswa_tk s 
					WHERE n.kode_matpel='$bn[kode_matpel]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
/*================================================ mi =======================================*/
if($_SESSION[tingkat]=='mi'){
	$ft=mysql_query("SELECT kode_matpel FROM matpel_mi WHERE nama_matpel='$mp'");

	$bn=mysql_fetch_array($ft);
	$kls=$_POST[kelas];

	echo "<h3>.:: Nilai Kelas $kls ::.</h3><hr><form method=POST action=./action.php?opt=input_nilai&cmd=input>
	<input type=hidden name=tingkat value=mi><input type=hidden name=matpel value=$bn[kode_matpel]>
	<table><th>no</th><th>nama</th><th>nilai</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM nilai_mi n, siswa_mi s 
					WHERE kode_matpel='$bn[kode_matpel]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
/*================================================ mts =======================================*/
if($_SESSION[tingkat]=='mts'){
	$ft=mysql_query("SELECT kode_matpel FROM matpel_mts WHERE nama_matpel='$mp'");

	$bn=mysql_fetch_array($ft);
	$kls=$_POST[kelas];

	echo "<h3>.:: Nilai Kelas $kls ::.</h3><hr><form method=POST action=./action.php?opt=input_nilai&cmd=input>
	<input type=hidden name=tingkat value=mts><input type=hidden name=matpel value=$bn[kode_matpel]>
	<table><th>no</th><th>nama</th><th>nilai</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM nilai_mts n, siswa_mts s 
					WHERE kode_matpel='$bn[kode_matpel]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
/*================================================ ma =======================================*/
if($_SESSION[tingkat]=='ma'){
	$ft=mysql_query("SELECT kode_matpel FROM matpel_ma WHERE nama_matpel='$mp'");

	$bn=mysql_fetch_array($ft);
	$kls=$_POST[kelas];
	$sub=$_POST[subkelas];

	echo "<h3>.:: Nilai Kelas $kls $sub::.</h3><hr><form method=POST action=./action.php?opt=input_nilai&cmd=input>
	<input type=hidden name=tingkat value=ma><input type=hidden name=matpel value=$bn[kode_matpel]>
	<table><th>no</th><th>nama</th><th>nilai</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM nilai_ma n, siswa_ma s 
					WHERE kode_matpel='$bn[kode_matpel]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
break;
}
?>