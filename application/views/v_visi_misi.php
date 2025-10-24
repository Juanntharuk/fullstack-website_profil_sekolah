<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Visi & Misi Sekolah</li>
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
                    <h2 class="section_title">Visi & Misi Sekolah</h2>
                </div>
            </div>
        </div>

        <div class="row about_row">
            <!-- Visi -->
            <div class="col-lg-12 text-center mb-4">
                <h3>Visi</h3>
                <p><?= !empty($identitas['visi']) ? $identitas['visi'] : '-' ?></p>
            </div>

            <!-- Misi -->
            <div class="col-lg-12 mb-4">
                <h3 class="text-center">Misi</h3><br>
                <h6 class="text-left"><?= !empty($identitas['misi']) ? $identitas['misi'] : '-' ?></h6>
            </div>

        </div>
    </div>
</div>
<!-- end isi konten -->

<div class="newsletter">
    <div class="newsletter_background parallax-window" 
         data-parallax="scroll" 
         data-image-src="<?= base_url() ?>template/front-end/images/newsletter.jpg" 
         data-speed="0.8"></div>
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
