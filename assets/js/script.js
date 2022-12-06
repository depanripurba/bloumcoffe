// Base URL
var base_url = 'http://localhost/bloumcoffe/';

// Tombol Detai CS di-click
$('.tombolUbahKategori').on('click', function () {
	// Mendapatkan data id CS
	const id = $(this).data('id');

	// Membuat variabel controller
	var getkategori = 'aksesowner/kategori_get';
	// Mengubah atribute action
	$('.info-dialog form').attr('action', base_url + getkategori);
	// Mengubah Judul Modal
	$('.info-title').html('Ubah Kategori');
	// Mengubah Text Tombol Submit di Modal
	$('.info-footer button[type=submit]').html('Ubah');
	$('.info-footer button[type=submit]').attr('class','btn btn-warning mb-3');
	$('.info-footer i').attr('class','nav-icon far fas fa-save mr-2');
	// Mengubah Atribute ID
	$('#id').attr('name', 'id');

	$.ajax({
		url: 'http://localhost/bloumcoffe/aksesowner/kategori_get',
		data: {
			id: id
		},
		method: 'POST',
		dataType: 'json',
		success: function (data) {
			// cek data yang dipanggil
			console.log(data);

			// Mengisi Form dengan CS yang dipilih

			// Mengubah input hidden id
			$('#id').val(data.id_lategori);
			$('#kategori').val(data.kategori);
		}
	});
});