<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all()
                ->where('user_id', '=', Auth::user()->id);

        // dd($services);

        return view('services.index')
        ->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $start = $request->validated()['time'];
        if($request->validated()['service'] == 'روشویی به مدت 15 دقیقه و مبلغ 25 هزار تومان') {
            $end = date("H:i", strtotime($start . '+15 minutes'));
        }
        if($request->validated()['service'] == 'نظافت داخل به مدت 20 دقیقه و مبلغ 30 هزار تومان') {
            $end = date("H:i", strtotime($start . '+20 minutes'));
        }
        if($request->validated()['service'] == 'صفر شویی به مدت 60 دقیقه و مبلغ 80 هزار تومان') {
            $end = date("H:i", strtotime($start . '+60 minutes'));
        }
        $count = 0;
        $comp = Service::select('date', 'start', 'end')->get();
        
        foreach ($comp->toArray() as $key => $value) {
            if($request->validated()['date'] == $value['date']) {
                if($start >= $value['start'] && $start <= $value['end'] || $end >= $value['start'] && $end <= $value['end']) {
                    $count++;
                    if($count == 2) {
                        return to_route('dashboard')->with('time', "you can't reserve this time");
                    }
                }
            }
        }

        Service::create([
            'service' => $request->validated()['service'],
            'date' => $request->validated()['date'],
            'start' => $start,
            'end' => $end,
            'tracking_code' => Str::random(20),
            'user_id' => Auth::user()->id
        ]);
        return to_route('services.index')
        ->with('success', 'اطلاعات با موفقیت ثبت شدند');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('services.show')
        ->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('services.edit')
        ->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Service::destroy($id);

        return to_route('services.index')->with('success', 'سرویس با موفقیت لغو شد');
    }
}
