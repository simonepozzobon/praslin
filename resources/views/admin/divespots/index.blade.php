@extends('layouts.admin.panel')
@section('content')
    <div id="admin-gallery" class="container">
        <divespots-panel
            spots="{{ $divespots }}"
        >
        </divespots-panel>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/galleries.js') }}"></script>
@endsection
