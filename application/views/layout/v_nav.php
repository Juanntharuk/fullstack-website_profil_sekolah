<!-- Header Content -->
<div class="header_container">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
          <div class="logo_container">
            <a href="<?= base_url() ?>">
              <div class="logo_text">SMPN <span>Alok</span></div>
            </a>
          </div>
          <nav class="main_nav_contaner ml-auto">
            <ul class="main_nav">
              <li class>
                <a href="<?= base_url() ?>">Beranda</a></li>
              <!-- Dropdown Menu for Sekolah -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sekolah
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('home/sejarah_sekolah') ?>">Sejarah Sekolah</a>
                  <a class="dropdown-item" href="<?= base_url('home/guru') ?>">Guru</a>
                  <a class="dropdown-item" href="<?= base_url('home/visi_misi') ?>">Visi & Misi</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kegiatan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url('home/ekstrakurikuler') ?>">Ekstrakurikuler</a>
                  <a class="dropdown-item" href="<?= base_url('home/prestasi') ?>">Prestasi</a>
                </div>
              </li>
              <li><a href="<?= base_url('home/gallery') ?>">Gallery</a></li>
              <li><a href="<?= base_url('home/pengumuman') ?>">Pengumuman</a></li>
              <li><a href="<?= base_url('home/kontak') ?>">Kontak</a></li>
            </ul>

            <!-- Hamburger -->
            <div class="hamburger menu_mm">
              <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Header Search Panel -->
<div class="header_search_container">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
          <form action="#" class="header_search_form">
            <input type="search" class="search_input" placeholder="Search" required="required">
            <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>      
</div>  
</header>

<!-- Menu -->
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
  <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
  <div class="search">
    <form action="#" class="header_search_form menu_mm">
      <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
      <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
      </button>
    </form>
  </div>
  <nav class="menu_nav">
    <ul class="menu_mm">
      <li class="menu_mm"><a href="index.html">Home</a></li>
      <li class="menu_mm"><a href="#">Sekolah</a></li>
      <li class="menu_mm"><a href="#">Kegiatan</a></li>
      <li class="menu_mm"><a href="#">Gallery</a></li>
      <li class="menu_mm"><a href="#">Pengumuman</a></li>
      <li class="menu_mm"><a href="contact.html">Kontak</a></li>
    </ul>
  </nav>
</div>
