@extends('admin.layouts.app')
@section('title', 'Edit Office Staff')
@section('page-title', 'Edit Office Staff Member')

@section('content')
<form action="{{ route('admin.office-staff.update', $staff) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.office-staff._form')
</form>
@endsection
