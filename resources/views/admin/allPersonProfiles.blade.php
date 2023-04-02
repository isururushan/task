@extends('layouts.adminApp')
@section('title')
Profiles
@stop
@section('pageHeader')
Person Profile
@stop
@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
    <li class="breadcrumb-item active"> Person Profiles </li>
</ul>
@stop
@section('content')

    @if(auth()->user()->type === 'admin')
    <div class="block">
        <div class="block-body">
            <div class="">
                <div id="classroom" class="dataTables_wrapper dt-bootstrap4 ">
                    <table id="userTable" class="table dataTable no-footer" aria-describedby="datatable1_info">
                        <thead>
                            <tr role="row">
                                <th>Name</th>
                                <th>Nic</th>
                                <th>DOB</th>
                                <th>Age</th>
                                <th>Religion</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                

                            </tr>
                        </thead>
                        </tbody>
                        @foreach($persons as $person)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                {{$person->name}}
                            </td>
                            <td>
                                {{$person->nic}}
                            </td>
                            <td>
                                {{$person->dob}}
                            </td>
                            <td>
                                {{$person->age}}
                            </td>
                            <td>
                                {{$person->religion}}
                            </td>
                            <td>
                                {{$person->address}}
                            </td>
                            <td>
                                {{$person->email}}
                            </td>
                            <td>
                                {{$person->telephone}}
                            </td>
                            <td>
                                <a class="btn btn-outline-info"
                                    href="{{route('admin/person/allProfiles/view/',$person->id)}}">View</a>
                            </td>
                            <td><a  href="{{route('admin/person/update/',$person->id)}}"  class="btn btn-outline-success">Update</a></td>
                            <td><a  href="{{route('admin/person/delete/',$person->id)}}" data-toggle="confirmation" data-title="Delete Person?" class="btn btn-outline-danger">Delete</a></td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="block">
        <div class="block-body">
            <div class="">
                <div id="classroom" class="dataTables_wrapper dt-bootstrap4 ">
                    <table id="userTable" class="table dataTable no-footer" aria-describedby="datatable1_info">
                        <thead>
                            <tr role="row">
                                <th>Name</th>
                                <th>Nic</th>
                                <th>DOB</th>
                                <th>Age</th>
                                <th>Religion</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        </tbody>
                        @foreach($persons as $person)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                {{$person->name}}
                            </td>
                            <td>
                                {{$person->nic}}
                            </td>
                            <td>
                                {{$person->dob}}
                            </td>
                            <td>
                                {{$person->age}}
                            </td>
                            <td>
                                {{$person->religion}}
                            </td>
                            <td>
                                {{$person->address}}
                            </td>
                            <td>
                                {{$person->email}}
                            </td>
                            <td>
                                {{$person->telephone}}
                            </td>
                        

                            <td>
                                <a class="btn btn-outline-info"
                                    href="{{route('admin/person/allProfiles/view/',$person->id)}}">View</a>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop
@section('javaScripts')
<script>
$(document).ready(function() {
    $('#userTable').DataTable();
});

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