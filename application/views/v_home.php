<!-- Home -->

<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					 <div class="home_slider_background" style="background-image:url('<?= base_url('template/front-end/images/gedung2.jpeg') ?>')"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title">SMP NEGERI ALOK MAUMERE</div>
									<div class="home_slider_subtitle">BELAJAR, TUMBUH, DAN BERKEMBANG</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url('<?= base_url('template/front-end/images/gedung1.jpeg') ?>')"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title">SMP NEGERI ALOK MAUMERE</div>
									<div class="home_slider_subtitle">BELAJAR, TUMBUH, DAN BERKEMBANG</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url('<?= base_url('template/front-end/images/koridor.jpeg') ?>')"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title">SMP NEGERI ALOK MAUMERE</div>
									<div class="home_slider_subtitle">BELAJAR, TUMBUH, DAN BERKEMBANG</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

        <!-- Home Slider Nav -->

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

    <!-- Features -->

	<div class="features" style="background-image: url('<?= base_url('template/front-end/images/koridor.jpeg') ?>'); background-size: cover; background-position: center; background-attachment: fixed;">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center wow animate__animated animate__fadeIn" data-wow-delay="0.2s">
						<h2 class="section_title">SARANA DAN PRASARANA</h2>
						<div class="section_subtitle"><p>SMP NEGERI ALOK MAUMERE MEMILIKI BERBAGAI FASILITAS PENUNJANG BELAJAR YANG SANGAT MEMADAI</p></div>
					</div>
				</div>
			</div>
			<div class="row features_row wow animate__animated animate__fadeIn" data-wow-delay="0.4s">
				
				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= base_url() ?>template/front-end/images/icon_1.png" alt=""></div>
						<h3 class="feature_title">laboratorium</h3>
						<div class="feature_text"><p>laboratorium fisika, laboratorium kimia, laboratorium biokimia, laboratorium komputer, dan laboratorium bahasa</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= base_url() ?>template/front-end/images/icon_2.png" alt=""></div>
						<h3 class="feature_title">PERPUSTAKAAN</h3>
						<div class="feature_text"><p>Kumpulan informasi yang bersifat ilmu pengetahuan, hiburan, rekreasi, dan ibadah</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= base_url() ?>template/front-end/images/icon_3.png" alt=""></div>
						<h3 class="feature_title">KANTIN</h3>
						<div class="feature_text"><p>Dapat digunakan pengunjung untuk makan, baik makanan yang dibawa sendiri maupun yang dibeli</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= base_url() ?>template/front-end/images/icon_4.png" alt=""></div>
						<h3 class="feature_title">OLAHRAGA</h3>
						<div class="feature_text"><p>Aktivitas untuk melatih tubuh siswa, guru dan staff tidak hanya secara jasmani tetapi juga secara rohani</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Popular Courses -->

	<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title wow animate__animated animate__fadeIn" data-wow-delay="0.4s">SAMBUTAN KEPALA SEKOLAH</h2>
					</div>
				</div>
			</div>

			<div class="row courses_row wow animate__animated animate__fadeIn" data-wow-delay="0.5s">
				<!-- Kolom kiri: foto dan nama -->
				<div class="col-md-4 text-center">
					<?php if (!empty($kepala['foto_kepsek'])): ?>
						<img src="<?= base_url('foto_kepsek/' . $kepala['foto_kepsek']); ?>" width="200" class="img-thumbnail mb-3">
					<?php else: ?>
						<img src="<?= base_url('foto_kepsek/default.png'); ?>" width="200" class="img-thumbnail mb-3">
					<?php endif; ?>

					<h4><?= $kepala['nama_kepsek']; ?></h4>
				</div>

				<!-- Kolom kanan: sambutan -->
				<div class="col-md-8">
					<h2><?= $kepala['sambutan_kepsek']; ?></h2>
				</div>
			</div>
		</div>
	</div>

	<!-- Latest News -->

	<div class="news">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="section_title_container text-center wow animate__animated animate__fadeIn" data-wow-delay="0.6s">
						<h2 class="section_title">Berita News</h2>
					</div>
					<div class="courses_container wow animate__animated animate__fadeIn" data-wow-delay="0.7s">
						<div class="row news_row">
							<!-- Course -->
							<?php foreach ($berita_home as $key => $value) {?>
							<div class="col-lg-6 course_col">
								<div class="course">
									<div class="course_image"><img src="<?= base_url('gambar_berita/'. $value->gambar_berita) ?>" height="230px" width="100%"></div>
									<div class="course_body">
										<h3 class="course_title"><a href="<?= base_url('home/detail_berita/'.$value->slug_berita) ?>"><?= substr(strip_tags($value->judul_berita),0,25) ?>....</a></h3>
										<div class="course_teacher"><?= $value->nama_admin ?></div>
										<div class="course_text">
											<p><?= substr(strip_tags($value->isi_berita),0,100) ?></p>
										</div>
									</div>
									<div class="course_footer">
										<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
											<div class="course_info">
												<i class="fa fa-calendar" aria-hidden="true"></i>
												<span><?= $value->tgl_berita ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>

						<div class="row pagination_row">
							<div class="col text-center">
								<?php
									if (isset($paginasi)) {
										echo $paginasi;
									}
								?>
							</div>
						</div>
					</div>
				</div>

				<!-- Courses Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title wow animate__animated animate__fadeIn" data-wow-delay="0.8s">Artikel Terbaru</div>
							<div class="sidebar_latest d-flex flex-column wow animate__animated animate__fadeIn" data-wow-delay="0.9s">

								<!-- Latest Course -->
								 <?php foreach($berita_home as $value): ?>
									<div class="card me-3" style="min-width: 200px; max-width: 220px;">
										<img src="<?= base_url('gambar_berita/'. $value->gambar_berita) ?>" class="card-img-top" style="height:120px; object-fit:cover;">
										<div class="card-body">
											<h6 class="card-title" style="font-size:14px;"><?= substr(strip_tags($value->judul_berita),0,30) ?>...</h6>
											<a href="<?= base_url('home/detail_berita/'.$value->slug_berita) ?>" class="btn btn-primary btn-sm">
												Baca Selengkapnya
											</a>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
	<div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>template/front-end/images/newsletter.jpg" data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

					<!-- Newsletter Content -->
					<div class="newsletter_content text-center">
						<div class="newsletter_title">“Belajar bukan tentang siapa yang tercepat, tapi siapa yang paling konsisten.”</div>
						<div class="newsletter_subtitle">~ SMP NEGERI ALOK</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>