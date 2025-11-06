					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
<?php if (Auth::isLoggedIn()) { ?>
						<li class="nav-item dropdown hidden-caret position-relative">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info" style="max-width: 240px;">
								<div class="quick-actions-header p-2">MENU</div>
								<div class="quick-actions-scroll">
									<div class="quick-actions-items p-2">
										<div class="row m-0">
											<div class="col-6 p-0">
												<a class="quick-actions-item" href="" data-custom-link="true" data-group="main">
													<i class="icon-calendar"></i>
													<span class="text">Dashboard</span>
												</a>
											</div>
											<div class="col-6 p-0">
												<a class="quick-actions-item" href="statistik" data-custom-link="true" data-group="static-page">
													<i class="icon-chart"></i>
													<span class="text">Statistik</span>
												</a>
											</div>
											<div class="col-6 p-0">
												<a class="quick-actions-item" href="bantuan" data-custom-link="true" data-group="static-page">
													<i class="icon-question"></i>
													<span class="text">Bantuan</span>
												</a>
											</div>
											<div class="col-6 p-0">
												<a class="quick-actions-item" href="catatan-rilis" data-custom-link="true" data-group="static-page">
													<i class="icon-notebook"></i>
													<span class="text">Catatan Rilis</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false">
								<div class="avatar-sm position-relative">
									<div class="h-100 w-100 rounded-circle d-flex align-items-center justify-content-center" style="position: absolute; top: 0; background: rgba(255,255,255,.6);">
										<i class="fas fa-user-alt fa-lg fa-fw"></i>
									</div>
									<img class="avatar-img rounded-circle opos-top" id="nav-user-avatar" alt="&nbsp;" style="position: absolute; top: 0; display: none;" src="https://community.bps.go.id/images/avatar/<?=$data['user']['urlfoto']?>" onload="this.style.display='block'">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<div class="dropdown-user-scroll">
									<li>
										<div class="user-box">
											<div class="u-text">
												<h4 id="nav-user-name" title="<?=$data['user']['nama']??'...'?>"><?=$data['user']['nama']??'...'?></h4>
												<p class="text-muted" id="nav-user-email" title="<?=$data['user']['username']? $data['user']['username'].'@bps.go.id' : '...'?>"><?=$data['user']['username']? $data['user']['username'].'@bps.go.id' : '...'?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item <?=preg_match('/^bps\d{4}$/', $_SESSION[AUTH]['nipbps'])?'d-none':''?>" href="tugas-saya" data-custom-link="true" data-group="main"><i class="icon-briefcase"></i>Tugas Saya</a>
										<a class="dropdown-item" href="akun-saya" data-custom-link="true" data-group="main"><i class="icon-user"></i>Akun Saya</a>
<?php if (Auth::isLevel([0,1,2])) { ?>
										<a class="dropdown-item" href="admin"><i class="icon-speedometer"></i>Administrator</a>
<?php } ?>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href=".."><i class="icon-grid"></i>Lihat Aplikasi Lainnya</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item text-danger" href="logout"><i class="icon-logout"></i>Keluar</a>
									</li>
								</div>
							</ul>
						</li>
<?php } else { ?>
						<li class="nav-item dropdown hidden-caret position-relative">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info" style="max-width: 240px;">
								<div class="quick-actions-header p-2">MENU</div>
								<div class="quick-actions-scroll">
									<div class="quick-actions-items p-2">
										<div class="row m-0">
											<div class="col-6 p-0">
												<a class="quick-actions-item cur-n">
													<i class="icon-calendar text-lightgray"></i>
													<span class="text text-lightgray">Dashboard</span>
												</a>
											</div>
											<div class="col-6 p-0">
												<a class="quick-actions-item cur-n">
													<i class="icon-chart text-lightgray"></i>
													<span class="text text-lightgray">Statistik</span>
												</a>
											</div>
											<div class="col-6 p-0">
												<a class="quick-actions-item" href="bantuan" data-custom-link="true" data-group="static-page">
													<i class="icon-question"></i>
													<span class="text">Bantuan</span>
												</a>
											</div>
											<div class="col-6 p-0">
												<a class="quick-actions-item" href="catatan-rilis" data-custom-link="true" data-group="static-page">
													<i class="icon-notebook"></i>
													<span class="text">Catatan Rilis</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login">
								<i class="fas fa-fw fa-sign-in-alt"></i>
							</a>
						</li>
<?php } ?>
					</ul>
