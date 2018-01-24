<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Bootstrap CSS -->
  <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}">
  <!-- Plugin -->
  <link rel="stylesheet" type="text/css" href="{{asset('plugin/datepicker/datepicker3.css')}}">
  <link rel="stylesheet" href="{{asset('plugin/select2/select2.min.css')}}">

</head>
<body>
  <div class="wrapper">
    <!-- Sidebar Holder -->

    <nav style="background-color: #6666CC;" id="sidebar">
      <div class="sidebar-header">
        <center><h3 style="margin: 20px auto;"><a href="{{ url('/') }}" title=""><i class="glyphicon glyphicon-education"></i>&nbsp; SIPENMASI</a></h3></center>
      </div>

      <ul class="list-unstyled components">
        @guest
        <li>
          <a href="{{url('syarat')}}"><i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp; Home</a>
        </li>
        <li>
          <a href="{{url('prosedur')}}"><i class="glyphicon glyphicon-duplicate"></i>&nbsp;&nbsp; Prosedur Penilaian</a>
        </li>
        <li>
          <a href="{{url('pendaftaran')}}"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp; Pendaftaran</a>
        </li>
        @endguest
        @auth
        @if(Auth::user()->hak_akses == 'admin' || Auth::user()->hak_akses == 'penilai')
        <li>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp; Input Data</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li><a href="{{ url('antarkriteria')}}"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp; Bobot Antar Kriteria</a></li>
            <li><a href="{{ url('datakriteria') }}"><i class="glyphicon glyphicon-align-justify"></i>&nbsp;&nbsp; Persentase Kriteria</a></li>
            <li><a href="{{url('alternatif')}}"><i class="glyphicon glyphicon-th"></i>&nbsp;&nbsp; Nilai Peserta</a></li>
          </ul>
        </li>
        <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-book"></i>&nbsp;&nbsp; Analisa Data</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li style="background-color: #339999;"><a href="{{ url('eigenkriteria')}}"><i class="glyphicon glyphicon-asterisk"></i>&nbsp;&nbsp; Eigen Kriteria</a></li>
            <li><a href="{{url('walternatif')}}"><i class="glyphicon glyphicon-fire"></i>&nbsp;&nbsp; Eigen Alternatif</a></li>
            <li><a href="{{url('alternatifkriteria')}}"><i class="glyphicon glyphicon-leaf"></i>&nbsp;&nbsp; Eigen Kriteria Alternatif</a></li>
            <li><a href="{{url('rekomendasi')}}"><i class="glyphicon glyphicon-move"></i>&nbsp;&nbsp; Rekomendasi Alternatif</a></li>
          </ul>
        </li>
        @endif
        @endauth
        @auth
        @if (Auth::user()->hak_akses == 'admin')
        <li>
          <a href="#tesSubmenu" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp; Data Master</a>
          <ul class="collapse list-unstyled" id="tesSubmenu">
            <li><a href="{{ url('userdata') }}"><i class="glyphicon glyphicon-certificate"></i>&nbsp;&nbsp; Data Pengguna</a></li>
            <li><a href="{{ url('peserta')}}"><i class="glyphicon glyphicon-adjust"></i>&nbsp;&nbsp; Data Peserta</a></li>
          </ul>
        </li>
        @endif
        @endauth
        <li>
          @guest
          <a href="{{url('login')}}"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp; Login</a>
          @else
          <li>
            <a href="#user" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp; {{ Auth::user()->name }}</a>
            <ul class="collapse list-unstyled" id="user">
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="glyphicon glyphicon-off"></i>&nbsp;&nbsp; Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
              </li>
            </ul>
          </li>
          @endguest
        </li>
      </ul>
    </nav>

    <div id="content">
      @yield('konten')
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

  <script type="text/javascript" href="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
  <script type="text/javascript" href="{{asset('js/popper.min.js')}}"></script>
  <script type="text/javascript" href="{{asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" href="{{asset('js/app.js')}}"></script>

  <!-- Plugin -->
  <script type="text/javascript" src="{{asset('plugin/datepicker/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('plugin/select2/select2.full.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('plugin/ckeditor/ckeditor.js')}}"></script>

  <script src="http://demo.expertphp.in/js/jquery.js"></script>
  <script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>

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

 <script type="text/javascript">  
    //Datepicker
    $(function(){
      $('#datepicker').datepicker({
        autoclose: true,
        format:"dd-mm-yyyy"
      });
    });

//Initialize Select2 Elements
$(function () {
  $(".select2").select2();
});

function konfirmasi()
{
 tanya = confirm("Anda Yakin Akan Menghapus Data Ini ?");
 if (tanya == true) return true;
 else return false;
}
</script>

<!-- search -->
<script>
  $(document).ready(function() {
    src = "{{ route('searchajax') }}";
    $("#search_text").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: src,
          dataType: "json",
          data: {
            term : request.term
          },
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 3,
    });
  });
</script>

</body>   
</html>