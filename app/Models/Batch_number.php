<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch_number extends Model
{
    //use HasFactory;
    protected $table="batch_number";
    protected $fillable = ['batch_number_no','batch_num','barcode','drug_no','shipment_no'];
    protected $primaryKey = 'id';
    public $timestamps=false;



}
