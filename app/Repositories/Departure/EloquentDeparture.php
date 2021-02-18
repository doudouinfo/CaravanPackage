<?php

namespace Caravan\Package\Repositories\Departure;

//use Vanguard\Events\Role\Created;
//use Vanguard\Events\Role\Deleted;
//use Vanguard\Events\Role\Updated;
use Caravan\Package\Departure;

class EloquentDeparture implements DepartureRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Departure::all();
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Departure::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $departure = Departure::create($data);

       // event(new Created($role));

        return $departure;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $departure = $this->find($id);

        $departure->update($data);

        //event(new Updated($role));

        return $departure;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $departure = $this->find($id);

        //event(new Deleted($package));

        return $departure->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function lists($column = 'departure_date', $key = 'id')
    {
        return Departure::pluck($column, $key);
    }

}
