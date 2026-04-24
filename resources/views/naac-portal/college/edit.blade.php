@extends('naac-portal.layouts.app')
@section('title','Edit College Profile')
@section('page-title','Edit College Profile')
@section('content')
<div class="max-w-3xl">
<form action="{{ route('np.college.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
@csrf @method('PUT')
<div class="np-card">
  <h3 class="font-semibold text-gray-800 mb-4">Basic Information</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="md:col-span-2"><label class="np-label">College Name *</label><input type="text" name="name" value="{{ old('name',$college->name) }}" required class="np-input"></div>
    <div><label class="np-label">Short Name</label><input type="text" name="short_name" value="{{ old('short_name',$college->short_name) }}" class="np-input" placeholder="e.g. KMC"></div>
    <div><label class="np-label">College Type</label>
      <select name="type" class="np-input">@foreach(['Government','Aided','Unaided','Autonomous'] as $t)<option value="{{ $t }}" {{ $college->type === $t ? 'selected' : '' }}>{{ $t }}</option>@endforeach</select></div>
    <div><label class="np-label">University Affiliation</label><input type="text" name="university_affiliation" value="{{ old('university_affiliation',$college->university_affiliation) }}" class="np-input"></div>
    <div><label class="np-label">Established Year</label><input type="number" name="established_year" value="{{ old('established_year',$college->established_year) }}" class="np-input" min="1800" max="2025"></div>
    <div><label class="np-label">AISHE Code</label><input type="text" name="aishe_code" value="{{ old('aishe_code',$college->aishe_code) }}" class="np-input"></div>
    <div><label class="np-label">UGC Recognition</label><input type="text" name="ugc_recognition" value="{{ old('ugc_recognition',$college->ugc_recognition) }}" class="np-input"></div>
  </div>
</div>
<div class="np-card">
  <h3 class="font-semibold text-gray-800 mb-4">Contact Details</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="md:col-span-2"><label class="np-label">Address</label><input type="text" name="address" value="{{ old('address',$college->address) }}" class="np-input"></div>
    <div><label class="np-label">City</label><input type="text" name="city" value="{{ old('city',$college->city) }}" class="np-input"></div>
    <div><label class="np-label">State</label><input type="text" name="state" value="{{ old('state',$college->state) }}" class="np-input"></div>
    <div><label class="np-label">PIN</label><input type="text" name="pin" value="{{ old('pin',$college->pin) }}" class="np-input"></div>
    <div><label class="np-label">Phone</label><input type="text" name="phone" value="{{ old('phone',$college->phone) }}" class="np-input"></div>
    <div><label class="np-label">Email</label><input type="email" name="email" value="{{ old('email',$college->email) }}" class="np-input"></div>
    <div><label class="np-label">Website</label><input type="url" name="website" value="{{ old('website',$college->website) }}" class="np-input" placeholder="https://"></div>
  </div>
</div>
<div class="np-card">
  <h3 class="font-semibold text-gray-800 mb-4">Leadership & NAAC</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div><label class="np-label">Principal Name</label><input type="text" name="principal_name" value="{{ old('principal_name',$college->principal_name) }}" class="np-input"></div>
    <div><label class="np-label">IQAC Coordinator</label><input type="text" name="iqac_coordinator_name" value="{{ old('iqac_coordinator_name',$college->iqac_coordinator_name) }}" class="np-input"></div>
    <div><label class="np-label">Current NAAC Grade</label><input type="text" name="current_naac_grade" value="{{ old('current_naac_grade',$college->current_naac_grade) }}" class="np-input" placeholder="A+"></div>
    <div><label class="np-label">CGPA</label><input type="text" name="current_cgpa" value="{{ old('current_cgpa',$college->current_cgpa) }}" class="np-input" placeholder="3.26"></div>
    <div><label class="np-label">Vision</label><textarea name="vision" rows="3" class="np-input">{{ old('vision',$college->vision) }}</textarea></div>
    <div><label class="np-label">Mission</label><textarea name="mission" rows="3" class="np-input">{{ old('mission',$college->mission) }}</textarea></div>
    <div><label class="np-label">College Logo</label><input type="file" name="logo" accept="image/*" class="np-input">@if($college->logo_path)<p class="text-xs text-gray-400 mt-1">Current logo on file</p>@endif</div>
  </div>
</div>
<div class="flex gap-3">
  <button type="submit" class="np-btn-primary">Save Changes</button>
  <a href="{{ route('np.college.profile') }}" class="np-btn-secondary">Cancel</a>
</div>
</form>
</div>
@endsection
