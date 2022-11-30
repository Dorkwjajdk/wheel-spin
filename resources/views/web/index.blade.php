@extends('web.base')
@section('content')
    
 <!-- SOUND TRACK -->
 @if($spin=="false")

  <embed src="{{Helper::content()['music']}}" loop="true" autostart="true" width="2" height="0" hidden>
    <audio controls autoplay hidden id="my_audio" loop="loop">
        <source src="{{Helper::content()['music']}}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

  @endif
        	
<div id="popup-container-history" class="popup-container" style="display: none;">
  <div id="popup-body" class="popup-body" style="height: 563px;">
      <div class="popup-close" onclick="close_popup_history()"><center><b>x</b></center></div>
      <div id="popup-header" class="popup-header">
          <center><h6 id="title-popup-win" style="padding: 10px;"><b>RIWAYAT SPIN</b></h6></center>
      </div>
      
      <div style="overflow-y: scroll;height: 91.5%;width: 100%;">
          <div style="padding: 5px;">
            <table style="width: 100%;">
              <thead>
                <tr>
                  <th align="center" valign="center" style="width: 10%; text-align: center;">NO</th>
                  <th align="center" valign="center" style="width: 50%;">NAME</th>
                  <th align="center" valign="center" style="width: 40%; text-align: center;">PRIZE</th>
                </tr>
              </thead>
              <tbody id="history-container">
              @php
                  $n = 1;
              @endphp
              @foreach($history as $his)
                <tr>
                  <td style="width: 10%; padding: 5px; text-align: center;">{{ $n++ }}</td>
                  <td style="width: 50%; padding: 5px;">{{ $his['nama'] }}</td>
                  <td style="width: 40%; padding: 5px; text-align: center;">{{ $his['prize'] }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
      </div>
  </div>
</div>

      <div class="container mt-20">
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif

              @if(session()->has('message'))

                <div class="alert alert-{{session('message_type')}} alert-dismissible fade show" role="alert">
                    <strong>{{session('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

              @endif
            </div>
        </div>
      </div>

      
  @if($spin=="false")
      <p class="h4 mb-4 font-weight-normal" style="color: white;">Masukkan Kode Tiket:</p>
      <form class="form-signin" method="POST" action="{{url('run/draw')}}">
        @csrf

        <div class="form-group row">
          <div class="col-sm-12">
            <input type="text" name="nama" placeholder="Nama" class="form-control form-control-lg" id="id_nama" required>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-12">
            <input type="text" name="code" placeholder="code / voucher" class="form-control form-control-lg" id="id_code" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6" style="margin-top: 20px;">
              <button type="submit" class="submit">
                <b>SPIN</b>
              </button>
          </div>
          <div class="col-md-6" style="margin-top: 20px;">
            <input type="button" value="RIWAYAT" class="submit" onclick="getHistory()" return false;></input>
          </div>
        </div>
      </form>

      <div class="row">

          <div class="col-md-12" style="margin-top: 20px;">
                <input type="button" value="Syarat & Ketentuan" class="submit" onclick="syarat()"return false;></input>
          </div>

          <div class="col-md-12" style="margin-top: 20px;">
            <input type="button" value="KEMBALI KE SITUS" class="btn-back" 
            onClick="location.href='https://langkah4d.net/'"></input>
         </div>

      </div>
  @endif

@push('js')
  <script type="text/javascript">
    function getCurrentURL () {
      return window.location.href
    }
    const url = getCurrentURL();
    const sp = url.split('/')[3];
    if (sp != 'draw') {
      introRotation(3600);
    }
  </script>
  <script type="text/javascript">
    $('button[type="submit"]').click(function() {
      document.getElementById('id_nama').required = true;
      document.getElementById('id_code').required = true;
    });
    function getHistory(){
        document.getElementById('id_nama').required = false;
        document.getElementById('id_code').required = false;
        $("#popup-container-history").fadeIn(1000);
    }
    
    function syarat(){
      Swal.fire({
        html:
          '<div style="border:solid black 1px">'+
          '<strong>{{Helper::content()["name"]}}</strong> <br>'+
          '<p style="text-align: center;font-size: 14px">Syarat dan ketentuan</p>' +
          '<ol>'+
            @foreach($faq->toArray() as $f)
              '<li style="text-align: left;font-size: 12px;margin-top: 0px;">{{$f["content"]}}</li>'+
           @endforeach
		  '</ol>'+
          '</div>'+
          '<table class="table table-bordered" style="margin-top:10px">'+
          '<tr><th style="text-align: center;font-size: 16px">Hadiah lucky {{Helper::content()["name"]}}</th></tr>'+
          @foreach($prize as $key)
            '<tr><td style="text-align: center;font-size: 12px">{{$key->label}}</td></tr>'+
          @endforeach
          '</table>',
          showCloseButton: true,
          confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> saya setuju!',
          confirmButtonColor: '#be4d25',
      })
    }
  </script>
  <script type="text/javascript">
    function close_popup_history() {
      $("#popup-container-history").fadeOut(500);
      document.getElementById('id_nama').required = true;
      document.getElementById('id_code').required = true;
		}
  </script>
  @if($spin == "true")
    <script type="text/javascript">
        console.log("Spin the Wheel!", {{ $result }});
        spin("{{url('draw_result/'.$id_draw.'/'.$result)}}", {{ $rotation }});
    </script>
  @else
    <script type="text/javascript">
         introRotation("{{Helper::rumus_rotasi_start()}}")
    </script>

  @endif

  @if($spin=="false")
  <script type="text/javascript">
    let music_home = document.getElementById("my_audio"); 
    document.addEventListener("DOMContentLoaded", function(){
       $(".swal2-modal").css('background-color', '#000');
       Swal.fire({
            title: 'Selamat Datang di Lucky Spin Wheels!!!',
            html: '<p>Kami selaku pihak Lucky Spin Wheels terlebih dahulu mengucapkan selamat kepada setiap member yang</p>'+
                  '<p>memiliki tiket untuk berkesempatan memenangkan hadiah menarik yang ditawarkan di Lucky Spin Wheels</p>'+
                  '<p>Lucky Spin ini, Untuk kalian yang memiliki tiket silahkan masukkan ke kolom kode yang disediakan dan klik</p>'+
                  '<p>tombol spin untuk memulai peruntungan anda.!!!</p>',
            confirmButtonText:
            '<i class="fa fa-like"></i>Thank You',
            confirmButtonColor: 'goldenrod',
          }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
          music_home.play(); 
        }})
    
    
    });
  </script>
  @endif



  @endpush
  

  @endsection
