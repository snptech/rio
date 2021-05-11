@extends("layouts.app")
@section('title', 'Create Raw Material')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="layers"></i>New Raw Material</h4>

                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">

            <form class="login100-form validate-form" action="{{ route('rawmaterial-store') }}" method="POST" id="departmentForm">
                @csrf
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="rno">Raw Material Name</label>
                            <input type="text" class="form-control" name="rawmeterial" id="rawmeterial" placeholder="Raw Material" value="{{ old("rawmeterial") }}">
                            @if ($errors->has('rawmeterial'))
                                    <span class="text-danger">{{ $errors->first('rawmeterial') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Raw Material Mesurment</label>
                            {{ Form::select("mesurment",$mesurments,old("mesurment"),array("id"=>"mesurment","class"=>"form-control","placeholder"=>"Raw Material Mesurment")) }}
                            @if ($errors->has('mesurment'))
                                    <span class="text-danger">{{ $errors->first('mesurment') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Raw Material Opening Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="Raw Material Opening Stock" value="{{ old("stock") }}">

                            @if ($errors->has('stock'))
                                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Raw Material Preorder Stock</label>
                            <input type="number" class="form-control" name="prestock" id="prestock" placeholder="Raw Material Preorder Stock" value="{{ old("prestock") }}">

                            @if ($errors->has('prestock'))
                                    <span class="text-danger">{{ $errors->first('prestock') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Raw Material Expiery Date</label>
                            <input type="date" class="form-control calendar"  name="expierydate" id="expierydate" placeholder="Raw Material Expiery Date" value="{{ old("expierydate") }}">

                            @if ($errors->has('expierydate'))
                                    <span class="text-danger">{{ $errors->first('expierydate') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Rio Expiery Date</label>
                            <input type="date" class="form-control calendar" name="rioexpierydate" id="rioexpierydate" placeholder="Rio Expiery Date" value="{{ old("rioexpierydate") }}">

                            @if ($errors->has('rioexpierydate'))
                                    <span class="text-danger">{{ $errors->first('rioexpierydate') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Manufacturing Date</label>
                            <input type="date" class="form-control calendar" name="manufacturingdate" id="manufacturingdate" placeholder="Rio Expiery Date" value="{{ old("manufacturingdate") }}">

                            @if ($errors->has('Manufacturing Date'))
                                    <span class="text-danger">{{ $errors->first('manufacturingdate') }}</span>
                            @endif

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
        rawmeterial : {
        required: true,
        minlength: 3
      },
      mesurment:{
        required: true
      },
      stock : {
        required: true,
        number:true
      }
    },
    messages : {
        rawmeterial: {
        required: "Field Raw Meterial is required.",
        minlength: "Raw Meterial should be at least 3 characters"
      },
      mesurment: {
        required: "Please select stock mesurment",

      },
      stock: {
        required: "Please enter opening stock",

      }
    }
  });

   });

    </script>

@endpush
