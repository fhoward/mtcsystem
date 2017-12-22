<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        $events = []; 

        foreach (\App\Contact::all() as $contact) { 
           $crudFieldValue = $contact->date; 

           if (! $crudFieldValue) {
               continue;
           }
           $eventLabel     = $contact->name; 
           $prefix         = ''; 
           $suffix         = 'has a schedule'; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue instanceof Carbon ? $crudFieldValue->format(config('app.date_format'). " H:i:s")  : $crudFieldValue, 
                'url'   => route('admin.contacts.edit', $contact->id)
           ]; 
        } 


if(Auth::user()->role->title == 'Staffs'){
$id = Auth::user()->id;

        foreach (\App\Schedule::all()->where('staff_id',$id) as $schedule) { 

           $crudFieldValue = $schedule->date; 
           $crudFieldValue2 = $schedule->start;
           $test = $schedule->staff->name;
           $test2 = $schedule->patient->name;
           $crudend =$schedule->end;
           $field = $crudFieldValue . " " . $crudFieldValue2;
           $field2 = $crudFieldValue . " " . $crudend;
            $status = $schedule->status;
           // $start = $schedule->start;
           if (! $crudFieldValue) {
               continue;
           }
           $eventLabel     = $schedule->activity; 
           $prefix         = "Has a";


           $suffix         = ''; 
           $dataFieldValue = trim($test . " " . $test2 . " " . $prefix . " " . $eventLabel . " " . $suffix ); 
           if($status == 'Attended')
           {
               $events[]       = [ 
                    'title' => $dataFieldValue, 
                    'start' => $field instanceof Carbon ? $field->format(config('app.date_format'). " H:i:s")  : $field, 
                    'end' => $field2 instanceof Carbon ? $field2->format(config('app.date_format'). " H:i:s")  : $field2,
                    'url'   => route('admin.schedules.edit', $schedule->id),
                    'color' => 'green'
               ]; 
            }elseif ($status == 'Unattended') {
                         $events[]       = [ 
                    'title' => $dataFieldValue, 
                    'start' => $field instanceof Carbon ? $field->format(config('app.date_format'). " H:i:s")  : $field, 
                    'end' => $field2 instanceof Carbon ? $field2->format(config('app.date_format'). " H:i:s")  : $field2,
                    'url'   => route('admin.schedules.edit', $schedule->id),
                    'color' => 'red'
               ]; 

            }else
            {
                    $events[]       = [ 
                    'title' => $dataFieldValue, 
                    'start' => $field instanceof Carbon ? $field->format(config('app.date_format'). " H:i:s")  : $field, 
                    'end' => $field2 instanceof Carbon ? $field2->format(config('app.date_format'). " H:i:s")  : $field2,
                    'url'   => route('admin.schedules.edit', $schedule->id),
                    'color' => 'blue'
               ];  
            }
        } 


       return view('admin.calendar' , compact('events')); 
    

  }else
        foreach (\App\Schedule::all() as $schedule) { 
           $crudFieldValue = $schedule->date; 
           $crudFieldValue2 = $schedule->start;
           $test = $schedule->staff->name;
           $test2 = $schedule->patient->name;
           $crudend =$schedule->end;
           $field = $crudFieldValue . " " . $crudFieldValue2;
           $field2 = $crudFieldValue . " " . $crudend;
           $status = $schedule->status;
           // $start = $schedule->start;
           if (! $crudFieldValue) {
               continue;
           }
           $eventLabel     = $schedule->activity; 
           $prefix         = "Has a";


           $suffix         = ''; 
           $dataFieldValue = trim($test . " " . $test2 . " " . $prefix . " " . $eventLabel . " " . $suffix ); 
           if($status == 'Attended')
           {
               $events[]       = [ 
                    'title' => $dataFieldValue, 
                    'start' => $field instanceof Carbon ? $field->format(config('app.date_format'). " H:i:s")  : $field, 
                    'end' => $field2 instanceof Carbon ? $field2->format(config('app.date_format'). " H:i:s")  : $field2,
                    'url'   => route('admin.schedules.edit', $schedule->id),
                    'color' => 'green'
               ]; 
            }elseif ($status == 'Unattended') {
                         $events[]       = [ 
                    'title' => $dataFieldValue, 
                    'start' => $field instanceof Carbon ? $field->format(config('app.date_format'). " H:i:s")  : $field, 
                    'end' => $field2 instanceof Carbon ? $field2->format(config('app.date_format'). " H:i:s")  : $field2,
                    'url'   => route('admin.schedules.edit', $schedule->id),
                    'color' => 'red'
               ]; 

            }else
            {
                    $events[]       = [ 
                    'title' => $dataFieldValue, 
                    'start' => $field instanceof Carbon ? $field->format(config('app.date_format'). " H:i:s")  : $field, 
                    'end' => $field2 instanceof Carbon ? $field2->format(config('app.date_format'). " H:i:s")  : $field2,
                    'url'   => route('admin.schedules.edit', $schedule->id),
                    'color' => 'blue'
               ];  
            }
           
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
