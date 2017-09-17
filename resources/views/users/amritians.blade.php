@extends('layouts.appcontent')

@section('title', 'Amritians')
@section('content')
<adv-search
  :profile-link="'{{ URL::to('/').'/profile/' }}'"
  :search="'{{ $name }}'"
></adv-search>
@endsection
