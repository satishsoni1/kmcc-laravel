@extends('admin.layouts.app')
@section('title', 'Add Junior College Staff')
@section('page-title', 'Add Junior College Staff Member')

@section('content')
<form action="{{ route('admin.junior-college-staff.store') }}" method="POST">
    @csrf
    @include('admin.junior-college-staff._form')
</form>
@endsection
