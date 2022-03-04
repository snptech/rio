@extends("layouts.app")
@section('title', 'Create Raw Material')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="layers"></i>New Material</h4>

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
                            <label for="rno">Material Name</label>
                            <input type="text" class="form-control" name="rawmeterial" id="rawmeterial" placeholder="Material Name" value="{{ old("rawmeterial") }}">
                            @if ($errors->has('rawmeterial'))
                                    <span class="text-danger">{{ $errors->first('rawmeterial') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="rno">Material Code</label>
                            <input type="text" class="form-control" name="rawmeterial_code" id="rawmeterial_code" placeholder="Material Code" value="{{ old("rawmeterial_code") }}">
                            @if ($errors->has('rawmeterial_code'))
                                    <span class="text-danger">{{ $errors->first('rawmeterial_code') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Mesurment</label>
                            {{ Form::select("mesurment",$mesurments,old("mesurment"),array("id"=>"mesurment","class"=>"form-control","placeholder"=>"Material Mesurment")) }}
                            @if ($errors->has('mesurment'))
                                    <span class="text-danger">{{ $errors->first('mesurment') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="form-group ">
                            <label for="controller_id">Material Type</label>
                            {{ Form::select("type",$type,old("type"),array("id"=>"type","class"=>"form-control  material_type","placeholder"=>"Material Type")) }}
                            @if ($errors->has('mesurment'))
                                    <span class="text-danger">{{ $errors->first('mesurment') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 hidden material_type_div" style="display: none;">

                    </div>

                    {{--<div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Opening Stock</label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="Material Opening Stock" value="{{ old("stock") }}">

                            @if ($errors->has('stock'))
                                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                            @endif

                        </div>
                    </div> --}}
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Preorder Stock</label>
                            <input type="number" class="form-control" name="prestock" id="prestock" placeholder="Material Preorder Stock" value="{{ old("prestock") }}">

                            @if ($errors->has('prestock'))
                                    <span class="text-danger">{{ $errors->first('prestock') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="form-group ">
                            <label for="controller_id">Grade</label>
                            {{ Form::select("grade",$group,old("grade"),array("id"=>"type","class"=>"form-control  grade","placeholder"=>"Grade")) }}
                            @if ($errors->has('grade'))
                                    <span class="text-danger">{{ $errors->first('grade') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="Status">QC Status</label> <br>
                            <div class="form-check-inline">
                              <input type="checkbox" class="form-check-input" name="qc_status" id="qc_status"  value="1" checked="checked">
                              <label class="form-check-label" for="qc_status">Yes</label>
                            </div>

                        </div>
                    </div>
                   {{--  <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="controller_id">Material Expiery Date</label>
                            <input type="date" class="form-control calendar"  name="expierydate" id="expierydate" placeholder="Material Expiery Date" value="{{ old("expierydate") }}">

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
                            <input type="date" class="form-control calendar" name="manufacturingdate" id="manufacturingdate" placeholder="Manufacturing Date" value="{{ old("manufacturingdate") }}">

                            @if ($errors->has('Manufacturing Date'))
                                    <span class="text-danger">{{ $errors->first('manufacturingdate') }}</span>
                            @endif

                        </div>
                    </div>
                     --}}
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
        required: "Field Raw Meterial is required.",
        minlength: "Raw Meterial should be at least 3 characters"
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
   $(".material_type").change(function(){

    var id = $('.material_type').val();

 if(id=='P'){

  var capacity ='<div class="form-group"> <label for="controller_id">Capacity</label><input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacity Opening Stock" value="{{ old("stock") }}"></div>';
  $('.material_type_div').css('display','block');
  $('.material_type_div').html(capacity);
 }



    });

    </script>

@endpush
