@extends('user.partials.master')

@section('title')
  <title>Start Quiz | Quiz System</title>
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
              <li class="breadcrumb-item active">Start Quiz</li>
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
                <p>Quiz time: {{$quiz->time}} Minute</p>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('user.quiz.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  @foreach($questions as $key=>$question)
                    <div id="div{{ $question->id }}">
                      <p>{{$question->question_no}}. {{$question->question}}</p>
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                      <input type="hidden" name="question_no[]" value="{{$question->question_no}}">
                      @php
                      $answers = App\Models\QuestionAnswer::where('quiz_id', $question->quiz_id)->where('question_no', $question->question_no)->get();
                      @endphp
                      @foreach($answers as $key=>$answer)
                      <p>
                        <input type="radio" name="answer{{$answer->question_no}}" value="{{$answer->right_answer}}" id="answer{{$key}}">&nbsp;&nbsp;&nbsp;
                        <label for="answer{{$key}}">{{$answer->answer}}</label>
                      </p>
                      @endforeach
                      <hr>
                    </div>
                  @endforeach
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </div>
              </form>  
            </div>
          </div>

        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

