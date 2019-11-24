<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KategoriKompetensi extends Model
{
    protected $table = "kategori_kompotensis";

    protected $fillable = ['code','description'];
}
