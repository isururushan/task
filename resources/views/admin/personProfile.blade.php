@extends('layouts.adminApp')
@section('title')
{{$person->name}}

@stop
@section('pageHeader')
{{$person->name}} Profile
@stop
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin/person/allProfiles')}}"> Person Profiles</a></li>
    <li class="breadcrumb-item active"> {{$person->name}} </li>
</ul>
@stop
@section('content')
<section class="no-padding-top">
    <div class="row">
        <div class="col-lg-4 ">

            <div class="card card-profile ">
                <div class="card-body text-center">
                    <h4 class="mb-3 text-gray-light">{{$person->name}}</h4>
                    <p class="mb-4">Person Since{{$person->created_at}} </p>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item ">
                        <i class="fa fa-user"></i> &nbsp;&nbsp;
                        {{$person->nic}}
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-calendar"></i>&nbsp;&nbsp;
                        {{$person->dob}}
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-book"></i>&nbsp;&nbsp;
                        {{$person->age}}
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-address-card"></i>&nbsp;&nbsp;
                        {{$person->religion}}
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-address-card"></i>&nbsp;&nbsp;
                        {{$person->address}}
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;
                        {{$person->email}}
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-phone"></i>&nbsp;&nbsp;
                        {{$person->telephone}}
                    </li>
                </ul>
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