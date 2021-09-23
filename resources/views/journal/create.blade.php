@extends('layouts.app', ['pageSlug' => 'journal-new-entry'])

@section('content')

<div class="container-fluid mt-5 py-4 ">
    <form id="myform" role="form" method="POST" action="{{!empty($entry)?'/update-entry':'/create-entry'}}">
        @csrf
        <div class="row">
            <div class="col-6">
                <input class="form-control m-2" name="title" type="text" placeholder="title" value="{{!empty($entry)?$entry->title:''}}">
            </div>
            <div class="col-6">
                <input class="form-control m-2" name="date" type="date" placeholder="date" value="{{!empty($entry)?$entry->created_date:''}}">
            </div>
        </div>
        <input type="hidden" name="slug" value="{{!empty($entry)?$entry->slug:''}}">
        <textarea id="summernote" name="body">{{!empty($entry)?$entry->body:''}}</textarea>
        <button class="btn bg-gradient-info w-10 mt-4 mb-0"  id="submitButton" type="submit">Submit</button>
    </form>
</div>
<script>
    $('#summernote').summernote({
        placeholder: 'Whats On Your Mind?',
        margin:30,
        tabsize: 2,
        height: 400,
        fontNames: ['Raleway', 'Arial Black', 'Comic Sans MS', 'Courier New','Poppins','Roboto'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['attach',['picture','link','video','table','hr']],
            ['misc',['fullscreen','codeview','undo','redo']]
        ]
    });
    $('#submitButton').click(function (){
        $('#submitButton').html('Saving...')
    })

</script>

@endsection
