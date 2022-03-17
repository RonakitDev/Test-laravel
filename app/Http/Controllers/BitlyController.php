<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Shivella\Bitly\Facade\Bitly;

class BitlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $url = Bitly::getUrl('https://www.youtube.com/watch?v=V69g4fo8oZ0&list=RDLYaTxW0mbdk&index=5'); // http://bit.ly/nHcn3
//        dd($url);
        $data = Data::all();
        return view('index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $str = Str::random(6);
//        $url = Bitly::getUrl($request->url); // http://bit.ly/nHcn3
        $data_befor = new Data();
        $data_befor->url_before = $request['url'];
        $data_befor->url_after = $str;
        $data_befor->save();
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return Data::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Data::find($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $str = Str::random(6);
        $update = Data::find($id);
        $update->url_before = $request['url'];
        $update->url_after = $str;
        $update->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Data::find($id);
        $del->delete();
        return redirect('dashboard');
    }
    public function shortenLink($code)
    {
        $find = Data::where('url_after', $code)->first();
        return redirect($find->url_before);
    }
}
