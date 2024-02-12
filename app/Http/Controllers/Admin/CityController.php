<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\MandubCity;
use App\Models\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $city = City::get();
        $count = city::count();
        return view('/admin/book/city', compact('city', 'count'));
    }
    public function store(Request $request)
    {

        City::create([
            'name' => $request->name,
            'deliver_price' => $request->deliver_price,
        ]);

        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function update(Request $request, int $city)
    {

        City::findOrFail($city)->update([
            'name' => $request->name,
            'deliver_price' => $request->deliver_price,
        ]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    //
    public function addMandoub(Request $request, int $city)
    {
        $c = City::where("id", $city)->first();

        $mandubcity = MandubCity::where("city_id", $c->id)->get();

        $mandub = [];

        foreach ($mandubcity as $mandubCity) {
            $mand = User::find($mandubCity->mandoub_id);

            if ($mand) {
                $mandub[] = $mand;
            }
        }
        $mandubcity = MandubCity::where("city_id", $c->id)->pluck('mandoub_id')->toArray();

        $mandoubs = User::where("user_type", "mandub")->whereNotIn('id', $mandubcity)->get();
         return view('/admin/book/addMandoubToCity', compact(['mandub', 'mandoubs', 'c']));
    }
    
    public function addNewMandoub(Request $request, int $city)
    {

        $c = City::findOrFail($city);
        if ($c) {
            MandubCity::create([
                'city_id' => $city,
                'mandoub_id' => $request->mandoub_id,
            ]);
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function mandoubCityDelete(Request $request, int $mandoub){
        try {
            $mandubCity = MandubCity::where("mandoub_id", $mandoub)->first();
            $mandubCity->delete();
            toastr()->success('تم حذف البيانات بنجاح');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            toastr()->error('لم يتم العثور على السجل');
        }
        return back();
    }
}
