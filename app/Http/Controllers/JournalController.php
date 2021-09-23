<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Carbon\Carbon;
use Fernet\Fernet;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    //DASHBOARD PAGE RESPONSE
    public function show(){
        return view('journal.show_all');
    }
    public function show_entry($slug){
       $journal=Journal::where('slug',$slug)->first();
       $fernet = new Fernet(env('ENCRYPTION_KEY'));
        $body=$fernet->decode($journal->body);
        $journal->body=$body;
        return view('journal.show_entry',[
        'entry'=>$journal
        ]);
    }
       public function show_update($slug){
           $journal=Journal::where('slug',$slug)->first();
           $fernet = new Fernet(env('ENCRYPTION_KEY'));
            $body=$fernet->decode($journal->body);
            $journal->body=$body;
            return view('journal.create',[
            'entry'=>$journal
            ]);
        }


     public function show_create(){
            return view('journal.create');
        }
    //API CALL RESPONSE
    public function show_entries(){
        return Journal::orderBy('created_date', 'DESC')->get();
    }

    public function create(Request $request){
        $entry=$this->setUpEntryData($request,new Journal());
        $entry->save();
        return back();
    }
    public function update(Request $request){
        $updateEntry=Journal::where('slug',$request->slug)->first();
        $entry=$this->setUpEntryData($request,$updateEntry);
        $entry->updated_date=Carbon::now()->format('Y-m-d');
        $entry->save();
        return redirect('/journal-entry/'. $entry->slug);
    }
    public function destroy($slug){
        $queryResult=Journal::where('slug',$slug)->get();
        $deleteEntry=$queryResult->first();
        $deleteEntry->delete();
        return redirect()->route('my-journal');
    }
    protected function setUpEntryData($postedData,$entryObject){
        $entryObject->title=$postedData->title;
        $entryObject->slug=$this->createSlug($postedData->title);
        $entryObject->created_date=$postedData->date;
        $entryObject->snippet=$this->createSnippet($postedData->body);
        $fernet = new Fernet(env('ENCRYPTION_KEY'));
        $entryObject->body=$fernet->encode($postedData->body);
        return $entryObject;
    }
    protected function createSlug($title){
        $slug=strtolower($title);
        $slug=str_replace(' ','-',$slug);
        $slug=preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        return $slug . '-' . rand(1,99999);
    }
    protected function createSnippet($body){
       $snippet= strip_tags($body);
       return substr($snippet,0,100);
    }
}
