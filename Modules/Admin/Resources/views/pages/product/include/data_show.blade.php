<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="product">
            <thead>
            <tr>
                <th style="width: 30px">Action</th>
                <th style="width: 50px">ID</th>
                <th>Thông tin product</th>
                <th>Image</th>
                <th>Nguồn gốc</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_product as $p)
                <tr>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" style="min-width: auto">
                                <li>
                                    <a class="dropdown-item edit" href="javascript:void(0)" data-id="{{ $p['id'] }}"><i class="fas fa-pencil-alt text-success mr-2"></i>Sửa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item delete" href="javascript:void(0)" data-id="{{ $p['id'] }}"><i class="fas fa-trash-alt text-danger mr-2"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $p['id'] }}</td>
                    <td>
                        <span class="text-danger font-weight-bold">{{ $p['name'] }}</span>
                        <span class="d-block text-success">Giá: {{ number_format($p['price'],0,",",".") . 'đ'}}</span>
                        <span class="d-block">Sale: {{ $p['sale'] }}%</span>
                        <span class="d-block text-primary">Giá sau sale: {{ number_format($p['price'] * ((100-$p['sale']) / 100) ,0,",",".") . 'đ' }}</span>
                        <span class="d-block">Số lượng: {{ $p['total'] }}</span>
                    </td>
                    <td>
                        <div class="row">
                            @foreach($p['image'] as $image)
                                <span class="avatar col-6">
                                    <img src="{{$image }}" alt="">
                                </span>
                                @endforeach
                        </div>
                    </td>
                    <td>
                        <span class="d-block">Brand: {{ $p['brands']['data']['name'] }}</span>
                        <span class="d-block">Producer: {{ $p['producers']['data']['name'] }}</span>
                        <span class="d-block">Category: {{ $p['category']['data']['name'] }}</span>
                    </td>
                    <td>{{ $p['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="right">
            @include('admin::components.paginate.paginate', [
                'uri' => route('get.products.index')
            ])
        </div>
    </div>
</div>
