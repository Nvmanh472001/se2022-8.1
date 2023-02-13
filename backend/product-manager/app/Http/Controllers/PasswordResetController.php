<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use App\Notifications\SendPasswordRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;

class PasswordResetController extends Controller
{
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
       
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
            
        }
        return response()->json([
        'message' => 'We have e-mailed your password reset link!'
        ],200);
        
    
    }
    

    public function reset(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
     
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => 'Đường dẫn không còn hiệu lực.',
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $password = Str::random(10)."DPT2710";
       
        $user->password = Hash::make($password); 
       
        $updatePasswordUser = $user->update();
        if ($updatePasswordUser) {
            $user->notify(new SendPasswordRequest($password,$user->email));
        }
        $passwordReset->delete();

        return redirect('/admins')->with('msg', 'Mật khẩu mới đã được gửi vào email.');
    }
    
}
