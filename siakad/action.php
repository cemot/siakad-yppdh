<?php
session_start();
include "config/koneksi.php";

$modul=$_GET[opt];
$aksi=$_GET[cmd];

if($modul=='siswa' AND $aksi=='del'){
$yh=$_GET[lv];
mysql_query("DELETE FROM siswa_".$yh." WHERE id_siswa='$_GET[id]'");
header('location:media.php?opt='.$modul.'&cmd='.$yh.'');
}

else if($modul=='guru' AND $aksi=='del'){
$gg=$_GET[lv];
mysql_query("DELETE FROM guru_".$gg." WHERE nip='$_GET[id]'");
header('location:media.php?opt='.$modul.'&cmd='.$gg.'');
}
else if($modul=='matpel' AND $aksi=='del'){
$gg=$_GET[lv];
mysql_query("DELETE FROM matpel_".$gg." WHERE kode_matpel='$_GET[id]'");
header('location:media.php?opt='.$modul.'&cmd='.$gg.'');
}
else if($modul=='jadwal' AND $aksi=='del'){
$gg=$_GET[lv];
mysql_query("DELETE FROM jadwal_".$gg." WHERE id_jadwal='$_GET[id]'");
header('location:media.php?opt='.$modul.'&cmd='.$gg.'');
}
else if($modul=='kelas' AND $aksi=='del'){
mysql_query("DELETE FROM kelas WHERE id_kelas='$_GET[id]'");
header('location:media.php?opt='.$modul);
}
else if($modul=='karyawan' AND $aksi=='del'){
mysql_query("DELETE FROM karyawan WHERE id_karyawan='$_GET[id]'");
header('location:media.php?opt='.$modul);
}
else if($modul=='absensi' AND $aksi=='del'){
$gg=$_GET[lv];
mysql_query("DELETE FROM absensi_".$gg." WHERE id_absensi='$_GET[id]'");
header('location:media.php?opt='.$modul.'&cmd='.$gg.'');
}
else if($modul=='user' AND $aksi=='del'){
$gg=$_GET[lv];
mysql_query("DELETE FROM siakad_".$gg." WHERE id_user='$_GET[id]'");
header('location:media.php?opt='.$modul.'&cmd='.$gg.'');
}
else if($modul=='ekstra' AND $aksi=='del'){
mysql_query("DELETE FROM ekstra WHERE id_ekstra='$_GET[id]'");
header('location:media.php?opt='.$modul);
}
else if($modul=='anggota' AND $aksi=='del'){
$gg=$_GET[lv];
mysql_query("DELETE FROM ekstra_".$gg." WHERE id_siswa='$_GET[id]'");
header('location:media.php?opt=ekstra&cmd='.$gg.'');
}
/*=============================================== input siswa =========================================*/
elseif($modul=='siswa' AND $aksi=='input'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];
$tgk=$_POST[tingkat];

if($tgk=='tk'){
if(empty($lokasi_file)){
mysql_query("INSERT INTO siswa_tk (angkatan, id_siswa, nama_siswa, alamat,denah, tmp_lahir, tgl_lahir,
									jns_kelamin, anak_ke,status_anak, nama_ayah,kerja_ayah,almt_ayah,telp_ayah,
									nama_ibu,kerja_ibu,almt_ibu,telp_ibu, nama_wali,kerja_wali,almt_wali,telp_wali,password)
						VALUES ('$_POST[angkatan]', '$_POST[nis]','$_POST[nama]','$_POST[alamat]','$_POST[denah]', '$_POST[tmp_lahir]', '$_POST[tgl_lahir]',
						'$_POST[jk]','$_POST[anak]','$_POST[sk]', '$_POST[nama_ayah]','$_POST[kerja_ayah]','$_POST[alamat_ayah]','$_POST[telp_ayah]',
						'$_POST[nama_ibu]','$_POST[kerja_ibu]','$_POST[alamat_ibu]','$_POST[telp_ibu]', '$_POST[nama_wali]','$_POST[kerja_wali]',
						'$_POST[alamat_wali]','$_POST[telp_wali]','$_POST[password]')");
}
else{
move_uploaded_file($lokasi_file,"foto_siswa/$nama_file");
mysql_query("INSERT INTO siswa_tk (angkatan, id_siswa, nama_siswa, alamat,denah, tmp_lahir, tgl_lahir,
									jns_kelamin, anak_ke,status_anak, nama_ayah,kerja_ayah,almt_ayah,telp_ayah,
									nama_ibu,kerja_ibu,almt_ibu,telp_ibu, nama_wali,kerja_wali,almt_wali,telp_wali,gambar,password)
						VALUES ('$_POST[angkatan]', '$_POST[nis]','$_POST[nama]','$_POST[alamat]','$_POST[denah]', '$_POST[tmp_lahir]', '$_POST[tgl_lahir]',
						'$_POST[jk]','$_POST[anak]','$_POST[sk]', '$_POST[nama_ayah]','$_POST[kerja_ayah]','$_POST[alamat_ayah]','$_POST[telp_ayah]',
						'$_POST[nama_ibu]','$_POST[kerja_ibu]','$_POST[alamat_ibu]','$_POST[telp_ibu]', '$_POST[nama_wali]','$_POST[kerja_wali]',
						'$_POST[alamat_wali]','$_POST[telp_wali]', '$nama_file','$_POST[password]')");
}
}
else if($tgk=='ma'){
if(empty($lokasi_file)){
mysql_query("INSERT INTO siswa_ma (angkatan, id_siswa, nisn, nama_siswa, alamat, asal_sekolah, denah,telp, tmp_lahir, tgl_lahir,
									jns_kelamin, anak_ke,status_anak,no_ijazah, nama_ayah,kerja_ayah,almt_ayah,telp_ayah,
									nama_ibu,kerja_ibu,almt_ibu,telp_ibu, nama_wali,kerja_wali,almt_wali,telp_wali,password)
						VALUES ('$_POST[angkatan]', '$_POST[nis]', '$_POST[nisn]','$_POST[nama]','$_POST[alamat]', '$_POST[asal_sekolah]','$_POST[denah]','$_POST[telp]', '$_POST[tmp_lahir]', '$_POST[tgl_lahir]',
						'$_POST[jk]','$_POST[anak]','$_POST[sk]', '$_POST[ijazah]', '$_POST[nama_ayah]','$_POST[kerja_ayah]','$_POST[alamat_ayah]','$_POST[telp_ayah]',
						'$_POST[nama_ibu]','$_POST[kerja_ibu]','$_POST[alamat_ibu]','$_POST[telp_ibu]', '$_POST[nama_wali]','$_POST[kerja_wali]',
						'$_POST[alamat_wali]','$_POST[telp_wali]','$_POST[password]')");
}
else{
move_uploaded_file($lokasi_file,"foto_siswa/$nama_file");
mysql_query("INSERT INTO siswa_ma (angkatan, id_siswa, nisn, nama_siswa, alamat, asal_sekolah, denah,telp, tmp_lahir, tgl_lahir,
									jns_kelamin, anak_ke,status_anak,no_ijazah, nama_ayah,kerja_ayah,almt_ayah,telp_ayah,
									nama_ibu,kerja_ibu,almt_ibu,telp_ibu, nama_wali,kerja_wali,almt_wali,telp_wali,gambar,password)
						VALUES ('$_POST[angkatan]', '$_POST[nis]', '$_POST[nisn]','$_POST[nama]','$_POST[alamat]', '$_POST[asal_sekolah]','$_POST[denah]','$_POST[telp]', '$_POST[tmp_lahir]', '$_POST[tgl_lahir]',
						'$_POST[jk]','$_POST[anak]','$_POST[sk]', '$_POST[ijazah]', '$_POST[nama_ayah]','$_POST[kerja_ayah]','$_POST[alamat_ayah]','$_POST[telp_ayah]',
						'$_POST[nama_ibu]','$_POST[kerja_ibu]','$_POST[alamat_ibu]','$_POST[telp_ibu]', '$_POST[nama_wali]','$_POST[kerja_wali]',
						'$_POST[alamat_wali]','$_POST[telp_wali]', '$nama_file','$_POST[password]')");
}
}
else{
if(empty($lokasi_file)){
mysql_query("INSERT INTO siswa_".$tgk." (angkatan, id_siswa, nisn, nama_siswa, alamat, asal_sekolah, denah, tmp_lahir, tgl_lahir,
									jns_kelamin, anak_ke, status_anak, no_ijazah, nama_ayah,kerja_ayah,almt_ayah,telp_ayah,
									nama_ibu,kerja_ibu,almt_ibu,telp_ibu, nama_wali,kerja_wali,almt_wali,telp_wali,password)
						VALUES ('$_POST[angkatan]', '$_POST[nis]', '$_POST[nisn]','$_POST[nama]','$_POST[alamat]', '$_POST[asal_sekolah]','$_POST[denah]', '$_POST[tmp_lahir]', '$_POST[tgl_lahir]',
						'$_POST[jk]','$_POST[anak]','$_POST[sk]', '$_POST[ijazah]', '$_POST[nama_ayah]','$_POST[kerja_ayah]','$_POST[alamat_ayah]','$_POST[telp_ayah]',
						'$_POST[nama_ibu]','$_POST[kerja_ibu]','$_POST[alamat_ibu]','$_POST[telp_ibu]', '$_POST[nama_wali]','$_POST[kerja_wali]',
						'$_POST[alamat_wali]','$_POST[telp_wali]','$_POST[password]')");
}
else{
move_uploaded_file($lokasi_file,"foto_siswa/$nama_file");
mysql_query("INSERT INTO siswa_".$tgk." (angkatan, id_siswa, nisn, nama_siswa, alamat, asal_sekolah, denah, tmp_lahir, tgl_lahir,
									jns_kelamin, anak_ke, status_anak, no_ijazah, nama_ayah,kerja_ayah,almt_ayah,telp_ayah,
									nama_ibu,kerja_ibu,almt_ibu,telp_ibu, nama_wali,kerja_wali,almt_wali,telp_wali,gambar,password)
						VALUES ('$_POST[angkatan]', '$_POST[nis]', '$_POST[nisn]','$_POST[nama]','$_POST[alamat]', '$_POST[asal_sekolah]','$_POST[denah]', '$_POST[tmp_lahir]', '$_POST[tgl_lahir]',
						'$_POST[jk]','$_POST[anak]','$_POST[sk]', '$_POST[ijazah]', '$_POST[nama_ayah]','$_POST[kerja_ayah]','$_POST[alamat_ayah]','$_POST[telp_ayah]',
						'$_POST[nama_ibu]','$_POST[kerja_ibu]','$_POST[alamat_ibu]','$_POST[telp_ibu]', '$_POST[nama_wali]','$_POST[kerja_wali]',
						'$_POST[alamat_wali]','$_POST[telp_wali]', '$nama_file','$_POST[password]')");
}
}
header('location:media.php?opt='.$modul);
}
/*================================================ update siswa ========================================*/
elseif($modul=='siswa' AND $aksi=='update'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];
$sdf=$_POST[tingkat];

if($sdf=='tk'){
if(empty($lokasi_file)){
mysql_query("UPDATE siswa_tk SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',
							alamat='$_POST[alamat]',denah='$_POST[denah]', tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
else{
move_uploaded_file($lokasi_file,"foto_siswa/$nama_file");
mysql_query("UPDATE siswa_tk SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',
							alamat='$_POST[alamat]',denah='$_POST[denah]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', gambar='$nama_file', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
}
if($sdf=='mi'){
if(empty($lokasi_file)){
mysql_query("UPDATE siswa_mi SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',nisn='$_POST[nisn]',
							alamat='$_POST[alamat]',asal_sekolah='$_POST[asal_sekolah]',denah='$_POST[denah]', tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]',no_ijazah='$_POST[ijazah]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
else{
move_uploaded_file($lokasi_file,"foto_siswa/$nama_file");
mysql_query("UPDATE siswa_mi SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',nisn='$_POST[nisn]',
							alamat='$_POST[alamat]',asal_sekolah='$_POST[asal_sekolah]',denah='$_POST[denah]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]',no_ijazah='$_POST[ijazah]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', gambar='$nama_file', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
}
if($sdf=='mts'){
if(empty($lokasi_file)){
mysql_query("UPDATE siswa_mts SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',nisn='$_POST[nisn]',
							alamat='$_POST[alamat]',asal_sekolah='$_POST[asal_sekolah]',denah='$_POST[denah]', tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]',no_ijazah='$_POST[ijazah]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
else{
move_uploaded_file($lokasi_file,"foto_siswa/$nama_file");
mysql_query("UPDATE siswa_mts SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',nisn='$_POST[nisn]',
							alamat='$_POST[alamat]',asal_sekolah='$_POST[asal_sekolah]',denah='$_POST[denah]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]',no_ijazah='$_POST[ijazah]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', gambar='$nama_file', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
}
if($sdf=='ma'){
if(empty($lokasi_file)){
mysql_query("UPDATE siswa_ma SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',nisn='$_POST[nisn]',
							alamat='$_POST[alamat]',asal_sekolah='$_POST[asal_sekolah]',denah='$_POST[denah]',telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]',no_ijazah='$_POST[ijazah]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
else{
move_uploaded_file($lokasi_file,"foto_siswa/$nama_file");
mysql_query("UPDATE siswa_ma SET angkatan='$_POST[angkatan]', nama_siswa='$_POST[nama]',nisn='$_POST[nisn]',
							alamat='$_POST[alamat]',asal_sekolah='$_POST[asal_sekolah]',denah='$_POST[denah]',telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]',
							jns_kelamin='$_POST[jk]',anak_ke='$_POST[anak]',status_anak='$_POST[sk]',no_ijazah='$_POST[ijazah]', nama_ayah='$_POST[nama_ayah]',
							kerja_ayah='$_POST[kerja_ayah]',almt_ayah='$_POST[alamat_ayah]',telp_ayah='$_POST[telp_ayah]', nama_ibu='$_POST[nama_ibu]',
							kerja_ibu='$_POST[kerja_ibu]',almt_ibu='$_POST[alamat_ibu]',telp_ibu='$_POST[telp_ibu]', nama_wali='$_POST[nama_wali]',
							kerja_wali='$_POST[kerja_wali]',almt_wali='$_POST[alamat_wali]',telp_wali='$_POST[telp_wali]', gambar='$nama_file', password='$_POST[password]'
							WHERE id_siswa='$_POST[id]'");
}
}
header('location:media.php?opt='.$modul.'&cmd='.$sdf.'');
}

/*========================================== input guru ===============================================*/
elseif($modul=='guru' AND $aksi=='input'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];
$fgh=$_POST[tingkat];

if(empty($lokasi_file)){
mysql_query("INSERT INTO guru_".$fgh." (status,nip,nama_guru,alamat,telp,tmp_lahir,tgl_lahir,jns_kelamin)
						VALUES ('$_POST[status]','$_POST[nip]', '$_POST[nama]','$_POST[alamat]','$_POST[telp]',
						'$_POST[tmp_lahir]', '$_POST[tgl_lahir]','$_POST[jk]')");
}
else{
move_uploaded_file($lokasi_file,"foto_guru/$nama_file");
mysql_query("INSERT INTO guru_".$fgh." (status,nip,nama_guru,alamat,telp,tmp_lahir,tgl_lahir,jns_kelamin, gambar)
						VALUES ('$_POST[status]','$_POST[nip]', '$_POST[nama]','$_POST[alamat]','$_POST[telp]',
						'$_POST[tmp_lahir]', '$_POST[tgl_lahir]','$_POST[jk]', '$nama_file')");
}
header('location:media.php?opt='.$modul);
}
/*============================================== update guru ===========================================*/
elseif($modul=='guru' AND $aksi=='update'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];
$uio=$_POST[tingkat];
if($uio=='tk'){
	if(empty($lokasi_file)){
	mysql_query("UPDATE guru_tk SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]'
							WHERE nip='$_POST[id]'");
	}
	else{
	move_uploaded_file($lokasi_file,"foto_guru/$nama_file");
	mysql_query("UPDATE guru_tk SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]', gambar='$nama_file'
							WHERE nip='$_POST[id]'");
	}
}
else if($uio=='mi'){
	if(empty($lokasi_file)){
	mysql_query("UPDATE guru_mi SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]'
							WHERE nip='$_POST[id]'");
	}
	else{
	move_uploaded_file($lokasi_file,"foto_guru/$nama_file");
	mysql_query("UPDATE guru_mi SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]', gambar='$nama_file'
							WHERE nip='$_POST[id]'");
	}
}
else if($uio=='mts'){
	if(empty($lokasi_file)){
	mysql_query("UPDATE guru_mts SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]'
							WHERE nip='$_POST[id]'");
	}
	else{
	move_uploaded_file($lokasi_file,"foto_guru/$nama_file");
	mysql_query("UPDATE guru_mts SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]', gambar='$nama_file'
							WHERE nip='$_POST[id]'");
	}
}
else if($uio=='ma'){
	if(empty($lokasi_file)){
	mysql_query("UPDATE guru_ma SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]'
							WHERE nip='$_POST[id]'");
	}
	else{
	move_uploaded_file($lokasi_file,"foto_guru/$nama_file");
	mysql_query("UPDATE guru_ma SET status='$_POST[status]', nip='$_POST[nip]', nama_guru='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]', gambar='$nama_file'
							WHERE nip='$_POST[id]'");
	}
}
header('location:media.php?opt='.$modul.'&cmd='.$uio.'');
}
/*=============================================== input karyawan =============================================*/
else if($modul=='karyawan' AND $aksi=='input'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];
if(empty($lokasi_file)){
mysql_query("INSERT INTO karyawan (jabatan,nama,alamat,telp,tmp_lahir,tgl_lahir,jns_kelamin)
						VALUES ('$_POST[jabatan]', '$_POST[nama]','$_POST[alamat]','$_POST[telp]',
						'$_POST[tmp_lahir]', '$_POST[tgl_lahir]','$_POST[jk]')");
}
else{
move_uploaded_file($lokasi_file,"foto_kry/$nama_file");
mysql_query("INSERT INTO karyawan (jabatan,nama,alamat,telp,tmp_lahir,tgl_lahir,jns_kelamin, gambar)
						VALUES ('$_POST[jabatan]', '$_POST[nama]','$_POST[alamat]','$_POST[telp]',
						'$_POST[tmp_lahir]', '$_POST[tgl_lahir]','$_POST[jk]', '$nama_file')");
}
header('location:media.php?opt='.$modul);
}
/*========================================= update karyawan =================================================*/
elseif($modul=='karyawan' AND $aksi=='update'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];
if(empty($lokasi_file)){
mysql_query("UPDATE karyawan SET jabatan='$_POST[jabatan]', nama='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]'
							WHERE id_karyawan='$_POST[id]'");
}
else{
move_uploaded_file($lokasi_file,"foto_kry/$nama_file");
mysql_query("UPDATE karyawan SET jabatan='$_POST[jabatan]', nama='$_POST[nama]',alamat='$_POST[alamat]',jns_kelamin='$_POST[jk]', 
							telp='$_POST[telp]',tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]', gambar='$nama_file'
							WHERE id_karyawan='$_POST[id]'");
}header('location:media.php?opt='.$modul);
}
/*============================================= input matpel ===================================================*/
elseif($modul=='matpel' AND $aksi=='input'){
$jkl=$_POST[tingkat];
if($jkl=='ma'){
mysql_query("INSERT INTO matpel_ma (smt, kelas, jurusan,kategori,kode_matpel,nama_matpel,kkm)
						VALUES ('$_POST[smt]', '$_POST[kelas]', 
						'$_POST[jurusan]', '$_POST[kategori]', '$_POST[kode_matpel]', '$_POST[nama_matpel]', '$_POST[kkm]')");	
	}
if($jkl=='mts'){
mysql_query("INSERT INTO matpel_mts (smt,kelas,kategori,kode_matpel,nama_matpel,kkm)
						VALUES ('$_POST[smt]', '$_POST[kelas]', '$_POST[kategori]', '$_POST[kode_matpel]', '$_POST[nama_matpel]', '$_POST[kkm]')");	
	}
if($jkl=='mi'){
mysql_query("INSERT INTO matpel_mi (smt,kelas,kategori,kode_matpel,nama_matpel,kkm)
						VALUES ('$_POST[smt]', '$_POST[kelas]', '$_POST[kategori]', '$_POST[kode_matpel]', '$_POST[nama_matpel]', '$_POST[kkm]')");	
	}
if($jkl=='tk'){
mysql_query("INSERT INTO matpel_tk (smt, tgk,kategori,kode_matpel,nama_matpel,kkm)
						VALUES ('$_POST[smt]', '$_POST[subkelas]', '$_POST[kategori]', '$_POST[kode_matpel]', '$_POST[nama_matpel]', '$_POST[kkm]')");	
	}
header('location:media.php?opt='.$modul.'&cmd='.$jkl.'');
}
/*============================================== update matpel ================================================*/
elseif($modul=='matpel' AND $aksi=='update'){
$ds=$_POST[tingkat];
if($ds=='tk'){
mysql_query("UPDATE matpel_tk SET kode_matpel='$_POST[kode_matpel]', nama_matpel='$_POST[nama_matpel]', kategori='$_POST[kategori]',
 				smt='$_POST[smt]', tgk='$_POST[subkelas]', kkm='$_POST[kkm]' WHERE kode_matpel='$_POST[id]'");
}
if($ds=='mi'){
mysql_query("UPDATE matpel_mi SET kode_matpel='$_POST[kode_matpel]', nama_matpel='$_POST[nama_matpel]', kategori='$_POST[kategori]',
 				smt='$_POST[smt]', kelas='$_POST[kelas]', kkm='$_POST[kkm]' WHERE kode_matpel='$_POST[id]'");
}
if($ds=='mts'){
mysql_query("UPDATE matpel_mts SET kode_matpel='$_POST[kode_matpel]', nama_matpel='$_POST[nama_matpel]', kategori='$_POST[kategori]',
 				smt='$_POST[smt]', kelas='$_POST[kelas]', kkm='$_POST[kkm]' WHERE kode_matpel='$_POST[id]'");
}
if($ds=='ma'){
mysql_query("UPDATE matpel_ma SET kode_matpel='$_POST[kode_matpel]', nama_matpel='$_POST[nama_matpel]', kategori='$_POST[kategori]',
 				smt='$_POST[smt]',jurusan='$_POST[jurusan]', kelas='$_POST[kelas]', kkm='$_POST[kkm]' WHERE kode_matpel='$_POST[id]'");
}
header('location:media.php?opt='.$modul.'&cmd='.$ds.'');
}

/*================================================= input angkatan ================================================*/
elseif($modul=='angkatan' AND $aksi=='input'){
mysql_query("INSERT INTO angkatan (th_ajar) VALUES ('$_POST[th_ajar]')");

header('location:media.php?opt='.$modul);
}
/*================================================ update angkatan ====================================================*/
elseif($modul=='angkatan' AND $aksi=='update'){
mysql_query("UPDATE angkatan SET th_ajar='$_POST[th_ajar]' WHERE id_angkatan='$_POST[id]'");
header('location:media.php?opt='.$modul);
}

/*========================================== input kelas =======================================================*/
elseif($modul=='kelas' AND $aksi=='input'){
mysql_query("INSERT INTO kelas (kelas,subkelas,tingkat) VALUES ('$_POST[kelas]','$_POST[subkelas]','$_POST[tingkat]')");
header('location:media.php?opt='.$modul);
}
/*======================================== update kelas =======================================================*/
elseif($modul=='kelas' AND $aksi=='update'){
mysql_query("UPDATE kelas SET kelas='$_POST[kelas]', subkelas='$_POST[subkelas]' WHERE id_kelas='$_POST[id]'");
header('location:media.php?opt='.$modul);
}

/*============================================= input absensi ===================================================*/
elseif($modul=='absensi' AND $aksi=='input'){
$vg=$_POST[tingkat];
if($vg=='tk'){
mysql_query("INSERT INTO absensi_tk (subkelas, id_siswa) VALUES ('$_POST[subkelas]', '$_POST[nis]')");
}
if($vg=='mi'){
mysql_query("INSERT INTO absensi_mi (kelas, id_siswa) VALUES ('$_POST[kelas]', '$_POST[nis]')");
}
if($vg=='mts'){
mysql_query("INSERT INTO absensi_mts (kelas, id_siswa) VALUES ('$_POST[kelas]', '$_POST[nis]')");
}
if($vg=='ma'){
mysql_query("INSERT INTO absensi_ma (kelas, jurusan, id_siswa) VALUES ('$_POST[kelas]','$_POST[jurusan]', '$_POST[nis]')");
}
header('location:media.php?opt='.$modul.'&cmd='.$vg.'');
}
/*================================================= update absensi ====================================================*/
elseif($modul=='absensi' AND $aksi=='update'){
mysql_query("UPDATE absensi SET kelas='$_POST[kelas]', id_siswa='$_POST[nis]' WHERE id_absensi='$_POST[id]'");
header('location:media.php?opt='.$modul);
}

/*================================================ input jadwal ==========================================*/
elseif($modul=='jadwal' AND $aksi=='input'){
$jhy=$_POST[tingkat];
if($jhy=='tk'){
mysql_query("INSERT INTO jadwal_tk (id_hari, jam, pukul, nama_matpel, nama_guru, subkelas)
 VALUES ('$_POST[hari]', '$_POST[jam]', '$_POST[pukul]', '$_POST[matpel]', '$_POST[guru]',
 '$_POST[sub]')");
}
elseif($jhy=='ma'){
mysql_query("INSERT INTO jadwal_ma (id_hari, jam, pukul, nama_matpel, nama_guru, kelas, subkelas)
 VALUES ('$_POST[hari]', '$_POST[jam]', '$_POST[pukul]', '$_POST[matpel]', '$_POST[guru]',
 '$_POST[kls]', '$_POST[sub]')");
}
elseif($jhy=='mts'){
mysql_query("INSERT INTO jadwal_mts (id_hari, jam, pukul, nama_matpel, nama_guru, kelas)
 VALUES ('$_POST[hari]', '$_POST[jam]', '$_POST[pukul]', '$_POST[matpel]', '$_POST[guru]',
 '$_POST[sub]')");
}
elseif($jhy=='mi'){
mysql_query("INSERT INTO jadwal_mi (id_hari, jam, pukul, nama_matpel, nama_guru, kelas)
 VALUES ('$_POST[hari]', '$_POST[jam]', '$_POST[pukul]', '$_POST[matpel]', '$_POST[guru]',
 '$_POST[sub]')");
}
header('location:media.php?opt='.$modul.'&cmd='.$jhy.'');
}
/*========================================= update jadwal ========================================================*/
elseif($modul=='jadwal' AND $aksi=='update'){
$l=$_POST[tingkat];
if($l=='tk'){
mysql_query("UPDATE jadwal_tk SET id_hari='$_POST[hari]', jam='$_POST[jam]',  pukul='$_POST[pukul]',
				nama_matpel='$_POST[matpel]', nama_guru='$_POST[guru]' WHERE id_jadwal='$_POST[id]'");	
	}
else if($l=='mi'){
mysql_query("UPDATE jadwal_mi SET id_hari='$_POST[hari]', jam='$_POST[jam]',  pukul='$_POST[pukul]',
				nama_matpel='$_POST[matpel]', nama_guru='$_POST[guru]' WHERE id_jadwal='$_POST[id]'");	
	}
else if($l=='mts'){
mysql_query("UPDATE jadwal_mts SET id_hari='$_POST[hari]', jam='$_POST[jam]',  pukul='$_POST[pukul]',
				nama_matpel='$_POST[matpel]', nama_guru='$_POST[guru]' WHERE id_jadwal='$_POST[id]'");	
	}
else if($l=='ma'){
mysql_query("UPDATE jadwal_ma SET id_hari='$_POST[hari]', jam='$_POST[jam]',  pukul='$_POST[pukul]',
				nama_matpel='$_POST[matpel]', nama_guru='$_POST[guru]' WHERE id_jadwal='$_POST[id]'");	
	}
header('location:media.php?opt='.$modul.'&cmd='.$l.'');
}

/*================================================ input nilai ===============================================*/
elseif($modul=='nilai' AND $aksi=='input'){
$nis=$_POST['nis'];
$l=$_POST['tingkat'];
$jumMP=$_POST['jumMP'];
if($l=='tk'){
	for($i=1;$i<=$jumMP;$i++) {
		$mp=$_POST['mp'.$i];
		echo "$mp<br>";
		if(!empty($mp)){
			mysql_query("INSERT INTO nilai_tk (id_siswa,kode_matpel,tahun) VALUES ('$nis','$mp','$_POST[tahun]')");
		}
	}
}
else if($l=='mi'){
	for($i=1;$i<=$jumMP;$i++) {
		$mp=$_POST['mp'.$i];
		if(!empty($mp)){
			mysql_query("INSERT INTO nilai_mi (id_siswa,kode_matpel,tahun) VALUES ('$nis','$mp','$_POST[tahun]')");
			}
	}
}
else if($l=='mts'){
	for($i=1;$i<=$jumMP;$i++) {
		$mp=$_POST['mp'.$i];
		if(!empty($mp)){
			mysql_query("INSERT INTO nilai_mts (id_siswa,kode_matpel,tahun) VALUES ('$nis','$mp','$_POST[tahun]')");
			}
	}
}
else if($l=='ma'){
	for($i=1;$i<=$jumMP;$i++) {
		$mp=$_POST['mp'.$i];
		if(!empty($mp)){
			mysql_query("INSERT INTO nilai_ma (id_siswa,kode_matpel,tahun) VALUES ('$nis','$mp','$_POST[tahun]')");
			}
	}
}
header('location:media.php?opt='.$modul.'&cmd='.$l.'');
}
/*================================================== input user ==============================================*/
elseif($modul=='user' AND $aksi=='input'){
$l=$_POST[tingkat];
if($l=='admin'){
	mysql_query("UPDATE siakad_admin SET username='$_POST[username]', password='$_POST[pass]'");
	header('location:media.php?opt='.$modul.'&cmd=admin');	
	}
else {
	mysql_query("INSERT INTO siakad_guru (nama_guru, username, password, level) VALUES('$_POST[nama]', '$_POST[username]','$_POST[pass]','$l')");
	header('location:media.php?opt='.$modul.'&cmd=guru');
	}
}
/*================================================================= update user =================================================*/
elseif($modul=='user' AND $aksi=='update'){
if($_POST[tingkat]=='admin'){
mysql_query("UPDATE siakad_admin SET username='$_POST[user]', password='$_POST[pass]'");
header('location:media.php?opt='.$modul.'&cmd=admin');
}
else{mysql_query("UPDATE siakad_guru SET username='$_POST[user]', password='$_POST[pass]' WHERE id_user='$_POST[id]'");
header('location:media.php?opt='.$modul.'&cmd=guru');
}

}
/*================================================= update nilai ===================================================*/
elseif($modul=='input_nilai' AND $aksi=='input'){
if($_POST[tingkat]=='tk'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE nilai_tk SET nilai='$nl' WHERE id_siswa='$nis' AND kode_matpel='$_POST[matpel]'");
	}
}
if($_POST[tingkat]=='mi'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE nilai_mi SET nilai='$nl' WHERE id_siswa='$nis' AND kode_matpel='$_POST[matpel]'");
	}
}
if($_POST[tingkat]=='mts'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE nilai_mts SET nilai='$nl' WHERE id_siswa='$nis' AND kode_matpel='$_POST[matpel]'");
	}
}
if($_POST[tingkat]=='ma'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE nilai_ma SET nilai='$nl' WHERE id_siswa='$nis' AND kode_matpel='$_POST[matpel]'");
	}
}
header('location:media.php?opt='.$modul.'');
}
/*================================================= input ekstra ================================================*/
elseif($modul=='ekstra' AND $aksi=='input'){
mysql_query("INSERT INTO ekstra (nama_ekstra,nama_guru,tingkat) VALUES ('$_POST[kegiatan]','$_POST[guru]','$_POST[tingkat]')");
header('location:media.php?opt='.$modul);
}
/*================================================= update ekstra ================================================*/
elseif($modul=='ekstra' AND $aksi=='update'){
mysql_query("UPDATE ekstra SET nama_ekstra='$_POST[kegiatan]', nama_guru='$_POST[guru]' 
					WHERE id_ekstra='$_POST[id]'");
header('location:media.php?opt='.$modul);
}
/*================================================= input ekstra ================================================*/
elseif($modul=='anggota' AND $aksi=='input'){
	$p=$_POST[tingkat];
	if($p=='tk'){
		mysql_query("INSERT INTO ekstra_tk (id_siswa,nama_ekstra) VALUES ('$_POST[nis]','$_POST[ekstra]')");
		}
	elseif($p=='mi'){
		mysql_query("INSERT INTO ekstra_mi (id_siswa,nama_ekstra) VALUES ('$_POST[nis]','$_POST[ekstra]')");
		}
	elseif($p=='mts'){
		mysql_query("INSERT INTO ekstra_mts (id_siswa,nama_ekstra) VALUES ('$_POST[nis]','$_POST[ekstra]')");
		}
	elseif($p=='ma'){
		mysql_query("INSERT INTO ekstra_ma (id_siswa,nama_ekstra) VALUES ('$_POST[nis]','$_POST[ekstra]')");
		}
header('location:media.php?opt=ekstra&cmd='.$p.'');
}
/*================================================= update nilai ekstra===================================================*/
elseif($modul=='input_ekstra' AND $aksi=='input'){
if($_POST[tingkat]=='tk'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE ekstra_tk SET nilai='$nl' WHERE id_siswa='$nis' AND nama_ekstra='$_POST[ekstra]'");
	}
}
if($_POST[tingkat]=='mi'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE ekstra_mi SET nilai='$nl' WHERE id_siswa='$nis' AND nama_ekstra='$_POST[ekstra]'");
	}
}
if($_POST[tingkat]=='mts'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE ekstra_mts SET nilai='$nl' WHERE id_siswa='$nis' AND nama_ekstra='$_POST[ekstra]'");
	}
}
if($_POST[tingkat]=='ma'){
	$jm=$_POST[n];
	for($i=1;$i<=$jm;$i++){
		$nis=$_POST['sw'.$i];
		$nl=$_POST['nilai'.$i];
		mysql_query("UPDATE ekstra_ma SET nilai='$nl' WHERE id_siswa='$nis' AND nama_ekstra='$_POST[ekstra]'");
	}
}
header('location:media.php?opt='.$modul.'');
}
?>