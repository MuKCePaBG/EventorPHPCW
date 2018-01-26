@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Organizations
                        <a href="{{ URL::to('organizations/create') }}" class="pull-right btn-sm btn-success" >Add a Organization</a>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Mission</th>
                                <th>Founder</th>
                                <th>Action</th>
                            </tr>
                        @foreach($organizations as $organizator)
                           <tr>
                               <td>{{$organizator->name}}</td>
                               <td>{{$organizator->mission}}</td>
                               <td>{{$organizator->founder}}</td>
                               <td>
                                   <a class="btn btn-primary" href="{{ URL::to('organizations/' . $organizator->id . '/edit') }}">Edit</a>
                                   <form action="{{action('OrganizationsController@destroy', $organizator->id )}}" method="post">
                                       {{csrf_field()}}
                                       <input name="_method" type="hidden" value="DELETE">
                                       <button class="btn btn-danger" type="submit">Delete</button>
                                   </form>

                               </td>
                           </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection