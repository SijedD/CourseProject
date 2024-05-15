<?php

namespace App\Http\Controllers\API\User;

use App\Exceptions\EmailIsNotVerifiedException;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserResetPasswordController extends Controller
{
    public function sendEmail(Request $request): JsonResponse
    {

        $user = User::where('email', $request->email)->firstOrFail();

        throw_if($user->email_verified_at === null, new EmailIsNotVerifiedException());

        $password = Str::random(12);
        $encryptPassword = Crypt::encryptString($password);
        $encryptEmail = Crypt::encryptString($request->email);

        $url = URL::temporarySignedRoute('reset_password', now()->addHour(), [
            'email_hash' => $encryptEmail,
            'password_hash' => $encryptPassword
        ]);

        $user->notify(new ResetPasswordNotification($url, $password));

        return response()->json();
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $data = (object) $request->validate([
            'email_hash' => ['required', 'string'],
            'password_hash' => ['required', 'string'],
        ]);

        $email = Crypt::decryptString($data->email_hash);
        $password = Crypt::decryptString($data->password_hash);

        $user = User::where('email', $email)->firstOrFail();

        $user->update([
            'password' => Hash::make($password),
        ]);

        return response()->json();
    }
}
