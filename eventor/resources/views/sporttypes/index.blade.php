@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Sportstypes
                        <a href="{{ URL::to('sporttypes/create') }}" class="pull-right btn-sm btn-success" >Add a Sporttype</a>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach($sportstype as $sporttype)
                                <tr>
                                    <td>{{$sporttype->name}}</td>
                                    <td>{{$sporttype->description}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ URL::to('sporttypes/' . $sporttype->id . '/edit') }}">Edit</a>
                                        <form action="{{action('SporttypeController@destroy', $sporttype->id )}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="col-md-4 col-md-offset-4">{{ $sportstype->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection