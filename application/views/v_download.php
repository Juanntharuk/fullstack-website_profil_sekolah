<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Download</li>
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
						<h2>Download Area</h2>
					</div>

					<div class="col-lg-12">
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th class="text-center" width="50px">No</th>
									<th class="text-center">Keterangan File</th>
									<th class="text-center" width="100px">Download</th>
								</tr>
							</thead>

							<tbody>
								<?php $no=1; foreach ($download as $key => $value) { ?>
									
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td><?= $value->ket_file ?></td>
									<td class="text-center"><a href="<?= base_url('file/'.$value->file); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a></td>
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
                    <div class="newsletter_content text-lg-left text-center">
                        <div class="newsletter_title">sign up for news and offers</div>
                        <div class="newsletter_subtitle">Subscribe to latest smartphones news & great deals we offer</div>
                    </div>

                    <!-- Newsletter Form -->
                    <div class="newsletter_form_container ml-lg-auto">
                        <form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                            <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
                            <button type="submit" class="newsletter_button">subscribe</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>