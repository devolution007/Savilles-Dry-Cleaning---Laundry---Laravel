<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceDetails;
use App\Models\ServicePrices;
use Illuminate\Http\Request;

class ServiceExtraController extends Controller
{
    function pricesGet($id)
    {
        $service = Service::where('id', $id)->first();
        $servicePrices = ServicePrices::where('service_id', $id)->get();
        return view('dashboard.form.editServicePrices', [
            'service' => $service,
            'servicePrices' => $servicePrices,
        ]);
    }

    function pricesPost(Request $request)
    {
        $values = $request->validate([
            'data.*' => 'required',
            'service_id' => 'required',
        ]);

        $data = [];
        foreach ($values['data'] as $item) {
            $data[] = array(
                'id' => $item['id'] ?? NULL,
                'service_id' => $values['service_id'],
                'title' => $item['title'],
                'child' => json_encode($item['child'])
            );
        }

        ServicePrices::upsert($data, ['id', 'service_id', 'title', 'child']);
        return redirect()->route('services.index')->with('success', 'Service Prices Updated Successfully!');
    }

    public function pricesDelete(ServicePrices $servicePrices)
    {
        //$service = Service::where('id', $id);
        $servicePrices->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    function detailsGet($id)
    {
        $service = Service::where('id', $id)->first();
        $serviceDetails = ServiceDetails::where('service_id', $id)->get();
        return view('dashboard.form.editServiceDetails', [
            'service' => $service,
            'serviceDetails' => $serviceDetails,
        ]);
    }

    function detailsPost(Request $request)
    {
        $values = $request->validate([
            'detail.*' => 'required',
            'service_id' => 'required',
        ]);

        $data = [];
        foreach ($values['detail'] as $item) {
            $data[] = array(
                'id' => $item['id'] ?? NULL,
                'service_id' => $values['service_id'],
                'icon' => $item['icon'],
                'title' => $item['title'],
                'content' => $item['content'],
            );
        }

        ServiceDetails::upsert($data, ['id', 'service_id', 'icon', 'title', 'content']);
        return redirect()->route('services.index')->with('success', 'Service Details Updated Successfully!');
    }

    public function detailsDelete(ServiceDetails $serviceDetails)
    {
        //$service = Service::where('id', $id);
        $serviceDetails->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
