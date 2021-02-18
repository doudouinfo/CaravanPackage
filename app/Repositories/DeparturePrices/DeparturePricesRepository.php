<?php

namespace Caravan\Package\Repositories\DeparturePrices;

use Caravan\Package\DeparturePrices;

interface DeparturePricesRepository
{
    /**
     * Get all system DeparturePrices.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system departurePrices into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'id', $key = 'id');



    /**
     * Find system departurePrices by id.
     *
     * @param $id DeparturePrices Id
     * @return DeparturePrices|null
     */
    public function find($id);

    /**
     * Create new system departurePrices.
     *
     * @param array $data
     * @return DeparturePrices
     */
    public function create(array $data);

    /**
     * Update specified departurePrices.
     *
     * @param $id DeparturePrices Id
     * @param array $data
     * @return DeparturePrices
     */
    public function update($id, array $data);

    /**
     * Remove departurePrices from repository.
     *
     * @param $id DeparturePrices Id
     * @return bool
     */
    public function delete($id);

}
