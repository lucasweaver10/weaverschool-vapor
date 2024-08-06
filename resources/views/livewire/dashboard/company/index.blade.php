<div x-data="{ tab: @entangle('tab').live, content: @entangle('content').live, }">


    @if(!$user->company_id)
        <div class="md:w-1/2 rounded-xl bg-white p-4 shadow-sm mb-5">
            <p class="text-2xl">Are you a manager for a Company account?</p>
            <p class="mb-4">Enter your company info below to
            access company features such as: inviting colleagues, managing company billing, and
            tracking your colleagues' course progress.</p>
            <h4>Company Name</h4>
            <x-input wire:model="companyName" type="text" /> <button wire:click="saveCompany" class="btn btn-primary btn-lg ml-2">Save</button>
        </div>
    @else

        <div class="md:w-1/2 rounded-xl bg-white p-4 shadow-sm mb-5">
            <h4>Company Name</h4>
            <p>{{$user->company->name }}</p>
            <h4>Primary Contact</h4>
            <p>{{ $user->email }}</p>
        </div>

        <div class="md:w-1/2 rounded-xl bg-white p-4 shadow-sm mb-5">
            <h4>Invite an Employee</h4>
            <p>Invite one of your colleagues to join your {{ $user->company->name }} Weaver School account.</p>
            <x-input wire:model="inviteeEmail" type="email" placeholder="Email address" /> <button wire:click="sendInvite" class="btn btn-primary btn-lg ml-2">Send Invite</button>
        </div>

        @if($invites)
            <div class="md:w-1/2 rounded-xl bg-white p-4 shadow-sm mb-5">
                <h4>Employee Invites</h4>
                @foreach($invites as $invite)
                    <p>Email: {{ $invite->email }} Status: {{ $invite->status }}</p>
                @endforeach
            </div>
        @endif


    @endif

    <x-alerts.success>
    </x-alerts.success>
</div>
