<div class="card">
    <div class="card-header">
        <h3 class="card-title">Permission</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="module">
            <thead>
            <tr>
                <th style="width: 30px">Action</th>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Icon</th>
                <th>Permission</th>
                <th>Order</th>
                <th>Module Group</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_module as $m)
                <tr>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" style="min-width: auto">
                                <li>
                                    <a class="dropdown-item edit" href="javascript:void(0)" data-id="{{ $m['id'] }}"><i class="fas fa-pencil-alt text-success mr-2"></i>Sửa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item delete" href="javascript:void(0)" data-id="{{ $m['id'] }}"><i class="fas fa-trash-alt text-danger mr-2"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $m['id'] }}</td>
                    <td><span class="text-danger font-weight-bold">{{ $m['name'] }}</span></td>
                    <td>{{ $m['icon'] }}</td>
                    <td><span class="badge badge-info">{{ $m['permission'] }}</span></td>
                    <td>{{ $m['order'] }}</td>
                    <td>{{ $m['modules']['data']['name'] }}</td>
                    <td>{{ $m['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="right">
            @include('admin::components.paginate.paginate', [
                'uri' => route('get.permissions.index')
            ])
        </div>
    </div>
</div>
