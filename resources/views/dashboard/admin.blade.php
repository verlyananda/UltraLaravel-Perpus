@extends('layouts.app')
@section('content')
   <section id="main-content">
          <section class="wrapper">

              <div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Dashboard</h2>
</div>
<div class="panel-body">
Selamat datang di Menu Admin Ultraviolet Perpus. Silahkan pilih menu yang diinginkan bos.
</div>
</div>
          </section>
      </section>


@endsection

@section('scripts')
     <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to UltraPerpus!',
            // (string | mandatory) the text inside the notification
            text: 'UltraPerpus v1.0 free version, for donation catch me on <a href="#" target="_blank" style="color:#ffd777">verlyananda@gmail.com / 089672377544</a> thanks.',
            // (string | optional) the image to display on the left
            image: 'css/theme/assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
    </script>
@endsection