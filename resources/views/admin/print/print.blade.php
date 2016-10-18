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
		</style>
	</head>
	<body>
		<center>
			<img class="qrcode" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(80)->generate($model->id.'*'.$model->hinban.'*'.$model->chikouguhinban)) !!} ">
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