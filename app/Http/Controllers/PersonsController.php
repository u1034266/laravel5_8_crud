<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persons;
use App\Econtacts;
use App\Addresses;

class PersonController extends Controller
{
    public function addPerson(Request $request) {
        
        // Persist new person details
        $data = new Persons();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->econtact->email = $request->email;
        $data->econtact->mobile = $request->mobile;
        $data->econtact->home_phone = $request->home_phone;
        $data->econtact->office_phone = $request->office_phone;
        $data->address->home_address = $request->home_address;
        $data->address->postal_address = $request->postal_address;
        $data->save();

        // Persist new person's econtacts
        // Note: If not using relationships
        // $newEcontact = new Econtacts();
        // $newEcontact->FK_person_id = $newPerson->getId();
        // $newEcontact->email = $request->email;
        // $newEcontact->mobile = $request->mobile;
        // $newEcontact->home_phone = $request->home_phone;
        // $newEcontact->office_phone = $request->office_phone;
        // $newEcontact->save();

        // Persist new person's addresses
        // Note: If not using relationships
        // $newAddress = new Addresses();
        // $newAddress->FK_person_id = $newPerson->getId();
        // $newAddress->home_address = $request->home_address;
        // $newAddress->postal_address = $request->postal_address;
        // $newAddress->save();

        // Return json_data
        // Note: If not using relationships
        // $data = [
        //     'id' => $newPerson->getId(),
        //     'first_name' => $newPerson->first_name,
        //     'last_name' => $newPerson->last_name,
        //     'email' => $newPerson->econtact->emai,
        //     'mobile' => $newPerson->econtact->mobile,
        //     'home_phone' => $newPerson->econtact->home_phone,
        //     'office_phone' => $newPerson->econtact->office_phone,
        //     'home_address' => $newPerson->address->home_address,
        //     'postal_address' => $newPerson->address->postal_address
        // ];

        // Return
        return $data;        
    }

    public function getPersons(Request $request) {
        $data = Persons::all();

        return $data;
    }
    
    public function deletePerson(Request $request) {
        $data = Person::find($request.id).delete();
    }

    public function editPerson(Request $request, $id) {

        // Update person details
        $data = Person::where('id', $id)->first();
        $data->first_name = $request->get('val1');
        $data->last_name = $request->get('val2');
        $data->econtact->email = $request->get('val3');
        $data->econtact->mobile = $request->get('val4');
        $data->econtact->home_phone = $request->get('val5');
        $data->econtact->office_phone = $request->get('val6');
        $data->address->home_address = $request->get('val7');
        $data->address->postal_address = $request->get('val8');
        $data->save();

        // Return
        return $data;    
    }
}
