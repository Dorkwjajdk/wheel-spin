<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')

@push('head')
    <style>
        .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
    </style>
@endpush

    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{$draw}}</span>
        <span class="count-name">Total Ticket</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-ticket"></i>
        <span class="count-numbers">{{$win}}</span>
        <span class="count-name">Total Win</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-database"></i>
        <span class="count-numbers">{{$lose}}</span>
        <span class="count-name">Total Lost</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{$users}}</span>
        <span class="count-name">Pengunjung Spin</span>
      </div>
    </div>
  </div>

  <div class="container" style="margin-top: 20px">
  <div class="row">
    <div class="col-sm-12" style="background-color: #fff;padding:10px">
        <div>
            <p><b>History Spin Ticket<b></p>
        </div>
        <div class="table-responsive-sm">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">nama</th>
                <th scope="col">code</th>
                <th scope="col">prize</th>
                <th scope="col">date</th>
              </tr>
            </thead>
            <tbody>
            @foreach($history as $key)
              <tr>
                <td>{{$key['nama']}}</td>
                <td>{{$key['code']}}</td>
                <td>{{$key['prize']}}</td>
                <td>{{$key['created_at']}}</td>
              </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        <p>{!! urldecode(str_replace("/?","?",$history->appends(Request::all())->render())) !!}</p>
    </div>
  </div>
</div>
@push('bottom')
    
@endpush

@endsection