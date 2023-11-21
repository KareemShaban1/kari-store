@extends('backend.layouts.master')

@section('title')
    {{ trans('stores_trans.Stores') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('stores_trans.Stores') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('stores_trans.All_Stores') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('stores_trans.Stores') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <table id="custom_table" class="display">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{ trans('stores_trans.Id') }}</th>
                                <th>{{ trans('stores_trans.Name') }}</th>
                                <th>{{ trans('stores_trans.Slug') }}</th>
                                <th>{{ trans('stores_trans.Categories') }}</th>
                                <th>{{ trans('stores_trans.Number_Of_Products') }}</th>
                                <th>{{ trans('stores_trans.Status') }}</th>
                                <th>{{ trans('stores_trans.Featured') }}</th>
                                <th>{{ trans('stores_trans.Created_at') }}</th>
                                <th>{{ trans('stores_trans.Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                                <tr>
                                    <td>
                                        <img src="{{ asset($store->logo_image_url) }}" height="50" width="50"
                                            alt="">
                                    </td>
                                    <td>{{ $store->id }}</td>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $store->slug }}</td>
                                    <td>
                                        @foreach ($store->categories as $category)
                                            <span
                                                class="badge badge-rounded badge-dark p-2 mb-2">{{ $category->name }}</span>
                                        @endforeach
                                    </td>

                                    <td>
                                        <a href="{{ Route('admin.stores.show', $store->id) }}">
                                            {{ $store->products_count }}
                                        </a>
                                    </td>


                                    <td>
                                        @if ($store->status == 'active')
                                            <span class="badge badge-rounded badge-success p-2 mb-2">
                                                {{ trans('stores_trans.Active') }}
                                            </span>
                                        @elseif($store->status == 'inactive')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('stores_trans.Inactive') }}
                                            </span>
                                        @endif

                                        <div class="form-check form-switch" style="display: flex;justify-content: center">

                                            <input type="checkbox" id="statusCheckbox{{ $store->id }}"
                                                class="form-check-input" {{ $store->status == 'active' ? 'checked' : '' }}>
                                            <form method="POST"
                                                action="{{ route('admin.stores.updateStoreStatus', $store->id) }}"
                                                id="statusForm{{ $store->id }}" style="display: none;">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        </div>

                                    </td>

                                    <td>
                                        @if ($store->featured == '1')
                                            <span class="badge badge-rounded badge-success p-2 mb-2">
                                                {{ trans('stores_trans.Featured') }}
                                            </span>
                                        @elseif($store->featured == '0')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('stores_trans.Not_Featured') }}
                                            </span>
                                        @endif

                                        <div class="form-check form-switch"
                                            style="display: flex;
                                    justify-content: center">

                                            <input type="checkbox" id="featuredCheckbox{{ $store->id }}"
                                                class="form-check-input" {{ $store->featured == '1' ? 'checked' : '' }}>
                                            <form method="POST"
                                                action="{{ route('admin.stores.updateStoreFeatured', $store->id) }}"
                                                id="featuredForm{{ $store->id }}" style="display: none;">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        </div>

                                    </td>
                                    <td>{{ $store->created_at }}</td>

                                    <td>
                                        <a href="{{ Route('admin.stores.show', $store->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ Route('admin.stores.edit', [$store->id]) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>


                                        <form action="{{ Route('admin.stores.destroy', $store->id) }}" method="post"
                                            style="display:inline">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                        {{-- <a href="" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> 
                                    
                                </a>     --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {


            var datatable = $('#custom_table').DataTable({
                stateSave: true,
                sortable: true,
                responsive: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },

                    'colvis'
                ]
            });

            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const storeId = this.id.replace('featuredCheckbox', '');
                    const form = document.getElementById('featuredForm' + storeId);

                    if (this.checked) {
                        form.innerHTML += '<input type="hidden" name="featured" value="1">';
                    } else {
                        form.innerHTML += '<input type="hidden" name="featured" value="0">';
                    }

                    form.submit();
                });
            });


            // update store status
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const storeId = this.id.replace('statusCheckbox', '');
                    const form = document.getElementById('statusForm' + storeId);

                    if (this.checked) {
                        form.innerHTML += '<input type="hidden" name="status" value="active">';
                    } else {
                        form.innerHTML += '<input type="hidden" name="status" value="Inactive">';
                    }

                    form.submit();
                });
            });

        });
    </script>
@endpush
