@extends('layouts.master-admin')

@section('title', '在庫リスト作成')

@section('content')

	<section id="main-content">
		<section class="wrapper">

			<!-- BASIC FORM ELELEMNTS -->
			<div class="row mt">
				<div class="col-lg-12">
					<div class="form-panel">
						<h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
						<form class="form-horizontal style-form" method="get">
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Default</label>
								<div class="col-sm-10">
									<input type="text" class="form-control">
								</div>
							</div>
						</form>
					</div>
				</div><!-- col-lg-12-->
			</div><!-- /row -->

		</section><!--/wrapper -->
	</section><!-- /MAIN CONTENT -->

@endsection