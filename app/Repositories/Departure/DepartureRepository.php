<?php

namespace Caravan\Package\Repositories\Departure;

use Caravan\Package\Departure;

interface DepartureRepository
{
    /**
     * Get all system departures.
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
    public function lists($column = 'departure_date', $key = 'id');



    /**
     * Find system departure by id.
     *
     * @param $id Departure Id
     * @return Departure|null
     */
    public function find($id);

    /**
     * Create new system departure.
     *
     * @param array $data
     * @return Departure
     */
    public function create(array $data);

    /**
     * Update specified departure.
     *
     * @param $id Departure Id
     * @param array $data
     * @return Departure
     */
    public function update($id, array $data);

    /**
     * Remove departure from repository.
     *
     * @param $id Departure Id
     * @return bool
     */
    public function delete($id);

}
