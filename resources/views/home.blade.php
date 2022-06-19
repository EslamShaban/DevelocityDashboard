@extends('layouts.master')

    @section('title')
        Send Notfilcation
    @endsection
    @section('content')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <center>
                        <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>
                    </center>
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ route('send.web-notification') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Massage Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label>Massage Body</label>
                                    <textarea class="form-control" name="body"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Notification</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('js')
        {{-- <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script> --}}
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>

            var firebaseConfig = {
                apiKey: "AIzaSyAlxURQYtlCSPVn92_N-ED_czTPBMQl0XE",
                authDomain: "smicarts.firebaseapp.com",
                projectId: "smicarts",
                storageBucket: "smicarts.appspot.com",
                messagingSenderId: "753170170612",
                appId: "1:753170170612:web:713bbad39d7f86176514a1",
                measurementId: "G-EREGPTSDBT"
            };

            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

            function initFirebaseMessagingRegistration() {
                    messaging
                    .requestPermission()
                    .then(function () {
                        return messaging.getToken()
                    })
                    .then(function(token) {
                        console.log(token);

                        // $.ajaxSetup({
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     }
                        // });

                        // $.ajax({
                        //     url: '{{ route("store.token") }}',
                        //     type: 'POST',
                        //     data: {
                        //         token: token
                        //     },
                        //     dataType: 'JSON',
                        //     success: function (response) {
                        //         alert('Token saved successfully.');
                        //     },
                        //     error: function (err) {
                        //         console.log('User Chat Token Error'+ err);
                        //     },
                        // });

                    }).catch(function (err) {
                        console.log('User Chat Token Error'+ err);
                    });
            }

            messaging.onMessage(function(payload) {
                console.log(payload);
                const noteTitle = payload.notification.title;
                const noteOptions = {
                    body: payload.notification.body,
                    icon: payload.notification.image,
                };
                new Notification(noteTitle, noteOptions);
            });

        </script>

    @endsection
