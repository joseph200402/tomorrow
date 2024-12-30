namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if email verification is required
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return redirect()->route('verification.notice');
            }

            // Generate 2FA code
            $this->generateTwoFactorCode($user);

            // Redirect to 2FA confirmation
            return redirect()->route('two-factor.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    protected function generateTwoFactorCode($user)
    {
        $user->two_factor_code = rand(100000, 999999); // Generate a 6-digit code
        $user->two_factor_expires_at = now()->addMinutes(10); // Code expires in 10 minutes
        $user->save();

        // Send the code via notification or SMS (for now, display it in the session)
        Session::put('two_factor_code', $user->two_factor_code);
    }
}
