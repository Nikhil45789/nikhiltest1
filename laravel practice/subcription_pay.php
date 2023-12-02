<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcription_model; // Import your model
use DateTime;

// Retrieve all records from the table

class subcription_pay extends Controller
{
    //
    public function show()
    {
        // DB::table('subscription_date')->insert([
        //     ['date' => '02-12-2023']
        // ]);
        $date = subcription_model::where('id', '1')->value('date');
        // dd($date);
        $dateString = '2023-12-02'; // Your initial date in 'YYYY-MM-DD' format
        $initialDate = new DateTime($date);

        // Increase the month by one
        $initialDate->modify('+1 month');

        // Get the updated date
        $updatedDate = $initialDate->format('Y-m-d'); // Format it back to 'YYYY-MM-DD'

        echo $updatedDate; // Output the updated date

        if (true) {
            subcription_model::where('id', '1')->update([
                'date' => $updatedDate
            ]);

        }
    }
}
