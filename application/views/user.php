<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<title>Belajar Ajax - Codeigniter</title>
</head>

<body class="bg-light">
	<div class="container">
		<div class="row my-4">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2>Codeigniter 3 - Ajax</h2>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-user">Create User</button>
				</div>
			</div>
			<div class="col-12 mt-3">
				<label class="sr-only" for="search">Search</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">Search</div>
					</div>
					<input type="text" class="form-control" id="search" placeholder="Masukkan keyword..." name="search" id="search">
				</div>
			</div>
		</div>
		<div class="row my-4">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-primary text-white">Data Users</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="table-users">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">NRP</th>
										<th scope="col">Nama</th>
										<th scope="col">Jenis Kelamin</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<ul id="pagination" class="pagination-sm"></ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Create User Modal -->
	<div class="modal" tabindex="-1" id="create-user">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form data-toggle="validator" action="users/store" method="POST" id="form-create-users">
						<div class="form-group">
							<label class="control-label" for="nrp">NRP</label>
							<input type="number" name="nrp" class="form-control" required placeholder="Masukkan NRP" />
							<small class="text-danger" id="nrp_error"></small>
						</div>
						<div class="form-group">
							<label class="control-label" for="nama">Nama</label>
							<input type="text" name="nama" class="form-control" required placeholder="Masukkan nama" />
							<small class="text-danger" id="nama_error"></small>
						</div>
						<div class="row mb-3">
							<div class="col-12">
								<label>Jenis Kelamin</label>
							</div>
							<div class="col-12 d-flex">
								<div class="form-check mr-3">
									<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="L">
									<label class="form-check-label" for="laki-laki">
										Laki-laki
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
									<label class="form-check-label" for="perempuan">
										Perempuan
									</label>
								</div>
							</div>
							<div class="col-12">
								<small class="text-danger" id="jenis_kelamin_error"></small>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Edit User Modal -->
	<div class="modal" tabindex="-1" id="edit-user">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form data-toggle="validator" action="" method="PUT" id="form-edit-users">
						<div class="form-group">
							<label class="control-label" for="nrp">NRP</label>
							<input type="number" name="edit_nrp" class="form-control" required placeholder="Masukkan NRP" />
							<small class="text-danger" id="edit_nrp_error"></small>
						</div>
						<div class="form-group">
							<label class="control-label" for="nama">Nama</label>
							<input type="text" name="edit_nama" class="form-control" required placeholder="Masukkan nama" />
							<small class="text-danger" id="edit_nama_error"></small>
						</div>
						<div class="row mb-3">
							<div class="col-12">
								<label>Jenis Kelamin</label>
							</div>
							<div class="col-12 d-flex">
								<div class="form-check mr-3">
									<input class="form-check-input" type="radio" name="edit_jenis_kelamin" id="laki-laki" value="L">
									<label class="form-check-label" for="laki-laki">
										Laki-laki
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="edit_jenis_kelamin" id="perempuan" value="P">
									<label class="form-check-label" for="perempuan">
										Perempuan
									</label>
								</div>
							</div>
							<div class="col-12">
								<small class="text-danger" id="edit_jenis_kelamin_error"></small>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn crud-submit-edit btn-success">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script>
		const baseUrlApi = '<?= base_url() ?>users';
		var page = 1;
		var current_page = 1;
		var total_page = 0;
		var is_ajax_fire = 0;

		manageData();

		/* manage data list */
		function manageData(search = '') {
			$.ajax({
				type: "GET",
				dataType: 'json',
				url: baseUrlApi,
				data: {
					page: page,
					search: search
				}
			}).done(function(data) {
				total_page = data.total % 5;
				current_page = page;
				var rows = '';
				if (data.data.length > 0) {
					let i = 1;
					$.each(data.data, function(key, value) {
						rows = rows + '<tr>';
						rows = rows + '<td>' + (i++) + '</td>';
						rows = rows + '<td>' + value.nrp + '</td>';
						rows = rows + '<td>' + value.nama + '</td>';
						rows = rows + '<td>' + value.jenis_kelamin + '</td>';
						rows = rows + '<td data-id="' + value.id + '">';
						rows = rows + '<button data-toggle="modal" data-target="#edit-user" class="btn btn-primary edit-user">Edit</button> ';
						rows = rows + '<button class="btn btn-danger remove-user">Delete</button>';
						rows = rows + '</td>';
						rows = rows + '</tr>';
					});
				} else {
					rows = rows + '<tr>';
					rows = rows + '<td  colspan="5" class="text-center">Data kosong</td>';
					rows = rows + '</tr>';
				}
				$("tbody").html(rows);
			});
		}

		/* Create new User */
		$(".crud-submit").click(function(e) {
			e.preventDefault();
			var form_action = $("#create-user").find("form").attr("action");
			var nrp = $("#create-user").find("input[name='nrp']").val();
			var nama = $("#create-user").find("input[name='nama']").val();
			var jenis_kelamin = $("#create-user").find("input[name='jenis_kelamin']:checked").val();
			$.ajax({
				url: form_action,
				dataType: 'json',
				type: "POST",
				data: {
					nrp: nrp,
					nama: nama,
					jenis_kelamin: jenis_kelamin
				},
				dataType: "json",
				success: function(data) {
					if (data.status == false) {
						if (data.errors.nama_error != '') {
							$('#nama_error').html(data.errors.nama_error);
						} else {
							$('#nama_error').html('');
						}
						if (data.errors.nrp_error != '') {
							$('#nrp_error').html(data.errors.nrp_error);
						} else {
							$('#nrp_error').html('');
						}
						if (data.errors.jenis_kelamin_error != '') {
							$('#jenis_kelamin_error').html(data.errors.jenis_kelamin_error);
						} else {
							$('#jenis_kelamin_error').html('');
						}
					}
					if (data.status == true) {
						$('#nama_error').html('');
						$('#nrp_error').html('');
						$('#jenis_kelamin_error').html('');
						$('#form-create-users')[0].reset();

						manageData();
						$(".modal").modal('hide');
						toastr.success('Data berhasil ditambahkan.', 'Success Alert', {
							timeOut: 5000
						});
					}
				}
			})
		});

		$('#search').keyup(function() {
			var search = $(this).val();
			if (search != '') {
				manageData(search);
			} else {
				manageData();
			}
		});

		$("body").on("click", ".edit-user", function() {
			var id = $(this).parent("td").data('id');
			var nrp = $(this).parent("td").prev("td").prev("td").prev("td").text();
			var nama = $(this).parent("td").prev("td").prev("td").text();
			var jenis_kelamin = $(this).parent("td").prev("td").text();
			$("#edit-user").find("input[name='edit_nama']").val(nama);
			$("#edit-user").find("input[name='edit_nrp']").val(nrp);
			if (jenis_kelamin == 'L') {
				$("#edit-user").find("input[name='edit_jenis_kelamin'][value='L']").prop('checked', true);
			} else {
				$("#edit-user").find("input[name='edit_jenis_kelamin'][value='P']").prop('checked', true);
			}
			$("#edit-user").find("form").attr("action", baseUrlApi + '/update/' + id);
		});


		/* Updated new User */
		$(".crud-submit-edit").click(function(e) {
			e.preventDefault();
			var form_action = $("#edit-user").find("form").attr("action");
			var nrp = $("#edit-user").find("input[name='edit_nrp']").val();
			var nama = $("#edit-user").find("input[name='edit_nama']").val();
			var jenis_kelamin = $("#edit-user").find("input[name='edit_jenis_kelamin']:checked").val();
			$.ajax({
				dataType: 'json',
				type: 'POST',
				url: form_action,
				data: {
					nrp: nrp,
					nama: nama,
					jenis_kelamin: jenis_kelamin
				},
				success: function(data) {
					if (data.status == false) {
						if (data.errors.nama_error != '') {
							$('#edit_nama_error').html(data.errors.nama_error);
						} else {
							$('#edit_nama_error').html('');
						}
						if (data.errors.nrp_error != '') {
							$('#edit_nrp_error').html(data.errors.nrp_error);
						} else {
							$('#edit_nrp_error').html('');
						}
						if (data.errors.jenis_kelamin_error != '') {
							$('#edit_jenis_kelamin_error').html(data.errors.jenis_kelamin_error);
						} else {
							$('#edit_jenis_kelamin_error').html('');
						}
					}
					if (data.status == true) {
						$('#edit_nama_error').html('');
						$('#edit_nrp_error').html('');
						$('#edit_jenis_kelamin_error').html('');
						$('#form-edit-users')[0].reset();

						manageData();
						$(".modal").modal('hide');
						toastr.success('Data berhasil diupdate.', 'Success Alert', {
							timeOut: 5000
						});
					}
				}
			})
		});

		/* Remove User */
		$("body").on("click", ".remove-user", function() {
			var id = $(this).parent("td").data('id');
			var c_obj = $(this).parents("tr");
			$.ajax({
				dataType: 'json',
				type: 'delete',
				url: baseUrlApi + '/delete/' + id,
			}).done(function(data) {
				c_obj.remove();
				toastr.success('Data berhasil dihapus.', 'Success Alert', {
					timeOut: 5000
				});
				manageData();
			});
		});
	</script>
</body>

</html>
