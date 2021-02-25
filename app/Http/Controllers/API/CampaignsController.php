<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Report;

class CampaignsController extends Controller
{
    public function showReport()
    {
        $items = Report::select('reports.*','users.username as username','campaigns.name as campaign_name')
        ->leftJoin('users','users.email','reports.user_email')
        ->leftJoin('campaigns','campaigns.id','reports.campaign_id')
        ->get()
        ->toArray();
        dd($items);
        return $items;
    }
    public function index()
    {
        $items = Campaign::all()->toArray();
        return $items;
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
