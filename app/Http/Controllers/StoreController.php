<?php

namespace App\Http\Controllers;

use App\Repositories\StoreRepository;
use App\Http\Requests\StoreRequest;
use App\Transformers\StoreTransformer;

class StoreController extends Controller
{

    /**
     * @var StoreRepository
     */
    private $storeRepository;

    public function __construct(
        StoreRepository $storeRepository
    )
    {
        $this->storeRepository = $storeRepository;
    }

    public function store(StoreRequest $request)
    {
        $result = $this->storeRepository->create($request->all());
        return fractal($result, new StoreTransformer())->toArray();
    }


    public function index(){
        $stores = $this->storeRepository->all();
        return fractal($stores, new StoreTransformer())->toArray();
    }
}
