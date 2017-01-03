@extends('layouts.app')

@section('content')
 <section id="main-content">
          <section class="wrapper">

            
<div class="container">
    <div class="row">
  <br>
      <div class="col-md-10">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Daftar Buku</h2>
          </div>

          <div class="panel-body">
            {!! $html->table(['class'=>'table-striped']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
          </section>
      </section>

  
@endsection

@section('scripts')
  {!! $html->scripts() !!}
@endsection

