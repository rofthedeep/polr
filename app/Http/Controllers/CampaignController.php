<?php
namespace App\Http\Controllers;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

use App\Factories\CampaignFactory;

class CampaignController extends Controller {
    /**
     * Show the admin panel, and process admin AJAX requests.
     *
     * @return Response
     */

    private function renderError($message) {
        return redirect(route('admin') . '#campaigns')->with('error', $message);
    }

    public function createCampaign(Request $request) {
        if (env('SETTING_SHORTEN_PERMISSION') && !self::isLoggedIn()) {
            return redirect(route('index'))->with('error', 'You must be logged in to create campaigns.');
        }

        // Validate URL form data
        $this->validate($request, [
            'name' => 'required|unique:campaigns',
            'value' => 'required|unique:campaigns'
        ]);

        $value = $request->input('value');
        $name = $request->input('name');


        try {
            $campaign = CampaignFactory::createCampaign($value, $name);
        }
        catch (\Exception $e) {
            return self::renderError($e->getMessage());
        }

        return view('created_campaign', ['message' => $campaign]);
    }

    public function updateCampaign(Request $request, $id) {
        if (env('SETTING_SHORTEN_PERMISSION') && !self::isLoggedIn()) {
            return redirect(route('index'))->with('error', 'You must be logged in to create campaigns.');
        }

        // Validate URL form data
        $this->validate($request, [
            'name' => 'required|unique:campaigns,name,' .$id,
            'value' => 'required|unique:campaigns,value,' .$id
        ]);


        $value = $request->input('value');
        $name = $request->input('name');


        try {
            $campaign = CampaignFactory::updateCampaign($id, $value, $name);
        }
        catch (\Exception $e) {
            return self::renderError($e->getMessage());
        }

        return view('created_campaign', ['message' => $campaign]);
    }

    public function displayEditCampaign(Request $request, $id) {
        if (!$this->isLoggedIn()) {
            return redirect(route('login'))->with('error', 'Please login to access your dashboard.');
        }

        $campaign = Campaign::where('id', $id)->first();



        return view('edit_campaign', [
            'campaign' => $campaign
        ]);
    }




}
