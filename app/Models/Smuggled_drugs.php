<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smuggled_drugs extends Model
{
    //use HasFactory;
    protected $table="smuggled_drugs";
    protected $fillable = [
        'smuggled_drugs_no','batch_no', 'commercial_name', 'material_name', 'company_name'
        , 'agent_name','smuggled_drug_photo'
    ];
    public $timestamps=false;
    protected $primaryKey = 'smuggled_drugs_no';



}
