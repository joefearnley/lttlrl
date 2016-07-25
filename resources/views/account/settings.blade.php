@extends('layouts.app')

@section('content')
    <div id="app" class="container-fluid">
        <div class="row">
            @include('account.nav')
            <div class="col-sm-9 col-md-10">
                <h2>Account Settings</h2>
                <div class="row">
                    <div class="col-md-8">
                        <h3>Personal Information</h3>
                        <form id="personal-info-form" data-toggle="validator" class="form-horizontal" role="form">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-group">
                                <label id="name-error-message" class="control-label" for="name"></label>
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="email-error-message" class="control-label" for="email"></label>
                                <label class="col-md-3 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email"  placeholder="E-Mail Address" data-error="Email address is invalid" value="{{ $user->email }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-7">
                                    <button id="update-personal-info" class="btn btn-primary ladda-button" data-style="expand-left">
                                        <i class="fa fa-btn fa-save"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <h3>Update Password</h3>
                        <form id="update-password-form" data-toggle="validator" class="form-horizontal" role="form">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
                                    <div class="help-block">Minimum of 6 characters</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="inputPasswordConfirm" name="password_confirmation" data-match="#inputPassword" data-match-error="Passwords don't match" placeholder="Confirm" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-7">
                                    <button id="update-password-button" class="btn btn-primary ladda-button" data-style="expand-left">
                                        <i class="fa fa-btn fa-save"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/account/settings.js"></script>
@endsection