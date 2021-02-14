<?php

namespace Caravan\Package\Repositories\Package;

use Caravan\Package\Package;

interface PackageRepository
{
    /**
     * Get all system packages.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system roles into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'package_name', $key = 'id');



    /**
     * Find system role by id.
     *
     * @param $id Package Id
     * @return Package|null
     */
    public function find($id);

    /**
     * Find role by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system role.
     *
     * @param array $data
     * @return Package
     */
    public function create(array $data);

    /**
     * Update specified package.
     *
     * @param $id Package Id
     * @param array $data
     * @return Package
     */
    public function update($id, array $data);

    /**
     * Remove package from repository.
     *
     * @param $id Package Id
     * @return bool
     */
    public function delete($id);

}
