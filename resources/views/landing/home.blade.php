@extends('layouts.main')

@section('title', 'Welcome to Wordella')

@section('content')
  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Our Courses</span>
                <h2>Learn English More Easily with Wordella Tutors</h2>
                <p>Temukan cara belajar yang fleksibel, menyenangkan, dan tetap fokus pada hasil. Mulai sekarang bersama Wordella!</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="/login">Join Now!</a>
                  </div>
                  <div class="icon-button">
                    <a href="#about-us"><i class="fa fa-play"></i> What's Wordella?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Best Result</span>
                <h2>Master English with Wordella's Tutors</h2>
                <p>Tingkatkan kemampuanmu dengan metode efektif dan bimbingan tutor profesional yang siap membantumu setiap langkah.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="/register">Registration Now</a>
                  </div>
                  <div class="icon-button">
                    <a href="#about-us"><i class="fa fa-play"></i> What's the best result?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Online Course</span>
                <h2>Learning English Is Easier with Wordella by Your Side</h2>
                <p>Tidak perlu bingung lagi! Wordella hadir dengan materi interaktif dan jadwal fleksibel yang cocok dengan gaya hidupmu.</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="/login">Learn Now</a>
                  </div>
                  <div class="icon-button">
                    <a href="#about-us"><i class="fa fa-play"></i> Why Wordella?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section about-us" id="about-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-1">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Where should you start your English journey?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Mulai dari level dasar hingga mahir, <strong>WORDELLA </strong>menyediakan jalur pembelajaran yang disesuaikan dengan kebutuhanmu. Tes penempatan awal
                  <code>membantu</code> kamu memulai dari level yang tepat, tanpa merasa tertinggal ataupun terlalu mudah.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How can Wordella help you succeed?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dengan materi interaktif, latihan berulang, serta bimbingan langsung dari tutor profesional,  <strong>WORDELLA </strong>mendukungmu untuk berkembang cepat, percaya diri berbicara, menulis, dan memahami<code> Bahasa Inggris </code>secara menyeluruh.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why is Wordella your best choice to learn English?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>WORDELLA</strong> menggabungkan teknologi modern dan pendekatan pembelajaran yang humanis. Fleksibel, terstruktur, dan terbukti efektif—Wordella cocok untuk pelajar, profesional, maupun pemula.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Will you get full support from our tutors?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Ya! Tutor Wordella selalu siap membimbingmu.</strong> Kamu tidak akan belajar sendiri—setiap langkahmu didampingi dengan dukungan nyata.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>About Us</h6>
            <h2>Why Choose Wordella?</h2>
            <p>Belajar Inggris jadi mudah dan menyenangkan. Materi mingguan, tutor ahli, dan jalur belajar sesuai kebutuhanmu—langsung terasa manfaatnya!</p>
            <div class="main-button">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="150" data-speed="1000"></h2>
                   <p class="count-text ">Happy Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="804" data-speed="1000"></h2>
                  <p class="count-text ">Course Hours</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="50" data-speed="1000"></h2>
                  <p class="count-text ">Employed Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="15" data-speed="1000"></h2>
                  <p class="count-text ">Years Experience</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="team section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="{{ asset('scholar') }}/assets/images/tutor1.jpeg" alt="">
              <span class="category">Grammar Specialist</span>
              <h4>Sophia Rose</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="{{ asset('scholar') }}/assets/images/tutor2.jpeg" alt="">
              <span class="category">Writing Instructor</span>
              <h4>Cindy Walker</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="{{ asset('scholar') }}/assets/images/tutor3.jpeg" alt="">
              <span class="category">Writing Instructor</span>
              <h4>Stella Blair</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="{{ asset('scholar') }}/assets/images/tutor4.jpeg" alt="">
              <span class="category">Reading Mentor</span>
              <h4>David Hutson</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

  <div class="section testimonials" id="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="owl-carousel owl-testimonials">
            <div class="item">
              <p>“Kursus ini benar-benar membantu aku improve my grammar dan vocabulary dengan cara yang fun banget. Highly recommended buat yang pengen belajar bahasa Inggris tanpa stress!”</p>
              <div class="author">
                <img src="{{ asset('scholar') }}/assets/images/testi.jpeg" alt="">
                <h4>James Mitchell</h4>
              </div>
            </div>
            <div class="item">
              <p>“The tutors are sangat supportive dan sabar banget. Speaking skill aku jadi lebih percaya diri setelah ikut program ini. Thanks a lot!”</p>
              <div class="author">
                <img src="{{ asset('scholar') }}/assets/images/testi3.jpeg" alt="">
                <h4>Emily Carter</h4>
              </div>
            </div>
            <div class="item">
              <p>“I love how the courses are structured. Materi lengkap, mudah diikuti, dan cocok buat pemula. Pokoknya belajar jadi lebih enjoyable!”</p>
              <div class="author">
                <img src="{{ asset('scholar') }}/assets/images/testi2.jpeg" alt="">
                <h4>Olivia Bennett</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>TESTIMONIALS</h6>
            <h2>Apa kata mereka tentang kami?</h2>
            <p>Bergabunglah dengan ribuan pelajar yang sudah merasakan manfaat belajar bahasa Inggris dengan metode kami yang unik dan efektif.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section events" id="course">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Mulai Belajar sekarang</h6>
            <h2>Pilih Paket Belajar Sesuai Targetmu</h2>
            <p>Sesuaikan level belajarmu dengan tujuan dan kebutuhanmu.</p>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="{{ asset('scholar') }}/assets/images/level2.jpeg" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Basic</span>
                    <h4>12 Modul Mingguan</h4>
                  </li>
                  <li>
                    <span>Bonus:</span>
                    <h6>Quiz 2 Kali</h6>
                    <h6>Sertifikat Digital</h6>
                  </li>
                  <li>
                    <span>Durasi:</span>
                    <h6>3 Bulan</h6>
                  </li>
                  <li>
                    <h4>FREE</h4>
                  </li>
                </ul>
                <a href="{{ url('/register') }}"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="{{ asset('scholar') }}/assets/images/level3.jpeg" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Intermediate</span>
                    <h4>12 Modul Mingguan</h4>
                  </li>
                  <li>
                    <span>Bonus:</span>
                    <h6>Quiz 4 Kali</h6>
                    <h6>Sertifikat Digital</h6>
                  </li>
                  <li>
                    <span>Durasi:</span>
                    <h6>3 Bulan</h6>
                  </li>
                  <li>
                    <h4>FREE</h4>
                  </li>
                </ul>
                <a href="{{ url('/register') }}"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="{{ asset('scholar') }}/assets/images/level4.jpeg" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Advanced</span>
                    <h4>12 Modul Mingguan</h4>
                  </li>
                  <li>
                    <span>Bonus:</span>
                    <h6>Quiz 6 Kali</h6>
                    <h6>Sertifikat Digital</h6>
                  </li>
                  <li>
                    <span>Durasi:</span>
                    <h6>3 Bulan</h6>
                  </li>
                  <li>
                    <h4>FREE</h4>
                  </li>
                </ul>
                <a href="{{ url('/register') }}"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection