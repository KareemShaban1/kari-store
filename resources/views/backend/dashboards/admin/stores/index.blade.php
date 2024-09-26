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
                                    <td style="width: 150px">{{ $store->slug }}</td>
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
                                        {{-- @if ($store->active == '1')
                                            <span class="badge badge-rounded badge-success p-2 mb-2">
                                                {{ trans('stores_trans.Active') }}
                                            </span>
                                        @elseif($store->active == '0')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('stores_trans.Inactive') }}
                                            </span>
                                        @endif --}}


                                        <div class="form-check form-switch" style="display:flex; justify-content: center;">
                                            <input type="checkbox" class="statusCheckbox form-check-input"
                                                data-store-id="{{ $store->id }}"
                                                {{ $store->active == '1' ? 'checked' : '' }}>
                                        </div>

                                    </td>

                                    <td>
                                        {{-- @if ($store->featured == '1')
                                            <span class="badge badge-rounded badge-success p-2 mb-2">
                                                {{ trans('stores_trans.Featured') }}
                                            </span>
                                        @elseif($store->featured == '0')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('stores_trans.Not_Featured') }}
                                            </span>
                                        @endif --}}


                                        <div class="form-check form-switch" style="display:flex; justify-content: center;">
                                            <input type="checkbox" class="featureCheckbox form-check-input"
                                                data-store-id="{{ $store->id }}"
                                                {{ $store->featured == '1' ? 'checked' : '' }}>
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
        // updateStoreFeatured
        $(document).ready(function() {

            document.querySelectorAll('.statusCheckbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const isChecked = this.checked;
                    const storeId = this.dataset.storeId; // Retrieve store ID from data attribute


                    // Send AJAX request to update store status
                    fetch('{{ route('admin.stores.updateStoreStatus', ':store_id') }}'.replace(
                            ':store_id', storeId), {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                active: isChecked ? 1 : 0
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to update status');
                            }

                            return response.json();
                        })
                        .then(data => {
                            toastr.success("تم تغير الحالة بنجاح");
                            console.log('Status updated successfully:', data);
                        })
                        .catch(error => {
                            toastr.error("لم يتم تغير الحالة");
                            console.error('Error updating status:', error);
                        });
                });
            });

            document.querySelectorAll('.featureCheckbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const isChecked = this.checked;
                    const storeId = this.dataset.storeId; // Retrieve store ID from data attribute

                    console.log('Store ID:', storeId);
                    console.log('Is checked:', isChecked);


                    // Send AJAX request to update store status
                    fetch('{{ route('admin.stores.updateStoreFeatured', ':store_id') }}'.replace(
                            ':store_id', storeId), {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                featured: isChecked ? 1 : 0
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to update status');
                            }

                            return response.json();
                        })
                        .then(data => {
                            toastr.success("تم تغير الحالة بنجاح");

                            console.log('Status updated successfully:', data);
                        })
                        .catch(error => {
                            toastr.error("لم يتم تغير الحالة");
                            console.error('Error updating status:', error);
                        });
                });
            });



            var datatable = $('#custom_table').DataTable({
                stateSave: true,
                sortable: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        text: 'نسخ',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7, 8]
                        }
                    },

                    // {
                    //     extend: 'colvis',
                    //     text: 'الأعمدة الظاهرة'
                    // }

                ]
            });



        });
    </script>
@endpush
