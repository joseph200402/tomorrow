
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.two-factor');
    }

    public function verify(Request $request)
    {
        $user = Auth::user();

        if ($request->input('two_factor_code') === $user->two_factor_code && now()->lessThan($user->two_factor_expires_at)) {
            // Clear the 2FA code after successful verification
            $user->resetTwoFactorCode();

            return redirect()->route('dashboard'); // Redirect to dashboard or desired page
        }

        return back()->withErrors(['two_factor_code' => 'The provided two-factor code is invalid or has expired.']);
    }
}
