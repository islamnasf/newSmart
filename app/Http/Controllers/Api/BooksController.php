<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $bookfour=Book::where('classroom','الصف الرابع')->get();
        $bookfive=book::where('classroom','الصف الخامس')->get();
        $booksix=Book::where('classroom','الصف السادس')->get();
        $bookseven=book::where('classroom','الصف السابع')->get();
        $bookeight=book::where('classroom','الصف الثامن')->get();
        $booknine=book::where('classroom','الصف التاسع')->get();
        $bookten=book::where('classroom','الصف العاشر')->get();
        $bookeleven=book::where('classroom','الصف الحادي عشر')->get();
        $booktwelve=book::where('classroom','الصف الثاني عشر')->get();
        //package 
        $packagefour=AnotherPackage::where('class','الصف الرابع')->with('book')->get();
        $packagefive=AnotherPackage::where('class','الصف الخامس')->with('book')->get();
        $packagesix=AnotherPackage::where('class','الصف السادس')->with('book')->get();
        $packageseven=AnotherPackage::where('class','الصف السابع')->with('book')->get();
        $packageeight=AnotherPackage::where('class','الصف الثامن')->with('book')->get();
        $packagenine=AnotherPackage::where('class','الصف التاسع')->with('book')->get();
        $packageten=AnotherPackage::where('class','الصف العاشر')->with('book')->get();
        $packageeleven=AnotherPackage::where('class','الصف الحادي عشر')->with('book')->get();
        $packagetwelve=AnotherPackage::where('class','الصف الثاني عشر')->with('book')->get();
        return response()->json([
            'status'=>200,
            'bookfour'=> $bookfour,
            'bookfive'=> $bookfive,
            'booksix'=> $booksix,
            'bookseven'=> $bookseven,
            'bookeight'=> $bookeight,
            'booknine'=> $booknine,
            'bookten'=> $bookten,
            'bookeleven'=> $bookeleven,
            'booktwelve'=> $booktwelve,
            //
            'packagefour'=> $packagefour,
            'packagefive'=> $packagefive,
            'packagesix'=> $packagesix,
            'packageseven'=> $packageseven,
            'packageeight'=> $packageeight,
            'packagenine'=> $packagenine,
            'packageten'=> $packageten,
            'packageeleven'=> $packageeleven,
            'packagetwelve'=> $packagetwelve,
        ],200);
}
public function download($fileName)
{
   return response()->download(storage_path('app/public/pdf/books/'.$fileName));
}
}
