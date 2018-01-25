@if(is_array($current_weather) || is_object($current_weather ))
    <div class="data">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Weather in:</td>
                    @if(isset($current_weather->name))
                        <td>{{$current_weather->name}}</td>
                    @else
                        <td>{{$current_weather->current_observation->display_location->city}}</td>
                    @endif
                </tr>
                <tr>
                    <td>Last update:</td>
                    @if(isset($current_weather->dt))
                        <td>{{Carbon\Carbon::createFromTimestamp($current_weather->dt)->format('Y-m-d H:i')}}</td>
                    @else
                        <td>{{Carbon\Carbon::createFromTimestamp($current_weather->current_observation->local_epoch)->format('Y-m-d H:i')}}</td>
                    @endif
                </tr>
                <tr>
                    <td>Temperature now:</td>
                    @if(isset($current_weather->main->temp))
                        <td>{{$current_weather->main->temp - 273.15}} °C</td>
                    @else
                        <td>{{$current_weather->current_observation->temp_c}} °C</td>
                    @endif
                </tr>
                <tr>
                    <td>Humidity:</td>
                    @if(isset($current_weather->main->humidity))
                        <td>{{$current_weather->main->humidity}} %</td>
                    @else
                        <td>{{$current_weather->current_observation->relative_humidity}}</td>
                    @endif
                </tr>
                <tr>
                    <td>Wind speed:</td>
                    @if(isset($current_weather->wind->speed))
                        <td>{{$current_weather->wind->speed}} m/s</td>
                    @else
                        <td>{{$current_weather->current_observation->wind_mph}} m/s</td>
                    @endif
                </tr>
                @if(isset($current_weather->clouds->all))
                    <tr>
                        <td>Cloudiness:</td>
                        <td>{{$current_weather->clouds->all}}</td>
                    </tr>
                @endif
                @if(isset($current_weather->sys))
                    <tr>
                        <td>Sunrise:</td>
                        <td>{{Carbon\Carbon::createFromTimestamp($current_weather->sys->sunrise)->format('H:i')}}</td>
                    </tr>
                @endif
                @if(isset($current_weather->sys))
                    <tr>
                        <td>Sunset:</td>
                        <td>{{Carbon\Carbon::createFromTimestamp($current_weather->sys->sunset)->format('H:i')}}</td>
                    </tr>
                @endif
                <tr>
                    <td>Info from:</td>
                    <td><a href="{{$from}}">{{$from}}</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@else
    <h2>Sorry try later</h2>
@endif
