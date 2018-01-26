@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Organizations</div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                        @include('partials.error')
                        <form method="post" action="{{url('organizations')}}">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name">
                                </div>

                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Mission</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="mission" name="mission">
                                </div>

                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Founder</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="founder" name="founder">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection