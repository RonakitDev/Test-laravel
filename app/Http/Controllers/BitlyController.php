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
        $data_success = [];
        $data_num = range(1, 100);
        foreach ($data_num as $value) {
            if ($value % 3 == 0 && $value % 5 == 0) {
                $value = 'ThreeFive';
            } elseif ($value % 5 == 0) {
                $value = 'Five';
            } elseif ($value % 3 == 0) {
                $value = 'Three';
            }
            array_push($data_success, $value);
        }
        $data_two = [];
        $nums = [3,1,2,3];
        $sum = 6;
        $data = [];
        for ($i = 0; $i < count($nums); $i++) {
            for ($j = $i + 1; $j < count($nums); $j++) {
                if ($nums[$i] + $nums[$j] == $sum) {
                    array_push($data, $i,$j);
                    break;
                }
            }
        }
        if ($data === []) {
            $data = 'no output';
        }
        array_push($data_two, $nums, $sum, $data);
        $data = array(
            'data_success' => $data_success,
            'data_two' => $data_two,
        );
        return view('index', $data);
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
        $data_befor->status = 0;
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
        if ($find) {
            if ($find->status) {
                return redirect($find->url_before);
            } else {
                return view('wait');
            }
        } else {
            return view('wait');
        }
    }

    public function update_status(Request $request)
    {
        Data::where('id', $request->id)
            ->update([
                'status' => $request->one
            ]);
        return 1;
    }

    public function wait()
    {
        return view('wait');
    }
}
