<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Todo;

class TestController extends Controller
{
    const DATEFORMAT = 'Y-m-d\TH:i:s.uP';
    const DBDATEFORMAT = 'Y-m-d H:i:s.u';
    const DBTZ = 'UTC';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show form
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function testForm(Request $request)
    {
        $ts = Carbon::now();
        $model = Todo::findOrFail(1);
        if (!empty($model->ts)) {
            $ts = $model->ts;
            // $ts = Carbon::createFromFormat(self::DBDATEFORMAT, $model->ts, self::DBTZ);
        }

        return view('test', [
            'dateFormat' => self::DATEFORMAT,
            'ts' => $ts
        ]);
    }

    /**
     * Process form
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function testProcess(Request $request)
    {
        $this->validate($request, [
            'ts' => 'required' //|date_format:' . self::DATEFORMAT
        ]);

        $model = Todo::findOrFail(1);
        $model->ts = Carbon::createFromFormat(self::DATEFORMAT, $request->ts)->setTimezone(self::DBTZ)->format(self::DBDATEFORMAT);
        $model->save();

        return redirect(route('test'))->withInput();
    }
}
