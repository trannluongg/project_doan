<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Tìm kiếm Brand</h3>
    </div>
    <div class="card-body">
        <form method="GET">
            <div class="row">
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="id" placeholder="ID" value="{{ $_GET['id'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="user_id" placeholder="Customer ID" value="{{ $_GET['user_id'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="user_phone" placeholder="Customer Phone" value="{{ $_GET['user_phone'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control float-right" name="date_range" autocomplete="off" placeholder="Date range" id="reservation" value="{{ $_GET['date_range'] ?? '' }}">
                </div>
                <div class="form-group col-lg-2">
                    <button type="submit" class="btn btn-primary" style="width: 100%"><i class="fas fa-search mr-2"></i>Tìm kiếm</button>
                </div>
                <div class="form-group col-lg-2">
                    <a href="{{ route('get.bills.index') }}" class="btn btn-icon btn-secondary d-block">
                        <i class="fas fa-sync-alt mr-2"></i>Làm mới
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
