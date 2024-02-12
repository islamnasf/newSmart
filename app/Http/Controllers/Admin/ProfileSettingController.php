<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSettingController extends Controller
{
  public function index()
  {
    return view('/admin/profile');
  }
  public function update(Request $request, $id)
  {
    $requests = $request->all();
    $user = User::find($id);
    $user->update([
      'name' => $request->name,
      'phone' => $request->phone,
      'email' => $request->email,
      'password' => $request->password,
      'user_password' => $request->password,
    ]);
    toastr()->success('تم حفظ البيانات بنجاح');
    return redirect()->route('getProfile');
  }
}
