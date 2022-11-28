@extends('web.base')
@section('content')

  @if( $result_prize->winner==1)
        <h1 class="blinking h1 mt-2 mb-5 font-weight-normal" style="color: white; text-transform:uppercase;">
        Congratulations!!</h1>

        <h4 class="h4 mb-4 font-weight-normal" style="color: white;">
        The administrator is already aware of your prize and will contact you shortly to let you know how to receive it.
        Your details were successfully stored:</h4>

        <div class="card mb-4">
        <div class="card-body">
            <p style="color: black" class="col-form-label col-form-label-lg">nama: {{ $result_draw->nama }}</p>
            <p style="color: black" class="col-form-label col-form-label-lg">prize: {{ $result_prize->label }}</p>
        </div>
        </div>

        <a class="mt2 btn btn-lg btn-primary btn-block" href="{{url('/')}}">Back To Home</a>

@else
        @if( $result_prize->try_again == 1)
            <h4 class="h4 mb-5 font-weight-normal" style="color: white;">
                You have just won a free spin! Please click on the button below to try again!</h4>

            <div class="mt-5">
                <form class="form-signin" method="POST" action="{{url('run/draw')}}">
                @csrf
                <input type="hidden" name="nama" maxlength="254" class="form-control form-control-lg" required=""
                        id="id_nama" value="{{ $result_draw->nama }}">
                <input type="hidden" name="code" maxlength="8" class="form-control form-control-lg" required="" id="id_code"
                        value="{{ $result_draw->code }}">
                <button class="mt2 btn btn-lg btn-primary btn-block" type="submit">Spin again for free!</button>
                </form>
            </div>
        @else
            <h1 class="h1 mt-2 mb-5 font-weight-normal" style="color: white; text-transform:uppercase;">
                Better luck next time!
            </h1>

            <h4 class="h4 mb-5 font-weight-normal" style="color: white;">
                If you have more code vouchers to use, please click on the button below to return to the main page.</h4>
        
            <div class="mt-5">
                <a class="mt2 btn btn-lg btn-primary btn-block" href="{{url('/')}}">Enter a new code!</a>
            </div>
      @endif
@endif

@if($result_prize->winner==1)
<audio autoplay="true" loop src="{{Helper::content()['music_win']}}">
    Update your browser. Your browser does not support HTML audio
  </audio>
  <div class="hidden">
      <audio id="spinAudio" src="{{Helper::content()['music_win']}}"></audio>
  </div>
@else

<audio autoplay="true" loop src="{{Helper::content()['music_lose']}}">
    Update your browser. Your browser does not support HTML audio
  </audio>
  <div class="hidden">
      <audio id="spinAudio" src="{{Helper::content()['music_lose']}}"></audio>
  </div>

@endif

@push('js')
  <script type="text/javascript">
      @if($result_prize->winner==1)
          confetti.start();
      @endif

      console.log("Return to result", "{{$result_draw->rotation}}");
      spinToResult("{{ $result_draw->rotation }}");
  </script>

@endpush



@endsection