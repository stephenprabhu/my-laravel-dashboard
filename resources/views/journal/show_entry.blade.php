@extends('layouts.app', ['pageSlug' => 'journal_entries'])

@section('content')
<div class="container-fluid mt-5 py-4 ">
    <div class="row">
        <div class="col-7">
            <h1 class="display-4">{{$entry->title}}</h1>
            <span class="text-sm">{{$entry->created_date}}</span>
        </div>
        <div style="text-align: right" class="col-4 mr-1">
            <a href="/journal/update/{{$entry->slug}}"  class="btn btn-info btn-fab btn-icon btn-round">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <a href="/delete-entry/{{$entry->slug}}" class="btn btn-danger btn-fab btn-icon btn-round">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    </div>

    <p>{!! $entry->body !!}</p>
</div>

@endsection
