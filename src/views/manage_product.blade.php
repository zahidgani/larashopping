<!DOCTYPE html>
<html>
<head>
	<title>Manage Product</title>
</head>
<body>
<h2><a href="add-product">Add New Product</a></h2>
    <table style="width: 500px;border:1px solid #ccc;" cellpadding="0" cellspacing="0">
	<tr style="background-color:#000;color:#fff;font-weight:blod">
	<td>#ID</td>
	<td>Product Name</td>
	<td>Amount</td>
	<td>Product Descriptions</td>
	<td>Action</td>
	</tr>
	@foreach($row as $key=>$value)
	<tr>
		<td>{{$value->id}}</td>
		<td>{{$value->product_name}}</td>
		<td>{{$value->product_amount}}</td>
		<td>{{$value->product_desc}}</td>
		<td><a href="{{url('manage-product?id='.$value->id)}}">Delete</a></td>
	</tr>
	@endforeach
</table>
</body>
</html>