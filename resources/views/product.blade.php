<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'product page')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

<div id="app">
    <div class="nav-bar"></div>
    <product :premium="premium"></product>
</div>