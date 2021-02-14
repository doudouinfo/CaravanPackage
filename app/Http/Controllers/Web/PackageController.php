<?php

namespace Caravan\Package\Http\Controllers\Web;


use Caravan\Package\Http\Requests\Package\CreatePackageRequest;
use Caravan\Package\Repositories\Package\PackageRepository;
use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;


class PackageController extends Controller
{
    /**
     * @var PackageRepository
     */
    private $packages;

    /**
     * PackageController constructor.
     * @param PackageRepository $packages
     */
    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;

    }
    public function index ()
    {
        return view('package::package');
    }

    public function send (CreatePackageRequest $request)
    {
       // dd($request->all());
        $this->packages->create($request->all());
        return redirect(route('package'))->with(['gooood']);
    }
}
