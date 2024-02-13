<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{Helper::content()['name']}}</title>
  <meta charset="UTF-8"/>
  <link href="{{url('assets/wheel/css/styles.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{url('assets/wheel/css/animasi.css')}}" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<link rel="icon" type="image/png" sizes="16x16" href="{{Helper::content()['favicon']}}">

  <link rel="manifest" href="{{url('assets/wheel/img/favicon.ico/manifest.json')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{url('assets/wheel/img/favicon.ico/ms-icon-144x144.png')}}">

  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500;700;800&family=Public+Sans:wght@300;400;700&display=swap" rel="stylesheet">

  <body style="background-image: url('{{Helper::content()['background']}}'); background-position: center; background-size: cover; background-repeat: no-repeat; background-color: black;background-attachment: fixed;">

</head>
<style>
  .wheelText {
  font-size: 16px;
  font-family: 'Prompt', sans-serif;
  font-weight:900;
  text-align: center;
  color: aqua
}

.btn-back{
    font-size: 22px;
    width: 100%;
    background: linear-gradient(to bottom,  #c1c1f5 16%, #E6E6FA 44%, #7e7eff 99%);
    color:rgb(0, 0, 0);
    padding: 5px 20px;
    border:0px;
    border-radius: 30px;
    font-weight: bolder;
}

button.submit {
    font-size: 22px;
    width: 100%;
    background: linear-gradient(to bottom, #FFD700 16%, #ffd563 44%, #e9890c 99%);
    color:rgb(0, 0, 0);
    padding: 5px 20px;
    border:0px;
    box-shadow: 2px 2px 2px #c3914c;
    border-radius: 30px;
}

input.submit {
    font-size: 22px;
    width: 100%;
    background: linear-gradient(#FFD700, #ffd563, #e9890c);
    color:rgb(0, 0, 0);
    padding: 5px 20px;
    border:0px;
    box-shadow: 2px 2px 2px #c3914c;
    border-radius: 30px;
    font-weight: bolder;
}

.popup-container{
	width: 100%;
    height: 100%;
    position: fixed;
    z-index: 1000;
    background: #080808b0;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.popup-body{
    width: 347px;
    height: 600px;
    margin: 2% auto;
    background: #313131;
    border-radius: 0px;
    color: white;
}

@media (max-width: 992px){
    .popup-body{
        margin: 10% auto;
    }
}

@media (max-width: 768px){
  .logo-pc{
      display:none!important;
  }

  .logo-mobile{
    display:block!important;
    width: 80%;
    margin-top: 10px;
  }
}

@media (min-width: 769px){
  .logo-pc{
      display:block!important;
  }

  .max-c{
    margin:0px!important;
    padding:0px!important;
  }

  .logo-mobile{
    display:none!important;
  }
}


.popup-header{
    height: 48px;
    width: 100%;
    background: #754116;
    float: left;
}

.popup-close{
    cursor: pointer;
    width: 36px;
    height: 36px;
    background: white;
    color: black;
    float: right;
    padding: 5px;
    border-radius: 100px;
    position: absolute;
    margin-top: -10px;
    margin-left: -9px;
}

.popup-container-ads{
    background-repeat: no-repeat;
    margin: 10% auto;
    border-radius: 18px;
    background-size: 100%;
}

</style>

<body class="text-center" onload="zoom()">

  <div class="container">
<div class="row h-100 mx-auto" style="height:100%!important">
  <a href="{{url('/')}}" style="margin-bottom: 10px">

    <img alt="Voucher Wheel logo" class="mx-auto d-block img-fluid logo-mobile" src="{{Helper::content()['logo']}}">

  </a>
  <!-- Wheel -->
  <div class="col-sm-7 my-auto" style="padding:0px">
    <div class="row no-gutters no-border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col d-flex flex-column position-static">
        <div id="chart"></div>
      </div>
    </div>
  </div>

  <!-- Form -->
  <div class="col-sm-5 my-auto">
    <div class="row no-gutters no-border rounded overflow-hidden flex-md-row mb-4 ml-4 mr-4 shadow-sm h-md-250 position-relative">
    <div class="container">
      <a href="{{url('/')}}">
        <img alt="Voucher Wheel logo" class="mx-auto d-block img-fluid logo-pc" src="{{Helper::content()['logo']}}">
      </a>
      
      @yield('content')
      
    </div>
  </div>
  </div>
</div>

</div>


<script charset="utf-8" src="https://d3js.org/d3.v3.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/d3-ease@3"></script>
<script src="{{url('assets/wheel/js/confetti.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
  $(function() {
      // do stuff to load your form fields
    let mql = window.matchMedia('(max-width: 768px)');
    // Check if the media query is true
    if (mql.matches) {
      shape = document.getElementsByTagName("svg")[0];
      shape.setAttribute("viewBox", "110 50 580 710"); 
    }

    let mql2 = window.matchMedia('(min-width: 768px)');
    // Check if the media query is true
    if (mql2.matches) {
      shape = document.getElementsByTagName("svg")[0];
      shape.setAttribute("viewBox", "0 0 800 800"); 
    }
});

</script>

<script type="text/javascript">
let url_wheel = "<?php echo Helper::content()['wheel']; ?>";

let url_outwheel = "<?php echo Helper::content()['outwheel']; ?>";

let music = "<?php echo Helper::content()['music_spin']; ?>";

let prizes = [
  @foreach($prize as $key)
    {
      label :"{{$key->label}}",
      winner:{{$key->winner}},
      sorter:{{$key->sorter}},
      total :{{$total}},

    },
  @endforeach
];


document.oncontextmenu = function (e) {e.preventDefault(); return false;}
            document.onkeydown = function (e) {
                if (event.keyCode == 123) {return false;}
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {return false;}
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {return false; }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {return false; }
                if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {return false;}
            }

</script>
<script type="text/javascript">
  function zoom() {
      document.body.style.zoom = "90%" 
  }
</script>

<script src="{{url('assets/wheel/js/script.js')}}?version=1"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@stack('js')

</body>
</html>


