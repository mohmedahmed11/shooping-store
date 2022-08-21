@extends('layouts.master')

@section('content')

    <!-- BEGIN: Content-->

            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">الاقسام الرئيسية</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    {!! Toastr::message() !!}

                </div>
            </div>
            <div class="content-body">
{{--  /////////////////////////////////////////////////////////////////////////////////--}}


<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">

<div class="table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">

		<div class="row">
			<div class="col-sm-12">
				<table class="table zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>الاسم</th>
                            <th>صوره</th>
                            <th>إجراء</th>
						</tr>
                    </thead>
                    <tbody>
                        @isset($categories)
                        @foreach($categories as $index=>$category)
                            <tr role="row" class="odd">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td><img src="{{ $category->image_path }}" style="width: 80px;" class="img-thumbnail" alt=""></td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i>تعديل</a>

                                    <a href="{{ route('category.delete', $category->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>

                                    {{-- <form action="{{ route('maincategories.delete', $category->id) }}" method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-outline-danger delete "><i class="fa fa-trash"></i>حذف</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                        @endisset
					</tbody>
                </table>
                {{ $categories->appends(request()->query())->links() }}
			</div>
		</div>
		{{-- <div class="row">
			<div class="col-sm-12 col-md-6">
				<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
					<ul class="pagination">
						<li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
							<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
						</li>
						<li class="paginate_button page-item active">
							<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a>
						</li>
						<li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
							<a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
						</li>
					</ul>
				</div>
			</div>
		</div> --}}
	</div>
</div>

</div>
</div>
</div>
</div>
</section>

{{--  /////////////////////////////////////////////////////////////////////////////////--}}


            </div>
      

    <!-- END: Content-->
@endsection
