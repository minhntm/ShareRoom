<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle"><span>{!! trans('app.register') !!}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'url' => route('register'), 'aria-label' => __('Register')]) !!}
                {!! Form::text('name', old('name'), ['id' => 'name', 'placeholder' => trans('app.enter-username'), 'class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ), 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                {!! Form::email('email', old('email'), ['id' => 'email', 'placeholder' => trans('app.enter-email'), 'class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ), 'required' => 'required']) !!}
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                {!! Form::password('password', ['id' => 'password', 'placeholder' => trans('app.enter-password'), 'class' => 'form-control' . ( $errors->has('password') ? ' is-invalid' : '' ), 'required' => 'required']) !!}
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                {!! Form::password('password_confirmation', ['id' => 'password-confirm', 'placeholder' => trans('app.enter-password-confirm'), 'class' => 'form-control', 'required' => 'required']) !!}
                <div class="verify-register">
                    <span>
                        {!! trans('app.verify-register') !!}
                    </span>
                </div>
                {!! Form::submit(trans('app.signup'), ['class' => 'btn btn-primary button-login']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
