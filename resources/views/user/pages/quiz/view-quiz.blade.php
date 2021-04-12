@extends('user.partials.master')

@section('title')
  <title>Quiz List | Quiz System</title>
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
              <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Quiz List</li>
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
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Quiz</th>
                      <th>Total Question</th>
                      <th>Total Mark</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($quizzes as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->total_question }}</td>
                          <td>{{ $value->total_mark }}</td>
                          <td>{{ $value->time }} Minute</td>
                          <td>
                            <a href="#" class="btn btn-success btn-sm">Start</a>
                          </td>
                        </tr>
                      @endforeach

                    </tbody>
                      <tfoot>
                        <tr>
                          <th>SL</th>
                          <th>Quiz</th>
                          <th>Total Question</th>
                          <th>Total Mark</th>
                          <th>Time</th>
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

