@extends('layouts.master')
@section('content')
<div class="container">
    <div id="errorShow" style="display: none" class="error-message alert alert-danger errorShow"></div>
    <h3 style="margin-top: 12px;padding: 10px;background-color: lightgray;">Job Application</h3><br>
     <form id="jobForm" role="form" method="post" action="{{ route('job.update',$job->id) }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type='hidden' name="_method" value="PUT">
                <input type='hidden' name="id" id="id" value="{{$job->id}}" />
    <div class="col-lg-12">
    	<section class="panel">
    		<header class="panel-heading">
    			<h4> Basic Details </h4>
    		</header>
    		<div class="panel-body">
    			
                <div class="form-group col-lg-4">
                    <label for="name">Name :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="{{ $job->name }}">
                    @if ($errors->has('name'))
                    <label class="error" for="name">{{ $errors->first('name') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-4">
                    <label for="email">Email :<span class="required">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" value="{{ $job->email }}">
                    @if ($errors->has('email'))
                    <label class="error" for="email">{{ $errors->first('email') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-4">
                    <label for="address">Address :<span class="required">*</span></label>
                    <textarea name="address" class="form-control" id="address">{{ $job->address }}</textarea>
                    @if ($errors->has('address'))
                    <label class="error" for="address">{{ $errors->first('address') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-4">
                	<label for="gender">Gender :<span class="required">*</span></label>
                	<div class="input-group">
                		<label class="radio-inline">
                			<input type="radio" name="gender" value="{{ $job->gender }}" {{ $job->gender == 'male' ? 'checked' : ''}}  > Male</label>
                			<label class="radio-inline"><input type="radio" name="gender" value="{{ $job->gender }}" {{ $job->gender == 'female' ? 'checked' : ''}} > Female </label>
                		</div>
                        @if ($errors->has('gender'))
                        <label class="error" for="gender">{{ $errors->first('gender') }}</label>
                        @endif
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="contact">Contact :<span class="required">*</span></label>
                         <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact" value="{{ $job->contact }}">
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
                    <input type="text" class="form-control" id="ssc" name="ssc" placeholder="Enter your ssc" value="{{ $job->ssc }}">
                    @if ($errors->has('ssc'))
                    <label class="error" for="ssc">{{ $errors->first('ssc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="hsc">HSC :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="hsc" name="hsc" placeholder="Enter your ssc" value="{{ $job->hsc }}"> 
                    @if ($errors->has('hsc'))
                    <label class="error" for="hsc">{{ $errors->first('hsc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="graduation">Graduation :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="graduation" name="graduation" placeholder="Enter your Graduation" value="{{ $job->graduation }}">
                    @if ($errors->has('graduation'))
                    <label class="error" for="graduation">{{ $errors->first('graduation') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="master">Master Degree :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="master" name="master" placeholder="Enter your Master Degree" value="{{ $job->master_degree }}">
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
                        	@foreach($work_experience as $work)
                        <tr class="work_experience">
                            <td><label class="sr_no">1 </label></td></td>
                            <td><input type="text" name="company_name[]" id="comapny_name" value="{{ $work->company_name }}"></td>
                            <td><input type="date" name="start_date[]" id="start_date" value="{{ $work->start_date }}"></td>                        
                            <td><input type="date" name="end_date[]" id="end_date" value="{{ $work->end_date }}"></td>
                            <td>
                                <button  tabindex="1" type="button" class="btn btn-success add btn-xs " onclick="">+</button>
                                <button tabindex="1" type="button" class="btn btn-danger minus btn-xs">-</button>
                            </td> 
                        </tr>
                            @endforeach                       
                    </tbody>
                </table>
                <input type="hidden" name="sr_no" id="sr_no" value="{{$work_experience[0]->sr_no}}">
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
                    	<input type="hidden" name="languages_hindi_id" value="{{ $languages[0]->id }}">
                        <input type="checkbox" name="language_hindi" value="hindi" {{ $languages[0]->language != null ? 'checked' : '' }}>Hindi
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hindi_read" value="1" {{ $languages[0]->read == 1 ? 'checked' : '' }}>Read
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hindi_write" value="1" {{ $languages[0]->write == 1 ? 'checked' : '' }}>Write
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="hindi_speak" value="1" {{ $languages[0]->speak == 1 ? 'checked' : '' }}>Speak
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                    	<input type="hidden" name="languages_english_id" value="{{ $languages[1]->id }}">
                        <input type="checkbox" name="language_english" value="english" {{ $languages[1]->language != null ? 'checked' : '' }}>English
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="english_read" value="1" {{ $languages[1]->read == 1 ? 'checked' : '' }}>Read
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="english_write" value="1" {{ $languages[1]->write == 1 ? 'checked' : '' }}>Write
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="english_speak" value="1" {{ $languages[1]->speak == 1 ? 'checked' : '' }}>Speak
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                    	<input type="hidden" name="languages_gujarati_id" value="{{ $languages[2]->id }}">
                        <input type="checkbox" name="language_gujarati" value="gujarati" {{ $languages[2]->language != null ? 'checked' : '' }}>Gujarati
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="gujarati_read" value="1" {{ $languages[2]->read == 1 ? 'checked' : '' }}>Read
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="gujarati_write" value="1" {{ $languages[2]->write == 1 ? 'checked' : '' }}>Write
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="gujarati_speak" value="1" {{ $languages[2]->speak == 1 ? 'checked' : '' }}>Speak
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
                    	<input type="hidden" name="technology_php_id" value="{{ $experience[0]->id }}">
                        <input type="checkbox" name="technology_name_php" value="php" {{ $experience[0]->technology_name != null ? 'checked' : ''}}>PHP
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="php_experience" value="biginer" {{ $experience[0]->experience == 'biginer' ? 'checked' : ''}}>Biginer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="php_experience" value="mediator" {{ $experience[0]->experience == 'mediator' ? 'checked' : ''}}>Mediator
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="php_experience" value="expert" {{ $experience[0]->experience == 'expert' ? 'checked' : ''}}>Expert
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                    	<input type="hidden" name="technology_mysql_id" value="{{ $experience[1]->id }}">
                        <input type="checkbox" name="technology_name_mysql" value="mysql" {{ $experience[1]->technology_name != null ? 'checked' : ''}}>Mysql
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="mysql_experience" value="biginer" {{ $experience[1]->experience == 'biginer' ? 'checked' : ''}}>Biginer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="mysql_experience" value="mediator" {{ $experience[1]->experience == 'mediator' ? 'checked' : ''}}>Mediator
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="mysql_experience" value="expert" {{ $experience[1]->experience == 'expert' ? 'checked' : ''}}>Expert
                    </label>
                </div>
                 <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                    	<input type="hidden" name="technology_laravel_id" value="{{ $experience[2]->id }}">
                        <input type="checkbox" name="technology_name_laravel" value="laravel" {{ $experience[2]->technology_name != null ? 'checked' : ''}}>Laravel
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="laravel_experience" value="biginer" {{ $experience[2]->experience == 'biginer' ? 'checked' : ''}}>Biginer
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="laravel_experience"  value="mediator" {{ $experience[2]->experience == 'mediator' ? 'checked' : ''}}>Mediator
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="laravel_experience" value="expert" {{ $experience[2]->experience == 'expert' ? 'checked' : ''}}>Expert
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
                        <option value="ahmedabad" {{ $job->prefered_location == 'ahmedabad' ? 'selected':'' }}>Ahmedabad</option>
                        <option value="surat" {{ $job->prefered_location == 'surat' ? 'selected':'' }}>Surat</option>
                        <option value="vadodara" {{ $job->prefered_location == 'vadodara' ? 'selected':'' }}>Vadodara</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="expected_ctc">Expected CTC :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="expected_ctc" name="expected_ctc" placeholder="Enter your Master Degree" value="{{ $job->expected_ctc}}">
                    @if ($errors->has('expected_ctc'))
                    <label class="error" for="expected_ctc">{{ $errors->first('expected_ctc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="current_ctc">Current CTC :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="current_ctc" name="current_ctc" placeholder="Enter your Master Degree" value="{{ $job->current_ctc}}">
                    @if ($errors->has('current_ctc'))
                    <label class="error" for="current_ctc">{{ $errors->first('current_ctc') }}</label>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="notice_period">Notice Period :<span class="required">*</span></label>
                    <input type="text" class="form-control" id="notice_period" name="notice_period" placeholder="Enter your Master Degree" value="{{ $job->notice_period}}">
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