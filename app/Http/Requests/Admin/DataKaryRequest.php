<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataKaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nik' => 'required',
            'no_payroll'=> 'required',
            'id_position'=> 'required',
            'join_date'=> 'required',
            'image'=> 'image',
            'nama_kary'=> 'required',
            'alamat'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'jenis_kel'=> 'required',
            'gol_darah'=> 'required',
            'status'=> 'required',
            'pendidikan'=> 'required',
            'no_rek'=> 'required',
            'npwp'=> 'required',
            'bpjskes'=> 'required',
            'bpjstk'=> 'required',
        ];
    }
}