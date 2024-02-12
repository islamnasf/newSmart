<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitesetteings as SitesetteingsModel;

class Sitesetteings extends Controller
{
    public function index()
    {
        $data = SitesetteingsModel::find(1);
        return view("admin.sitesettings", compact("data"));
    }
    public function update(Request $request)
    {
        $site = SitesetteingsModel::find(1);
        $site->update($request->all());
        return redirect()->route("sitesettingsShow")->with("success", "Done !");
    }
}
