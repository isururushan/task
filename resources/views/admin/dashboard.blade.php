@extends('layouts.adminApp')
@section('title')

Dashboard
@stop

@section('pageHeader')

@stop
@section('content')

<div class="row">
    @foreach ($ageGroups as $ageGroup)
    <div class="col-md-2">
        <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                    <div class="icon"><i class="icon-user-1"></i></div><strong>Age Range  ({{ $ageGroup->age * 10 }}-{{ ($ageGroup->age + 1) * 10 - 1 }})</strong>
                </div>
                <div class="number dashtext-1">{{ $ageGroup->count }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    @foreach ($dobGroups as $dobGroup)
    <div class="col-md-2">
        <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                    <div class="icon"><i class="icon-user-1"></i></div><strong>DOB ({{ $dobGroup->dob }})</strong>
                </div>
                <div class="number dashtext-1"> {{ $dobGroup->count }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    @foreach ($religionGroups as $religionGroup)
    <div class="col-md-2">
        <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">
                    <div class="icon"><i class="icon-user-1"></i></div><strong>Religion ({{ $religionGroup->religion }})</strong>
                </div>
                <div class="number dashtext-1">{{ $religionGroup->count }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>



@stop