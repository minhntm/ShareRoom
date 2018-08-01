<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-custom">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle"><span>{!! trans('app.login-to-continue') !!}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'POST', 'url' => route('login'), 'aria-label' => __('Login')]) !!}
                {!! Form::email('email', old('email'), ['id' => 'email', 'placeholder' => trans('app.enter-email'), 'class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ), 'required' => 'required', 'autofocus' => 'autofocus']) !!}
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
                {!! Form::checkbox('remember', '1', old('remember') ? true : false) !!}
                {!! Form::label('remember', trans('app.remember-me')) !!}
                {!! Form::submit(trans('app.login'), ['class' => 'btn btn-primary button-login']) !!}
                <div class="text-center">
                    <a class="link-custom" aria-busy="false" href="{{ route('password.request') }}">
                        {!! trans('app.forgot-password') !!}
                    </a>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary button-login-facebook" data-dismiss="modal">{!! trans('app.login-with-facebook') !!}</button>
                <button type="button" class="btn btn-primary button-login-google">{!! trans('app.login-with-google') !!}</button>
            </div>
        </div>
    </div>
</div>
