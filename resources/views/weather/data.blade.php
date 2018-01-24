@if($current_weather->city->name === null )
@else
    <div class="data">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>Weather in:</td>
                <td>{{$current_weather->city->name}}</td>
            </tr>
            <tr>
                <td>Last update:</td>
                <td>{{$current_weather->lastUpdate->format('Y-m-d H:i')}}</td>
            </tr>
            <tr>
                <td>Temperature now:</td>
                <td>{{$current_weather->temperature->now}}</td>
            </tr>
            <tr>
                <td>Humidity:</td>
                <td>{{$current_weather->humidity}}</td>
            </tr>
            <tr>
                <td>Wind speed:</td>
                <td>{{$current_weather->wind->speed}}</td>
            </tr>
            <tr>
                <td>Cloudiness:</td>
                <td>{{$current_weather->clouds}}</td>
            </tr>
            <tr>
                <td>Sunrise:</td>
                <td>{{$current_weather->sun->rise->format('H:i')}}</td>
            </tr>
            <tr>
                <td>Sunset:</td>
                <td>{{$current_weather->sun->set->format('H:i')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
