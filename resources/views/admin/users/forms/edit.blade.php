@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('user.edit_user') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="Form-advance" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="POST" action="{{route('admin.users.update', $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        @include('admin.users.forms.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
