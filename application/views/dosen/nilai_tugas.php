<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url();?>dashboard_mhs">Home</a>
							</li>

							<li>
								<a href="#"  onclick="history.back();" >Kelola Tugas</a>
							</li>
							<li class="active">Nilai Tugas</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
						<div class="clearfix">

							<h1>
								Tables
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Static &amp; Dynamic Tables
								</small>
							</h1>
						</div><!-- /.page-header -->
					</br>
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title">Lists</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row">
														<div class="col-sm-6">
						<form action="#" class="form-horizontal">
								<div class="form-body">

									<div class="form-group">
											<label class="control-label col-md-3">Kelas</label>
											<div class="col-md-9">
													<input name="nama_nilai_tugas" value="<?php echo $tugas->nama_kelas; ?>" class="form-control" type="text" disabled>
													<span class="help-block"></span>
											</div>
									</div>
										<div class="form-group">
												<label class="control-label col-md-3">Matakuliah</label>
												<div class="col-md-9">
														<input name="nama_nilai_tugas" value="<?php echo $tugas->nama_matkul; ?>" class="form-control" type="text" disabled>
														<span class="help-block"></span>
												</div>
										</div>
										<div class="form-group">
													<label class="control-label col-md-3">Tugas</label>
													<div class="col-md-9">
															<input name="nama_nilai_tugas" value="<?php echo $tugas->nama_tugas; ?>" class="form-control" type="text" disabled>
															<span class="help-block"></span>
													</div>
										</div>
										<div class="form-group">
												<label class="control-label col-md-3">Dosen Pengajar</label>
												<div class="col-md-9">
														<input name="nama_nilai_tugas" value="<?php echo $tugas->nama_dosen; ?>" class="form-control" type="text" disabled>
														<span class="help-block"></span>
												</div>
										</div>

										</div>
						</form>
					</div>
				</div>
											</div>
										</div>
									</div>


						<div class="pull-right tableTools-container"></div>
										</div>
										<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
										<button class="btn btn-info" onclick="download('<?php echo $tugas->id_tugas; ?>')"><i class="glyphicon glyphicon-refresh"></i> Download Tugas</button>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">


										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>

														<th>NIM</th>
														<th>Nama Mahasiswa</th>
														<th>File Tugas</th>
														<th>Pengumpulan</th>
														<th>Nilai</th>
														<th></th>
													</tr>
												</thead>

												<tbody>

												</tbody>
											</table>
										</div>
									</div>
								</div>



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dataTables.select.min.js"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;
var id_tugas = <?php echo $q ?>

$(document).ready(function() {

    //datatables
    table = $('#dynamic-table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('nilai_tugas/nt_list?q=')?>"+id_tugas,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
			new $.fn.dataTable.Buttons( table, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }
					]
				} );
				table.buttons().container().appendTo( $('.tableTools-container') );



});

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('nilai_tugas/nt_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
						$('[name="nim"]').val(data.nim);
						$('[name="id_tugas"]').val(data.id_tugas);
            $('[name="nama_mhs"]').val(data.nama_mhs);
						$('[name="nama_tugas"]').val(data.nama_tugas);
            $('[name="tgl_pengumpulan"]').val(data.updated_at);
            $('[name="nilai"]').val(data.nilai);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'update') {
        url = "<?php echo site_url('nilai_tugas/nt_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function download(id){
	location.href = "<?php echo site_url('nilai_tugas/download_tugas?q='); ?>"+id;
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
							<form action="#" id="form" class="form-horizontal">
									<div class="form-body">
											<div class="form-group">
													<label class="control-label col-md-3">NIM</label>
													<div class="col-md-9">
															<input name="nim" class="form-control" type="text">
															<input name="id_tugas" class="form-control" type="hidden">
															<span class="help-block"></span>
													</div>
											</div>
											<div class="form-group">
													<label class="control-label col-md-3">Nama Mahasiswa</label>
													<div class="col-md-9">
															<input name="nama_mhs" class="form-control" type="text">
															<span class="help-block"></span>
													</div>
											</div>
											<div class="form-group">
													<label class="control-label col-md-3">Tugas</label>
													<div class="col-md-9">
															<input name="nama_tugas" class="form-control" type="text">
															<span class="help-block"></span>
													</div>
											</div>
											<div class="form-group">
													<label class="control-label col-md-3">Pengumpulan</label>
													<div class="col-md-9">
															<input name="tgl_pengumpulan" class="form-control" type="text">
															<span class="help-block"></span>
													</div>
											</div>
											<div class="form-group">
													<label class="control-label col-md-3">Nilai</label>
													<div class="col-md-9">
															<input name="nilai" class="form-control" type="text">
															<span class="help-block"></span>
													</div>
											</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
