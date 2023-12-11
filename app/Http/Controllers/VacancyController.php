<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('vacancies')
            ->join('positions', 'positions.id', '=', 'vacancies.position_id')
            ->join('locations', 'locations.id', '=', 'vacancies.location_id')
            ->select('vacancies.*', 'positions.name as position_name', 'locations.name as location_name')
            ->paginate(15);
        return response()->json($data, 200);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = DB::table('vacancies')
            ->where('vacancies.title', 'like', '%' . $request->search . '%')
            ->join('positions', 'positions.id', '=', 'vacancies.position_id')
            ->join('locations', 'locations.id', '=', 'vacancies.location_id')
            ->select('vacancies.*', 'positions.name as position_name', 'locations.name as location_name')
            ->orderBy('id')->paginate(15);
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'position_id' => 'required',
            'location_id' => 'required',
            'job_type' => 'required|string|max:255',
            'amount_need_employee' => 'required',
            'expiration_date' => 'required',
            'description' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
            'is_ranged_salary' => 'required',
            'is_visible_salary' => 'required',
            'min_experience' => 'required',
            'max_experience' => 'required',
            'offers_remote_work' => 'required',
        ]);

        $data = DB::table('vacancies')->insert([
            'title' => $request->title,
            'slug' => $request->slug,
            'position_id' => $request->position_id,
            'location_id' => $request->location_id,
            'job_type' => $request->job_type,
            'amount_need_employee' => $request->amount_need_employee,
            'expiration_date' => $request->expiration_date,
            'description' => $request->description,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'is_ranged_salary' => $request->is_ranged_salary,
            'is_visible_salary' => $request->is_visible_salary,
            'min_experience' => $request->min_experience,
            'max_experience' => $request->max_experience,
            'offers_remote_work' => $request->offers_remote_work,
            'uuid' => Str::uuid(),
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        $response = [
            'success' => true,
            'message' => 'create data berhasil'
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KnowledegeCategory  $knowledegeCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('vacancies')
            ->where('vacancies.id', '=', $id)
            ->join('positions', 'positions.id', '=', 'vacancies.position_id')
            ->join('locations', 'locations.id', '=', 'vacancies.location_id')
            ->select('vacancies.*', 'positions.name as position_name', 'locations.name as location_name')
            ->first();
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KnowledegeCategory  $knowledegeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KnowledegeCategory  $knowledegeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'position_id' => 'required',
            'location_id' => 'required',
            'job_type' => 'required|string|max:255',
            'amount_need_employee' => 'required',
            'expiration_date' => 'required',
            'description' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
            'is_ranged_salary' => 'required',
            'is_visible_salary' => 'required',
            'min_experience' => 'required',
            'max_experience' => 'required',
            'offers_remote_work' => 'required',
        ]);

        $data = DB::table('vacancies')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'position_id' => $request->position_id,
                'location_id' => $request->location_id,
                'job_type' => $request->job_type,
                'amount_need_employee' => $request->amount_need_employee,
                'expiration_date' => $request->expiration_date,
                'description' => $request->description,
                'min_salary' => $request->min_salary,
                'max_salary' => $request->max_salary,
                'is_ranged_salary' => $request->is_ranged_salary,
                'is_visible_salary' => $request->is_visible_salary,
                'min_experience' => $request->min_experience,
                'max_experience' => $request->max_experience,
                'offers_remote_work' => $request->offers_remote_work,
                "updated_at" => date('Y-m-d H:i:s'),
            ]);

        $response = [
            'success' => true,
            'message' => 'update data berhasil'
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KnowledegeCategory  $knowledegeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::table('vacancies')->where('id', '=', $id)->delete();
        $response = [
            'success' => true,
            'message' => 'delete data berhasil'
        ];

        return response()->json($response, 200);
    }
}
