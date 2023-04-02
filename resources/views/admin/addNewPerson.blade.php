@extends('layouts.adminApp')
@section('title')
New Person

@stop
@section('pageHeader')
Create New Person
@stop
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
    <li class="breadcrumb-item active"> Create New Person </li>
</ul>
@stop
@section('content')
<section class="no-padding-top">
    <div class="col-lg-8 offset-lg-2">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Add New Person</h4>
            </div>
            <div class="container-fluid">
                <form class="text-left form-validate">
                    <div class="row">
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>Name</label>
                            <span style="color: red;" id="nameerror"></span>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                autofocus>
                        </div>
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>NIC</label>
                            <span style="color: red;" id="nicerror"></span>
                            <input id="nic" type="text" class="form-control" name="nic" value="{{ old('nic') }}"
                                autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>Date Of Birth</label>
                            <span style="color: red;" id="doberror"></span>
                            <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}"
                                autofocus>
                        </div>
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>Age</label>
                            <span style="color: red;" id="ageerror"></span>
                            <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}"
                                autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>Religion</label>
                            <span style="color: red;" id="relierror"></span>
                            <input id="religion" type="text" class="form-control" name="religion"
                                value="{{ old('religion') }}" autofocus>
                        </div>
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>Address</label>
                            <span style="color: red;" id="adderror"></span>
                            <input id="address" type="text" class="form-control" name="address"
                                value="{{ old('address') }}" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>Email Address </label>
                            <span style="color: red;" id="emailerror"></span>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group-material col-lg-6 col-sm-12">
                            <label>Mobile No </label>
                            <span style="color: red;" id="nuerror"></span>
                            <input id="telephone" type="number" class="form-control" name="telephone">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary" onclick="personAdd()"
                            id="submit_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
@stop

@section('javaScripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script>
function isValidEmail(email) {
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
}

function isValidNic(nic) {
    var nicRegex = /^[0-9]{9}[vVxX]$/;
    return nicRegex.test(nic);
}

function personAdd() {

    var name = $('#name').val();
    var nic = $('#nic').val();
    var dob = $('#dob').val();
    var age = $('#age').val();
    var religion = $('#religion').val();
    var telephone = $('#telephone').val();
    var address = $('#address').val();
    var email = $('#email').val();


    document.getElementById("nameerror").innerHTML = "";
    document.getElementById("nicerror").innerHTML = "";
    document.getElementById("doberror").innerHTML = "";
    document.getElementById("ageerror").innerHTML = "";
    document.getElementById("relierror").innerHTML = "";
    document.getElementById("adderror").innerHTML = "";
    document.getElementById("emailerror").innerHTML = "";
    document.getElementById("nuerror").innerHTML = "";


    if (name == "") {
        document.getElementById("nameerror").innerHTML = "Required";
    } else if (nic == "") {
        document.getElementById("nicerror").innerHTML = "Required";
    } else if (!isValidNic(nic)) {
        document.getElementById("nicerror").innerHTML = "Please enter a valid NIC number.";
    } else if (dob == "") {
        document.getElementById("doberror").innerHTML = "Required";
    } else if (age == "") {
        document.getElementById("ageerror").innerHTML = "Required";
    } else if (religion == "") {
        document.getElementById("relierror").innerHTML = "Required";
    } else if (address == "") {
        document.getElementById("adderror").innerHTML = "Required";
    } else if (email == "") {
        document.getElementById("emailerror").innerHTML = "Required";
    } else if (!isValidEmail(email)) {
        document.getElementById("emailerror").innerHTML = "Plese Enter The Valid Email.";
    } else if (telephone == "") {
        document.getElementById("nuerror").innerHTML = "Required";
    } else {

        document.getElementById("submit_btn").disabled = true;
        document.getElementById("submit_btn").innerHTML = "Please wait...";

        $.ajax({
            url: "/admin/person/addNew/add",
            type: "post",
            data: {
                name: name,
                nic: nic,
                dob: dob,
                age: age,
                religion: religion,
                address: address,
                email: email,
                telephone: telephone,

                "_token": "{{ csrf_token() }}",

            },
            dataType: 'json',
            error: function(error) {
                console.log(error);

                document.getElementById("submit_btn").disabled = false;
                document.getElementById("submit_btn").innerHTML = "Submit Now";
            },
            success: function(r) {
                console.log(r);
                swal.fire({
                    title: 'Person Added Successful',
                    position: 'center',
                    icon: 'success',
                    type: 'success',
                    padding: '2em',
                    confirmButtonColor: '#282d3b',
                    confirmButtonText: 'SUCCESS',
                    onClose: function() {
                        window.location.href = '{{url('/admin/person/addNew')}}';
                    }
                });

                document.getElementById("submit_btn").disabled = false;
                document.getElementById("submit_btn").innerHTML = "Submit Now";
            }
        });
    }
}
</script>


<script>
/**
 * notifications
 * getting error from session
 * getting success from session
 * if exists show using bootstrap notify
 */
@if(\Session::has('error'))

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