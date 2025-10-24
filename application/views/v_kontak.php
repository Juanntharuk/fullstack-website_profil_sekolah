<!-- Home -->
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Kontak</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<!-- Contact Section -->
<div class="contact_info_container py-5" style="margin-bottom: 80px;"> <!-- jarak ke newsletter -->
    <div class="container">

        <!-- Judul Halaman -->
        <div class="row mb-5 text-center">
            <div class="col">
                <h2 class="fw-bold" style="font-size: 2rem;">Kontak</h2>
                <p class="text-muted">Hubungi kami melalui form di bawah atau lihat lokasi sekolah di peta.</p>
            </div>
        </div>

        <div class="row align-items-stretch">

            <!-- Contact Form -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <div class="contact_form p-4 shadow-sm rounded bg-white h-100">
                    <h3 class="contact_info_title mb-4">Contact Form</h3>
                    <form action="https://formsubmit.co/tharukemanuel@gmail.com" method="POST">
                        <input type="hidden" name="_next" value="http://localhost/smp-alok/success.html">
                        <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form_title mb-1">Name</label>
                            <input type="text" class="form-control comment_input" name="Nama" required>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form_title mb-1">Email</label>
                            <input type="email" class="form-control comment_input" name="Email" required>
                        </div>

                        <!-- PESAN -->
                        <div class="mb-3">
                            <label class="form_title mb-1">Message</label>
                            <textarea class="form-control comment_input comment_textarea" name="Pesan" rows="5" required></textarea>
                        </div>

                        <!-- Optional Settings -->
                        <input type="hidden" name="_subject" value="Pesan Baru dari Website SMP Negeri Alok Mof!">
                        <input type="hidden" name="_captcha" value="false">
                        <input type="hidden" name="_template" value="table">
                        <!-- Redirect setelah sukses (ganti URL sesuai kebutuhan) -->
                        <!-- <input type="hidden" name="_next" value="https://domainwebsitemu.com/terkirim.html"> --> -->

                        <button type="submit" class="btn btn-primary mt-2">Submit Now</button>
                    </form>

                </div>
            </div>

            <!-- Google Map -->
            <div class="col-lg-6 col-md-12">
                <div class="contact_info p-4 shadow-sm rounded bg-white h-100">
                    <h3 class="contact_info_title mb-4">Location</h3>
                    <div class="map_container" style="height: 100%; min-height: 350px;">
                        <iframe 
                            id="map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31584.32126525711!2d122.2079018!3d-8.6196749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d1afc74b28f17ff%3A0x6f4e940a36e0f223!2sMaumere%2C%20Kabupaten%20Sikka%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sen!2sid!4v1696187790780!5m2!1sen!2sid" 
                            width="100%" 
                            height="350" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
