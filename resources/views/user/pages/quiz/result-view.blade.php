@extends('user.partials.master')

@section('title')
  <title>Complete Quiz | Quiz System</title>
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
              <li class="breadcrumb-item active">Result View</li>
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
                <h3 class="card-title">Complete Quiz List</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                @php
                $user_id = Auth::user()->id;
                $student_quiz_result = App\Models\StudentQuizResult::where('user_id', $user_id)->orderBy('id', 'desc')->get();
                @endphp
                <table class="table table-striped" id="example2">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Quiz Name</th>
                      <th>Total Mark</th>
                      <th>Result</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($student_quiz_result as $key=>$value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->quiz->name}}</td>
                      <td>{{$value->total_mark}}</td>
                      <td>{{$value->result}}</td>
                      <td>{{date('F j, Y', strtotime($value->date))}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Quiz Name</th>
                      <th>Total Mark</th>
                      <th>Result</th>
                      <th>Date</th>
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

