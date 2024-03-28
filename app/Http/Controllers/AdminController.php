<?php
namespace App\Exports;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;

use App\Models\User;

use Excel;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;



class AdminController extends Controller
{
    public function adminDashboard()
    {
        $registeredUsersCount = $this->getRegisteredUsersCount();
    $reservationsCount = $this->getReservationsCount();

    return view('admin.dashboard', compact('registeredUsersCount', 'reservationsCount'));
    }

    public function manageUsers()
    {
        $users = DB::table('users')->simplePaginate(10);

        return view('admin.manage-users', compact('users'));
    }

    public function viewReservations()
    {
        $reservations = DB::table('reservations')->get();
        return view('admin.view-reservations', compact('reservations'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('admin.manage-users')->with('success', 'User updated successfully');
    }

    public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('admin.manage-users')->with('error', 'User not found');
    }

    $user->delete();

    return redirect()->route('admin.manage-users')->with('success', 'User deleted successfully');
}

    public function addUser()
    {
        return view('admin.add-user');
    }

    public function storeUser(Request $request)
{
    $data = $request->validate([
        'id' => 'required|numeric|unique:users,id',
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    $data['password'] = bcrypt($data['password']); 

    User::create($data);

    return redirect()->route('admin.manage-users')->with('success', 'User added successfully');
}
public function exportReservations()
{
    $reservations = DB::table('reservations')
        ->join('users', 'reservations.id_user', '=', 'users.id')
        ->select('reservations.id', 'reservations.date', 'reservations.id_user', 'users.name as user_name', 'users.email as user_email')
        ->get();

    $csvFileName = 'reservations_export.csv';
    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$csvFileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $handle = fopen('php://output', 'w');

    fputcsv($handle, ['ID', 'Date', 'User ID', 'User Name', 'User Email']);

    foreach ($reservations as $reservation) {
        fputcsv($handle, [$reservation->id, $reservation->date, $reservation->id_user, $reservation->user_name, $reservation->user_email]);
    }

    fclose($handle);

    return response()->make('', 200, $headers);
}
public function getRegisteredUsersCount()
{
    $registeredUsersCount = User::count();
    return $registeredUsersCount;
}

public function getReservationsCount()
{
    $reservationsCount = DB::table('reservations')->count();
    return $reservationsCount;
}
public function searchUsers(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('email', 'like', "%$search%")->simplePaginate(10);

        return view('admin.manage-users', compact('users'));
    }
    public function viewMessages()
    {
        $messages = Message::all(); // You can modify this query to suit your needs
        return view('admin.view-messages', compact('messages'));
    }

 }