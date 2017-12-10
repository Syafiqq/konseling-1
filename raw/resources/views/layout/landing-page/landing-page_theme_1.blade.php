@extends('layout.bootstrap-landingpage')
<?php
/** @var \Collective\Html\HtmlBuilder $html */
$html = \Collective\Html\HtmlFacade::getFacadeRoot();
?>
@section('head-title')
    <title>APLAS</title>
@endsection

@section('head-description')
    <meta name="description" content="APLAS">
@endsection

@section('body-content')
    @parent
    <a class="menu-toggle rounded" href="#">
        <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a class="js-scroll-trigger" href="#page-top">Academic Planning Skill</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="js-scroll-trigger" href="#page-top">Beranda</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="js-scroll-trigger" href="#about">Pengantar</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="js-scroll-trigger" href="#services">Menggunakan Aplikasi</a>
            </li>
            <li class="sidebar-nav-item">
                <a class="js-scroll-trigger" href="#portfolio">Profil Pengembang</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
        <div class="container text-center my-auto">
            <h1 class="mb-1" style="font-family: Leckerli One,serif; font-style: italic; color: #fbc909!important;">Famima - APlaS</h1>
            <h3 class="mb-5">
                <i style="font-family: Caveat Brush,serif;">Aplikasi Inventori Academic Planning Skill Siswa SMA</i>
            </h3>
            <a class="btn btn-secondary btn-xl js-scroll-trigger" href="#about">Mulai Sekarang</a>
        </div>
        <div class="overlay"></div>
    </header>

    <!-- About -->
    <section style="padding-top: 3rem; background-color:#41344f !important;" class="content-section" id="about">
        <div class="container text-center" style="background-color:#41344f !important;">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2 style="color: #fbc909!important;font-family: Leckerli One,serif;">Mengantarkan anda memahami Academic Planning Skill</h2>
                    <br>
                    <p style="color: white; text-align: left; font-family: Caveat Brush,serif; font-size: 20px" class="lead mb-5">
                        Keterampilan membuat rencana adalah keterampilan yang dimiliki individu untuk menyelesaikan suatu tugas ke akhir yang diinginkan (capezio, 2004). Skill atau keterampilan adalah keahlian mengerjakan tugas secara mudah dan cermat (hendriani dan Nulhaqim, 2008 : 158).
                    </p>
                    <br>
                    <p style="color: white; text-align: left; font-family: Caveat Brush,serif; font-size: 20px" class="lead mb-5">
                        Perencanaan adalah menyiapkan dan menghubungkan pengetahuan yang terkait dengan kognitif, afektif, dan psikomotor. Di dalam suatu perencanaan ada unsur persiapan, menghubungkan dan mengembil keputusan. (cunningham dalam uno, 2009 :1). Menurut Robbins dan Coulter 1999 perencanaan adalah membangun keseluruhan strategi untuk mencapai suatu tujuan yang diharapkan , dan mengembangkan susunan rencana untuk mengintegrasikan dan mengkoordinasikan tindakan. Perencanaan adalah proses mengatur, menetapkan tujuan, membuat keseluruhan penilaian, dan pengembangan berbagai keseluruhan tindakan, untuk mencapai tujuan (Haynes dan mukherjee, 2001). Menurut (Robbins dan Coulter 1999) mendefinisikan perencanaan adalah membangun pengembangan keseluruhan strategi untuk mencapai suatu tujuan yang diharapkan, dan mengembangkan rencana hirarki untuk mengintegrasikan dan mengkoordinasikan aktivitas. Perencanaan meliputi menentukan tujuan ,menentukan metode/strategi tujuan, mencari sumber yang dibutuhkan, menentukan waktu pelaksanaan, membuat keputusan.
                    </p>
                    <br>
                    <p style="color: white; text-align: left; font-family: Caveat Brush,serif; font-size: 20px" class="lead mb-5">
                        Keterampilan perencanaan merupakan suatu perencanaan yang dimiliki oleh siswa terhadap tugas-tugas yang sudah menjadi tanggung jawabnya, untuk mneyeimbangkan antara keterampilan yang dimiliki siswa dan kedisiplinan siswa dalam melakukan perencanaan (seltzer & ozawa 2002).
                    </p>
                    <br>
                    <p style="color: white; text-align: left; font-family: Caveat Brush,serif; font-size: 20px" class="lead mb-5">
                        Berdasarkan beberapa definisi menurut tokoh diatas dapat disimpulkan bahwa Keterampilan perencanaan akademik adalah suatu keahlian memperediksi, mengukur, menyusun, mengantisipasi dan mengelola kemampuan akademik yang dimiliki oleh peserta didik untuk mencapai tujuan belajar yaitu mencapai perkembangan kognitif, afektif, dan psikomotorik.
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->

    <section style="padding-top: 1rem; padding-bottom: 2rem; height: 750px" class="content-section bg-primary text-white text-center" id="services">
        <section class="callout" style="height: 725px; padding: 275px 0">
            <div class="container text-center">
                <h3 class="mx-auto mb-5" style="font-family: Leckerli One,serif;color: black">
                    Aplikasi
                    <i>Famima</i>
                    - Inventori Academic Planning Skill
                </h3>
                <a class="btn btn-primary btn-xl" href="{{route('student.auth.register.create')}}">Daftar Akun Baru</a>
                <a class="btn btn-primary btn-xl" href="{{route('student.auth.login.get')}}">Masuk Akun</a>
            </div>
        </section>
    </section>

    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
        <div class="container">
            <div class="content-section-heading text-center">
                <h2>Profil Pengembang</h2>
                <h4 class="text-secondary mb-0" style="color: #480671!important;">Dosen Pembimbing dan Asisten</h4>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Dosen Pembimbing</h2>
                                <p style="font-weight: bold" class="mb-0">Prof. Dr. Nur Hidayah, M.Pd</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/prof.jpg')}}" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Asisten Dosen Pembimbing</h2>
                                <p style="font-weight: bold" class="mb-0">Juwita Finayanti, S.Pd</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/juwita.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Prof. Dr. Nur Hidayah, M.Pd</a>, Lahir di Gresik, 17 Agustus 1959 dan Bertempat tinggal di Perum Permata Hijau D/57. Memiliki Hobby Membaca dan Motto “ Be Your Self”. Telah selesai menempuh Pendidikan S-1, S-2, S-3 jurusan Bimbingan dan Konseling dan telah menjadi dosen dan guru besar Bimbingan dan Konseling Universitas Megeri Malang <br> email: {!! $html->mailto('nur.hidayah.fip@gmail.com', 'nur.hidayah.fip@gmail.com')!!}; phone: 082132852538</p><br>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Juwita Finayanti, S.Pd</a>, Lahir di Trenggalek, 4 Juni 1992 dan Bertempat tinggal di Ds. Prigi RT. 51/ RW. 10 Kec. Watulimo Kab. Trenggalek. Memiliki Hobby Travelling dan Motto ”Selalu berusaha dan semangat”. Telah selesai menempuh Pendidikan S-1 jurusan Bimbingan dan Konseling dan sedang menyelesaikan studi S-2 Bimbingan dan Konseling di Universitas Megeri Malang <br> email: {!! $html->mailto('juwitafina92@gmail.com', 'juwitafina92@gmail.com') !!}; phone: 085731290096</p><br>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="content-section-heading text-center">
                <h4 Style="margin-top: 3rem;" class="text-secondary mb-0" style="color: #480671!important;">FAMIMA - Tim Pengembang Inventori APlaS</h4>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Tim Pengembang - FAMIMA</h2>
                                <p style="font-weight: bold" class="mb-0">Aidatul Fikriyah</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/aidatul.jpg')}}" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Tim Pengembang- FAMIMA</h2>
                                <p style="font-weight: bold" class="mb-0">Fita Andriani</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/fita.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Aidatul Fikriyah</a>, Lahir di Demak, 21 April 1998 dan Bertempat tinggal di Kroya Selatan RT. 002 RW. 002 Gebangarum Kec. Bonang Kab. Demak. Memiliki Hobby Travelling dan Motto ”Mari bersama menjadi baik”.<br> email: {!! $html->mailto('aidatulfikriyah04@gmail.com', 'aidatulfikriyah04@gmail.com') !!}; phone: 089692023988</p><br>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Fita Andriani</a>, Lahir di Malang, 04 Agustus 1997 dan Bertempat tinggal di Jl. Candi Badut No. 74 Mojolangu Kec. Lowokwaru Kota Malang. Memiliki Hobby Travelling dan Motto “Do The Best be Success”.<br> email: {!! $html->mailto('andrianifita11@gmail.com', 'andrianifita11@gmail.com') !!}; phone: 081344848137</p><br>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Tim Pengembang - FAMIMA</h2>
                                <p style="font-weight: bold" class="mb-0">Mila Yunita</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/mila.jpg')}}" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Tim Pengembang- FAMIMA</h2>
                                <p style="font-weight: bold" class="mb-0">Mitha Silvia Yuhanata</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/mitha.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Mila Yunita</a>, Lahir di Kediri, 26 Juni 1998 dan Bertempat tinggal di Dsn. Jagalan RT 09/ RW. 05 Kanigoro Kec. Kras Kab. Kediri. Memiliki Hobby Menyanyi  dan Motto :”jadi apapun kamu suatu saat, tetaplah berjalan dimuka bumi dengan  menunduk”.<br> email: {!! $html->mailto('milayunita02@gmail.com', 'milayunita02@gmail.com') !!}; phone: 082234934715</p><br>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Mitha Silvia Yuhanata</a>, Lahir di Gresik, Tulungagung, 25 Mei 1997 dan Bertempat tinggal di Desa Sumberingin Kidul RT 01/ RW. 03 Kec. Ngunut Kab. Tulungagung. Memiliki Hobby Membaca dan Motto “Berusaha, berdoa, dan bekerja”. <br> email: {!! $html->mailto('silviamitha53@yahoo.com', 'silviamitha53@yahoo.com') !!}; phone: 085736056990</p><br>
                            </span>
                        </span>
                    </a>
                </div>
            </div>

            <div class="content-section-heading text-center">
                <h4 Style="margin-top: 3rem;" class="text-secondary mb-0" style="color: #480671!important;">Pengembang Aplikasi</h4>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Pengembang Aplikasi</h2>
                                <p style="font-weight: bold" class="mb-0">Muhammad Syafiq, S.Kom</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/S.jpg')}}" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item">
                        <span class="caption">
                            <span class="caption-content">
                                <h2>Pengembang Aplikasi</h2>
                                <p style="font-weight: bold" class="mb-0">Husni Hanafi, S.Pd</p>
                            </span>
                        </span>
                        <img class="img-responsive img-thumbnail" height="467px" src="{{asset('/assets/baked/landingpage/img/h.jpg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Muhammad Syafiq, S.Kom</a>, Lahir di Pasuruan, 16 Desember 1993 dan beralamat di Jl. Apel I No. 449 Bangil, Pasuruan. Memiliki Motto "Hidup Seperti LARRY". Telah menyelesaikan Pendidikan S-1 Teknik Informatika Universitas Brawijaya</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item2">
                        <span class="caption">
                            <span class="caption-content">
                                <p style="border:3px; border-style:dotted; border-color:white; padding: 1em;font-family: Viga,serif;" class="mb-0"><a style="font-weight: bold" class="mb-0">Husni Hanafi, S.Pd</a>, Lahir di Pasuruan, 19 Juni 1994 dan beralamat di Jl. Suro No. 40 Bangil, Pasuruan. Memiliki Motto "Berdamai Dengan Kecewa". Telah menyelesaikan Pendidikan S-1 Bimbingan dan Konseling Universitas Negeri Malang</p>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center" style="background-color: #342d57!important;">
        <div class="container">
            <ul class="list-inline mb-5">
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" style="background-color: #a79db1!important;" target="_blank" href="http://www.facebook.com">
                        <i class="icon-social-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" style="background-color: #a79db1!important;" target="_blank" href="http://www.twitter.com">
                        <i class="icon-social-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white" style="background-color: #a79db1!important;" target="_blank" href="http://www.instagram.com">
                        <i class="icon-social-instagram"></i>
                    </a>
                </li>
            </ul>
            <a class="text-muted small mb-0" style="color: white;">Copyright &copy;2017 by
                <a style="color: white;" href="{{route('root')}}"> FIMIMA - Academic Planning Skill</a>
            </a>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
@endsection



@section('head-css-post')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/css/layout/landing-page/landing-page_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/js/layout/landing-page/landing-page_theme_1.min.js')}}"></script>
@endsection
