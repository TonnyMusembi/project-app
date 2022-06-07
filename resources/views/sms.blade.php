<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SMS Portal With Twilio</title>
    <!-- Bootstrap styles CDN -->
    <link<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>

<body>

    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Add Phone Number
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label>Enter Phone Number</label>
                                        <input type="tel" class="form-control" placeholder="Enter Phone Number">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Register User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Send SMS message
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label>Select users to notify</label>
                                        <select multiple class="form-control">
                                            @foreach ($users as $user)
                                                <option>{{ $user->phone_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Notification Message</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Notification</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</body>

</html>
