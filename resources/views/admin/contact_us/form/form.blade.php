@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endsection



<div class="row">
    <div class="input-field col m6 s6">
        <label for="phone">{{ __('contactus.phone') }}</label>
        <input id="phone" type="number" name="phone" value="{{ old('phone', isset($GetContactUsDetail) ? $GetContactUsDetail->mobile : null) }}">
        @error('phone')
        <small class="errorTxt">
            <div class="error">{{ $message }}</div>
        </small>
        @enderror
    </div>
    <div class="input-field col m6 s6">
        <label for="email">{{ __('contactus.email') }}</label>
        <input id="email" type="email" name="email" value="{{ old('email', isset($GetContactUsDetail) ? $GetContactUsDetail->email : null) }}">
        @error('email')
        <small class="errorTxt">
            <div class="error">{{ $message }}</div>
        </small>
        @enderror
    </div>
    <div class="input-field col m12 s12">
        <label for="address">{{ __('contactus.address') }}</label>
        <input id="address" type="text" name="address" value="{{ old('address', isset($GetContactUsDetail) ? $GetContactUsDetail->address : null) }}">
        @error('address')
        <small class="errorTxt">
            <div class="error">{{ $message }}</div>
        </small>
        @enderror
    </div>
    <div class="input-field col m6 s6">
        <label for="facebook">{{ __('setting.facebook') }}</label>
        <input id="facebook" type="text" name="facebook" value="{{ old('facebook', isset($GetContactUsDetail) ? $GetContactUsDetail->facebook : null) }}">
        @error('facebook')
        <small class="errorTxt">
            <div class="error">{{ $message }}</div>
        </small>
        @enderror
    </div>
    <div class="input-field col m6 s6">
        <label for="twitter">{{ __('setting.twitter') }}</label>
        <input id="twitter" type="text" name="twitter" value="{{ old('twitter', isset($GetContactUsDetail) ? $GetContactUsDetail->twitter : null) }}">
        @error('twitter')
        <small class="errorTxt">
            <div class="error">{{ $message }}</div>
        </small>
        @enderror
    </div>
    <div class="input-field col m6 s6">
        <label for="instagram">{{ __('setting.instagram') }}</label>
        <input id="instagram" type="text" name="instagram" value="{{ old('instagram', isset($GetContactUsDetail) ? $GetContactUsDetail->instagram : null) }}">
        @error('instagram')
        <small class="errorTxt">
            <div class="error">{{ $message }}</div>
        </small>
        @enderror
    </div>
    <div class="input-field col m6 s6">
        <label for="snapchat">{{ __('setting.snapchat') }}</label>
        <input id="snapchat" type="text" name="snapchat" value="{{ old('snapchat', isset($GetContactUsDetail) ? $GetContactUsDetail->snapchat : null) }}">
        @error('snapchat')
        <small class="errorTxt">
            <div class="error">{{ $message }}</div>
        </small>
        @enderror
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
<script>
    var drEvent = $('.dropify').dropify();
    drEvent.on('dropify.beforeClear', function(event, element){
        $('#hidden_image').val(null);
    });


$('#promo_value').hide();
$('#promo_type').on('change',function(){
   let promo_type = $(this).val();
        if(promo_type == 1)
        {
            $('#promo_value').show();
            $('#promo_value').attr("placeholder", "Percentage");
            $('#promo_value').val(+"%");

        }
        if(promo_type==2)
        {
            $('#promo_value').show();
            $('#promo_value').attr("placeholder", "Price");

        }
         if(promo_type==0)
        {
            $('#promo_value').hide();
            $('#promo_value').attr("placeholder", "");

        }

});

  $(document).ready(function(){

    $('#AutoCheck').change(function(){
        var dt = new Date();
        var CodeString ="BD-";
        var code = dt.getDate() + "" +dt.getMinutes()+ "" +dt.getSeconds();
        var PromoCode = CodeString + code;
    if(this.checked)
    {

        $('#code_label').hide();
        $('#code_name').css('text-align','center');
        $('#code_name').css('font-size','25px');
        $('#code_name').val(PromoCode);
    }
    else
    {
        $( "#code_name" ).prop( "disabled", false );
        $('#code_label').show();
        $('#code_name').val("");
    }







});


  });










</script>
@endsection
