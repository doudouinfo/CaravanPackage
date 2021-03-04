<?php

namespace Caravan\Package\Http\Controllers\Api;

use Caravan\Package\Http\Filters\PackageKeywordSearch;
use Caravan\Package\Http\Requests\Package\CreatePackageRequest;
use Caravan\Package\Http\Requests\Package\UpdatePackageRequest;
use Caravan\Package\Http\Resources\PackageResource;
use Caravan\Package\Package;
use Caravan\Package\Repositories\Package\PackageRepository;
use Caravan\Package\Traits\ManageFilesTrait;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Vanguard\Http\Controllers\Api\ApiController;



class PackageController extends ApiController
{
//use ManageFilesTrait;
    /**
     * @var PackageRepository
     */
    private $packages;
    private $only = ['package_type','package_name','package_status','category','package_destination',
                     'package_description','package_featured_image','package_gallery','user_id','agency_id',
                     'sharing','sharing_all'];
    private $extensions = array('png', 'jpg', 'jpeg');
    private $maxGalleryImages = 5;

    public function __construct(PackageRepository $package)
    {
        $this->package = $package;
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
            ->allowedFilters([
                AllowedFilter::custom('search', new PackageKeywordSearch),
            ])
            //->allowedFilters(['package_name'])
            ->allowedSorts(['package_name', 'created_at'])
            ->defaultSort('created_at')
            ->paginate();

        return PackageResource::collection($packages);
    }

    /**
     * @param CreatePackageRequest $request
     * @return PackageResource
     */
   /* private  function uploadFile(UploadedFile $uploadedFile, $folder = null, $disk = 'public',$fileNamePrefix = null) {
        $prefix = $fileNamePrefix != null ? $fileNamePrefix . '_' : '';
        $fileName = $prefix . Carbon::today()->format('m_Y') . '_' . time() . '.' . $uploadedFile->clientExtension();
        Storage::disk($disk)->putFileAs('/' . $folder,$uploadedFile,$fileName);
        return $fileName;

    }*/
    public function store(CreatePackageRequest $request)
    {
        $data = $request->all();

       /* return $this->respondWithArray([
            'Package' => $data['package_destination'],
        ]);*/
        /**
         *  Featured image Upload Multi Images
         */

        if($request->file('imageUpload') )
        {
            $ext = $request->file('imageUpload')->getClientOriginalExtension();
            if(!in_array($ext,$this->extensions))
            {
                return $this->respondWithArray([
                    'Package' => 'Error extension image'
                ]);
            }else{

                $request->file('imageUpload')->move(base_path() . '/public/upload/packages/featuredImages' , time() . '.' . $ext);
                $data['package_featured_image'] = time() . '.' . $ext;
            }
        }

        /**
         *  Gallery Upload Multi Images
         */
        if($request->file('galleryUpload'))
        {

            if(count($request->file('galleryUpload')) > $this->maxGalleryImages)
            {
                return $this->respondWithArray([
                    'Package' => 'Error 1'
                ]);
            }else {
                $i = 0;
                foreach($request->file('galleryUpload') as $Gallery)
                {
                    $ext = $Gallery->getClientOriginalExtension();
                    if(!in_array($ext,$this->extensions))
                    {
                        return $this->respondWithArray([
                            'Package' => 'Error'
                        ]);
                    }else{

                        $Gallery->move(base_path() . '/public/upload/packages/galleryUploads' , time() . $i . '.' . $ext);
                        $GalleryArray[$i] = time(). $i  . '.' . $ext;
                    }
                    $i++;
                }
                $data['package_gallery'] = implode(',',$GalleryArray);
            }

        }


        $i = 0;
        if(isset($data['sharing']))
        {
            foreach($data['sharing'] as $Share)
            {
                $ShareArray[$i] = $Share['id'];
                $i++;
            }
            if(in_array('0',$ShareArray)){
                $data['sharing_all']= 1;
                $data['sharing'] = 0;
            }else{
                $data['sharing_all']= 0;
                $data['sharing'] = implode(',',$ShareArray);
            }
        }

        /**
         *  Array of destinations
         */
        $j = 0;
        if(isset($data['package_destination']))
        {
            foreach($data['package_destination'] as $Destination)
            {
                $DestinationArray[$j] = $Destination['id'];
                $j++;
            }
            $data['package_destination'] = implode(',',$DestinationArray);
        }

         $data +=([
                'agency_id'=> 1,//auth()->user()->agency->id,
                'user_id'=> auth()->user()->id,
            ]);
            $package = $this->package->create($data);

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

        $data['gallery'] = explode(',',$package['package_gallery']);
        $featuredImage =$package['package_featured_image'];
        /**
         *  Delete gallery upload
         */
       foreach( $data['gallery'] as $gallery)
        {
            Storage::disk('public')->delete('/upload/packages/galleryUploads/'.$gallery);
        }
        /**
         *  Delete featured image
         */
        Storage::disk('public')->delete('/upload/packages/featuredImages/'.$featuredImage);
        /**
         *  Delete package
         */
        $this->package->delete($package->id);
        return $this->respondWithSuccess();
    }
}
