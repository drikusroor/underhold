<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Entities\Supplier;
use Illuminate\Http\Request;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class SupplierController extends ApiController
{

    /**
     * Returns all supppliers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $repo = EntityManager::getRepository('App\Entities\Supplier');
        $suppliers = $repo->findAll('App\Entities\Supplier');

        return array_map(function (Supplier $supplier) {
            return $supplier->toArray();
        }, $suppliers);
    }

    /**
     * Return supplier by id.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function find(int $id)
    {
        $supplier = EntityManager::find('App\Entities\Supplier', $id);

        if (empty($supplier)) {
            abort(404);
        }

        return $supplier->toArray();
    }

    /**
     * Save new supplier.
     *
     * @param  object  $data
     * @return \Illuminate\View\View
     */
    public function post(Request $request)
    {
        $data = $request->all();

        if (empty($data['name']) || empty($data['code'])) {
            abort(400, "Name and/or Code not supplied.");
        }

        ['name' => $name, 'code' => $code] = $data;
        $supplier = new Supplier($name, $code);

        EntityManager::persist($supplier);
        EntityManager::flush();

        return $supplier->toArray();
    }

    /**
     * Removes supplier by id.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function remove(int $id)
    {
        $supplier = EntityManager::find('App\Entities\Supplier', $id);

        if (empty($supplier)) {
            abort(404);
        }

        EntityManager::remove($supplier);
        EntityManager::flush();

        return response()->json(['success' => 'success'], 200);
    }
}
