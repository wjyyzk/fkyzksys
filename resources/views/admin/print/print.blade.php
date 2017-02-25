<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style type="text/css">
			html
			{
				width: 340px;
				height: 151px;
				margin: 10px;
				padding: 0px;
			}
			body 
			{
				font-family: sans-serif;
			}
			label
			{
				font-size: 20px;
				font-weight: bold;
			}
			.page-break
			{
				page-break-after: always;
			}
			.column {
				float: left;
			}
			.clearfix::after {
				content: "";
				clear: both;
				display: table;
			}
			.barcode {
				width: 40%;
				position: absolute;
				bottom: 0;
			}
			.content {
				width: 60%;
				overflow-wrap: break-word;
			}
			.lbluniqueid
			{
				position: absolute;
				bottom: 12;
			}
		</style>
	</head>
	<body>
		<div class="clearfix">
			<div class="column content">
				<div><label>{{ $model->chikouguhinban }}</label></div>
				<div><label style="font-size: 32px;">{{ $model->hinban }}</label></div>
				<div class="lbluniqueid"><label>{{ $model->id }}</label></div>
			</div>
			<div class="column barcode">
				<img class="qrcode" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($model->id.'*'.$model->hinban.'*'.$model->chikouguhinban)) !!} ">
			</div>
		</div>
	</body>
</html>
