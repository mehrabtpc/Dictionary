<style>
    .ck-editor__editable {
        min-height: 200px !important;
    }
    .ck-editor{
        margin-inline: auto !important;
    }
    body{
        --ck-border-radius: 10px;
    }
</style>

<textarea id="{{$name}}" name="{{$name}}" class="{{$name}}">
    {{$value ?: ''}}
</textarea>

<script src="{{asset('js/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#{{$name}}' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
