@extends('layouts.master')
@section('content')
<div class="container">
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
                    <label for="name">Name :<span>{{ $job->name }} </span></label>
                </div>
                <div class="form-group col-lg-4">
                    <label for="email">Email :<span>{{ $job->email }} </span></label>
                    
                </div>
                <div class="form-group col-lg-4">
                    <label for="address">Address :<span>{{ $job->address }} </span></label>
                    
                </div>
                <div class="form-group col-lg-4">
                    <label for="gender">Gender :<span>{{ $job->gender }} </span></label>
                </div>
                <div class="form-group col-lg-4">
                    <label for="contact">Contact :<span>{{ $job->contact }} </span></label>
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
                    <label for="ssc">SSC :<span>{{ $job->ssc }} </span></label>
                </div>
                <div class="form-group col-lg-6">
                    <label for="hsc">HSC :<span>{{ $job->hsc }} </span></label>
                    
                </div>
                <div class="form-group col-lg-6">
                    <label for="graduation">Graduation :<span>{{ $job->graduation }} </span></label>
                    
                </div>
                <div class="form-group col-lg-6">
                    <label for="master">Master Degree :<span>{{ $job->master_degree }} </span></label>
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
                            <td><label>{{ $work->company_name }}</label></td>
                            <td><label>{{ $work->start_date }}</label></td>                        
                            <td><label>{{ $work->end_date }}</label></td>
                            <td>
                                <button  tabindex="1" type="button" class="btn btn-success add btn-xs " onclick="">+</button>
                                <button tabindex="1" type="button" class="btn btn-danger minus btn-xs">-</button>
                            </td>                        
                        </tr>
                        @endforeach
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
                        <label>{{ $languages[0]->language }}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[0]->read == 1 ? 'Read' : ''}}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[0]->write == 1 ? 'Write' : ''}}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[0]->speak == 1 ? 'Speak' : ''}}</label>
                        
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <label>{{ $languages[1]->language }}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[1]->read == 1 ? 'Read' : ''}}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[1]->write == 1 ? 'Write' : ''}}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[1]->speak == 1 ? 'Speak' : ''}}</label>
                        
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <label>{{ $languages[2]->language }}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[2]->read == 1 ? 'Read' : ''}}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[2]->write == 1 ? 'Write' : ''}}</label>
                        
                    </label>
                    <label class="checkbox-inline">
                        <label>{{ $languages[2]->speak == 1 ? 'Speak' : ''}}</label>
                        
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
                        <label>{{ $experience[0]->technology_name }}</label>
                    </label>
                    <label class="radio-inline">
                        {{ $experience[0]->experience == 'biginer' ? 'Beginer' : ''}}
                    </label>
                    <label class="radio-inline">
                        {{ $experience[0]->experience == 'mediator' ? 'Mediator' : ''}}
                    </label>
                    <label class="radio-inline">
                        {{ $experience[0]->experience == 'expert' ? 'Expert' : ''}}
                    </label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <label>{{ $experience[1]->technology_name }}</label>
                    </label>
                    <label class="radio-inline">
                        {{ $experience[1]->experience == 'biginer' ? 'Beginer' : ''}}
                    </label>
                    <label class="radio-inline">
                        {{ $experience[1]->experience == 'mediator' ? 'Mediator' : ''}}
                    </label>
                    <label class="radio-inline">
                        {{ $experience[1]->experience == 'expert' ? 'Expert' : ''}}
                    </label>
                </div>
                 <div class="form-group col-lg-12">
                    <label class="checkbox-inline">
                        <label>{{ $experience[2]->technology_name }}</label>
                    </label>
                    <label class="radio-inline">
                        {{ $experience[2]->experience == 'biginer' ? 'Beginer' : ''}}
                    </label>
                    <label class="radio-inline">
                        {{ $experience[2]->experience == 'mediator' ? 'Mediator' : ''}}
                    </label>
                    <label class="radio-inline">
                        {{ $experience[2]->experience == 'expert' ? 'Expert' : ''}}
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
                     <label for="prefered_location">Prefered Location :<span >{{ $job->prefered_location }}</span></label>
                    
                </div>
                <div class="form-group col-lg-6">
                    <label for="expected_ctc">Expected CTC :<span >{{ $job->expected_ctc }}</span></label>
                    
                </div>
                <div class="form-group col-lg-6">
                    <label for="current_ctc">Current CTC :<span >{{ $job->current_ctc }}</span></label>
                    
                </div>
                <div class="form-group col-lg-6">
                    <label for="notice_period">Notice Period :<span >{{ $job->notice_period}}</span></label>
                    
                </div>
            </div>
        </section>
    </div>
    <div class="form-group col-lg-6">
        <a href="{{ url('job')}}">Back</a>
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