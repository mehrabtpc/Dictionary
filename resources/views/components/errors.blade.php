@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>The following errors have occurred:</p>
        <hr class="message-inner-separator">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
