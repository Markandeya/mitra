@extends('layouts.appcontent')

@section('title', 'Amritians')
@section('content')
<adv-search
  :image-link="'{{ asset('storage').'/' }}'"
  :profile-link="'{{ URL::to('/').'/profile/' }}'"
  :search="'{{ $name }}'"
></adv-search>
@endsection
