### Set Pemission
* set permission : chmod -R o+w storage  bootstrap

### Setup your own Packages
* create folder name packages in main root
* add folder of vendor name
* add folder of project name
* add folder src in project name
* your document should be packages/laravelcms/shopping/src
* in your terminal of path shopping
* command : composer init press enter
* type package path packages/laravelcms and press enter
* in minimum-stability: dev then press enter untill exit
* in your main composer.json add 
*  "autoload": {
        "classmap": [
            "database"
        ],
        "psr-4": {
            "App\\": "app/",
            "laravelcms\\shopping\\": "packages/laravelcms/shopping/src/"
        }
    },
* compososer dump-autoload
* Add  service provider in yoiur src/ShoppingServiceProvider.php

  namespace laravelcms\shopping;
  use Illuminate\Support\ServiceProvider;
  class ShoppingServiceProvider extends ServiceProvider
  {
    public function boot()
    {
         include __DIR__.'/routes.php';
         //For publich and copy this view in your another laravel project command:php artisan vendor:publish
          $this->publishes([
                __DIR__.'/views' => base_path('resources/views/laravelcms/shopping'),
         ]);

        $this->publishes([
           __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');

         $this->publishes([
           __DIR__ . '/seeds' => $this->app->databasePath() . '/seeds'
        ], 'seeds');


    }

    public function register()
    {
         // register our controller
         $this->app->make('laravelcms\shopping\ProductController');
         $this->loadViewsFrom(__DIR__.'/views', 'add-product');  
         $this->loadViewsFrom(__DIR__.'/views', 'manage-product');       
    }    
}

* Add controller in yoiur src/ProductController.php


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

* Add routes in src/routes.php
Route::get("test","laravelcms\shopping\ProductController@index");
Route::get("add-product","laravelcms\shopping\ProductController@form_product");
Route::get("manage-product","laravelcms\shopping\ProductController@list_product");
Route::post("add-products","laravelcms\shopping\ProductController@form_submitted");

* Add views folder and add file in views it should be 
src/views/add_product.blade.php
src/views/manage_product.blade.php

* again run: composer dump-autoload
* Add migration folder in src/migrations/2017_03_14_000000_create_product_demo_items_table.php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

	class CreateProductDemoItemsTable extends Migration
	{
	    public function up()
	    {
	        Schema::create('laracms_product', function(Blueprint $t)
	        {
	            $t->increments('id')->unsigned();
	            $t->string('product_name', 200);
	            $t->string('product_amount', 10);
	            $t->string('product_desc', 500);
	            $t->timestamps();
	        });
	    }

	    public function down()
	    {
	        Schema::drop('laracms_product');
	    }
	}
* Add Models folder src/models/Items.php
    namespace laravelcms\shopping\models;

	use Illuminate\Database\Eloquent\Model;

	class Item extends Model
	{
	    protected $table = 'laracms_product';
	}

* ==============if you want to reuse your code
* run: php artisan vendor:publish
* it will be copied all your packages file in main laravel project
* run: php artisan migrate  it will created product table in your database and you can use
* you can check add-product,manage-product
