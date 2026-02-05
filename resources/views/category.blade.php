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
{{-- Sous-catégories --}}
@if(isset($parentCategory))
    <h2>{{ $parentCategory->name }}</h2>
<div class="content">
    <div class="grid">
        @foreach($categories as $sub)
            <a href="{{ route('categorie', $sub->id) }}" class="card">
                {{ $sub->name }}
            </a>
        @endforeach
    </div>
</div>
@endif
@include('layout.footer')
</body>
</html>