@extends('layouts.adminApp')

@section('title')
Update {{$person->id}}

@stop

@section('pageHeader')
Update {{$person->id}}
@stop

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
    <li class="breadcrumb-item active"> Updated {{$person->id}} </li>
</ul>
@stop
@section('content')
<section class="no-padding-top">
    <div class="row">
        <div class="col-lg-8 offset-md-2 offset-lg-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update</h4>
                </div>
                <div class="form">
                    <div class="content">
                        <form class="text-left form-validate" method="POST"
                            action="{{route('admin/person/update/update')}}">
                            <div class="card-body">
                                @csrf
                                    <input type="hidden" name="id" value="{{$person->id}}">
                                    <div class="row">
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>Name</label>
                                            <span style="color: red;" id="nameerror"></span>
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="{{ $person->name }}" autofocus>
                                        </div>
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>NIC</label>
                                            <span style="color: red;" id="nicerror"></span>
                                            <input id="nic" type="text" class="form-control" name="nic"
                                                value="{{ $person->nic }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>Date Of Birth</label>
                                            <span style="color: red;" id="doberror"></span>
                                            <input id="dob" type="date" class="form-control" name="dob"
                                                value="{{ $person->dob }}" autofocus>
                                        </div>
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>Age</label>
                                            <span style="color: red;" id="ageerror"></span>
                                            <input id="age" type="text" class="form-control" name="age"
                                                value="{{ $person->age }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>Religion</label>
                                            <span style="color: red;" id="relierror"></span>
                                            <input id="religion" type="text" class="form-control" name="religion"
                                                value="{{ $person->religion }}" autofocus>
                                        </div>
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>Address</label>
                                            <span style="color: red;" id="adderror"></span>
                                            <input id="address" type="text" class="form-control" name="address"
                                                value="{{ $person->address }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>Email Address </label>
                                            <span style="color: red;" id="emailerror"></span>
                                            <input id="email" type="email" class="form-control" name="email"
                                                value="{{ $person->email }}">
                                        </div>
                                        <div class="form-group-material col-lg-6 col-sm-12">
                                            <label>Mobile No </label>
                                            <span style="color: red;" id="nuerror"></span>
                                            <input id="telephone" value="{{ $person->telephone }}" type="number" class="form-control" name="telephone">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="form-group text-center">
                                            <input id="register" type="submit" value="Update" data-toggle="confirmation"
                                                data-title="Update?" class="btn btn-primary">
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
@section('javaScripts')
<script>
/**
 * notifications
 * getting error from session
 * getting success from session
 * if exists show using bootstrap notify
 */
@if(\Session::has('success'))

Messenger.options = {
        extraClasses: "messenger-fixed messenger-on-top  messenger-on-right",
        theme: "flat",
        messageDefaults: {
            showCloseButton: !0
        }
    },
    Messenger().post({
        message: "{{Session::get('success')}}",
        type: "success"
    });
@elseif(\Session::has('error'))

Messenger.options = {
        extraClasses: "messenger-fixed messenger-on-top  messenger-on-right",
        theme: "flat",
        messageDefaults: {
            showCloseButton: !0
        }
    },
    Messenger().post({
        message: "{{Session::get('error')}}",
        type: "error"
    });
@endif
</script>
@stop