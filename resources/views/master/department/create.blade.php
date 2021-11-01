@extends("layouts.app")
@section('title', 'Create Department')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="layers"></i>New Department</h4>

                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <form class="login100-form validate-form" action="{{ route('department-store') }}" method="POST" id="departmentForm">
                @csrf
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="rno">Deparment Name</label>
                            <input type="text" class="form-control" name="department" pattern="\d*" maxlength="15" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" id="department" placeholder="Department Name" value="{{ old("department") }}">
                            @if ($errors->has('department'))
                                    <span class="text-danger">{{ $errors->first('department') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="form-group">
                            <label for="dep_type">Department Type</label>
                            <div>

                                <div class="form-check form-check-inline">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="dep_type"
                                      id="inlineRadio1"
                                      value="1"
                                      @if(old('dep_type') == 'W') checked @endif
                                    />
                                    <label class="form-check-label" for="inlineRadio1"> Warehouse</label>
                                  </div>

                                  <div class="form-check form-check-inline">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="dep_type"
                                      id="inlineRadio2"
                                      value="0"
                                      @if(old('dep_type') == "D") checked @endif
                                    />
                                    <label class="form-check-label" for="inlineRadio2">Department</label>
                                  </div>

                                  @if ($errors->has('dep_type'))
                                    <span class="text-danger">{{ $errors->first('dep_type') }}</span>
                                  @endif


                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="form-group">
                            <label for="publish">Publish</label>
                            <div>

                                <div class="form-check form-check-inline">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="publish"
                                      id="inlineRadio3"
                                      value="1"
                                      @if(old('publish') == 1) checked @endif
                                    />
                                    <label class="form-check-label" for="inlineRadio3"> Yes</label>
                                  </div>

                                  <div class="form-check form-check-inline">
                                    <input
                                      class="form-check-input"
                                      type="radio"
                                      name="publish"
                                      id="inlineRadio"
                                      value="0"
                                      @if(old('publish') == 0) checked @endif
                                    />
                                    <label class="form-check-label" for="inlineRadio4">No</label>
                                  </div>

                                  @if ($errors->has('publish'))
                                    <span class="text-danger">{{ $errors->first('publish') }}</span>
                                  @endif


                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md ml-0 form-btn">Submit</button><button type="reset"
                                class="btn btn-light btn-md form-btn">Clear</button>
                        </div>
                    </div>
                </div>
                </form>
        </div>
    </div>



@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
  $("#departmentForm").validate({
    rules: {
      department : {
        required: true,
        minlength: 3
      },
      publish: {
        required: true,

      }
    },
    messages : {
    department: {
        required: "Field Department is required.",
        minlength: "Deparment should be at least 3 characters"
      },
      publish: {
        required: "Please select publish option",

      }
    }
  });
  $(function() {
$('input:text').keydown(function(e) {
if(e.keyCode==65)
    return false;

});
});
});

    </script>

@endpush
