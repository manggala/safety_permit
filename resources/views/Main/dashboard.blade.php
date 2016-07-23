@extends('Main.template')
@section("content")
<style type="text/css">
a p{
	margin-top: 25px;
}
</style>
<div class="col-sm-12" style="text-align: center; padding-top: 50px">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          	<div class="box box-primary">
	            <div class="box-header with-border">
	              	<h3 class="box-title">Menu</h3>
	            </div>
				<div class="box-body" style="">
					<a href="{{URL::to('safety-permit')}}" class="btn btn-flat btn-default col-md-12 btn-md" style="margin-bottom: 15px">
						<div class="row">
							<div class="col-md-3" style="border-right: solid 1px #ccc; padding-top: 10px; padding-bottom: 10px"><i class="fa fa-warning fa-3x"></i></div>
							<div class="col-md-9" style="text-align: left; padding-top: 20px">Safety Permit</div>
						</div>
					</a>
					<a href="{{URL::to('accident-report')}}" class="btn btn-flat btn-default col-md-12 btn-md" style="margin-bottom: 15px">
						<div class="row">
							<div class="col-md-3" style="border-right: solid 1px #ccc; padding-top: 10px; padding-bottom: 10px"><i class="fa fa-ambulance fa-3x"></i></div>
							<div class="col-md-9" style="text-align: left; padding-top: 20px">Accident Report</div>
						</div>
					</a>
					<a href="{{URL::to('emergency-report')}}" class="btn btn-flat btn-default col-md-12 btn-md" style="margin-bottom: 15px">
						<div class="row">
							<div class="col-md-3" style="border-right: solid 1px #ccc; padding-top: 10px; padding-bottom: 10px"><i class="fa fa-bell fa-3x"></i></div>
							<div class="col-md-9" style="text-align: left; padding-top: 20px">Emergency Report</div>
						</div>
					</a>
				</div>
          </div>
        </div>
    </div>
</div>
@endsection