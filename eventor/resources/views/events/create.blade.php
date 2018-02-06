@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Events</div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                        @include('partials.error')
                        <form method="post" action="{{url('events')}}">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name">
                                </div>

                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="date" name="date">
                                </div>

                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Duration</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="duration" name="duration">
                                </div>

                                <div class="form-group row" style="margin:1px;">
                                    <label for="organizator_id" class="col-sm-2 col-form-label col-form-label-lg">Organizator</label>
                                    <div class="col-sm-6">
                                        <select name="organizator_id" class="form-control">
                                            <?php foreach($organizators as $key => $value):?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" style="margin:1px;">
                                    <label for="sportstype_id" class="col-sm-2 col-form-label col-form-label-lg">Sportstypes</label>
                                    <div class="col-sm-6">
                                        <select name="sportstype_id" class="form-control">
                                            <?php foreach($sportstypes as $key => $value):?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
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