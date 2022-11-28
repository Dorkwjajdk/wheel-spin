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
    background: linear-gradient(to bottom, #05c330 16%, #05c330 44%, #05c330 99%);
    color:rgb(0, 0, 0);
    padding: 5px 15px;
    border:0px;
    box-shadow: 2px 2px 2px grey;
    border-radius: 30px;
    font-weight: bolder;
}

button.submit {
    font-size: 22px;
    width: 100%;
    background: linear-gradient(to bottom, #ecad00 16%, #ffd563 44%, #ecad00 99%);
    color:rgb(0, 0, 0);
    padding: 5px 15px;
    border:0px;
    box-shadow: 2px 2px 2px grey;
    border-radius: 30px;
}

input.submit {
    font-size: 22px;
    width: 100%;
    background: linear-gradient(to bottom, #ecad00 16%, #ffd563 44%, #ecad00 99%);
    color:rgb(0, 0, 0);
    padding: 5px 15px;
    border:0px;
    box-shadow: 2px 2px 2px grey;
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

<body class="text-center">

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

<!-- LIVE CHAT -->
<!-- Start of LiveChat (www.livechat.com) code -->
<script>
  window.__lc = window.__lc || {};
  window.__lc.license = 14765202;
  ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/14765202/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->


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

</script>
<script src="{{url('assets/wheel/js/script.js')}}?version=1"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@stack('js')

</body>
</html>


