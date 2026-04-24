@extends('naac-portal.layouts.public')
@section('title','Mandatory Disclosure')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
  <h1 class="text-3xl font-bold text-gray-900 mb-8">Mandatory Disclosure</h1>
  <div class="bg-white border border-gray-100 rounded-xl p-8 space-y-6 text-sm text-gray-700">
    <div class="grid grid-cols-2 gap-4">
      @foreach([['College Name',$college->name],['Short Name',$college->short_name ?? '—'],['Type',$college->type],['Established',$college->established_year ?? '—'],['University Affiliation',$college->university_affiliation ?? '—'],['AISHE Code',$college->aishe_code ?? '—'],['UGC Recognition',$college->ugc_recognition ?? '—'],['Address',$college->address ?? '—'],['City',$college->city ?? '—'],['State',$college->state ?? '—'],['PIN',$college->pin ?? '—'],['Phone',$college->phone ?? '—'],['Email',$college->email ?? '—'],['Website',$college->website ?? '—'],['Principal',$college->principal_name ?? '—'],['IQAC Coordinator',$college->iqac_coordinator_name ?? '—'],['NAAC Grade',$college->current_naac_grade ?? '—'],['CGPA',$college->current_cgpa ?? '—']] as [$label,$val])
      <div><p class="text-xs text-gray-400 font-medium">{{ $label }}</p><p class="font-medium">{{ $val }}</p></div>
      @endforeach
    </div>
  </div>
</div>
@endsection
