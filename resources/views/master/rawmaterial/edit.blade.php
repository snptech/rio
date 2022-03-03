@extends("layouts.app")
@section('title', 'Edit Raw Material')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="layers"></i>Edit Material</h4>

                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">

            <form class="login100-form validate-form" action="{{ route('rawmaterial-update',["id"=>$rawmaterial->id]) }}" method="POST" id="departmentForm">
                @csrf
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="rno">Material Name</label>
                            <input type="text" class="form-control" name="rawmeterial" id="rawmeterial" placeholder="Material Name" value="{{ old("rawmeterial")?old("rawmeterial"):$rawmaterial->material_name }}">
                            @if ($errors->has('rawmeterial'))
                                    <span class="text-danger">{{ $errors->first('rawmeterial') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="rno">Material Code</label>
                            <input type="text" class="form-control" name="rawmeterial_code" id="rawmeterial_code" placeholder="Material Code" value="{{ old("rawmeterial_code")?old("rawmeterial_code"):$rawmaterial->material_code }}">
                            @if ($errors->has('rawmeterial_code'))
                                    <span class="text-danger">{{ $errors->first('rawmeterial_code') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Mesurment</label>
                            {{ Form::select("mesurment",$mesurments,old("mesurment")?old("mesurment"):$rawmaterial->material_mesurment,array("id"=>"mesurment","class"=>"form-control","placeholder"=>"Material Mesurment")) }}
                            @if ($errors->has('mesurment'))
                                    <span class="text-danger">{{ $errors->first('mesurment') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Type</label>
                            {{ Form::select("type",$type,old("type")?old("type"):$rawmaterial->material_type,array("id"=>"type","class"=>"form-control","placeholder"=>"Material Type")) }}
                            @if ($errors->has('mesurment'))
                                    <span class="text-danger">{{ $errors->first('mesurment') }}</span>
                            @endif

                        </div>
                    </div>
                   {{-- <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Opening Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="Material Opening Stock" value="{{ old("stock")?old("stock"):$rawmaterial->material_stock }}">

                            @if ($errors->has('stock'))
                                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                            @endif

                        </div>
                    </div> --}}
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Preorder Stock</label>
                            <input type="number" class="form-control" name="prestock" id="prestock" placeholder="Material Preorder Stock" value="{{ old("prestock")? old("prestock"):$rawmaterial->material_preorder_stock }}">

                            @if ($errors->has('prestock'))
                                    <span class="text-danger">{{ $errors->first('prestock') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="form-group ">
                            <label for="controller_id">Grade</label>
                            {{ Form::select("grade",$group,old("grade")?old("grade"):$rawmaterial->grade,array("id"=>"type","class"=>"form-control  grade","placeholder"=>"Grade")) }}
                            @if ($errors->has('grade'))
                                    <span class="text-danger">{{ $errors->first('grade') }}</span>
                            @endif

                        </div>
                    </div>
                   {{-- <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Expiery Date</label>
                            <input type="date" class="form-control calendar"  name="expierydate" id="expierydate" placeholder="Material Expiery Date" value="{{ old("expierydate")?old("expierydate"):($rawmaterial->expiry_date?date("Y-m-d",$rawmaterial->expiry_date):'')}}">

                            @if ($errors->has('expierydate'))
                                    <span class="text-danger">{{ $errors->first('expierydate') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Rio Expiery Date</label>
                            <input type="date" class="form-control calendar" name="rioexpierydate" id="rioexpierydate" placeholder="Rio Expiery Date" value="{{ old("rioexpierydate")?old("rioexpierydate"):($rawmaterial->rio_expiry_date?date("Y-m-d",$rawmaterial->rio_expiry_date):'') }}">

                            @if ($errors->has('rioexpierydate'))
                                    <span class="text-danger">{{ $errors->first('rioexpierydate') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Manufacturing Date</label>
                            <input type="date" class="form-control calendar" name="manufacturingdate" id="manufacturingdate" placeholder="Manufacturing Date" value="{{ old("manufacturingdate")?old("manufacturingdate"):($rawmaterial->man_date?date("Y-m-d",$rawmaterial->man_date):'') }}">

                            @if ($errors->has('Manufacturing Date'))
                                    <span class="text-danger">{{ $errors->first('manufacturingdate') }}</span>
                            @endif

                        </div>
                    </div> --}}
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
      },
      type:{
          required: true
      }

    },
    messages : {
        rawmeterial: {
        required: "Field Meterial is required.",
        minlength: "Meterial should be at least 3 characters"
      },
      mesurment: {
        required: "Please select stock mesurment",

      },
      stock: {
        required: "Please enter opening stock",

      },
      type: {
          required: "Please select material type"
      }
    }
  });

   });

    </script>

@endpush
