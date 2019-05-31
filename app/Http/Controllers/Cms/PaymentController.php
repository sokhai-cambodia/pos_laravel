<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use NotificationHelper;
use App\Branch;
use App\Room;
use DB;

class PaymentController extends Controller
{
    private $icon = 'icon-home';
    
    public function index(Request $request)
    {

        $f_branch = isset($request->branch) ? $request->branch : '';
        $f_room = isset($request->room) ? $request->room : '';
        $f_from_date = isset($request->from_date) ? $request->from_date : date("Y-m-d");
        $f_to_date = isset($request->to_date) ? $request->to_date : date("Y-m-d");

        $branches = Branch::getBranchByAuth();
        $rooms = Room::all();
        $branch = Branch::find($f_branch);
        $room = Room::find($f_room);

        $invoices = $this->getInvoices($f_branch, $f_room, $f_from_date, $f_to_date);

        $data = [
            'title' => 'List Invoices',
            'icon' => $this->icon,
            'f_branch' => $f_branch,
            'f_room' => $f_room,
            'f_from_date' => $f_from_date,
            'f_to_date' => $f_to_date,
            'branches' => $branches,
            'rooms' => $rooms,
            'branch' => $branch,
            'room' => $room,
            'invoices' => $invoices
        ];
        return view('cms.payment.index')->with($data);
    }


    // Query
    private function getInvoices($branch, $room, $from_date, $to_date) {
        
        $whereData = [
            ['i.branch_id', $branch],
            ['i.room_id', $room],
            ['i.status', 'unpaid'],
            [ DB::raw("DATE_FORMAT(i.created_at, '%Y-%m-%d')"), '>=', $from_date ],
            [ DB::raw("DATE_FORMAT(i.created_at, '%Y-%m-%d')"), '<=',$to_date ]

        ];

        $data = DB::table('invoices AS i')
                ->join('branches AS b', 'b.id', '=', 'i.branch_id')
                ->join('rooms AS r', 'r.id', '=', 'i.room_id')
                ->join('users AS u', 'u.id', '=', 'i.created_by')
                ->select(
                    'i.id AS invoice_id',
                    'i.invoice_no',
                    'b.name AS branch_name',
                    'r.room_no',
                    'i.sub_total',
                    'i.discount',
                    'i.total',
                    'i.created_at AS date',
                    // DB::raw("DATE_FORMAT(i.created_at, '%Y-%m-%d') AS date"),
                    DB::raw("CONCAT(u.last_name, ' ', u.first_name) AS fullName")
                )
                ->where($whereData)
                ->orderBy('i.id')
                ->get();

        return $data;
    }
    
}
