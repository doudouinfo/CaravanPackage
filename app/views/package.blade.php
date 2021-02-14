<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-danger alert-notification">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-success alert-notification">
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success alert-notification">
            <i class="fa fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif
<h1>Contact Us any time</h1>
<form action="{{route('package')}}" method="post" id="package-form">
    @csrf
    <input type="text" name="package_type" placeholder="Your Name Please">
    <input type="text" name="package_name" placeholder="Your Valid Email">
    <textarea name="package_description" cols="30" rows="10" placeholder="Your Query"></textarea>
    <input type="submit" value="Submit">
</form>
@section('scripts')

        {!! JsValidator::formRequest('Caravan\Package\Http\Requests\Package\CreatePackageRequest', '#package-form') !!}

@stop
</body>
</html>

