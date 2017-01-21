<?php include ("../Connection/Act_Conn.php"); ?>
<!-- Content -->
	<div id="content" class="shell">
		<br>
		<div align="center">
		<h1 class="red">Anggota</h1>
		<?php
			if(isset($_POST['input_data'])){
				$id		     = $_POST['id'];
				$nama		 = $_POST['nama'];
				$telp	 	 = $_POST['telp'];
				$tmp_lahir	 = $_POST['tmp_lahir'];
				$tgl_lahir	 = $_POST['tgl_lahir'];
				$j_klm		 = $_POST['j_klm'];
				$status		 = $_POST['stat'];
				$alamat	     = $_POST['alamat'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO anggota(id_anggota, nama, alamat, tgl_lhr, tmp_lhr, j_kel, status, no_telp, ket)
															VALUES('$id','$nama', '$alamat', '$tgl_lahir', '$tmp_lahir', '$j_klm', '$status', '$telp',NULL)") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID Sudah Ada..!</div>';
				}
			}
			?>
		<form action="" method="post">
			<table border="0">
				<tr>
					<td valign="top">ID</td>
					<td valign="top">:</td>
					<td valign="top"><input required type="text" name="id" value="001"></td>
				</tr>			
				<tr>
					<td valign="top">Nama</td>
					<td valign="top">:</td>
					<td valign="top"><input required type="text" name="nama" value="Ramadhan"></td>
				</tr>		
				<tr>
					<td valign="top">No. Telp</td>
					<td valign="top">:</td>
					<td valign="top"><input required type="text" name="telp" value="No Telp"></td>
				</tr>					
				<tr>
					<td valign="top">Tempat Lahir</td>
					<td valign="top">:</td>
					<td valign="top"><input required type="text" name="tmp_lahir" value="Karanganyar"></td>
				</tr>				
				<tr>
					<td valign="top">Tanggal Lahir</td>
					<td valign="top">:</td>
					<td valign="top"><input required type="text" name="tgl_lahir" value="1999-12-09"></td>
				</tr>	
				<tr>
					<td valign="top">Jenis Kelamin</td>
					<td valign="top">:</td>
					<td valign="top">
					<select required name="j_klm" style="width:173px">
				      <option selected="">Laki - Laki</option>
				      <option>Perempuan</option>
				    </select></td>
				</tr>		
				<tr>
					<td valign="top">Status</td>
					<td valign="top">:</td>
					<td valign="top"><input required type="text" name="stat" value="Status Not Available"></td>
				</tr>	
				<tr>
					<td valign="top">Alamat</td>
					<td valign="top">:</td>
					<td valign="top"><textarea required name="alamat" style="width:171px;height:60px">404 Not Found</textarea></td>
				</tr>
				<tr><br></tr>
				<tr>
				    <td colspan="3"><div align="right">
				      <input type="submit" name="input_data" value="Tambah Data" />
				    </div></td>
				</tr>																	
			</table>
		</form>		
		</div>
		<br />
		<h6 class="red" align="center">- Daftar Anggota - </h6>
		<div align="center">
		<table width="648" cellpadding="5" style="margin:0 auto;width:80%;border-collapse:collapse;background:#ecf3eb">
	      <tr bgcolor="$warna">
	          <th width="44" style="border:1px solid #999;padding:8px 0;background: #ddd;">No </th>
	          <th width="200" style="border:1px solid #999;padding:8px 0;background: #ddd;">Nama</th>
	          <th width="80" style="border:1px solid #999;padding:8px 0;background: #ddd;">Kelamin</th>
	          <th width="250" style="border:1px solid #999;padding:8px 0;background: #ddd;">Tempat, Tgl Lahir</th>
	          <th width="200" style="border:1px solid #999;padding:8px 0;background: #ddd;">Alamat</th>
	          <th width="118" style="border:1px solid #999;padding:8px 0;background: #ddd;">No. Telp</th>
	          <th width="100" style="border:1px solid #999;padding:8px 0;background: #ddd;">Status</th>
	          <th width="200" style="border:1px solid #999;padding:8px 0;background: #ddd;">Pengaturan</th>
	      </tr>		
		  <?php
		  	include "../Connection/Connection.php";
		  	$no = 1;
			$sql= "SELECT * FROM anggota"; // Menampung perintah SQL ke variabel ‘sql’
			$hasil = $mysqli->query($sql); // Menjalankan perintah tersebut dengan fungsi mysqli-query
			 
			if($hasil === false) { // Jika gagal menjalankan query
			trigger_error('Perintah SQL salah: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR); // Tampilkan pesan
			} else { // Jika berhasil
			while($data = $hasil->fetch_array()){ // Tampilkan data dengan pengulangan while
			?>
			<tr style="text-align:center;border:1px solid #ddd;padding: 15px;">
	      	  <td style="border:1px solid #ddd;padding: 15px;"><?php echo $no++ ;?></td>
	      	  <td style="border:1px solid #ddd;padding: 15px;"><?php echo $data['nama'];?></td>
	      	  <td style="border:1px solid #ddd;padding: 15px;"><?php echo $data['j_kel'];?></td>
	      	  <td style="border:1px solid #ddd;padding: 15px;"><?php echo $data['tmp_lhr'];?>, <?php echo $data['tgl_lhr'];?></td>
	      	  <td style="border:1px solid #ddd;padding: 15px;"><?php echo $data['alamat'];?></td>
	      	  <td style="border:1px solid #ddd;padding: 15px;"><?php echo $data['no_telp'];?></td>
	      	  <td style="border:1px solid #ddd;padding: 15px;"><?php echo $data['status'];?></td>
	      	  <td style="border:1px solid #ddd;padding: 15px;">Ubah | Hapus</td>
	      </tr>
			<?php
			}
			}
		  ?>
	    </table>
	    </div>
	</div>
	
	<!-- End Content -->
</div>
