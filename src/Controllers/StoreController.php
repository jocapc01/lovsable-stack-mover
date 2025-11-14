<?php

namespace App\Controllers;

use App\Models\Store;
use App\Models\Service;
use App\Models\Product;

class StoreController
{
    protected $storeModel;
    protected $serviceModel;
    protected $productModel;

    public function __construct()
    {
        $this->storeModel = new Store();
        $this->serviceModel = new Service();
        $this->productModel = new Product();
    }

    public function createStore($data)
    {
        // Logic to create a new store
        return $this->storeModel->create($data);
    }

    public function editStore($id, $data)
    {
        // Logic to edit an existing store
        return $this->storeModel->update($id, $data);
    }

    public function deleteStore($id)
    {
        // Logic to delete a store
        return $this->storeModel->delete($id);
    }

    public function listStores()
    {
        // Logic to list all stores
        return $this->storeModel->getAll();
    }

    public function addServiceToStore($storeId, $serviceData)
    {
        // Logic to add a service to a store
        return $this->serviceModel->create($storeId, $serviceData);
    }

    public function addProductToStore($storeId, $productData)
    {
        // Logic to add a product to a store
        return $this->productModel->create($storeId, $productData);
    }
}