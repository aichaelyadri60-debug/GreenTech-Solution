<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="{{ asset('css/category.css') }}">

</head>
<body>
    @include('layout.navbar')
<h1>🌿 Categories</h1>

<div class="content">

@if(isset($categories))
    <div class="grid">
        @foreach($categories as $cat)
            <a href="{{ route('categorie', $cat->id) }}" class="card">
                {{ $cat->name }}
            </a></br>
        @endforeach
    </div>
@endif
</div>
@include('layout.footer')


</body>
</html>