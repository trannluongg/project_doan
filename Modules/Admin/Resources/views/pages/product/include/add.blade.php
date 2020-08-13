<div class="card card-success" id="card-add">
    <div class="card-header">
        <h3 class="card-title">Thêm Product</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-pro-add" placeholder="Enter name" required>
                <div id="err-pro-add-name"></div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" style="font-weight: 500">Price</label>
                        <input type="number" class="form-control" id="price-pro-add" placeholder="Enter price" required>
                        <div id="err-pro-add-price"></div>
                    </div>
                    <div class="col-lg-6">
                        <label for="" style="font-weight: 500">Sale(%)</label>
                        <input type="number" class="form-control" id="sale-pro-add" placeholder="Enter sale vd:20" required>
                        <div id="err-pro-add-sale"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Total</label>
                <input type="number" class="form-control" id="total-pro-add" placeholder="Enter total" required>
                <div id="err-pro-add-total"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Brand</label>
                <select class="form-control select2" id="brand-pro-add">
                    @foreach($data_brand as $b)
                        <option value="{{ $b['id'] }}">{{ $b['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Producer</label>
                <select class="form-control js-select2" id="producer-pro-add">
                    @foreach($data_producer as $p)
                        <option value="{{ $p['id'] }}" data-image="{{ url('upload/producer/'.$p['avatar']) }}">{{ $p['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Category</label>
                <select class="form-control select2" id="category-pro-add">
                    @foreach($data_category as $c)
                        <option value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="description-add">
                <label for="" style="font-weight: 500">Description</label>
                <textarea class="textarea" id="description-pro-add" placeholder="Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <div id="err-pro-add-description"></div>
            </div>
            <div class="form-group" id="promotion-add">
                <label for="" style="font-weight: 500">Promotion</label>
                <textarea class="textarea" id="promotion-pro-add" placeholder="Promotion"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Vé giảm giá 10k</textarea>
                <div id="err-pro-add-promotion"></div>
            </div>
            <div class="form-group upload">
                <label for="" style="font-weight: 500">Image</label>
                <input type="file" class="d-block" multiple="multiple" id="image-pro-add">
                <span class="btn btn-warning upload-image">Upload ảnh</span>
                <div id="image-preview-pro" class="mt-3">
                </div>
            </div>
            <div class="form-group mt-4">
                <button type="button" class="btn btn-success" id="pro-add"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
                <button type="button" class="btn btn-secondary" id="pro-reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            </div>
        </div>
    </form>
</div>
