<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Student; //add Student Model - Data is coming from the database via Model.
use App\Models\TransactionHistory;
 
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('students.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $input = $request->all();
        $input['nomor_telepon'] = '62' . $input['nomor_telepon'];
    Student::create($input);
       
        return redirect('student')->with('flash_message', 'Student Addedd!');  
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $student = Student::findOrFail($id);
    return view('students.show', compact('student'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }
    /** 
    * History the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required',
        ]);
    
        $student = Student::findOrFail($id);
        if ($request->has('tambah_jumlah') && is_numeric($request->tambah_jumlah)) {
            $saldoSebelum = $student->jumlah;
            $student->jumlah += $request->tambah_jumlah;
            $saldoSesudah = $student->jumlah;
    
 
            TransactionHistory::create([
                'student_id' => $student->id,
                'jumlah' => $request->tambah_jumlah,
                'saldo_sebelum' => $saldoSebelum,
                'saldo_sesudah' => $saldoSesudah,
                
            ]);
        }
        if ($request->has('kurangi_jumlah') && is_numeric($request->kurangi_jumlah)) {
            $saldoSebelum = $student->jumlah;
            $student->jumlah -= $request->kurangi_jumlah;
            $saldoSesudah = $student->jumlah;
    
            
            TransactionHistory::create([
                'student_id' => $student->id,
                'jumlah' => -$request->kurangi_jumlah,  
                'saldo_sebelum' => $saldoSebelum,
                'saldo_sesudah' => $saldoSesudah,
                
            ]);
        }
    
        $student->update([
            'tanggal' => $request->tanggal,
        ]);
    
        return redirect('/student')->with('success', 'Data siswa berhasil diubah');
    }
    
    public function history($id)
    {
        $student = Student::findOrFail($id);
        $histories = $student->transactionHistories;
        return view('students.history', compact('student', 'histories'));
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');  
    }
};