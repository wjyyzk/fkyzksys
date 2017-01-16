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
				font-family: "Meiryo UI";
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
		<table width="100%">
			<tr>
				<td colspan="2" class="mymargin"><label>{{ $model->chikouguhinban }}</label></td>		
			</tr>
			<tr>
				<td valign="top" class="mymargin"><label style="font-size: 20px;">{{ $model->hinban }}</label></td>
				<td rowspan="2" valign="bottom" style="text-align: right;">
					<img class="qrcode" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(120)->generate($model->id.'*'.$model->hinban.'*'.$model->chikouguhinban)) !!} ">
				</td>				
			</tr>
			<tr>
				<td class="mymargin"><label>{{ $model->id }}</label></td>
			</tr>
		</table>
		<!--	複数ページのため
			<div class="page-break"></div>
			<h1>2nd page</h1>
		-->
	</body>
</html>