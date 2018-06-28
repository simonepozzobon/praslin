@extends('layouts.admin.panel')
@section('content')
    <div id="admin-gallery" class="container">
        <instagram-panel></instagra-panel>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/galleries.js') }}"></script>
@endsection
