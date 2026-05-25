@extends('admin.layouts.app')
@section('title', 'Edit Junior College Staff')
@section('page-title', 'Edit Junior College Staff Member')

@section('content')
<form action="{{ route('admin.junior-college-staff.update', $staff) }}" method="POST">
    @csrf @method('PUT')
    @include('admin.junior-college-staff._form')
</form>
@endsection
