<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'student'){
                try {
                    $validator = Validator::make($request->all(),[
                        'student_nisn' => 'required'
                    ], [
                        'student_nisn.required' => 'Silahkan masukkan nomor NISN anda'
                    ]);
                    if ($validator->fails()){
                        throw new \Exception(Arr::first(Arr::flatten($validator->getMessageBag()->get('*'))));
                    }
                    else {
                        $student = Student::where('student_nisn', $request->student_nisn);
                        if ($student->count() < 1){
                            throw new \Exception('NISN tidak ditemukan silahkan periksa kembali NISN anda.');
                        }
                        else {
                            $student = $student->first();
                            $student->student_view = $student->student_view + 1;
                            $student->save();
                            $msg = $student;
                        }
                    }
                }
                catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type == 'validated' && $request->_data == 'student'){
                try {
                    $validator = Validator::make($request->all(),[
                        'student_agreement' => 'required'
                    ], [
                        'student_agreement.required' => 'Silahkan centang persetujuan terlebih dahulu'
                    ]);
                    if ($validator->fails()){
                        throw new \Exception(Arr::first(Arr::flatten($validator->getMessageBag()->get('*'))));
                    }
                    else {
                        $student = Student::where('student_nisn', $request->student_nisn)->first();
                        $student->student_agreement = 1;
                        if ($student->save()){
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Data Ijazah berhasil divalidasi, anda bisa keluar dari halaman ini.'];
                        }
                    }
                }
                catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type == 'update' && $request->_data == 'student'){
                try {
                    $validator = Validator::make($request->all(),[
                        'student_comment' => 'required',
                        'student_phone' => 'required'
                    ], [
                        'student_comment.required' => 'Silahkan isikan kolom keterangan kesalahan terlebih dahulu.',
                        'student_phone.required' => 'Silahkan isikan nomor WA/HP terlebih dahulu.'
                    ]);
                    if ($validator->fails()){
                        throw new \Exception(Arr::first(Arr::flatten($validator->getMessageBag()->get('*'))));
                    }
                    else {
                        $student = Student::where('student_nisn', $request->student_nisn)->first();
                        $student->student_comment = $request->student_comment;
                        $student->student_phone = $request->student_phone;
                        if ($student->save()){
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Pengajuan perubahan telah disimpan. silahkan cek kembali dalam 1-2 Hari Kerja.'];
                        }
                    }
                }
                catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            return response()->json($msg);
        }
        else {
            return view('home');
        }
    }
}
