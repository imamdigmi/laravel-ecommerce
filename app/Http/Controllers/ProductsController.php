<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProductsRequest;
use App\Models\Product;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        $q = $request->get('q');
        $products = Product::where('name', 'LIKE', '%'.$q.'%')
                    ->orWhere('model', 'LIKE', '%'.$q.'%')
                    ->orderBy('name')->paginate(5);
        return view('products.index', compact('products', 'q'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductsRequest $request)
    {
        $data = $request->only('name', 'model', 'price');
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->saveFile($request->file('photo'));
        }
        $product = Product::create($data);
        $product->categories()->sync($request->get('category_lists'));
        \Flash::success($product->name . ' saved.');
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductsRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->only('name', 'model', 'price');
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->saveFile($request->file('photo'));
            if ($product->photo !== '') $this->deleteFile($request->file('photo'));
        }
        $product->update($data);
        if (count($request->get('category_lists')) > 0) {
            $product->categories()->sync($request->get('category_lists'));
        } else {
            // no category set, detach all
            $product->categories()->detach();
        }
        \Flash::success($product->name . ' updated.');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->photo !== '') {
            $this->deleteFile($product->photo);
        }
        $product->delete();
        \Flash::success('Product deleted.');
        return redirect()->route('products.index');
    }

    protected function saveFile(UploadedFile $file)
    {
        $fileName = str_random(40) . '.' . $file->guessClientExtension();
        $destinationPath = public_path(DIRECTORY_SEPARATOR . 'img');
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    protected function deleteFile($fileName)
    {
        $path = public_path(DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $fileName);
        return File::delete($path);
    }
}
