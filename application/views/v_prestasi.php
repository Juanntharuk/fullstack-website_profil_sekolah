<!-- Home -->

<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Prestasi</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<!-- Contact -->

	<div class="contact">

		<!-- Contact Info -->

		<div class="contact_info_container">
			<div class="container">
				<div class="row">

					<div class="col-lg-12 text-center">
						<h2>Daftar Prestasi</h2>
						<br>
						<br>
					</div>

					<!-- Team Item -->
					<?php foreach ($prestasi as $key => $value) { ?>
						<div class="col-lg-3 col-md-6 team_col">
							<div class="team_item">
								<div class="team_image"><img src="<?= base_url('foto_prestasi/'. $value->foto_prestasi) ?>" alt=""></div>
								<div class="team_body">
									
									<div class="team_subtitle"><?= $value->nama_prestasi ?></div>
									<div class="team_subtitle"><?= $value->ket_prestasi ?></div>
								</div>
							</div>
						</div>
					<?php } ?>

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