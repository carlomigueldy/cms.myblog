@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p class="pt-2">{{ $error }}</p>
        @endforeach
    </div>
@endif