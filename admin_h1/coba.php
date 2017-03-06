<?php
if($_POST['submit']){
				$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
				$file_name1		= $_FILES['siop']['name'];
				$file_name2		= $_FILES['tdp']['name'];
				$file_name3		= $_FILES['ktp']['name'];
				$file_name4		= $_FILES['npwp']['name'];
				$file_name5		= $_FILES['ho']['name'];
				$file_name6		= $_FILES['akte']['name'];
				$file_name7		= $_FILES['surat_domisili']['name'];
				
				$file_ext1		= strtolower(end(explode('.', $file_name1)));
				$file_ext2		= strtolower(end(explode('.', $file_name2)));
				$file_ext3		= strtolower(end(explode('.', $file_name3)));
				$file_ext4		= strtolower(end(explode('.', $file_name4)));
				$file_ext5		= strtolower(end(explode('.', $file_name5)));
				$file_ext6		= strtolower(end(explode('.', $file_name6)));
				$file_ext7		= strtolower(end(explode('.', $file_name7)));
				
				
				$file_tmp		= $_FILES['file']['tmp_name'];
				
				$nama			= $_POST['kode_dealer'];
				$tgl			= date("Y-m-d");
				
				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 1044070){
						$lokasi = 'files/'.$nama.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$in = mysql_query("INSERT INTO download VALUES(NULL, '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi')");
						if($in){
							echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
						}else{
							echo '<div class="error">ERROR: Gagal upload file!</div>';
						}
					}else{
						echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
					}
				}else{
					echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
				}
			}
			?>