
@extends('admin.partials.master')

@section('title')
  <title>Add Question | BdCollage</title>
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
              <li class="breadcrumb-item"><a href="{{ route('question.view') }}">Question</a></li>
              <li class="breadcrumb-item active">Add Question</li>
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
                <h3 class="card-title">Add Question</h3>
                <a href="{{ route('question.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Question List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('question.store') }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="question_no">Question No</label>
                            <input type="number" name="question_no" class="form-control" id="question_no" value="{{$question_no}}" style="background: #D8FDBA" readonly>
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="form-group">
                            <label for="question">Question <span style="color:red">*</span></label>
                            <input type="text" name="question" class="form-control" id="question" placeholder="Enter Question">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="choice_one">Choice One</label>
                            <input type="text" name="choice_one" id="choice_one" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="choice_two">Choice Two</label>
                            <input type="text" name="choice_two" id="choice_two" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="choice_three">Choice Three</label>
                            <input type="text" name="choice_three" id="choice_three" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="choice_four">Choice Four</label>
                            <input type="text" name="choice_four" id="choice_four" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="currect_answer_no">Correct Answer No</label>
                            <input type="number" name="currect_answer_no" id="currect_answer_no" class="form-control" placeholder="Like 1,2,3 or 4.">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Add Question</button>
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
      question: {
        required: true,
      },
      choice_one: {
        required: true,
      },
      choice_two: {
        required: true,
      },
      choice_three: {
        required: true,
      },
      choice_four: {
        required: true,
      },
      currect_answer_no: {
        required: true,
        number:true,
      },
    },
    messages: {
      question: {
        required: "Please enter question.",
      },
      choice_one: {
        required: "Please enter choice one answer",
      },
      choice_two: {
        required: "Please enter choice two answer",
      },
      choice_three: {
        required: "Please enter choice three answer",
      },
      choice_four: {
        required: "Please senter choice four answer",
      },
      currect_answer_no: {
        required: "Please enter correct answer no.",
        number:"Invalid input. Only number allowed.",
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