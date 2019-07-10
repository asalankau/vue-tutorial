<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')


<div id="app">
    <my-button text_var="My submit button" type="submit"></my-button>
</div>

@section('footer')
    @parent

    <div>This is appended to the master sidebar.</div>
@endsection