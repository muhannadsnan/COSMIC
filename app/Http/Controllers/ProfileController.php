<?php

namespace App\Http\Controllers;
use App\Profile;
use App\Base;
use App\Currency;
use App\Account;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth', ['except' => []]);
        $this->middleware('sitetree', ['except' => []]);
        // $this->middleware('owner', ['except' => []]);
    }

    public function index(Base $basis)
    {
        // Profile::breadcrumb([$basis]); // fill breadcrumb
        return view('profiles.index', [
                'profiles' => session('app.base')->_profiles, 
                'currencies' => Currency::all()->pluck('title', 'id')->toArray()
            ]);
        return Profile::all();
    }
    
    public function create()
    {
        return view('profiles.index');
    }

    public function fillProfileIntoBase($newProfile)
    {
        Profile::SiteTree([$newProfile->_base, $newProfile]);  // fill breadcrumb
        $base = session('app.base'); $bProfiles = $base->_profiles->toArray();
        array_push($bProfiles, $newProfile);
        $base->_profiles = $bProfiles;
        session(['app.base' => $base]);
    }    
    public function store(Request $request)
    {
        // dd($request->all());
        $newProfile = Profile::create([
            'title' => $request->title,
            'code' => "new code.",
            'startPeriodDate' => $request->startPeriodDate,
            'endPeriodDate' => $request->endPeriodDate,
            'base_id' => $request->base_id,
        ]);
        $this->fillProfileIntoBase($newProfile); // insert newProfile to Base
        return redirect()->back();
    }
    
    public function show(Base $basis, Profile $profile)
    { 
        // Profile::breadcrumb([$basis, $profile]); // fill breadcrumb 
        session(['app.profile' => $profile]);
        return view('profiles.show', ['profile' => $profile]);
    }
    
    public function edit(Profile $profile)
    {
        $profile->title = 'T1';
        $profile->save();
        return $profile;
    }
    
    public function update(Request $request, Profile $profile)
    {
        //
    }
    
    public function destroy(Profile $profile)
    {
        //
    }
}
