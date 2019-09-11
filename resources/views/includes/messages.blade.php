@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="mt-3 mb-0 alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="mt-3 mb-0 alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="mt-3 mb-0 alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> {{session('error')}}
    </div>
@endif