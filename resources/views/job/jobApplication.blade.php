@extends('layouts.master')
@section('content')
<div class="container">
    <style type="text/css">
        .required{
            color: red;
        }
    </style>
    <div id="errorShow" style="display: none" class="error-message alert alert-danger errorShow"></div>
    <h3 style="margin-top: 12px;padding: 10px;background-color: lightgray;">Job Application</h3><br>
    <form id="jobForm" role="form" method="post" action="{{ route('job.store') }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-12">
    	<section class="panel">
    		<header class="panel-heading">
    			<h4> Basic Details </h4>
    		</header>
    		<div class="panel-body">
    			
                <div class="form-group col-lg-4">
                    <label for="name">Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
                    @if ($errors->has('name'))
                    <label class="error" for="name">{{ $errors->first('name') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-4">
                    <label for="email">Email :<span class="required">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                    @if ($errors->has('email'))
                    <label class="error" for="email">{{ $errors->first('email') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-4">
                    <label for="address">Address :<span class="required">*</span></label>
                    <textarea name="address" class="form-control" id="address" placeholder="Enter Address"></textarea>
                    @if ($errors->has('address'))
                    <label class="error" for="address">{{ $errors->first('address') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-4">
                	<label for="gender">Gender :<span class="required">*</span></label>
                	<div class="input-group">
                		<label class="radio-inline">
                			<input type="radio" name="gender" value="male" checked > Male</label>
                			<label class="radio-inline"><input type="radio" name="gender" value="female" > Female </label>
                		</div>
                        @if ($errors->has('gender'))
                        <label class="error" for="gender">{{ $errors->first('gender') }}</label>
                        @endif
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="contact">Contact :<span class="required">*</span></label>
                         <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact">
                        @if ($errors->has('contact'))
                        <label class="error" for="contact">{{ $errors->first('contact') }}</label>
                        @endif
                </div>
            	
    		</div>
    	</section>
	</div>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4> Education Details </h4>
            </header>
            <div class="panel-body">
                 <div class="form-group col-lg-6">
                    <label for="ssc">SSC :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="ssc" name="ssc" placeholder="Enter your ssc">
                    @if ($errors->has('ssc'))
                    <label class="error" for="ssc">{{ $errors->first('ssc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="hsc">HSC :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="hsc" name="hsc" placeholder="Enter your ssc">
                    @if ($errors->has('hsc'))
                    <label class="error" for="hsc">{{ $errors->first('hsc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="graduation">Graduation :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="graduation" name="graduation" placeholder="Enter your Graduation">
                    @if ($errors->has('graduation'))
                    <label class="error" for="graduation">{{ $errors->first('graduation') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="master">Master Degree :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="master" name="master" placeholder="Enter your Master Degree">
                    @if ($errors->has('master'))
                    <label class="error" for="master">{{ $errors->first('master') }}</label>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4> Work Experience </h4>
            </header>
            <div class="panel-body">
                <table class="table table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Company Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>    
                    </thead>
                    <tbody>
                        <tr class="work_experience">
                            <td><label class="sr_no">1 </label></td></td>
                            <td><input type="text" name="company_name[]" id="comapny_name"></td>
                            <td><input type="date" name="start_date[]" id="start_date"></td>                        
                            <td><input type="date" name="end_date[]" id="end_date"></td>
                            <td>
                                <button  tabindex="1" type="button" class="btn btn-success add btn-xs " onclick="">+</button>
                                <button tabindex="1" type="button" class="btn btn-danger minus btn-xs">-</button>
                            </td>                        
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="sr_no" id="sr_no" value="1">
            </div>
        </section>
    </div>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4> Known Languages </h4>
            </header>
            <div class="panel-body">
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="language_hindi" value="hindi">Hindi
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hindi_read" value="1">Read
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hindi_write" value="1">Write
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hindi_speak" value="1">Speak
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="language_english" value="english">English
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="english_read" value="1">Read
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="english_write" value="1">Write
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="english_speak" value="1">Speak
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="language_gujarati" value="gujarati">Gujarati
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="gujarati_read" value="1">Read
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="gujarati_write" value="1">Write
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="gujarati_speak" value="1">Speak
                    </label>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4> Technical Experience </h4>
            </header>
            <div class="panel-body">
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="technology_name_php" value="php">PHP
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="php_experience" value="biginer">Biginer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="php_experience" value="mediator">Mediator
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="php_experience" value="expert">Expert
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="technology_name_mysql" value="mysql">Mysql
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="mysql_experience" value="biginer">Biginer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="mysql_experience" value="mediator">Mediator
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="mysql_experience" value="expert">Expert
                    </label>
                </div>
                 <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="technology_name_laravel" value="laravel">Laravel
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="laravel_experience" value="biginer">Biginer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="laravel_experience" value="mediator">Mediator
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="laravel_experience" value="expert">Expert
                    </label>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4> Preference </h4>
            </header>
            <div class="panel-body">
                <div class="form-group col-lg-6">
                     <label for="prefered_location">Prefered Location :<span class="required">*</span></label>
                    <select name="prefered_location" class="form-control">
                        <option value="ahmedabad">Ahmedabad</option>
                        <option value="surat">Surat</option>
                        <option value="vadodara">Vadodara</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="expected_ctc">Expected CTC :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="expected_ctc" name="expected_ctc" placeholder="Enter your Master Degree">
                    @if ($errors->has('expected_ctc'))
                    <label class="error" for="expected_ctc">{{ $errors->first('expected_ctc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="current_ctc">Current CTC :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="current_ctc" name="current_ctc" placeholder="Enter your Master Degree">
                    @if ($errors->has('current_ctc'))
                    <label class="error" for="current_ctc">{{ $errors->first('current_ctc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="notice_period">Notice Period :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="notice_period" name="notice_period" placeholder="Enter your Master Degree">
                    @if ($errors->has('notice_period'))
                    <label class="error" for="notice_period">{{ $errors->first('notice_period') }}</label>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <div class="form-group col-lg-6">
        <button type="submit" value="Save" class="btn btn-success">Save</button>
    </div>
    </form>
  </div>
  <script type="text/javascript">
      $('body').on('click',".add",function(){
        var tr = $(this).closest('.work_experience');
        var clone = tr.clone();

        clone.find('input').val('');
        clone.find('span:nth-child(3)').remove();
        
        tr.after(clone);
        sr_change();
    });
    function sr_change(){
        var count= $('.work_experience').length;
        for(var i=0; i< count; i++){
            var cnt = i+1;
            $("label.sr_no").eq(i).text(cnt);
            $("#sr_no").val(cnt);
            
        }
    }
    $('body').on('click','.minus' ,function(event){
        if($(".work_experience").length > 1){
            $(this).closest(".work_experience").remove();
            sr_change();
        }
    });
  </script>
@endsection