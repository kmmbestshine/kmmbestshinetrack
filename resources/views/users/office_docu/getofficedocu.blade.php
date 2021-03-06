@extends('users.layouts.default')
@section('title', 'View Document')
@section('cram')
<ul class="breadcrumb">
    <li><a href="{{route('user.dashboard')}}">Home</a></li>                    
    <li class="active">Document</li>
</ul>
@endsection
@section('contant')
    @if(Input::old('success'))
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Well done!</strong> {{ Input::old('success') }}
                    </div>
                </div>
            </div>
        @endif
        @if(Input::old('error'))
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Oh Snap!</strong> {{ Input::old('error') }}
                    </div>
                </div>
            </div>
        @endif
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form" method="post" action="{{route('get.office.document')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>View Document</strong></h3>
                            
                        </div>
                        <div class="panel-body">
                            
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> School name</label>
                                        <div class="col-md-9">
                                           <select name="school_name" class="form-control">
                                                    <option value="">Select School Name</option>
                                                    <option value="ST. JOSEPH'S MATRIC HR. SEC. SCHOOL">ST. JOSEPH'S MATRIC HR. SEC. SCHOOL</option>
                                                    <option value="ST. JOSEPH'S NURSERY AND PRIMARY SCHOOL">ST. JOSEPH'S NURSERY AND PRIMARY SCHOOL</option>
                                                    <option value="ST. PAUL'S MATRIC HR. SEC. SCHOOL">ST. PAUL'S MATRIC HR. SEC. SCHOOL</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category</label>
                                        <div class="col-md-9">
                                           <select name="catgory" class="form-control">
                                                    <option value="">Select Category</option>
                                                    <option value="School Document">School Document</option>
                                                    <option value="Transport Document">Transport Document</option>
                                                    <option value="Construction Document">Construction Document</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                
                            <br/>
                            
                            
                            <br/>
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-info btn-lg">View document</button>
                                </div>
                            </div>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection