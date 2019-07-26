<html>
<head>
    <title>Twilio + Laravel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        form {
            background-color: #fff;
            width: 600px;
            float: center;
            margin: auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{ route('verify-phone') }}">
    {{csrf_field()}}
    <h4>Phone Verification</h4>
    <div class="row">
        <div class="form-group col-md-3">
            <label>Country code</label>
            <input type="text" class="form-control" name="country_code" aria-describedby="emailHelp" placeholder="123">
            <small id="emailHelp" class="form-text text-muted">Country dial code for phone number.</small>
        </div>
        <div class="form-group col-md-6">
            <label for="phoneNumber">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="phoneNumber" aria-describedby="phoneNumberHelp" placeholder="1234567890">
            <small id="emailHelp" class="form-text text-muted">Phone number to be verified.</small>
        </div>
        <div class="form-group col-md-3">
            <label for="via">via</label>
            <select class="form-control" name="via" id="exampleFormControlSelect1">
                <option value="sms">SMS</option>
                <option value="call">Call</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<form method="post" action="{{ route('verify-code') }}">
    {{csrf_field()}}
    <h4>Code Verification</h4>
    <div class="row">
        <div class="form-group col-md-3">
            <label>Country code</label>
            <input type="text" class="form-control" name="country_code" aria-describedby="codeHelp" placeholder="123">
            <small id="codeHelp" class="form-text text-muted">Country dial code for phone number.</small>
        </div>
        <div class="form-group col-md-6">
            <label for="phoneNumber">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="phoneNumber" aria-describedby="phoneNumberHelp" placeholder="1234567890">
            <small id="phoneNumberHelp" class="form-text text-muted">Phone number to be verified.</small>
        </div>
        <div class="form-group col-md-3">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" placeholder="1234">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
