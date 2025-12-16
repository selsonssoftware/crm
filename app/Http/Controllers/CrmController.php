<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
use App\Models\address;

class CrmController extends Controller
{
    public function index()
    {
        // get all data from DB
        $data = Contact::latest()->get();

        // send to view
        return view('crm.contact', compact('data'));
    }

    public function store(Request $request)
    {

        // validate (optional but recommended)
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // image upload
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }

        // save to DB
        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'company_name' => $request->company_name,
            'dob' => date('Y-m-d', strtotime($request->dob)),
            'source' => $request->source,
            'image' => $imageName, // save file name
        ]);

        return redirect()->back()->with('success', 'contact details added successfully!');

    }

    public function update(Request $request, $contact_id)
    {
        $contact = Contact::where('contact_id', $contact_id)->first();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $contact->image = $imageName;
        }

        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->position = $request->position;
        $contact->company_name = $request->company_name;
        $contact->dob = date('Y-m-d', strtotime($request->dob));
        $contact->source = $request->source;

        $contact->save();

        return redirect()->back()->with('success', 'Contact details updated successfully!');
    }

    public function destroy($contact_id)
    {
        $contact = Contact::where('contact_id', $contact_id)->first();

        if (!$contact) {
            return redirect()->back()->with('error', 'Contact not found');
        }

        // Delete child interactions first
        // \DB::table('interactions')->where('contact_id', $contact_id)->delete();

        // Delete image
        if ($contact->image && file_exists(public_path('uploads/' . $contact->image))) {
            unlink(public_path('uploads/' . $contact->image));
        }

        $contact->delete();

        return redirect('/contact')->with('delete', 'Contact details deleted successfully!');
    }



    // -----------------------//
    // COMPANY CONTROLLER //
    // -----------------------//

    public function companies(Request $request)
    {
     
       
       $data = Company::join('address', 'companies.address', '=', 'address.id')->
        select(
            'companies.*',
            'address.address',
            'address.country',
            'address.state',
            'address.city',
            'address.zipcode',
        )->latest()->get();


        // $address = Company::join('address', 'companies.address', '=', 'address.id')->
        //     select(
        //         'companies.*',
        //         'address.*'
        //     )->where('companies.address', $request->id)
        //     ->get();
        return view('crm.company', compact('data', ));
    }


    public function company(Request $request)
    {

        // validate (optional but recommended)
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // image upload
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }
        $address = address::create([
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
        ]);

        // save to DB
        Company::create([
            'name' => $request->name,
            'address' => $address->id,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'industry' => $request->industry,
            // 'dob' => date('Y-m-d', strtotime($request->dob)),
            'owner' => $request->owner,
            'about' => $request->about,
            'image' => $imageName, // save file name
        ]);




        return redirect()->back()->with('success', 'Company details added successfully!');

    }

    // -------------------------------
    // UPDATE COMPANY
    // -------------------------------
    public function updated(Request $request, $company_id)
    {
        $company = Company::where('company_id', $company_id)->first();
        $address = address::find($company->address);

        if(!$address){
            $address = new address();
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $company->image = $imageName;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->website = $request->website;
        $company->industry = $request->industry;
        $company->owner = $request->owner;
        $company->about = $request->about;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zipcode = $request->zipcode;  
        $address->address = $request->address;


       $address->save();

       $company->address = $address->id;

        $company->save();

        return redirect()->back()->with('success', 'Company details updated successfully!');
    }

    // -------------------------------
    // DELETE COMPANY
    // -------------------------------
    public function delete($company_id)
    {
       $company = Company::where('company_id', $company_id)->first();


        if (!$company) {
            return redirect()->back()->with('error', 'company not found');
        }

        // Delete child interactions first
        \DB::table('companies')->where('company_id', $company_id)->delete();

        // Delete image
        if ($company->image && file_exists(public_path('uploads/' . $company->image))) {
            unlink(public_path('uploads/' . $company->image));
        }

        $company->delete();

        return redirect('/company')->with('delete', 'Company details deleted successfully!');
    }


    public function companyindex(Request $request)
{
    $query = Company::query();

    switch ($request->sort) {
        case 'asc':
            $query->orderBy('name', 'asc');
            break;

        case 'desc':
            $query->orderBy('name', 'desc');
            break;

        case 'recent':
            $query->orderBy('created_at', 'desc');
            break;

        case 'last_month':
            $query->where('created_at', '>=', now()->subMonth());
            break;

        case 'last_7_days':
            $query->where('created_at', '>=', now()->subDays(7));
            break;
    }

    $companies = $query->paginate(10);

    return view('companies.index', compact('companies'));
}


}
