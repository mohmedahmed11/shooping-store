@extends('layouts.master')
@section('content')
<section id="data-thumb-view" class="data-thumb-view-header">

    <!-- dataTable starts -->
    <div class="table-responsive">
        <table class="table data-thumb-view">
            <thead>
                <tr>
                    <th>#</th>
                    <th>صوره</th>
                    <th>المنتج</th>
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @isset($banners)
                    @foreach($banners as $index=>$banner)
                        <tr role="row" class="odd">
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ $banner->image_path }}" style="width: 200px;" class="img-thumbnail" alt=""></td>
                            <td>{{ $banner->has_product == 1 ? $banner->product_name : 'لايوجد منتج' }}</td>
                            <td>
                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i>تعديل</a>
                                <a href="{{ route('banner.status', $banner->id) }}" id="delete" class="btn btn-outline-warning "><i class="fa fa-status"></i>
                                    @if ($banner->status == 0)
                                    تفعيل
                                    @else
                                    إلغاء تفعيل
                                    @endif
                                </a>
                                <a href="{{ route('banner.delete', $banner->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
    <!-- dataTable ends -->

</section>
@endsection
