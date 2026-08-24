<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\CompanySetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CompanySettingsUploadTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Test admin can view settings edit form and the inputs are correctly configured.
     */
    public function test_admin_can_view_settings_form(): void
    {
        $admin = User::first();
        
        $response = $this->actingAs($admin)
            ->get(route('admin.settings.index'));

        $response->assertStatus(200);
        $response->assertSee('About Section Image');
        $response->assertSee('Overview Hero Image');
        $response->assertSee('type="file"', false);
    }

    /**
     * Test admin can upload image files for about sections settings.
     */
    public function test_admin_can_upload_about_images(): void
    {
        Storage::fake('public');
        
        $admin = User::first();

        $aboutImage = UploadedFile::fake()->image('about-who-we-are.png');
        $overviewImage = UploadedFile::fake()->image('about-overview-hero.jpg');

        $response = $this->actingAs($admin)
            ->post(route('admin.settings.update'), [
                'settings' => [
                    'about_image' => $aboutImage,
                    'overview_hero_image' => $overviewImage,
                    'about_heading' => 'New Heading Title',
                ]
            ]);

        $response->assertRedirect();
        
        // Assert updated in database
        $aboutImageSetting = CompanySetting::where('key', 'about_image')->first();
        $overviewImageSetting = CompanySetting::where('key', 'overview_hero_image')->first();
        $headingSetting = CompanySetting::where('key', 'about_heading')->first();

        $this->assertNotNull($aboutImageSetting->value);
        $this->assertNotNull($overviewImageSetting->value);
        $this->assertEquals('New Heading Title', $headingSetting->value);

        // Assert files exist in public storage
        Storage::disk('public')->assertExists($aboutImageSetting->value);
        Storage::disk('public')->assertExists($overviewImageSetting->value);
    }
}

