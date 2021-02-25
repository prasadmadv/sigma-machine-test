<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Report;
use DB;

class CampaignsController extends Controller
{
    public function showReport(Request $request)
    {
        $search = !empty($request->search) ? $request->search : "";
        $perPage = !empty($request->per_page) ? $request->per_page : 5;
        //dd($search);
        $select = [
            'reports.campaign_id as campaign_id', 
            'reports.user_email as user_email',
            'users.username as username',
            'users.id as user_id',
            'campaigns.name as campaign_name', 
            DB::raw('count(*) as clicks'),
            DB::raw("CONCAT(reports.campaign_id,'-',users.id) as id"),
        ];
        $reports = DB::table('reports')
                   ->select($select)
                    ->leftJoin('users','users.email','reports.user_email')
                    ->leftJoin('campaigns','campaigns.id','reports.campaign_id')
                    ->when(!empty($search), function($query) use($search) {
                        return $query->where('username','LIKE', '%'.$search.'%')
                        ->orWhere('user_email','LIKE', '%'.$search.'%')
                        ->orWhere('campaigns.name','LIKE', '%'.$search.'%')
                        ;
                    })
                    ->groupBy('campaign_id','user_email')
                    ->paginate($perPage);
                    //->toArray();
        return response()->json($reports);
        //return $reports;

    }
    public function index()
    {
        $items = Campaign::paginate(5);
        return response()->json($items);
        //return $items;
    }
    public function add(Request $request)
    {
        //save new 
        $campaign = Campaign::create($request->all());
        return response()->json('Campaign created!');
    }
    public function edit($id)
    {
        //return data to edit form
        $campaign = Campaign::find($id);
        if(!empty($campaign)){
            return response()->json($campaign);
        }
    return response()->json('NOT FOUND!');
    }
    public function update(Request $request, $id)
    {
        $campaign = Campaign::find($id);
        if(!empty($campaign)){
            $campaign->fill($request->all());
            $campaign->save();
            return response()->json('Campaign updated!');
        }
    return response()->json('NOT FOUND!');
    }
    public function destroy($id)
    {        
        $campaign = Campaign::find($id);
        if(!empty($campaign)){
            $campaign->delete();
            return response()->json('Campaign deleted!');
        }
    return response()->json('NOT FOUND!');
    }
}
