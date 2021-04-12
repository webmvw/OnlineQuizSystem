@extends('admin.partials.master')

@section('title')
  <title>Quiz | Quiz System</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Quiz</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Quiz</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Quiz List</h3>
                <a href="{{ route('quiz.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add Quiz</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Quiz Name</th>
                      <th>Total Mark</th>
                      <th>Time</th>
                      <th>Total Question</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->total_mark }}</td>
                          <td>{{ $value->time }} Minute</td>
                          <td>{{ $value->total_question }}</td>
                          <td>
                            <a href="{{ route('quiz.details.view', $value->id) }}" title="View" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('quiz.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            @php
                            $question = App\Models\Question::where('quiz_id', $value->id)->get()->count();
                            @endphp
                            @if($question == 0)
                            <a href="{{ route('quiz.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            @endif
                            @if($value->status == 0)
                            <a href="{{ route('quiz.active', $value->id) }}" class="btn btn-sm btn-primary">Active</a>
                            @else
                            <a href="{{ route('quiz.deactive', $value->id) }}" class="btn btn-sm btn-warning">Deactive</a>
                            @endif
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                      <tfoot>
                        <tr>
                          <th>SL</th>
                          <th>Quiz Name</th>
                          <th>Total Mark</th>
                          <th>Time</th>
                          <th>Total Question</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
            </div>
          </div>

        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

