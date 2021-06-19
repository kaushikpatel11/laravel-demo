<?php

namespace App\Exports;

use App\Ficha;
use App\Properties;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FichasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $properties = Properties::select(
            'cards.id as card_id', 'properties.id', 'properties.price', 'owners.name', 'owners.phone_1', 'users.email')
            ->join('cards', 'cards.property_id', '=', 'properties.id')
            ->leftJoin('real_estates', 'real_estates.id', '=', 'cards.real_estate_id')
            ->leftJoin('owners', 'owners.id', '=', 'properties.owner_id')
            ->leftJoin('users', 'users.id', '=', 'owners.user_id')
            //->leftJoin('locations', 'locations.locationable_id', '=', 'properties.id')
            //->leftJoin('city', 'locations.locationable_id', '=', 'properties.id')
            ->get();
            
        return $properties;
    }

    public function headings(): array
    {
        return [
           'Id Ficha', 'Id Propiedad', 'PVP', 'Nombre propietario', 'Teléfono', 'Email'
        ];
    }
}
