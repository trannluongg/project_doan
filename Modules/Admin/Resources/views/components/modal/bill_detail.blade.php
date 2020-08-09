<div class="modal fade" id="modal-bill-detail">
    <div class="modal-dialog" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="bill-detail-id">Bill Detail ID: <span></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 0">
                <div class="loading-cart">
                    <img src="{{ url('images/loading_cart.gif')}}" alt="">
                </div>
                <div id="body-bill-detail" style="max-height: 600px; overflow-x: hidden; overflow-y: auto">

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
