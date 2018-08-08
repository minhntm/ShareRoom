<div class="card">
    <div class="card-header text-center">
        <h1>Create your beautiful place</h1>
    </div>
    <div class="card-body">
        <div class="container">
            {!! Form::open(['method' => 'POST', 'url' => route('rooms.store')]) !!}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('room_type', 'Room Type', ['class' => 'control-label']) !!}
                            {!! Form::select('room_type', $roomTypes, null, ['id' => 'home_type', 'placeholder' => 'Select...', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('bed_room', 'Bedrooms', ['class' => 'control-label']) !!}
                            {!! Form::select('bed_room', ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5], null, ['placeholder' => 'Select...', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('bath_room', 'Bathrooms', ['class' => 'control-label']) !!}
                            {!! Form::select('bath_room', ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5], null, ['placeholder' => 'Select...', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('name', 'Room Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['placeholder' => 'Be clear and descriptive', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('summary', 'Summary', ['class' => 'control-label']) !!}
                        {!! Form::textarea('summary', old('summary'), ['placeholder' => 'Tell about your house', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                        {!! Form::text('address', old('address'), ['placeholder' => 'Your address', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('city_id', 'City', ['class' => 'control-label']) !!}
                        {!! Form::select('city_id', $cities, null, ['placeholder' => 'Select...', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::checkbox('is_tv') !!} TV
                        </div>
                        <div class="form-group">
                            {!! Form::checkbox('is_kitchen') !!} Kitchen
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::checkbox('is_internet') !!} Internet
                        </div>
                        <div class="form-group">
                            {!! Form::checkbox('is_heating') !!} Heating 
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::checkbox('is_air') !!} Air Conditioning
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-3 form-group">
                        {!! Form::label('price', 'Nightly Price', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend input-group-text" >$</div>
                            {!! Form::text('price', old('price'), ['placeholder' => '100$', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <!-- <br>
                <div class="row">
                    <div class="form-group">
                        <span class="btn btn-default btn-file">
                            <i class="fas fa-cloud-upload-alt"></i> Upload Photos 
                            {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
                        </span>
                    </div>
                </div> -->

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::checkbox('active') !!} Active
                    </div>
                </div>

                <br>
                <div class="actions text-center">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
