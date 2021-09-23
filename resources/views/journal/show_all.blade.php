@extends('layouts.app', ['pageSlug' => 'journal_entries'])

@section('content')
<div  id="journal" class="container-fluid mt-5 py-4 ">
    <h1 class="display-4 text-center handwritten pl-2 pb-2">My Journal</h1>
    <div class="row">
        <template v-for="entry in entries">
            <div class="col-6">
                <entry-card :slug="entry.slug" :title="entry.title" :date="entry.created_date" :snippet="entry.snippet"></entry-card>
            </div>
        </template>
    </div>
</div>
<script src="{{asset('js/journal.js')}}"></script>

@endsection
