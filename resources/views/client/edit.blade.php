@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          {!! Form::model($client,['method'=>'PATCH','action'=>['ClientController@update',$client]]) !!}
          @csrf
            <div class="form-group">
              <label for="name">First name: (*)</label>
              {!! Form::text('firstname',null,['class'=>'form-control','placeholder'=>'Enter first name']) !!}
            </div>
            <div class="form-group">
              <label for="name">Last name: (*)</label>
              {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Enter last name']) !!}
            </div>
            <div class="form-group">
              <label for="name">Address:</label>
              {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter address']) !!}
            </div>
            <div class="form-group">
              <label for="name">Phone number:</label>
              {!! Form::text('telephone',null,['class'=>'form-control','placeholder'=>'Enter phone number']) !!}
            </div>
            <div class="form-group">
              <label for="name">Date of birth:</label>
              {!! Form::date('birthday',null,['class'=>'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
          {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
