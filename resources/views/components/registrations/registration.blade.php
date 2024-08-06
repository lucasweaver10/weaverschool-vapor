<div class="tab-pane fade justify-content-center" id="registration" role="tabpanel" aria-labelledby="registration-tab">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card mb-5" style="max-width: 100%;">
                <div class="card-header">
                    <h4 class="card-title mb-0 text-center">Course Registration</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8 text-center">
                    <livewire:registrations.registration-tab :courses="$courses" :privateLessons="$privateLessons" :teachers="$teachers"/>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>