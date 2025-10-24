<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Pengumuman</li>
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
						<h2>Info Pengumuman</h2>
					</div>

					<div class="col-lg-12">
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th class="text-center" width="50px">No</th>
									<th class="text-center" width="500px">Judul Pengumuman</th>
									<th class="text-center" >Isi Pengumuman</th>
								</tr>
							</thead>

							<tbody>
								<?php $no=1; foreach ($pengumuman as $value) { ?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td>
										<strong><?= $value->judul_pengumuman ?></strong><br>
										<small><i><?= date('d-m-Y', strtotime($value->tgl_pengumuman)) ?></i></small>
									</td>
									<td><?= $value->isi_pengumuman ?></td>
								</tr>
								<?php } ?>
							</tbody>

						</table>
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