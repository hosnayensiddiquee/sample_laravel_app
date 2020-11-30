@extends('layouts.default')
@section('content')

    <div class="stepwizard col-md-offset-3">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" id="step_1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" id="step_2" type="button" class="btn btn-default btn-circle">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" id="step_3" type="button" class="btn btn-default btn-circle">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>

    <form role="form" action="{{ route('user.save') }}" method="post">
        @csrf
        <div class="row setup-content" id="step-1">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3> Personal information </h3>
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input maxlength="100" name="first_name" id="first_name" type="text" class="form-control"
                               placeholder="Enter First Name"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input maxlength="100" name="last_name" id="last_name" type="text" class="form-control"
                               placeholder="Enter Last Name"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input maxlength="100" name="phone" id="phone" type="text" class="form-control"
                               placeholder="Enter your phone number"/>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3> Address information </h3>
                    <div class="form-group">
                        <label class="control-label">Street</label>
                        <input maxlength="200" type="text" name="street" id="street" class="form-control"
                               placeholder="Enter Street"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">House number</label>
                        <input maxlength="200" type="text" name="house_number" id="house_number" class="form-control"
                               placeholder="Enter House number"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Zip code</label>
                        <input maxlength="200" type="text" name="zip_code" id="zip_code" class="form-control"
                               placeholder="Enter Zip code"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">City</label>
                        <input maxlength="200" type="text" name="city" id="city" class="form-control"
                               placeholder="Enter City"/>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3> Payment information </h3>
                    <div class="form-group">
                        <label class="control-label">Account owner</label>
                        <input maxlength="200" name="account_owner" id="account_owner" type="text"
                               class="form-control"
                               placeholder="Enter Account owner"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">IBAN</label>
                        <input maxlength="200" name="iban" id="iban" type="text" class="form-control"
                               placeholder="Enter IBAN"/>
                    </div>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

@stop
