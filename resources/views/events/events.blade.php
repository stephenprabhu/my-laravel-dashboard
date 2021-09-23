@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="container-fluid py-4 mb-3">
        <div class="row">
            <div class="col-1">
                <h2 class="simpleStyle1 m-2">Events</h2>

            </div>
            <div class="col-3 mt-2">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addNewEvent">Add Event</button>
              @include('events.addEventModal')
            </div>
        </div>
    </div>
@endsection
