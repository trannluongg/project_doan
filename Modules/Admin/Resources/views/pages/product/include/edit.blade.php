<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Product</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" id="product-id">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-pro-edit" placeholder="Enter name" required>
                <div id="err-pro-edit-name"></div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="" style="font-weight: 500">Price</label>
                        <input type="number" class="form-control" id="price-pro-edit" placeholder="Enter price" required>
                        <div id="err-pro-edit-price"></div>
                    </div>
                    <div class="col-lg-6">
                        <label for="" style="font-weight: 500">Sale(%)</label>
                        <input type="number" class="form-control" id="sale-pro-edit" placeholder="Enter sale vd:20" required>
                        <div id="err-pro-edit-sale"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Total</label>
                <input type="number" class="form-control" id="total-pro-edit" placeholder="Enter total" required>
                <div id="err-pro-edit-total"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Brand</label>
                <select class="form-control select2" id="brand-pro-edit">
                    @foreach($data_brand as $b)
                        <option value="{{ $b['id'] }}">{{ $b['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Producer</label>
                <select class="form-control js-select2" id="producer-pro-edit">
                    @foreach($data_producer as $p)
                        <option value="{{ $p['id'] }}" data-image="{{ $p['avatar'] }}">{{ $p['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Category</label>
                <select class="form-control select2" id="category-pro-edit">
                    @foreach($data_category as $c)
                        <option value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="description-edit">
                <label for="" style="font-weight: 500">Description</label>
                <textarea class="textarea" id="description-pro-edit" placeholder="Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <div id="err-pro-edit-description"></div>
            </div>
            <div class="form-group" id="promotion-edit">
                <label for="" style="font-weight: 500">Promotion</label>
                <textarea class="textarea" id="promotion-pro-edit" placeholder="Promotion"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <div id="err-pro-edit-promotion"></div>
            </div>
            <div class="form-group upload">
                <label for="" style="font-weight: 500">Image</label>
                <input type="file" class="d-block" multiple="multiple" id="image-pro-edit">
                <span class="btn btn-warning upload-image">Upload ảnh</span>
                <div id="image-preview-pro-edit" class="mt-3">
                </div>
            </div>
            <div class="form-group mt-4">
                <button type="button" class="btn btn-warning" id="edit-product"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
