<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_accessing_protected_pages(): void
    {
        $this->get('/')->assertRedirect('/login');
        $this->get('/vendors')->assertRedirect('/login');
        $this->get('/vendors/create')
            ->assertRedirect('/login')
            ->assertSessionHas('error', 'Silakan login terlebih dahulu.');
    }

    public function test_login_and_register_pages_can_be_rendered(): void
    {
        $this->get('/login')->assertStatus(200)->assertSee('Login');
        $this->get('/register')->assertStatus(200)->assertSee('Daftar Akun Baru');
    }

    public function test_user_can_register(): void
    {
        $response = $this->post('/register', [
            'name'                  => 'Budi Mahasiswa',
            'email'                 => 'budi@kampus.ac.id',
            'password'              => 'rahasia123',
            'password_confirmation' => 'rahasia123',
        ]);

        $response->assertRedirect('/vendors');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name'  => 'Budi Mahasiswa',
            'email' => 'budi@kampus.ac.id',
        ]);

        $user = User::where('email', 'budi@kampus.ac.id')->first();
        $this->assertTrue(Hash::check('rahasia123', $user->password));
    }

    public function test_register_fails_when_email_taken_or_password_mismatch(): void
    {
        User::factory()->create(['email' => 'sudah@ada.com']);

        $response = $this->post('/register', [
            'name'                  => 'Andi',
            'email'                 => 'sudah@ada.com',
            'password'              => '123456',
            'password_confirmation' => '654321',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
        $this->assertGuest();
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email'    => 'staff@gudang.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email'    => 'staff@gudang.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/vendors');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_redirected_to_intended_url_after_login(): void
    {
        $user = User::factory()->create([
            'email'    => 'staff@gudang.com',
            'password' => Hash::make('password123'),
        ]);

        $this->get('/vendors/create')->assertRedirect('/login');

        $response = $this->post('/login', [
            'email'    => 'staff@gudang.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/vendors/create');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_wrong_password(): void
    {
        User::factory()->create([
            'email'    => 'staff@gudang.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email'    => 'staff@gudang.com',
            'password' => 'salah-banget',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_user_is_redirected_away_from_login_and_register(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/login')->assertRedirect('/vendors');
        $this->actingAs($user)->get('/register')->assertRedirect('/vendors');
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_guest_cannot_mutate_vendor_data(): void
    {
        $vendor = Vendor::create([
            'code'                    => 'VND-999',
            'name'                    => 'PT Test Auth',
            'office_address'          => 'Jl. Merdeka',
            'email'                   => 'test@vendor.com',
            'phone'                   => '021-111111',
            'tax_id'                  => '01.000.000.0-000.000',
            'business_license_number' => '1234567890',
            'status'                  => 'active',
            'pic_name'                => 'Ani',
            'pic_position'            => 'Staff',
            'pic_email'               => 'ani@vendor.com',
            'pic_phone'               => '08123456789',
        ]);

        $this->post('/vendors', [])->assertRedirect('/login');
        $this->get("/vendors/{$vendor->id}/edit")->assertRedirect('/login');
        $this->put("/vendors/{$vendor->id}", [])->assertRedirect('/login');
        $this->delete("/vendors/{$vendor->id}")->assertRedirect('/login');
    }

    public function test_login_with_remember_me_sets_remember_token(): void
    {
        $user = User::factory()->create([
            'email'         => 'ingat@gudang.com',
            'password'      => Hash::make('password123'),
            'remember_token' => null,
        ]);

        $response = $this->post('/login', [
            'email'    => 'Ingat@Gudang.com',
            'password' => 'password123',
            'remember' => '1',
        ]);

        $response->assertRedirect('/vendors');
        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($user->fresh()->remember_token);
    }

    public function test_register_redirects_to_login_when_auto_login_disabled(): void
    {
        config(['alur.auto_login_setelah_register' => false]);

        $response = $this->post('/register', [
            'name'                  => 'Siti Mahasiswi',
            'email'                 => 'siti@kampus.ac.id',
            'password'              => 'rahasia123',
            'password_confirmation' => 'rahasia123',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('success', 'Akun berhasil dibuat, silakan login.');
        $this->assertGuest();
        $this->assertDatabaseHas('users', [
            'name'  => 'Siti Mahasiswi',
            'email' => 'siti@kampus.ac.id',
        ]);
    }
}
