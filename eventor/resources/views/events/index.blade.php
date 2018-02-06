@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #524c20"><span style="color:#f0ad4e">Events</span>
                        <a href="{{ URL::to('events/create') }}" class="pull-right btn-sm btn-success">Add a Event</a>
                    </div>

                    <div class="panel-body" style="background: #7cd16e">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Duration</th>
                                <th>Sportstype</th>
                                <th>Organizator</th>
                            </tr>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->duration}}</td>
                                    <td>{{$event->sportstypes->name}}</td>
                                    <td>{{$event->organizators->name}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ URL::to('events/' . $event->id . '/edit') }}">Edit</a>
                                        <form action="{{action('EventsController@destroy', $event->id )}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="col-md-12 text-right">
                            <form action="{{route('events.index')}}" method="get" class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="s" placeholder="Search event" value="{{isset($s) ? $s : ''}}">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 col-md-offset-4">{{ $events->appends(['s'=>$s])->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection