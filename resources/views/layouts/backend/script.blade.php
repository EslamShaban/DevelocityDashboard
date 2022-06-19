<script>var hostUrl = "assets/";</script>

		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>

		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
        <script src="{{('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<script src="{{('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{('assets/js/widgets.bundle.js')}}"></script>
		<script src="{{('assets/js/custom/widgets.js')}}"></script>
		<script src="{{('assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
		<script src="{{('assets/js/custom/utilities/modals/create-app.js')}}"></script>
		<script src="{{('assets/js/custom/utilities/modals/users-search.js')}}"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

        @jquery
        @toastr_js
        @toastr_render
        @yield('js')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        
        <script>

           $(document).ready( function () {
               $('#datatable').DataTable();
                $("#inputTag").tagsinput('items');
           });

            function append_notification_notifications(msg) {
                /*
                if (msg.count_unseen_notifications > 0) {
                    $('#dropdown-notifications-icon').fadeIn(0);
                    $('#dropdown-notifications-icon').text(msg.count_unseen_notifications);
                } else {
                    $('#dropdown-notifications-icon').fadeOut(0);
                }*/

                $('#kt_topbar_notifications_1').empty();
                $('#kt_topbar_notifications_1').append(msg.response.task_notifications);

                $('#kt_topbar_notifications_2').empty();
                $('#kt_topbar_notifications_2').append(msg.response.req_notifications);
            }
            function get_notifications() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/notifications/ajax',
                    success: function (data) {
                        /*
                        if (data.alert) {
                            var audio = new Audio('{{asset("assets/sounds/notification.wav")}}');
                            audio.play();
                        }*/
                        append_notification_notifications(data.notifications.response);

                    }
                });
            }

            function get_nots() {
                setTimeout(function () {
                    get_notifications();
                    get_nots();
                }, 5000);
            }
            get_nots();

         </script>
		<!--end::Page Custom Javascript-->
