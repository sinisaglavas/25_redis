<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAvatarRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
   use ImageUploadTrait;

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function changeAvatar(NewAvatarRequest $request)
    {
        $profileImage = Auth::user()->profile_image;
        $profileImage !== null ? File::delete("storage/images/avatars/$profileImage") : null;
        // $profileImage && File::delete("storage/images/avatars/$profileImage"); // ako ima vrednost obrisi ga

        $name = $this->uploadImage($request->file('profile_image'), 'images/avatars');

        // $name = basename($filePath); // izvlacimo samo zadnji deo od cele putanje - samo ime slike
        Auth::user()->update(['profile_image' => $name]);

        return redirect()->back();
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
