<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender=doctors::where('doctor_gender','ذكر')->count();
        $gender2=doctors::where('doctor_gender','انثى')->count();
        $total2=$gender2;
        $total=$gender;
        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['الاطباء الذكور', 'الاطباء الاناث'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [$total, $total2]
            ]
        ])
        ->options([]);



$chartjs2 = app()->chartjs
->name('barChartTest')
->type('bar')
->size(['width' => 400, 'height' => 200])
->labels(['عدد الممرضين الذكور', 'عدد الممرضين الاناث'])
->datasets([
    [
        "label" => "عدد الممرضين الذكور",
        'backgroundColor' => ['rgba(255, 99, 132, 0.2)'],
        'data' => [$total, 0]
    ],
    [
        "label" => "عدد الممرضين الاناث",
        'backgroundColor' => [ 'rgba(54, 162, 235, 0.3)'],
        'data' => [0, $total2]
    ]
])
->options([]);




return view('pages.dashboard.dashboard', compact('chartjs','chartjs2'));


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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
