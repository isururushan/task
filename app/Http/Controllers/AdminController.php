<?php

namespace App\Http\Controllers;
use App\User;
use App\Persons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use DB;

class AdminController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
     /**
     * index view of the Admin page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
 public function index()
    {
        $admin      = User::where('id','=',Auth::user()->id)->first();
        $ageGroups = Persons::getAgeGroups();
        $dobGroups = Persons::getDobGroups();
        $religionGroups = Persons::getReligionGroups();

        return view('admin.dashboard',['ageGroups'=> $ageGroups,'dobGroups'=> $dobGroups,'religionGroups'=>$religionGroups]);
    }
//------------------admin profile--------------------------------------//

public function profile()
            {
                $admin = User::where('id','=',Auth::user()->id)->first();
                return view('admin.profile',['admin'=>$admin]);
            }


//---------------------add  Person pannel-------------------------------
public function showAddNewPersonPanel()
            {
                return view('admin.addNewPerson');
            }


//-----------------------add person query------------------------------------
public function personAdd(Request $request)
{
    $request->validate([
        'name' => 'required',
        'nic' => 'required',
        'email' => 'required',
        'dob' => 'required',
        'telephone' => 'required',
        'age' => 'required',
        'religion' => 'required',
        'address' => 'required',
    ]);

    try {
        $person = [
            'name' => $request->name,
            'nic' => $request->nic,
            'dob' => $request->dob,
            'age' => $request->age,
            'religion' => $request->religion,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'email' => $request->email,
        ];

        $email_exists = Persons::where('email', $request->email)->count();

        if ($email_exists > 0) {
            return redirect()->back()->with('error', 'Email already exists. Please use a different email.');
        }

        $result = Persons::create($person);

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    } catch (Exception $ex) {
        return $ex;
    }
}


//-------------------all person view-------------------------------

public function personProfiles()
            {
                $person = Persons::get();
                return view('admin.allPersonProfiles',['persons'=>$person]);
            }

            public function personProfile($id)
            {
                $persons = Persons::where('id','=',$id)
                    ->first();

                    return view('admin.personProfile',['person'=>$persons]);
            }

//---------------admin profile & password change query----------------------------

public function updatePassword(Request $request)
        {
            $old_pw = $request->input('old_pw');
            $new_pw = $request->input('new_pw');
            $user = User::find(Auth::user()->id);

            if ( !Hash::check($old_pw, $user->password)) {
                return redirect()->back()->with('error','Password did not match');
            }
            else{
                $user->password = Hash::make($new_pw);
                $user->save();
                return redirect()->back()->with('success','Password updated');
            }
        }

public function updateProfile(Request $request)
    {
            $fname = $request->input('name');
            $email = $request->input('email');

            $user = User::find(Auth::user()->id);

            $user->name = $fname;
            $user->email = $email;


            if ($user->save())
            {
                return redirect()->back()->with('success','Your Details updated');
            }
            else{
                return redirect()->back()->with('error','Something went wrong.try again later!');
            }
        }

//------------------------delete Person---------------------------------------------

public function deletePerson($id)
    {
        $person = Persons::find($id);

        if(!$person)
        {
            return redirect()->back()->with('error','person not found!');
        }

        $person->delete();

        return redirect('admin/person/allProfiles')->with('success','Success for person delete!');

    }

//------------------view update into person pannel------------------------------//

public function viewUpdatePerson($id)

   {
    $person = Persons::find($id);
    return view('admin.updatePerson',['person'=>$person]);

   }

//-----------------update persons into database-------------------------------//

public function updatePerson(Request $request)
{

    $request->validate([
        'id' => 'required',
        'name' => 'required',
        'nic' => 'required',
        'dob' => 'required',
        'age' => 'required',
        'religion' => 'required',
        'address' => 'required',
        'email' => 'required',
        'telephone' => 'required',
       
    ]);

    try{

        $id = $request->id;
        $name = $request->name;
        $nic = $request->nic;
        $dob = $request->dob;
        $age = $request->age;
        $religion = $request->religion;
        $address = $request->address;
        $email = $request->email;
        $telephone = $request->telephone;
        
        $Persons_save = Persons::where('id', $id)->update(['name' => $name,'nic' => $nic,'dob'=> $dob,'age' => $age,'religion' => $religion,'address'=> $address,'email' => $email,'telephone' => $telephone]);
        
        if($Persons_save) 
        {
            return redirect('admin/person/allProfiles')->with('success','Person Successfully Updated.');
        }
        else
        {
            return redirect()->back()->with('error','Somthing wrong.Try again....')->withInput(Input::all());
        }
    } catch (Exception $e) {
        return $e;
    }
}

}