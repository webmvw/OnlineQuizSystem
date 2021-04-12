
@extends('admin.partials.master')

@section('title')
  <title>Add Quiz | Quiz System</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Question</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('quiz.view') }}">Quiz</a></li>
              <li class="breadcrumb-item active">Add Quiz</li>
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
                <h3 class="card-title">Add Quiz</h3>
                <a href="{{ route('quiz.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Quiz List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('quiz.store') }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="quiz">Quiz <span style="color:red">*</span></label>
                            <input type="text" name="quiz" class="form-control" id="quiz" placeholder="Enter Quiz Name">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="total_mark">Total Mark</label>
                            <input type="number" name="total_mark" id="total_mark" class="form-control" placeholder="Enter Total Mark">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="time">Time (Minute Count)</label>
                            <input type="number" name="time" id="time" class="form-control" placeholder="Ex: 10">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="total_question">Total Question</label>
                            <input type="number" name="total_question" id="total_question" class="form-control" placeholder="Total Question">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Add Quiz</button>
                    </div>
                  </form> 

              <div class="card-footer"></div>
            </div> <!-- .card end -->

          </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      quiz: {
        required: true,
      },
      total_mark: {
        required: true,
        number: true,
      },
      time: {
        required: true,
        number: true,
      },
      total_question:{
        required: true,
        number: true,
      },
    },
    messages: {
      quiz: {
        required: "Please enter quiz name.",
      },
      total_mark: {
        required: "Please enter total mark",
        number: "Invalid Input. Only number allowed",
      },
      time: {
        required: "Please enter time",
        number: "Invalid Input. Only number allowed",
      },
      total_question:{
        required: "Please enter total question number",
        number: "Invalid Input. Only number allowed",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


@endsection