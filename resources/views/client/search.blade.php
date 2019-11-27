@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="form-group">
              <label for="name">Search:</label>
              {!! Form::text('search',null,['class'=>'form-control search-query','placeholder'=>'Search clients by first name']) !!}
            </div>
            <hr>
            <div class="search_result">

            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

      function filter_clients(){
        var sch = $('.search-query').val();
        $.ajax({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/search',
            type: 'post',
            data: {sch:sch},
            success:function(data){
              $('.search_result').html(data);
            }
        });
      }

      $('.search-query').keyup(function(){
        filter_clients();
      });
      });

    </script>
