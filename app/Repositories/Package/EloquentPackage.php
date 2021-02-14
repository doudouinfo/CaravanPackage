<?php

namespace Caravan\Package\Repositories\Package;

//use Vanguard\Events\Role\Created;
//use Vanguard\Events\Role\Deleted;
//use Vanguard\Events\Role\Updated;
use Caravan\Package\Package;

class EloquentPackage implements PackageRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Package::all();
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Package::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $package = Package::create($data);

       // event(new Created($role));

        return $package;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $package = $this->find($id);

        $package->update($data);

        //event(new Updated($role));

        return $package;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $package = $this->find($id);

        //event(new Deleted($package));

        return $package->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function lists($column = 'package_name', $key = 'id')
    {
        return Package::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Package::where('package_name', $name)->first();
    }
}
