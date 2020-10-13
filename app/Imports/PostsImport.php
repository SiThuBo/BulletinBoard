<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        var_dump($row[0]);
        return new Post([
            'title'     => $row[0],
            'description'    => $row[1],
            'created_user_id'   => auth()->user()->id,
            'updated_user_id'   => auth()->user()->id,
        ]);
    }
}
