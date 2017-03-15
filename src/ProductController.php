<?php
namespace laravelcms\shopping;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use laravelcms\shopping\models\Item;
error_reporting(0);
class ProductController extends Controller
{
   public function form_product()
   {
   	
   	return view('add-product::add_product');
   	
   }
   public function form_submitted(Request $request)
   {
   	
   	 $product_name   = stripslashes($request->product_name);
   	 $product_amount = stripslashes($request->product_amount);
   	 $product_desc   = stripslashes($request->product_desc);
   	 $date           = date("Y-m-d h:i:s");
   	 $stm=new Item;
   	 $stm->product_name=$product_name;
   	 $stm->product_amount=$product_amount;
   	 $stm->product_desc=$product_desc;
   	 $stm->created_at=$date;
   	 $stm->updated_at=$date;
   	 $stm->save();
   	 
   	  //session()->flash('sussess', 'Successfully updated invoice price');
      return redirect("manage-product");


   }
   public function list_product()
   {
          $id=isset($_REQUEST["id"])?$_REQUEST["id"]:0;
          if($id>0)
          {
            Item::where("id",$id)->delete();
          }

   	    $row=Item::all();
   	    return view('manage-product::manage_product')->with("row",$row);
   	
   }
}
