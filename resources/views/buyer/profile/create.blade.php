@push('headerscript')
<link rel="stylesheet" type="text/css" href="{{ asset('webtheme/css/sidebar.css') }}">
<link href="{{ asset('theme/plugins/summernote/summernote.css') }}" rel="stylesheet" />
@endpush
@extends('layout.app')

@section('content')
@php 
$user=Auth::user();
$buyer=$user->buyer;
@endphp
<div class="tp-dashboard-head">
  <!-- page header -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 profile-header">
        <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
        <div class="profile-info col-md-9">
          <h1 class="profile-title">{{ $buyer->first_name }}<small>Welcome Back memeber</small></h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.page header -->

<div class="main-container">
  <div class="container">
    <div class="row">
      @include('layout.buyersidebar')
      <div class="col-md-9">
        <div class="row well-box">
          <div class="col-xs-12 ">
            <div class="page-title-box">
              <h4 class="page-title pull-left">Company Profile</h4>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-xs-12 section-space20">
            <form action="{{ route('buyerprofile.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              <div class="row">
               <div class="form-group">
                 <div class="col-sm-8">
                  <label for="">Company Logo</label>
                  <input type="file" name="logo" class="form-control" required="" accept="image/*" onchange="loadFile(event, 'logo')" required="">
                  <div class="text-danger">{{ $errors->first('logo') }}</div>
                </div>
                <div class="col-sm-4 ">
                 <img width="100"  id="logo"  class="" alt="">
               </div>
             </div>
           </div>
           <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <label for="">Company Description</label>
                <textarea name="company_description" class="summernote"></textarea>
              </div>
                <div class="text-danger">{{ $errors->first('company_description') }}</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <button class="btn btn-primary btn-sm pull-right" type="submit">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection

@push('footerscript')
<script>
  var loadFile = function (event, imgid) {
    var output = document.getElementById(imgid);
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<script src="{{ asset('theme/plugins/summernote/summernote.min.js') }}"></script>
<script>

  jQuery(document).ready(function(){

    $('.summernote').summernote({
      height: 200,               
      // set editor height
      minHeight: null,             
      // set minimum height of editor
      maxHeight: null,             
      // set maximum height of editor
      focus: true                 
      // set focus to editable area after initializing summernote
    });

    $('.inline-editor').summernote({
      airMode: true
    });

  });
</script>
@endpush

