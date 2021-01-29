@extends('layouts.master')
@section('content')
<div class="container">
    <div id="errorShow" style="display: none" class="error-message alert alert-danger errorShow"></div>
    <h3 style="margin-top: 12px;padding: 10px;background-color: lightgray;">My Details</h3><br>
    <div class="row userDetails">
        <form role="form" id="userForm" method="post" autocomplete="off">
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="name">Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                    @if ($errors->has('name'))
                    <label class="error" for="name">{{ $errors->first('name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="father_name">Father Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="father_name" id="father_name" value="{{ old('father_name') }}" placeholder="Enter Father Name">
                    @if ($errors->has('father_name'))
                    <label class="error" for="father_name">{{ $errors->first('father_name') }}</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="mother_name">Mother Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{ old('mother_name') }}" placeholder="Enter Mother Name">
                    @if ($errors->has('mother_name'))
                    <label class="error" for="mother_name">{{ $errors->first('mother_name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="child_name">Child Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="child_name" id="child_name" value="{{ old('child_name') }}" placeholder="Enter Child Name">
                    @if ($errors->has('child_name'))
                    <label class="error" for="child_name">{{ $errors->first('child_name') }}</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="aadhar">Aadhar :<span class="required">*</span>(12 digits)</label>
                    <input type="text" class="form-control" data-type="adhaar-number" name="aadhar" id="aadhar" value="{{ old('aadhar') }}" placeholder="Enter Aadhar" maxLength="12">
                    @if ($errors->has('aadhar'))
                    <label class="error" for="aadhar">{{ $errors->first('aadhar') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="birth_date">Birth Date :<span class="required">*</span></label>
                    <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" placeholder="Enter Birth Date">
                    @if ($errors->has('birth_date'))
                    <label class="error" for="birth_date">{{ $errors->first('birth_date') }}</label>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <h3 style="margin-top: 12px;padding: 10px;background-color: lightgray;">Father Details</h3><br>
    <div class="row fatherDetails">
        <form role="form" id="fatherForm" method="post" autocomplete="off">
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="f_name">Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="f_name" id="f_name" value="{{ old('f_name') }}" placeholder="Enter Name">
                    @if ($errors->has('f_name'))
                    <label class="error" for="f_name">{{ $errors->first('f_name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="f_father_name">Father Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="f_father_name" id="f_father_name" value="{{ old('f_father_name') }}" placeholder="Enter Father Name">
                    @if ($errors->has('f_father_name'))
                    <label class="error" for="f_father_name">{{ $errors->first('f_father_name') }}</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="f_mother_name">Mother Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="f_mother_name" id="f_mother_name" value="{{ old('f_mother_name') }}" placeholder="Enter Mother Name">
                    @if ($errors->has('f_mother_name'))
                    <label class="error" for="f_mother_name">{{ $errors->first('f_mother_name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="f_child_name">Child Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="f_child_name" id="f_child_name" value="{{ old('f_child_name') }}" placeholder="Enter Child Name">
                    @if ($errors->has('f_child_name'))
                    <label class="error" for="f_child_name">{{ $errors->first('f_child_name') }}</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="f_aadhar">Aadhar :<span class="required">*</span>(12 digits)</label>
                    <input type="text" data-type="adhaar-number" class="form-control" name="f_aadhar" id="f_aadhar" value="{{ old('f_aadhar') }}" placeholder="Enter your Aadhar" maxlength="12">
                    @if ($errors->has('f_aadhar'))
                    <label class="error" for="f_aadhar">{{ $errors->first('f_aadhar') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="f_birth_date">Birth Date :<span class="required">*</span></label>
                    <input type="date" class="form-control" name="f_birth_date" id="f_birth_date" value="{{ old('f_birth_date') }}" placeholder="Enter Birth Date">
                    @if ($errors->has('f_birth_date'))
                    <label class="error" for="f_birth_date">{{ $errors->first('f_birth_date') }}</label>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <h3 style="margin-top: 12px;padding: 10px;background-color: lightgray;">Mother Details</h3><br>
	<div class="row motherDetails">
		<form role="form" id="motherForm" method="post"  autocomplete="off">
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="m_name">Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="m_name" id="m_name" value="{{ old('m_name') }}" placeholder="Enter Name">
                    @if ($errors->has('m_name'))
                    <label class="error" for="m_name">{{ $errors->first('m_name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="m_father_name">Father Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="m_father_name" id="m_father_name" value="{{ old('m_father_name') }}" placeholder="Enter Father Name">
                    @if ($errors->has('m_father_name'))
                    <label class="error" for="m_father_name">{{ $errors->first('m_father_name') }}</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="m_mother_name">Mother Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="m_mother_name" id="m_mother_name" value="{{ old('m_mother_name') }}" placeholder="Enter Mother Name">
                    @if ($errors->has('m_mother_name'))
                    <label class="error" for="m_mother_name">{{ $errors->first('m_mother_name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="m_child_name">Child Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" name="m_child_name" id="m_child_name" value="{{ old('m_child_name') }}" placeholder="Enter Child Name">
                    @if ($errors->has('m_child_name'))
                    <label class="error" for="m_child_name">{{ $errors->first('m_child_name') }}</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="m_aadhar">Aadhar :<span class="required">*</span>(12 digits)</label>
                    <input type="text" data-type="adhaar-number" class="form-control" name="m_aadhar" id="m_aadhar" value="{{ old('m_aadhar') }}" placeholder="Enter your Aadhar" maxlength="12">
                    @if ($errors->has('m_aadhar'))
                    <label class="error" for="m_aadhar">{{ $errors->first('m_aadhar') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="birth_date">Birth Date :<span class="required">*</span></label>
                    <input type="date" class="form-control" name="m_birth_date" id="m_birth_date" value="{{ old('m_birth_date') }}" placeholder="Enter Birth Date">
                    @if ($errors->has('m_birth_date'))
                    <label class="error" for="m_birth_date">{{ $errors->first('m_birth_date') }}</label>
                    @endif
                </div>
            </div>
        </form>
    </div>
	<h3 style="margin-top: 12px;padding: 10px;background-color: lightgray;">Child Details</h3><br>
    <div class="row childDetails">
        <form role="form" id="childForm" method="post"  autocomplete="off">
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="c_name">Name :</label>
                    <input type="text" class="form-control" name="c_name" id="c_name" value="{{ old('c_name') }}" placeholder="Enter Name">
                    @if ($errors->has('c_name'))
                    <label class="error" for="c_name">{{ $errors->first('c_name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="c_father_name">Father Name :</label>
                    <input type="text" class="form-control" name="c_father_name" id="c_father_name" value="{{ old('c_father_name') }}" placeholder="Enter Father Name">
                    @if ($errors->has('c_father_name'))
                    <label class="error" for="c_father_name">{{ $errors->first('c_father_name') }}</label>
                    @endif
                </div>
	       </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="c_mother_name">Mother Name :</label>
                    <input type="text" class="form-control" name="c_mother_name" id="c_mother_name" value="{{ old('c_mother_name') }}" placeholder="Enter Mother Name">
                    @if ($errors->has('c_mother_name'))
                    <label class="error" for="c_mother_name">{{ $errors->first('c_mother_name') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="c_child_name">Child Name :</label>
                    <input type="text" class="form-control" name="c_child_name" id="c_child_name" value="{{ old('c_child_name') }}" placeholder="Enter Child Name">
                    @if ($errors->has('c_child_name'))
                    <label class="error" for="c_child_name">{{ $errors->first('c_child_name') }}</label>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group col-md-6">
                    <label for="c_aadhar">Aadhar :(12 digits)</label>
                    <input type="text" data-type="adhaar-number" class="form-control" name="c_aadhar" id="c_aadhar" value="{{ old('c_aadhar') }}" placeholder="Enter your Aadhar" maxlength="12">
                    @if ($errors->has('c_aadhar'))
                    <label class="error" for="c_aadhar">{{ $errors->first('c_aadhar') }}</label>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="c_birth_date">Birth Date :</label>
                    <input type="date" class="form-control" name="c_birth_date" id="c_birth_date" value="{{ old('c_birth_date') }}" placeholder="Enter Birth Date">
                    @if ($errors->has('c_birth_date'))
                    <label class="error" for="c_birth_date">{{ $errors->first('c_birth_date') }}</label>
                    @endif
                </div>
	       </form>
       </div>
       <div class=" row col-lg-12" style="padding-top: 20px;">
            <div class="form-group col-md-6">
            	<button name="Save" class="btn btn-info save">Save</button>
                <a href="{{ url('users/')}}" class="btn btn-info">Back</a>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
	// click on save to save data
    $(".save").click(function(){
    	$('#errorShow').empty();
		var mainForm   = $('#userForm, #fatherForm, #motherForm, #childForm').serialize();
		$.ajax( {
	        type: 'POST',
	        url: "{{ route('users.store') }}",
	        headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
	        data: mainForm,
	        success: function(data) {
                console.log(data.success);
                if(data.success == true){
                    window.location.href = "{{ url('users/') }}";
                }else{
                    window.location.href = "{{ url('users/create') }}";

                }
	        },
        	error: function (reject) {
                if( reject.status === 422 ) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors, function (key, value) {
                    // console.log(key+ " " +value);
                    $('#errorShow').addClass("alert alert-danger");
                    if($.isPlainObject(value)) {
                        $.each(value, function (key, value) {
                        	$('#errorShow').show().append(value+"<br/>");
                        });
                    }else{
                    $('#errorShow').show().append(value+"<br/>"); //this is my div with messages
                    }
                });
                }
            }
    });
 	});
    $('[data-type="adhaar-number"]').keyup(function() {
        var value = $(this).val();
        value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("");
        $(this).val(value);
        });
    $('[data-type="adhaar-number"]').on("change, blur", function() {
        var value = $(this).val();
        var maxLength = $(this).attr("maxLength");
        if (value.length != maxLength) {
            $(this).addClass("highlight-error");
        } else {
            $(this).removeClass("highlight-error");
        }
    });
</script>
@endsection