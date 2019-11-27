@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">List of all clients!</div>

        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Address</th>
                <th scope="col">Telephone</th>
                <th scope="col">Birthday</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clients as $client)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$client->firstname}}</td>
                <td>{{$client->lastname}}</td>
                <td>{{$client->address}}</td>
                <td>{{$client->telephone}}</td>
                <td>{{$client->birthday}}</td>
                <td> <a class="btn btn-primary" href="/client/{{$client->id}}/edit">Edit</a> </td>
                <td>
                  {!! Form::open(['method'=>'DELETE', 'action'=>['ClientController@destroy',$client->id]]) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
               </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
