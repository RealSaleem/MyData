@section('styles')
  <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('app-assets/vendors/select2/select2-materialize.css')}}" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/form-select2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    @foreach(Config::get('app.locales') as $key => $value)
	    <div class="input-field col m6 s6">
	        <label for="name-{{$key}}">{{ __('truck.name_'.$key) }}</label>
	        <input id="name-{{$key}}" type="text" name="name[{{$key}}]" value="{{ old('name.'.$key, isset($truck) ? $truck->getTranslation('name',$key) : null) }}">
	    </div>
    @endforeach
    <div class="input-field col s12 m8 l12">
        @if(isset($truck))
            <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="{{$vendor->logo}}" data-max-file-size="2M" multiple/>
        @else
            <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="" data-max-file-size="2M" multiple/>
        @endif

        @if($errors->has('logo'))
            <small class="errorTxt">
                <div class="error mt-1">{{ $errors->first('logo') }}</div>
            </small>
        @endif
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right" type="submit">{{ __('site.save') }}
            </button>
        </div>
    </div>
</div>
@section('scripts')
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>
@endsection