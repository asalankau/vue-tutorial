<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'product page')

@section('content')
<div id="app">
    <div class="nav-bar"></div>
    <product :premium="premium"></product>
    <product-review @review-submitted="addReview" :reviews="reviews"></product-review>
</div>
@endsection
@section('footer')
    <div class="footer-bar"></div>
@endsection