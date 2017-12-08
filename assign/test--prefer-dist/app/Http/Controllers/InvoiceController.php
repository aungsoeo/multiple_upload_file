<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Invoice;
use App\Invoicedetail;

class InvoiceController extends Controller
{

    public function index()
    {
        return view('add_invoice');
    }

    public function showinvoice()   
    { 
     
      return view('showinvoice');
    }

    public function showinv()
    {
        $invoice=array();
        $invoice=Invoicedetail::paginate(4);
      return view('b')->with('inv_output',$invoice);
    }

    public function showdetail($id)
    {
        $detail=Invoice::where('invoiceid','=',$id)->get();
        return view('showdetail')->with('inv_detail',$detail);
    }
    public function save(Request $request)
    {
    	$jinput=$request->item;
        $qinput=$request->totalinvoice;
        //return($qinput);
        $invoice=array(
            'discount'=>$qinput['inv_dis'],
            'grandtotal'=>$qinput['inv_gtotal']); 

        $invoiceid=Invoicedetail::insertGetId($invoice);   	
    	   foreach($jinput as $input){
            $data[] = array(
                    'date'=>$input['inv_date'],
                    'item_name'=> $input['inv_item'],
                    'qty'=>$input['inv_qty'],
                    'price'=>$input['inv_price'],
                    'invoiceid'=>$invoiceid,
              );
         }
         Invoice::insert($data);

        return view('add_invoice')->withSuccessMessage('Invoice have been updated!!');
    }
    public function edit($id)
    {
         $edit_inv=Invoice::where('invoiceid','=',$id)->get();
         $invoice=Invoicedetail::where('id','=',$id)->get();
         return view('edit_template')->with('edit_data',$edit_inv)
                                    ->with('invoice_data',$invoice);

    }
    public function update(Request $request)
    {   

        $invoice=$request->totalinvoice;
            $invoice_input=array(
                'discount'=>$invoice['inv_dis'],
                'grandtotal'=>$invoice['inv_gtotal']
            );
       Invoicedetail::where('id','=', $invoice['inv_id'])->update($invoice_input);

        $del_item=$request->removed_array;

        if(sizeof($request->removed_item)>0)
        {
            for( $i=0;$i<sizeof($del_item);$i++)
            {
               Invoice::where('id','=',$del_item[$i])->delete();
            }

        }
        $input=$request->item;
        $j=0;
         foreach($input as $item_input){
            if($item_input['item_id']!=null)     
            {   
                $data[] = array(
                    'date'=>$item_input['inv_date'],
                    'item_name'=> $item_input['inv_item'],
                    'qty'=>$item_input['inv_qty'],
                    'price'=>$item_input['inv_price'],
                    'invoiceid'=>$invoice['inv_id']
               );
                Invoice::where('id','=',$item_input['item_id'])->update($data[$j]);
                   $j++;              
            }
            else
            {          
                $newdata[] = array(

                    'date'=>$item_input['inv_date'],
                    'item_name'=> $item_input['inv_item'],
                    'qty'=>$item_input['inv_qty'],
                    'price'=>$item_input['inv_price'],
                    'invoiceid'=>$invoice['inv_id']
                );
               
            }

        }
        
         Invoice::insert($newdata);
               
        
    }
}