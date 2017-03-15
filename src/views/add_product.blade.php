<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>
<h2>Add New Product [<a href="manage-product">List Product</a>]</h2>
  {{ session('sussess') }}
    

<form method="post" action="add-products">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
	<tr><td>Name</td><td><input type="text" name="product_name"></td></tr>
	<tr><td>Amount</td><td><input type="text" name="product_amount"></td></tr>

	<tr><td>Description</td><td><textarea name="product_desc"></textarea></td></tr>
	<tr><td></td><td><input type="submit" value="Save"></td></tr>
</table>
</form>
</body>
</html>