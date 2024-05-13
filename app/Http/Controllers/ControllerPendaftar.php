<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerPendaftar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view("register", ["session" => Session::get("session"), "title" => "register"]);
    }
    public function login()
    {
        return view("login", ["message" => Session::get("message"), "session" => Session::get("session"), "title" => "login"]);
    }
    public function home()
    {
        return view("home", ["data" => Session::get("session"), "session" => Session::get("session"), "title" => "home"]);
    }
    public function dashboard()
    {
        $user = Session::get("session");
        if ($user->role === "panitia") {
            $data = Pendaftar::all();
            return view("dashboard_panitia", ["data" => $data, "session" => Session::get("session"), "title" => "dashboar admin"]);
        }
        return view("dashboard_pendaftar", ["item" => Session::get("session"), "session" => Session::get("session"), "title" => "dashboard"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nisn' => 'required|max:20',
            'rt_nilai' => 'required|integer',
            'alamat' => 'required|max:255',
        ]);
        $pendaftar = new Pendaftar();
        $pendaftar->name = $validatedData['nama'];
        $pendaftar->nisn = $validatedData['nisn'];
        $pendaftar->rt_nilai = $validatedData['rt_nilai'];
        $pendaftar->alamat = $validatedData['alamat'];
        $pendaftar->role = "pendaftar";
        $pendaftar->save();
        if ($pendaftar->save()) {
            // Data berhasil disimpan
            $user = Pendaftar::where('nisn', $validatedData['nisn'])->get();
            Session::put("session", $user[0]);
            return redirect()->to("/dashboard");
        } else {
            // Gagal menyimpan data
            return redirect()->back()->withInput();
        }
    }
    public function Masuk(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nisn' => 'required|max:20',
        ]);
        if ($validatedData) {
            $user = Pendaftar::where('name', $validatedData['nama'])->get();
            if ($user) {
                if ($user[0]->nisn === $validatedData['nisn']) {
                    Session::put("session", $user[0]);
                    Session::forget("message");
                    return redirect()->to('dashboard');
                } else {
                    Session::put('message', 'username atau nisn salah');
                    return redirect()->back()->withInput();
                }
            } else {
                $request->session('message', 'username atau nisn salah');
                return redirect()->back()->withInput();
            }
        } else {
            return redirect()->back()->withInput();
        }
    }


    public function diterima(Request $request)
    {
        $id = $request->input('id');
        Pendaftar::where('id', $id)->update([
            "status" => 1
        ]);
        return redirect()->to("dashboard");
    }
    public function batalkan(Request $request)
    {
        $id = $request->input('id');
        Pendaftar::where('id', $id)->update([
            "status" => 0
        ]);
        return redirect()->to("dashboard");
    }
    public function logout()
    {
        Session::forget("session");
        return redirect()->to("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
