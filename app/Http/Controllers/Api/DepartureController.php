<?php

namespace Vanguard\Http\Controllers;

use Caravan\Package\Repositories\Departure\DepartureRepository;
use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Api\ApiController;

class DepartureController extends ApiController
{
    private $departures;
    private $only = ['package_id','departure_date','return_date','number_seats','means_transport','itinerary','flight_id',
                     'transport','visa','fee_visa','transfer','fee_transfer',
                     'hotel','fee_ini','promotion','fee_promo',
                     'includes','excludes','program','booked_seats'];

    public function __construct(DepartureRepository $departures)
    {
        $this->departures = $departures;
        //$this->middleware('permission:roles.manage');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
