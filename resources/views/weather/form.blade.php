<div class="col-md-4">
    {!! Form::open(['route' =>  'weather.form.create', 'method' => 'post'])!!}
    <div class="form-group">
        <label>Api key</label>
        <input id="api_key" type="text" class="form-control" name="lowm" value="" placeholder="Insert api key" required>
        <label>City</label>
        <input id="city" type="text" class="form-control" name="city" value="" placeholder="Insert city" required>
    </div>
    <button id="add-tab" class="btn btn-success" type="submit" name="button">Weather check</button>
    {!! Form::close() !!}
</div>