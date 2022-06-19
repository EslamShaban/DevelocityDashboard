<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Company;
use App\Models\Section;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
class UsersImport implements ToModel, WithHeadingRow,WithUpserts,WithUpsertColumns,WithValidation
{
    public function model(array $row)
    {
        return new User([
            'name'          => $row['name'],
            'email'         => $row['email'],
            'password'      => bcrypt($row['password']),
            'company_id'    => Company::where('name', $row['company'])->pluck('id')[0],
            'section_id'    => Section::where('name', $row['job'])->pluck('id')[0]
        ]);
    }

    public function uniqueBy()
    {
        return 'email';
    }
        
    public function upsertColumns()
    {
        return ['name', 'password', 'company_id', 'section_id'];
    }

        
    public function rules(): array
    {
        return [
            'company'=> Rule::in(Company::pluck('name')),
            'section'=> Rule::in(Section::pluck('name'))
        ];
    }

}
