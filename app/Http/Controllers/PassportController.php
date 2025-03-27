<?php

namespace App\Http\Controllers;

use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePassportRequest;
use App\Http\Requests\UpdatePassportRequest;
class PassportController extends Controller
{
    
    public function create()
    {
        return view('passport.passport-create');
    }

    public function store(StorePassportRequest $request)
{
   
    $passport = new Passport([
        'passport_number' => $request->passport_number,
        'issue_date' => $request->issue_date,
        'expiry_date' => $request->expiry_date,
    ]);

    Auth::user()->passport()->associate($passport);
    $passport->save();

    
    return redirect()->route('passport.show')->with('success', 'Паспорт успешно добавлен');
}


    public function show()
    {
        $passport = Auth::user()->passport;
        return view('passport.passport', compact('passport'));
    }

    // Форма редактирования паспорта
    public function edit($id)
    {
        $passport = Passport::findOrFail($id);

        if ($passport->user_id !== Auth::id()) {
            abort(403, 'Вы не можете редактировать этот паспорт');
        }

        return view('passport.passport-edit', compact('passport'));
    }

    // Обновление паспорта
    public function update(UpdatePassportRequest $request, $id)
{ 
    $passport = Passport::findOrFail($id);

    if ($passport->user_id !== Auth::id()) {
        abort(403, 'Вы не можете редактировать этот паспорт');
    }

    $passport->update([
        'passport_number' => $request->passport_number, // Уже заглавные
        'issue_date' => $request->issue_date,
        'expiry_date' => $request->expiry_date,
    ]);

    return redirect()->route('passport.show')->with('success', 'Паспорт обновлен');
}



    // Удаление паспорта
    public function destroy($id)
    {
        $passport = Passport::findOrFail($id);

        if ($passport->user_id !== Auth::id()) {
            abort(403, 'Вы не можете удалить этот паспорт');
        }

        $passport->delete();

        return redirect()->route('passport.show')->with('success', 'Паспорт удален');
    }
}
