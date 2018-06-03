@extends('layouts.admin.panel')
@section('content')
    <div id="admin-gallery" class="container">
      <gallery-panel
        images="{{ $images }}"
      ></gallery-panel>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/galleries.js') }}"></script>
@endsection
