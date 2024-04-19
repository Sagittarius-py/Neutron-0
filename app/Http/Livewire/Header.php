<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers;
use Illuminate\Support\Facades\File;

class Header extends Component
{

    public $data;
    public $data_badania;
    public $rodzaj_protokolu;
    public $nazwa_zleceniodawcy;
    public $adres_zleceniodawcy;
    public $nazwa_obiektu;
    public $lokalizacja_obiektu;
    public $przyrzady = [];

    function __construct()
    {
        $jsonData = File::get(resource_path('json/example_report.json'));
        $this->data = json_decode($jsonData, true);
    }



    public function handleInputChange()
    {
        error_log($this->data_badania);
        error_log($this->rodzaj_protokolu);
        error_log($this->nazwa_zleceniodawcy);
        error_log($this->adres_zleceniodawcy);
        error_log($this->nazwa_obiektu);
        error_log($this->lokalizacja_obiektu);
    }

    public function objectCreated($przyrzad)
    {

        $this->przyrzady[] = $przyrzad;
        error_log("cokolwiek");
        error_log($przyrzad);
    }

    public function render()
    {


        return view('livewire.header', ['data' => $this->data]);
    }
}
