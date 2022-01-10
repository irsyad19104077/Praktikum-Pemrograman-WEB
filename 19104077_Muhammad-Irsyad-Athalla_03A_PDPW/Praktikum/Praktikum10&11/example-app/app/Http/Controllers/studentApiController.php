<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class studentApiController extends Controller
{
    public function index()
    {
        //ambil data dari database,
        // lalu simpal kedalam array terlebih dahulul
        $data['student'] = Student::all();

        //lalu kita return data array ke API
        return response() -> json($data);
    }

    public function getById($id)
    {
        // ambil data dari database berdasarkan id
        // lalu simpan ke dalam array terlebih dahulu
        $data['student'] = Student::find($id);

        //lalu kita return data array ke API
        return response() -> json($data);
    }

    public function getByNim($nim)
    {
        // ambil data dari database berdasarkan nim
        // lalu simpan ke dalam array terlebih dahulu
        $data['student'] = Student::where('nim',$nim) -> first();

        //lalu kita return data array ke API
        return response() -> json($data);
    }

    public function save()
    {
        $student = new Student;
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();

        return response() -> json(['message' => "Data berhasil disimpan"]);
    }

    public function update($id)
    {
        $student = Student::find($id);
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();

        return response() -> json(['message' => "Data berhasil diubah"]);
    }

    public function delete($id)
    {
        //ambil data dari database berdasarkan id
        $student = Student::find($id);

        //hapus data siswa
        $student->delete();

        return response() -> json(['message' => "Data berhasil dihapus"]);
    }
}
