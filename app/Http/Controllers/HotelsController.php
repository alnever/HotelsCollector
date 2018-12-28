<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\DataExtruderInterface;

class HotelsController extends Controller
{

  private $extruder;
    /**
    *
    */
    public function __construct(DataExtruderInterface $extruder) {
      $this->extruder = $extruder;
    }


    /**
    *
    */
    public function index() {
      $res = $this->extruder->extrude([
        'verify' => false,
        'form_params' => [
          'ss' => 'berlin',
          'checkin_monthday' => '1',
          'checkin_month' => '3',
          'checkin_year' => '2019',
          'checkout_monthday' => '10',
          'checkout_month' => '3',
          'checkout_year' => '2019',
          'sb_price_total' => 'total',
          'order' => 'price',
        ]
      ]);

      return response()->json($res);
    }
}
