$(document).ready(function() {
		
		
		$('.tambahPelanggan').live("click", function(){
		alert('1');
			var url = "mahasiswa.form.php";
			// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data Mahasiswa");

		
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			
		});
		});