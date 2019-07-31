@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="mt-3 mb-0 alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="mt-3 mb-0 alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="mt-3 mb-0 alert alert-danger">
        {{session('error')}}
    </div>
@endif