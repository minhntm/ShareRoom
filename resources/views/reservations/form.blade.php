{{ Form::open(['method' => 'POST', 'url' => route('rooms.reservations.store', ['room' => $room->id])]) }}
    <h1>${{ $room->price }}/Night</h1>
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('Check In') }}
            {{ Form::text('start_date', old('start_date'), ['id' => 'reservation_start_date', 'placeholder' => trans('app.start-date'), 'class' => 'form-control', 'readonly' => 'true']) }}
        </div>
        <div class="col-md-6">
            {{ Form::label('Check Out') }}
            {{ Form::text('end_date', old('end_date'), ['id' => 'reservation_end_date', 'placeholder' => trans('app.end-date'), 'class' => 'form-control', 'readonly' => 'true', 'disabled' => 'true']) }}
        </div>
    </div>
    {{ Form::hidden('total', null, ['id' => 'reservation_total']) }}
    {{ Form::hidden('room_id', $room->id) }}
    {{ Form::hidden('price', $room->price) }}
    {{ Form::hidden('status', 1) }}

    <span id="message"></span>

    <div id="preview" style="display: none">
        <table class="reservation-table" >
            <tbody>
                <tr>
                    <td>Day(s)</td>
                    <td><span id="reservation_days"></span></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$<span id="reservation_sum"></span></td>
                </tr>
            </tbody>
        </table>
        <br>
    </div>

    {{ Form::submit(trans('app.booking'), ['id' => 'btn_book', 'class' => 'btn btn-primary btn-theme wide', 'disabled' => 'true']) }}
{{ Form::close() }}

<script>
    function unavailable(date) {
        dmy = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
        return [$.inArray(dmy, unavailableDates) == -1];
    }

    $(function() {
        unavailableDates = [];

        $.ajax({
            url: '{{ route('preload') }}',
            data: {'room_id': '{{ $room->id }}' },
            dataType: 'json',
            success: function(data) {
                var reservations = data['reservations'];
                $.each(reservations, function(arrId, arrVal) {
                    for (var d = new Date(arrVal.start_date); d <= new Date(arrVal.end_date); d.setDate(d.getDate() + 1)) {
                        unavailableDates.push($.datepicker.formatDate('yy-m-d', d));
                    }
                })

                $('#reservation_start_date').datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0,
                    maxDate: '3m',
                    beforeShowDay: unavailable,
                    onSelect: function(selected) {
                        $('#reservation_end_date').datepicker("option", "minDate", selected);
                        $('#reservation_end_date').attr('disabled', false);

                        var start_date = $('#reservation_start_date').datepicker('getDate');
                        var start_date_str = $.datepicker.formatDate("yy-mm-dd", start_date);
                        var end_date = $('#reservation_end_date').datepicker('getDate')
                        var end_date_str = $.datepicker.formatDate("yy-mm-dd", end_date);

                        var days = (end_date - start_date)/1000/60/60/24 + 1;

                        var input = {
                            'start_date': start_date_str,
                            'end_date': end_date_str,
                            'room_id': {{ $room->id }}
                        }

                        $.ajax({
                            url: "{{ route('preview') }}",
                            data: input,
                            dataType: 'json',
                            success: function(data) {
                                if (data.conflict) {
                                    $('#message').text("This date range is not available.");
                                    $('#preview').hide();
                                    $('#btn_book').attr('disabled', true);
                                } else {
                                    $('#message').text("This date range is OK.");
                                    $('#preview').show();
                                    $('#btn_book').attr('disabled', false);

                                    var total = days * {{ $room->price }};
                                    $('#reservation_days').text(days);
                                    $('#reservation_sum').text(total);
                                    $('#reservation_total').val(total);
                                }
                            }
                        })
                    }
                });
                $('#reservation_end_date').datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0,
                    maxDate: '3m',
                    beforeShowDay: unavailable,
                    onSelect: function(selected) {
                        $('#reservation_start_date').datepicker("option", "maxDate", selected)

                        var start_date = $('#reservation_start_date').datepicker('getDate');
                        var start_date_str = $.datepicker.formatDate("yy-mm-dd", start_date);
                        var end_date = $('#reservation_end_date').datepicker('getDate')
                        var end_date_str = $.datepicker.formatDate("yy-mm-dd", end_date);

                        var days = (end_date - start_date)/1000/60/60/24 + 1;

                        var input = {
                            'start_date': start_date_str,
                            'end_date': end_date_str,
                            'room_id': {{ $room->id }}
                        }

                        $.ajax({
                            url: "{{ route('preview') }}",
                            data: input,
                            dataType: 'json',
                            success: function(data) {
                                if (data.conflict) {
                                    $('#message').text("This date range is not available.");
                                    $('#preview').hide();
                                    $('#btn_book').attr('disabled', true);
                                } else {
                                    $('#message').text("This date range is OK.");
                                    $('#preview').show();
                                    $('#btn_book').attr('disabled', false);

                                    var total = days * {{ $room->price }};
                                    $('#reservation_days').text(days);
                                    $('#reservation_sum').text(total);
                                    $('#reservation_total').val(total);
                                }
                            }
                        })
                    }
                });
            }
        })

    })
</script>