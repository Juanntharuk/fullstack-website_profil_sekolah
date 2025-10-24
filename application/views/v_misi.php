<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Misi Sekolah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<!-- isi konten -->

<div class="about">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="section_title_container text-center">
					<h2 class="section_title">Visi Sekolah</h2>
				</div>
			</div>
		</div>
		
		<div class="row about_row">
			<!-- Kolom kiri: foto dan nama -->
			<div class="text-center">
				<h2><p><?= isset($misi['misi']) ? $misi['misi'] : '-'; ?></p></h2>
			</div>
		</div>

	</div>
</div>

<!-- end isi konten -->

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