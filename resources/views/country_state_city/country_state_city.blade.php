<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="content">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel PHP Ajax Country State City Dropdown List</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <style type="text/css">
            .yellow{
            background: yellow;
            }
            .green{
            background: green;
            color: #FFFFFF;
            }
            .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
        </style>
    </head>
    <body>
       
                <div class="container ">
                    <form>
                        <div class="row ">
                            <div class="col-lg-4 col-sm-6 col-xs-6 col-xxs-12 text-center green">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control country_select2" id="country-dropdown">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country) 
                                        <option value="{{$country->id}}">
                                            {{$country->country_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-6 col-xxs-12  text-center green">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select class="form-control state_select2" id="state-dropdown">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-6 col-xxs-12  text-center green">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select class="form-control city_select2" id="city-dropdown">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
           
        <script>
            $(document).ready(function() {
                $('.country_select2').select2();
                $('.state_select2').select2();
                $('.city_select2').select2();
            $('#country-dropdown').on('change', function() {
            var country_id = this.value;
            $("#state-dropdown").html('');
            $.ajax({
            url:"{{url('get_states_by_country')}}",
            type: "POST",
            data: {
            country_id: country_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
            $('#state-dropdown').html('<option value="">Select State</option>'); 
            $.each(result.states,function(key,value){
            $("#state-dropdown").append('<option value="'+value.id+'">'+value.state_name+'</option>');
            });
            $('#city-dropdown').html('<option value="">Select State First</option>'); 
            }
            });
            });    
            $('#state-dropdown').on('change', function() {
            var state_id = this.value;
            $("#city-dropdown").html('');
            $.ajax({
            url:"{{url('get_cities_by_state')}}",
            type: "POST",
            data: {
            state_id: state_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
            $('#city-dropdown').html('<option value="">Select City</option>'); 
            $.each(result.cities,function(key,value){
            $("#city-dropdown").append('<option value="'+value.id+'">'+value.city_name+'</option>');
            });
            }
            });
            });
            });
        </script>
    </body>
</html>