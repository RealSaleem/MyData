@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
            <!-- users view start -->
            <div class="section users-view">
                <!-- users view card details start -->
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s6">
                                <table class="striped">
                                    <tbody>
                                        @foreach(Config::get('app.locales') as $key => $value)
                                        <tr>
                                            <td>{{__('site.name_'.$key)}}:</td>
                                            <td class="users-view-username">
                                                {{$user->vendor->getTranslation('name',$key)}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>{{__('vendor.phone_number')}}:</td>
                                            <td class="users-view-name">{{$user->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('vendor.type')}}:</td>
                                            <td>
                                                @foreach(json_decode($user->vendor->services) as $service)
                                                    <p>{{Helper::getServiceName($service)}}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <center>
                                                    <a href="{{route('edit_store')}}" class="waves-effect waves-light btn btn-small">{{__('site.edit')}}</a>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s6">
                                @if($user->vendor->logo == null)
                                    <img src="{{asset('app-assets/images/no-image.png')}}" class="responsive-img">
                                @else
                                    <img src="{{ $user->vendor->logo }}" class="responsive-img" style="width: 100%; height: auto">
                                @endif
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
                <!-- users view card details ends -->
            </div>
            <!-- users view ends -->
        </div>
    </div>
</div>
@endsection