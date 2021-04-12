@extends('admin.partials.master')

@section('title')
  <title>Quiz Details | Quiz System</title>
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
              <li class="breadcrumb-item active">Quiz Details</li>
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
                <h3 class="card-title">Quiz Details - {{$quiz->name}}</h3>
                <a href="{{ route('quiz.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Quiz list</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  @foreach($questions as $question)
                    <p>{{$question->question_no}}. {{$question->question}}</p>
                    <hr>
                    @php
                    $answers = App\Models\QuestionAnswer::where('quiz_id', $question->quiz_id)->where('question_no', $question->question_no)->get();
                    @endphp
                    <ol>
                    @foreach($answers as $answer)
                    <li>{{$answer->answer}}</li>
                    @endforeach
                    </ol>
                    <br>
                  @endforeach
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

