<?php $id = ($this->session->userdata['logged_in']['id']); ?>
<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url();?>dashboard_mhs">Home</a>
							</li>

							<li>
								<a href="#"  onclick="history.back();" >Lihat Nilai</a>
							</li>
							<li class="active">Detail Nilai</li>
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
						<form class="form-horizontal">
								<div class="form-body">

									<div class="form-group">
											<label class="control-label col-md-3">Kelas</label>
											<div class="col-md-9">
													<input name="nama_detail_tugas" value="<?php echo $kelas->nama_kelas; ?>" class="form-control" type="text" disabled>
													<span class="help-block"></span>
											</div>
									</div>
										<div class="form-group">
												<label class="control-label col-md-3">Matakuliah</label>
												<div class="col-md-9">
														<input name="nama_detail_tugas" value="<?php echo $kelas->nama_matkul; ?>" class="form-control" type="text" disabled>
														<span class="help-block"></span>
												</div>
										</div>
										<div class="form-group">
												<label class="control-label col-md-3">Dosen Pengajar</label>
												<div class="col-md-9">
														<input name="nama_detail_tugas" value="<?php echo $kelas->nama_dosen; ?>" class="form-control" type="text" disabled>
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

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th>Nama Tugas</th>
													<th>Tanggal Release</th>
													<th class="hidden-480">Nilai</th>
												</tr>
											</thead>

											<tbody>
												<?php $i=0; foreach($tugas as $row){ $i++; ?>
												<tr>
													<td>
														<?php echo $row->nama_tugas; ?>
													</td>
													<td><?php echo $row->tanggal_release; ?></td>
													<td class="hidden-480"><?php echo $row->nilai; ?></td>

												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>
