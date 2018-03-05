<div id="user-modal" class="form-modal">
    <form class="form-horizontal" method="POST" action="{{ route('userMethods.store') }} " id="frm-user-master">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-lg-4 control-label">Name</label>

            <div class="col-lg-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-lg-4 control-label">E-Mail Address</label>

            <div class="col-lg-6">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-lg-4 control-label">Password</label>

            <div class="col-lg-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-lg-4 control-label">Confirm Password</label>

            <div class="col-lg-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-4">
                <input type="submit" class="btn btn-primary" value="Submit"/>
            </div>
        </div>
    </form>
</div>