<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'orderid';
    public $timestamps = false;

    public function displayShipDate()
    {
        if ($this->shipdate_expected == '0000-00-00 00:00:00' || $this->shipdate_expected == null) {
            return 'Not Provided';
        } else {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->shipdate_expected)->format('m/d/Y');
        }
    }

    public function updateShipDate()
    {
        $comment = strtolower($this->comments);

        $startPos = strpos($comment, "expected ship date: ");

        if ($startPos !== false) {
            $dateStr = substr($comment, $startPos + 20, 8);
            $date = DateTime::createFromFormat('m/d/y', $dateStr);
            if ($date) {
                $dbDate = $date->format('Y-m-d');
                $this->shipdate_expected = $dbDate;
                $this->save();
            }
        }
    }
}
