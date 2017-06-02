<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Products;

class APIController extends Controller
{
    /**
     * Get root url.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Application $app)
    {
        return new JsonResponse(['message' => $app->version()]);
    }


    public function getProducts()
    {
        $products = Products::all();
        return new JsonResponse(['message' => $products]);
    }

    public function createProduct(Request $request)
    {
       $product = Products::create($request->all());
       return new JsonResponse(['message' => $product]);
    }

    public function updateProduct($id, Request $request)
    {

        $product = '';
        try {
            $product = Products::findOrFail($id);
            $product->update($request->all());

        }catch (\Exception $ex)
        {
            $product = $ex->getMessage();

        }
        return new JsonResponse(['message' => $product]);
    }

    public function deleteProduct($id)
    {
        $status = '';
        try {
            Products::destroy($id);
            $status = 'success';

        }catch (\Exception $ex)
        {
            $status = $ex->getMessage();
        }
        return new JsonResponse(['message' => $status]);
    }

}