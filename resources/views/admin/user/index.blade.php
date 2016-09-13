@extends('layouts.master-admin')

@section('title', 'ユーザー一覧')

@section('content')

	<section id="main-content">
		<section class="wrapper">

			<div class="row mt">
				<div class="col-md-12">
					<div class="content-panel">
						<table class="table table-striped table-advance table-hover text-center">
							<h4>ユーザー一覧</h4>
							<hr>
							<thead>
							<tr>
								<th class="text-center">ユーザー</th>
								<th class="text-center">パスワード</th>
								<th class="text-center"></th>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td>ユーザー名</a></td>
									<td>12345</td>
									<td>
										<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
										<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!-- /content-panel -->
				</div><!-- /col-md-12 -->
			</div><!-- /row -->

		</section><!--/wrapper -->
	</section><!-- /MAIN CONTENT -->

@endsection