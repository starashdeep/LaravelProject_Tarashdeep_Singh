<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Public\Products;

class ProductController extends Controller
{
    public function index(Product $product){
        return view('products.index')->with(['products' => Product::all()]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){

        //validate data
        $request->validate([
            'name'=>'required', 
            'description'=>'required', 
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);

        //upload image
        $imageName=time().'.'.$request->image->getClientOriginalName();
        $request->image->storeAs('public/products', $imageName);
        $product=new Product;
        $product->image=$imageName;
        $product->description=$request->description;
        $product->name=$request->name;
        
        $product->save();
        return redirect('/')->withSuccess('Product Created!');
    }

    //edit image 
    public function edit($id){
        return view('products.edit', ['product'=>Product::where('id', $id)->first()]);
    }
    //update image
    public function update(Request $request, $id){
        //validate data
        $request->validate([
            'name'=>'required', 
            'description'=>'required', 
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
        $product=Product::where('id',$id)->first();
        if(isset($request->image)){
            //upload image
            $imageName=time().'.'.$request->image->getClientOriginalName();
            $request->image->storeAs('public/products', $imageName);
            $product->image=$imageName;
        }
        $product->description=$request->description;
        $product->name=$request->name;
        $product->save();
        return redirect('/')->withSuccess('Product Updated!');
    }
    public function archive(Product $product){
        return view('products.archive')->with(['products' => Product::onlyTrashed()->get()]);
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        
        return redirect('/')->with('deleteSuccess', 'Product Deleted!');
    }
    public function forcedelete($id){
        $product=Product::onlyTrashed()->find($id);
        $product->forceDelete();
        return redirect('/')->with('deleteSuccess', 'Product permanentaly deleted!');
    }
    public function restore($id){
        $product=Product::withTrashed()->find($id);
        $product->restore();
        return redirect('/')->withSuccess('Product Restored!');
    }
    public function show($id){
        $product=Product::where('id', $id)->first();
        return view('products.show',['product'=>$product]);
    }
}
