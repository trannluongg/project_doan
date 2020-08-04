<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Tìm kiếm Product</h3>
    </div>
    <div class="card-body">
        <form method="GET">
            <div class="row">
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="id" placeholder="ID" value="{{ $_GET['id'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="pro_name" placeholder="Name" value="{{ $_GET['pro_name'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control float-right" name="date_range" autocomplete="off" placeholder="Date range" id="reservation" value="{{ $_GET['date_range'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="number" class="form-control" name="pro_price" placeholder="Giá" value="{{ $_GET['pro_price'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <select class="form-control select2" name="pro_brand">
                        <option value="">--Brand--</option>
                        @foreach($data_brand as $b)
                            <option value="{{ $b['id'] }}" {{ ($_GET['pro_brand'] ?? '') ==  $b['id'] ? 'selected' : '' }}>{{ $b['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <select class="form-control select2" name="pro_producer">
                        <option value="">--Producer--</option>
                        @foreach($data_producer as $p)
                            <option value="{{ $p['id'] }}" {{ ($_GET['pro_producer'] ?? '')==  $p['id'] ? 'selected' : '' }}>{{ $p['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <select class="form-control select2" name="pro_category">
                        <option value="">--Category--</option>
                        @foreach($data_category as $c)
                            <option value="{{ $c['id'] }}" {{ ($_GET['pro_category'] ?? '') ==  $c['id'] ? 'selected' : '' }}>{{ $c['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-1">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search mr-2"></i>Tìm kiếm</button>
                </div>
                <div class="form-group col-lg-1">
                    <a href="{{ route('get.products.index') }}" class="btn btn-icon btn-secondary d-block">
                        <i class="fas fa-sync-alt mr-2"></i>Làm mới
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
