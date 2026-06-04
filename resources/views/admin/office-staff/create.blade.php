@extends('admin.layouts.app')
@section('title', 'Add Office Staff')
@section('page-title', 'Add Office Staff Member')

@section('content')
<form action="{{ route('admin.office-staff.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.office-staff._form')
</form>
@endsection
