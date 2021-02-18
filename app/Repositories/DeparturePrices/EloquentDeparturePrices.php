<?php

namespace Caravan\Package\Repositories\DeparturePrices;

//use Vanguard\Events\Role\Created;
//use Vanguard\Events\Role\Deleted;
//use Vanguard\Events\Role\Updated;
use Caravan\Package\DeparturePrices;

class EloquentDeparturePrices implements DeparturePricesRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return DeparturePrices::all();
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return DeparturePrices::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $departurePrices = DeparturePrices::create($data);

       // event(new Created($role));

        return $departurePrices;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $departurePrices = $this->find($id);

        $departurePrices->update($data);

        //event(new Updated($role));

        return $departurePrices;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $departurePrices = $this->find($id);

        //event(new Deleted($package));

        return $departurePrices->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function lists($column = 'id', $key = 'id')
    {
        return DeparturePrices::pluck($column, $key);
    }

}
