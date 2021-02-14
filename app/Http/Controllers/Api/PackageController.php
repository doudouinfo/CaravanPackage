<?php

namespace Caravan\Package\Http\Controllers\Api;

use Caravan\Package\Http\Requests\Package\CreatePackageRequest;
use Caravan\Package\Http\Requests\Package\UpdatePackageRequest;
use Caravan\Package\Http\Resources\PackageResource;
use Caravan\Package\Package;
use Caravan\Package\Repositories\Package\PackageRepository;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Vanguard\Http\Controllers\Api\ApiController;


class PackageController extends ApiController
{

    private $packages;
    private $only = ['package_name', 'package_type'];

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
        //$this->middleware('permission:roles.manage');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $packages = QueryBuilder::for(Package::class)
            ->allowedFilters(['package_name'])
            ->allowedSorts(['package_name', 'created_at'])
            ->defaultSort('created_at')
            ->paginate();

        return PackageResource::collection($packages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePackageRequest $request)
    {
        $data = $request->only($this->only);
        $data +=([
            'agency_id'=> 1,//auth()->user()->agency->id,
            'user_id'=> auth()->user()->id,
        ]);
        $package = $this->packages->create($data);

        return new PackageResource($package);
    }

    /**
     * @param Package $package
     * @return PackageResource
     */
    public function show(Package $package)
    {
        return new PackageResource($package);
    }

    /**
     * @param Package $package
     * @param UpdatePackageRequest $request
     * @return PackageResource
     */
    public function update(Package $package, UpdatePackageRequest $request)
    {
        $data = $request->only($this->only);

        $package = $this->package->update($package->id, $data);

        return new PackageResource($package);
    }


    /**
     * @param Package $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Package $package)
    {
        $this->package->delete($package->id);

        return $this->respondWithSuccess();
    }
}
