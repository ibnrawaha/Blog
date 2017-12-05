<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function index($userProfile){

    	// $user = User::where('id', auth()->user()->id)->get()->first();
    	$user = User::where('name', $userProfile)->get()->first();

    	$profile = Profile::where('user_id' , $user['id'])->get()->first();


    	if(strtolower(auth()->user()->name) == strtolower($userProfile)) {

	    	return view('profile.index')->with('user', $user)->with('profile', $profile);
    	}
    	elseif (!$user){
    		return view('error.404');
    	}
    	else {
    		return view('profile.show')->with('user', $user)->with('profile', $profile);
    	}

    }

    public function store(Request $request){

    	$this->validate($request, [
				'full_name' => 'required',
				// 'phone' => 'regex:/(01)[0-9]{9}/',
				// 'zip_code' => 'integer',
				]);

    	$profile = new Profile;
    	$profile->user_id = auth()->user()->id;
    	$profile->full_name = $request->input('full_name');
		$profile->job = $request->input('job');
		$profile->degree = $request->input('degree');
		$profile->about = $request->input('about');
		$profile->phone = $request->input('phone');
		$profile->dob = $request->input('dob');
		$profile->address = $request->input('address');
		$profile->city = $request->input('city');
		$profile->country = $request->input('country');
		$profile->zip_code = $request->input('zip_code');
		$profile->save();
		

    }

    // `id`, `user_id`, `full_name`, `job`, `degree`, `about`, `phone`, `address`, `city`, `country`, `zip_code`, `created_at`, `updated_at`SELECT * FROM `profiles` WHERE 1

    public function update(Request $request, $user) {
		
		$user = User::where('name', $user)->get()->first();

		$profile = Profile::where('user_id', $user->id)->get()->first();

		if ($user->name == auth()->user()->name) {

			$this->validate($request, [
				// 'full_name' => 'required',
				// 'phone' => 'regex:/(01)[0-9]{9}/',
				// 'zip_code' => 'integer',
				]);

			if ($profile){
				
				$profile->full_name = $request->input('full_name');
				$profile->job = $request->input('job');
				$profile->degree = $request->input('degree');
				$profile->about = $request->input('about');
				$profile->phone = $request->input('phone');
				$profile->dob = $request->input('dob');
				$profile->address = $request->input('address');
				$profile->city = $request->input('city');
				$profile->country = $request->input('country');
				$profile->zip_code = $request->input('zip_code');
				$profile->save();
				
				return redirect('/user/profile/'.$user->name)->with('success', 'Your Profile Successfully Updated');

			}

			else {
				// echo "No Profile";
				$this->store($request);
				return redirect('/user/profile/'.$user->name)->with('success', 'Your Profile Successfully Updated');
			}
		
		}

		else {
			return view('error.404');
		}


    
    }




}
