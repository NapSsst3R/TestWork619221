<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->productRepository->getAllProducts();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return $this->productRepository->createProduct($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->productRepository->getProductById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        return $this->productRepository->updateProduct($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->productRepository->deleteProduct($id);
    }
}
