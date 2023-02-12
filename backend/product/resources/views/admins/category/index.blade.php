@extends('admins.layouts.admin')
@section('title')
 <title>Danh mục sản phẩm</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admins.partials.content-header',['name' => 'Danh mục sản phẩm','key' => ''])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @include('admins.partials.alert')

      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              @can('category_add')
                <a href="{{ route('admins.categories.create'); }}" class="btn btn-success float-right m-2">Thêm mới</a>
                @endcan
            </div>
            <div class="col-md-12">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <br>
              <table class="table table-bordered table-striped">

                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Danh mục cha</th>
                        <th width = '10%' scope="col">Ngày tạo</th>
                        <th width = '10%' scope="col">Ngày sửa đổi</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                        {{-- {{var_dump($category);}} --}}
                        @if(!$category->isEmpty())
                            @foreach($category as$key =>$value)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$value->name}}</td>
                        <td>@if($value->parent_id == 0)
                          Danh mục cha
                         @else 
                         @foreach($category as$keys =>$values)
                          @if($value->parent_id == $values->id)
                            {{$values->name}}
                          @endif
                          @endforeach

                        @endif</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        <td>
                          @can('category_edit')
                            <a href="{{ route('admins.categories.edit',['id'=>$value->id]) }}" class="btn btn-info">Sửa</a>
                            @endcan
                            @can('category_delete')
                            <a href=""
                            data-url="{{ route('admins.categories.delete', ['id' => $value->id]) }}"
                            class="btn btn-danger action_deleteForcus">Xóa</a>
                            @endcan 
                        </td>
                      </tr>
                      @endforeach
                      
                      @else
                      <tr>
                        <td class="text-center" colspan="12">Không có sẵn danh mục</td>
                      </tr>
                      
                      @endif
                      
                    </tbody>
                  </table>


            </div>
            <div>
              {{ $category->links('pagination::bootstrap-4'); }}

            </div>

           
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

@section('js')

@endsection

