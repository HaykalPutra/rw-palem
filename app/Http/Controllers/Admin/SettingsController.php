<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use App\Models\OrgMember;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings  = SiteSetting::orderBy('group')->orderBy('sort_order')->get()->groupBy('group');
        $carousel  = CarouselItem::orderBy('sort_order')->get();
        $orgMembers = OrgMember::orderBy('sort_order')->get();

        return view('admin.settings.index', compact('settings', 'carousel', 'orgMembers'));
    }

    public function update(Request $request)
    {
        foreach ($request->input('settings', []) as $key => $value) {
            SiteSetting::set($key, $value);
        }
        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}

