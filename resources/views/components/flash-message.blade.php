@if(Session::has('flashmessage'))
    <!-- モーダルウィンドウの中身 -->
    <div class="modal fade" id="myModal" tabindex="-1"
         role="dialog" aria-labelledby="label1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h2>{{$title}}</h2>
                    <p>{{ session('flashmessage') }}</p>
                </div>
                <div class="modal-footer text-center">
                </div>
            </div>
        </div>
    </div>
    <script defer>
        // モーダルウィンドウ
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
    </script>
@endif
