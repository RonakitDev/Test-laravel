<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $url = Bitly::getUrl($request->url); // http://bit.ly/nHcn3
        $data_befor = new Data();
        $data_befor->url_before = $request['url'];
        $data_befor->url_after = $url;
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
        $url = Bitly::getUrl($request->url);
        $update = Data::find($id);
        $update->url_before = $request['url'];
        $update->url_after = $url;
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
}
