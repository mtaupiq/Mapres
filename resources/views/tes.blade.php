<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}">


  </head>
  <body>
    <div >
            <!-- Sidebar Holder -->
            <nav class="navbar navbar-light" style="background-color: #6666CC;" id="sidebar">
                <div class="sidebar-header">
                    <h3>Bootstrap Sidebar</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Dummy Heading</p>
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Prosedur Penilaian</a>
                    </li>
                    <li>
                        <a href="#">Pendaftaran</a>
                    </li>
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Input Data</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Bobot Antar Kriteria</a></li>
                            <li><a href="#">Persentase Kriteria</a></li>
                            <li><a href="#">Nilai Peserta</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Analisa Data</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Eigen Kriteria</a></li>
                            <li><a href="#">Eigen Alternatif</a></li>
                            <li><a href="#">Eigen Kriteria Alternatif</a></li>
                            <li><a href="#">Rekomendasi Alternatif</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#tesSubmenu" data-toggle="collapse" aria-expanded="false">Data Master</a>
                        <ul class="collapse list-unstyled" id="tesSubmenu">
                            <li><a href="#">Data Pengguna</a></li>
                            <li><a href="#">Data Peserta</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<!-- <script type="text/javascript" href="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
    <script type="text/javascript" href="{{asset('js/popper.min.js')}}"></script>
        <script type="text/javascript" href="{{asset('js/bootstrap.min.js')}}"></script> -->

 
    <script type="text/javascript" href="{{asset('js/app.js')}}"></script>
    <!-- <script type="text/javascript" href="{{asset('js/bootstrap.js')}}"></script> -->
    <!-- <script type="text/javascript" href="{{asset('js/jquery-3.2.1.js')}}"></script> -->

    <script type="text/javascript">
             $(document).ready(function () {
                 $("#sidebar").niceScroll({
                     cursorcolor: '#53619d',
                     cursorwidth: 4,
                     cursorborder: 'none'
                 });

                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar, #content').toggleClass('active');
                     $('.collapse.in').toggleClass('in');
                     $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                 });
             });
         </script>
  </body>   
</html>