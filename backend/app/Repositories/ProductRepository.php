<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ProductRepository implements ProductRepositoryInterface
{
    use ResponseApi;

    public function getAllProducts(): JsonResponse
    {
        try {
            $products = Product::all();

            return $this->success("All products", $products);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function getProductById($id): JsonResponse
    {
        try {
            $product = Product::query()->findOrFail($id);

            return $this->success("Product detail", $product);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function deleteProduct($id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $product = Product::query()->findOrFail($id);

            // Delete the employee
            $product->delete();

            DB::commit();

            return $this->success("Product deleted", $product);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage());
        }
    }

    public function createProduct(array $product): JsonResponse
    {
        DB::beginTransaction();
        try {
            Product::query()->create($product);

            DB::commit();

            return $this->success("Product created", []);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage());
        }
    }

    public function updateProduct($id, array $newInfo): JsonResponse
    {
        try {
            $product = Product::query()->findOrFail($id);
            $product->update($newInfo);

            return $this->success("Product updated", $product);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
