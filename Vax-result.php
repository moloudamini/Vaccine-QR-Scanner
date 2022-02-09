
<div class = "container" style = "margin-left:800px; margin-bottom:20%">

    <div class="card" style="width:450px; font-size:16px">
    @if (isset($vax_reports) && $final_status == 'verified')
        <img src="/images/valid-logo.jpg"  class="card-img-top"/></br>
        <h5 class="card-title" style = "color:black; text-align:center">Health Card Validated</h5>
    @else
        <img src="/images/invalid-logo.jpg"  class="card-img-top"/></br>
        <h5 class="card-title" style = "color:black; text-align:center">Health Card Invalidated</h5>
    @endif

    <div class="card-body">
        @if(isset($success))
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
        @if(isset($unsuccess))
            <div class="alert alert-danger">
                {{ $unsuccess}}
            </div>
        @endif
    </div>
    
    <b style = "margin-left:20px"> Vax Certificate Status: </b></br>
    @if (isset($vax_reports) && $final_status == 'verified')
        <ul class="list-group list-group-flush">
            <li class="list-group-item">User Name: {{$vax_reports->last_name}}, {{$vax_reports->first_name}}</li>
            <li class="list-group-item">Birth Date: {{$vax_reports->birth_date}}</li>      
            <li class="list-group-item">Resource one: {{ucfirst($vax_reports->first_status)}}</li> 
            <li class="list-group-item">Resource two: {{ucfirst($vax_reports->second_status)}}</li> 
            <li class="list-group-item">Location: {{$vax_reports->location}}</li> 
        </ul>

    @else
        <ul class="list-group list-group-flush">
            <li class="list-group-item">User Name: {{$vax_reports->last_name}}, {{$vax_reports->first_name}}</li>
            <li class="list-group-item">Birth Date: {{$vax_reports->birth_date}}</li> 
            @if ($vax_reports->first_status != 'completed')     
                <li class="list-group-item">Resource one: {{ucfirst($vax_reports->first_status)}} <i style = "color:red; margin-left:20px" class="fas fa-times-circle"></i></li> 
            @else 
                <li class="list-group-item">Resource one: {{ucfirst($vax_reports->first_status)}}</li> 
            @endif

            @if ($vax_reports->second_status != 'completed')     
                <li class="list-group-item">Resource two: {{ucfirst($vax_reports->second_status)}} <i style = "color:red; margin-left:20px" class="fas fa-times-circle"></i></li> 
            @else 
                <li class="list-group-item">Resource two: {{ucfirst($vax_reports->second_status)}}</li> 
            @endif
            <li class="list-group-item">Location: {{$vax_reports->location}}</li>
        </ul>
    @endif

    </div>
</div>
