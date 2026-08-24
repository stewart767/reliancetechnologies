<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CompanySettingController extends Controller
{
    /**
     * Show edit settings form.
     */
    public function index()
    {
        $settings = CompanySetting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        $settings = CompanySetting::all();
        
        foreach ($settings as $setting) {
            if ($setting->type === 'file') {
                if ($request->hasFile('settings.' . $setting->key)) {
                    $request->validate([
                        'settings.' . $setting->key => 'image|max:2048'
                    ]);
                    
                    // Delete old file if exists
                    if ($setting->value) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($setting->value);
                    }
                    
                    $path = $request->file('settings.' . $setting->key)->store('settings', 'public');
                    $setting->update(['value' => $path]);
                }
            } else {
                if ($request->has('settings.' . $setting->key)) {
                    $setting->update(['value' => $request->input('settings.' . $setting->key)]);
                }
            }
        }

        // CRITICAL: Invalidate company settings cache
        Cache::forget('company_settings');

        return redirect()->back()->with('success', 'Company settings updated successfully.');
    }
}
