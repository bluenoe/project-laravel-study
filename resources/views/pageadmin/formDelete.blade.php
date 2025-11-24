{{-- resources/views/pageadmin/formDelete.blade.php --}}
@extends('master') {{-- nếu mấy file Add/Edit đang @extends('master') thì giữ y chang, nếu khác thì đổi lại cho khớp --}}
@section('content')

<div class="container beta-relative">
    <div class="pull-left">
        <h2>Delete product</h2>
    </div>

    <div class="space50">&nbsp;</div>

    {{-- nếu bà có include error giống formAdd / formEdit thì giữ lại --}}
    @includeWhen(View::exists('error'), 'error')

    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Are you sure?</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Bạn có chắc muốn xóa sản phẩm sau không?
                        </p>

                        <ul>
                            <li><strong>ID:</strong> {{ $product->id }}</li>
                            <li><strong>Name:</strong> {{ $product->name }}</li>
                            <li><strong>Price:</strong> {{ number_format($product->unit_price, 0, ',', '.') }} đ</li>
                        </ul>

                        <p class="text-danger">
                            Hành động này không thể hoàn tác.
                        </p>

                        <form action="{{ route('admin-delete', $product->id) }}"
                              method="post"
                              class="form-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Yes, delete it
                            </button>

                            <a href="{{ route('admin.index') }}" class="btn btn-default">
                                Cancel
                            </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
