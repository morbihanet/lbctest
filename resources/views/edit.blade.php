@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit a contact</h1>
        <form id="addForm" action="{{route('update', ['contact' => $contact])}}" method="post">
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input required="required" class="form-control" type="text" name="firstname" id="firstname"
                       value="{{$contact->firstname}}">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input required="required" class="form-control" type="text" name="lastname" id="lastname"
                       value="{{$contact->lastname}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email"
                           value="{{$contact->email}}">
                    <div class="input-group-append">
                        <a class="input-group-text" id="check">Check</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <span id="submitBtn" onclick="submitForm();" class="btn btn-primary">Edit</span>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $('#submitBtn').css('color', '#fff');

        var $check = $('#check');
        $check.css('cursor', 'pointer');
        $check.click(function () {
            checkMail();
        });

        var token = $('meta[name="csrf-token"]').attr('content');

        function checkMail()
        {
            var email = $('#email').val();

            if (email.length > 0) {
                $.ajax({
                    url: '/checkmail/' + email,
                    headers: {
                        'X-CSRF-Token': token
                    },
                    type: 'get',
                    success: function (res) {
                        var status =  res.status;

                        if (false === status) {
                            alert('This email "' + email + '" is incorrect');
                        } else {
                            alert('This email "' + email + '" is correct');
                        }
                    }
                });
            } else {
                alert('This email is empty');
            }
        }

        function submitForm()
        {
            var next = true;
            var msg = [];
            var email = $('#email').val();

            if ($('#firstname').val().length === 0) {
                next = false;
                msg.push('Provide a firstname');
            }

            if ($('#lastname').val().length === 0) {
                next = false;
                msg.push('Provide a lastname');
            }

            if (email.length === 0) {
                next = false;
                msg.push('Provide an email');
            }

            if (true === next) {
                $.ajax({
                    url: '/checkmail/' + email,
                    headers: {
                        'X-CSRF-Token': token
                    },
                    type: 'get',
                    success: function (res) {
                        var status =  res.status;

                        if (false === status) {
                            alert('This email "' + email + '" is incorrect');
                        } else {
                            $('#addForm').submit();
                        }
                    }
                });
            } else {
                alert(msg.join("\n"));
            }
        }
    </script>
@endsection