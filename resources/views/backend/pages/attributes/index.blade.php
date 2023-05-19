@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('attributes_trans.Attributes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('attributes_trans.Attributes') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('attributes_trans.All_Attributes') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('attributes_trans.Attributes') }}</li>
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

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('attributes_trans.Id') }}</th>
                            <th>{{ trans('attributes_trans.Attribute_Name') }}</th>
                            <th>{{ trans('attributes_trans.Number_Of_Elements') }}</th>
                            <th>{{ trans('attributes_trans.Has_Color') }}</th>
                            <th>{{ trans('attributes_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $attribute)
                            <tr>

                                <td>{{ $attribute->id }}</td>
                                <td>
                                    <a href="{{ Route('backend.attributes.show', $attribute->id) }}">
                                        {{ $attribute->name }}
                                    </a>
                                    
                                </td>
                                <td>
                                    <a href="{{ Route('backend.attributes.show', $attribute->id) }}">
                                    {{$attribute->attribute_values_count}}
                                    </a>
                                </td>
                                
                                    <td>
                                        @if ($attribute->has_color == '0')
                                            <span class="text-danger">{{ trans('attributes_trans.Not_Color') }}</span>
                                        @elseif($attribute->has_color == '1')
                                            <span class="text-success">{{ trans('attributes_trans.Color') }}</span>
                                        @endif
                                    </td>
                                
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    
                                        <a href="{{ Route('backend.attributes.edit', $attribute->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                  



                                    <form action="{{ Route('backend.attributes.destroy', $attribute->id) }}"
                                        method="post" style="display:inline">
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
@section('js')
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection
