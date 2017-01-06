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
				margin-top: 5px;
				margin-left: 5px;
			}
			label
			{
				font-size: 16px; 
			}
			.page-break
			{
				page-break-after: always;
			}
			.mymargin
			{
				margin: 5px;
			}
		</style>
	</head>
	<body>
		<label class="mymargin">{{ $model->chikouguhinban }}</label>
		<br />
		<label class="mymargin" style="font-size: 20px;">{{ $model->hinban }}</label>
		<br />
		<table width="100%">
			<tr>
				<td width="50%" rowspan="2">
					<label class="mymargin">{{ $model->id }}</label>
				</td>
				<td width="50%"></td>
			</tr>
			<tr>
				<td width="50%" style="text-align: right;">
					<img class="qrcode" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($model->id.'*'.$model->hinban.'*'.$model->chikouguhinban)) !!} ">					
				</td>
			</tr>
		</table>
		<!--	複数ページのため
			<div class="page-break"></div>
			<h1>2nd page</h1>
		-->
	</body>
</html>