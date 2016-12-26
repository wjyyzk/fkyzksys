<html>
	<head>
		<meta charset="utf-8">
		<style type="text/css">
			html
			{
				margin: 0px;
				padding: 0px;
			}
			body
			{
				width: 340px;
				height: 151px;
			}
			label
			{
				font-size: 24px; 
			}
			.page-break
			{
				page-break-after: always;
			}
			.alignleft {
				float: left;
				width:33.33333%;
				text-align:left;
			}
			.aligncenter {
				float: left;
				width:33.33333%;
				text-align:center;
			}
			.alignright {
				float: left;
				width:33.33333%;
				text-align:right;
			}​
		</style>
	</head>
	<body>
		<div>
			<label class="alignleft">&nbsp;&nbsp;&nbsp;{{ $model->id }}</label>
			
			<img class="qrcode" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(80)->generate($model->id.'*'.$model->hinban.'*'.$model->chikouguhinban)) !!} ">
		</div>
		<center>
		<br />
		<label>{{ $model->hinban }}</label>
		<br />
		<label>{{ $model->chikouguhinban }}</label>
		</center>
		<!--	ページ
		<div class="page-break"></div>
		<h1>2nd page</h1>
		-->
	</body>
</html>