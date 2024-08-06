<?php

namespace App\Livewire\Dashboard\Company;

use App\Models\Company;
use App\Models\CompanyEmployeeInvitation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $companyName;
    public $inviteeEmail;
    public $invites;

    protected $listeners = [
        'refreshCompanyTab' => '$refresh',
    ];

    public function saveCompany()
    {
        $data = [
            'name' => $this->companyName,
        ];

        $company = Company::create($data);

        $this->user->update([
            'company_id' => $company->id,
        ]);

        $this->user->roles()->attach(121);

        session()->flash('success', 'Company info saved');

        return redirect()->to('/dashboard?tab=company');

    }

    public function sendInvite()
    {
        do {
                $token = Str::random(16);
            }
        while (CompanyEmployeeInvitation::where('token', $token)->first());

        $data = [
            'token' => $token,
            'company_id' => $this->user->company_id,
            'email' => $this->inviteeEmail,
            'inviter_user_id' => $this->user->id,
            'status' => 'Open',
            'expires_at' => Carbon::now()->addDay(30),
        ];

        $invitation = CompanyEmployeeInvitation::create($data);

        session()->flash('success', 'Your invite has been sent');

        Mail::to($this->inviteeEmail)->send(new \App\Mail\CompanyEmployeeInvitation($this->user, $invitation));

        return redirect()->to('/dashboard?tab=company');

    }

    public function mount()
    {
        $this->invites = CompanyEmployeeInvitation::where('inviter_user_id', $this->user->id)->where('status', 'open')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.company.index', ['invites' => $this->invites]);
    }
}
