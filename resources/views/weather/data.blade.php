@if(is_array($current_weather) || is_object($current_weather ))
    <div class="data">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>Weather in:</td>
                <td>{{$current_weather->name}}</td>
            </tr>
            <tr>
                <td>Last update:</td>
                <td>{{Carbon\Carbon::createFromTimestamp($current_weather->dt)->format('Y-m-d H:i')}}</td>
            </tr>
            <tr>
                <td>Temperature now:</td>
                <td>{{$current_weather->main->temp - 273.15}} °C</td>
            </tr>
            <tr>
                <td>Humidity:</td>
                <td>{{$current_weather->main->humidity}} %</td>
            </tr>
            <tr>
                <td>Wind speed:</td>
                <td>{{$current_weather->wind->speed}} m/s</td>
            </tr>
            <tr>
                <td>Cloudiness:</td>
                <td>{{$current_weather->clouds->all}}</td>
            </tr>
            <tr>
                <td>Sunrise:</td>
                <td>{{Carbon\Carbon::createFromTimestamp($current_weather->sys->sunrise)->format('H:i')}}</td>
            </tr>
            <tr>
                <td>Sunset:</td>
                <td>{{Carbon\Carbon::createFromTimestamp($current_weather->sys->sunset)->format('H:i')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    @else
    <h2>Sorry try later</h2>
@endif
