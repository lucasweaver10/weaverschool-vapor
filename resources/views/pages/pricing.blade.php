<x-layouts.app>
  <x-slot name="title">
    English Course Pricing | The Weaver School
  </x-slot>
  <x-slot name="description">
    Learn about the pricing of our English courses in the center of Rotterdam. Group and private English lessons, you'll love our comfortable classrooms and amazing teachers.
  </x-slot>

<div class="container">
  <div class="row">
    <div class="col-12 my-3 mx-auto">
      <h1 class="text-center my-2">@lang('pages/pricing/pricing.heading')</h1>
      <ul class="nav nav-pills nav-fills justify-content-center mx-auto my-3" id="myTab" role="tablist">
        {{-- <li class="nav-item">
          <a class="nav-link pill active" id="group-tab" data-toggle="tab" href="#group" role="tab" aria-controls="group" aria-selected="true">@lang('pages/pricing/pricing.in_person_tab')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link pill" id="online-tab" data-toggle="tab" href="#online" role="tab" aria-controls="group" aria-selected="true">@lang('pages/pricing/pricing.online_tab')</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link pill active" id="private-tab" data-toggle="tab" href="#private" role="tab" aria-controls="private" aria-selected="false">@lang('pages/pricing/pricing.private_tab')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link pill" id="ielts-tab" data-toggle="tab" href="#ielts" role="tab" aria-controls="ielts" aria-selected="false">@lang('pages/pricing/pricing.ielts_tab')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link pill" id="corporate-tab" data-toggle="tab" href="#corporate" role="tab" aria-controls="corporate" aria-selected="false">@lang('pages/pricing/pricing.corporate_tab')</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        {{-- <div class="tab-pane show active fade" id="group" role="tabpanel" aria-labelledby="group-tab">
          <div class="row">
            <div class="col-12">
                    <h2 class="mx-auto my-3 text-center">@lang('pages/pricing/in_person_tab.heading')</h2>
            </div>
            <div class="col-12">
              <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/in_person_tab.4_week_title')</h4>
                  </div>
                  <div class="card-body">
                    <p>@lang('pages/pricing/in_person_tab.4_week_subtitle')</p>
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/in_person_tab.4_week_price')</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Bootstrap">@lang('pages/pricing/in_person_tab.4_week_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Bootstrap">@lang('pages/pricing/in_person_tab.4_week_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/in_person_tab.4_week_feature_3')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/in_person_tab.4_week_feature_4')</li>
                      <li><img src="/images/icons/x-circle.svg" class="mx-1" alt="" width="24" height="24" title="X Circle">@lang('pages/pricing/in_person_tab.4_week_feature_5')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/in_person_tab.4_week_button')</a>
                  </div>
                </div>
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/in_person_tab.12_week_title')</h4>
                  </div>
                  <div class="card-body">
                    <p>
                      @lang('pages/pricing/in_person_tab.12_week_subtitle')</p>
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/in_person_tab.12_week_price')<small class="text-muted">@lang('pages/pricing/in_person_tab.12_week_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/in_person_tab.12_week_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Bootstrap">@lang('pages/pricing/in_person_tab.12_week_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/in_person_tab.12_week_feature_3')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/in_person_tab.12_week_feature_4')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/in_person_tab.12_week_feature_5')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/in_person_tab.12_week_button')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="tab-pane fade" id="online" role="tabpanel" aria-labelledby="online-tab">
          <div class="row">
            <div class="col-12">
              <h2 class="mx-auto my-3 text-center">@lang('pages/pricing/online_tab.heading')</h2>
            </div>
            <div class="col-12">
              <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/online_tab.standard_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/online_tab.standard_price')<small class="text-muted">@lang('pages/pricing/online_tab.standard_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/online_tab.standard_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/online_tab.standard_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/online_tab.standard_feature_3')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/online_tab.standard_button')</a>
                  </div>
                </div>
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/online_tab.intensive_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/online_tab.intensive_price')<small class="text-muted">@lang('pages/pricing/online_tab.intensive_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/online_tab.intensive_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/online_tab.intensive_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/online_tab.intensive_feature_3')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/online_tab.intensive_button')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="tab-pane show active fade" id="private" role="tabpanel" aria-labelledby="private-tab">
          <div class="row">
            <div class="col-12">
              <h2 class="mx-auto my-3 text-center">@lang('pages/pricing/private_tab.heading')</h2>
            </div>
            <div class="col">
              <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/private_tab.standard_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/private_tab.standard_price')<small class="text-muted">@lang('pages/pricing/private_tab.standard_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/private_tab.standard_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/private_tab.standard_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/private_tab.standard_feature_3')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/private_tab.standard_button')</a>
                  </div>
                </div>
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/private_tab.corporate_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/private_tab.corporate_price')<small class="text-muted">@lang('pages/pricing/private_tab.corporate_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/private_tab.corporate_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/private_tab.corporate_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/private_tab.corporate_feature_3')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/private_tab.corporate_button')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ielts" role="tabpanel" aria-labelledby="ielts-tab">
          <div class="row">
            <div class="col-12">
                    <h2 class="mx-auto my-3 text-center">@lang('pages/pricing/ielts_tab.heading')</h2>
            </div>
            <div class="col">
              <div class="card-deck mb-3 text-center">
                {{-- <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/ielts_tab.group_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/ielts_tab.group_price')</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/ielts_tab.group_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/ielts_tab.group_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/ielts_tab.group_feature_3')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/ielts_tab.group_feature_4')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/ielts_tab.group_button')</a>
                  </div>
                </div> --}}
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/ielts_tab.private_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/ielts_tab.private_price')<small class="text-muted">@lang('pages/pricing/ielts_tab.private_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/ielts_tab.private_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/ielts_tab.private_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/ielts_tab.private_feature_3')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/ielts_tab.private_button')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="corporate" role="tabpanel" aria-labelledby="corporate-tab">
          <div class="row">
            <div class="col-12">
                    <h2 class="mx-auto my-3 text-center">@lang('pages/pricing/corporate_tab.heading')</h2>
            </div>
            <div class="col">
              <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/corporate_tab.group_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/corporate_tab.group_price')<small class="text-muted">@lang('pages/pricing/corporate_tab.group_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.group_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.group_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.group_feature_3')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.group_feature_4')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/corporate_tab.group_button')</a>
                  </div>
                </div>
                <div class="card mb-4 shadow-sm">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">@lang('pages/pricing/corporate_tab.private_title')</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">@lang('pages/pricing/corporate_tab.private_price')<small class="text-muted">@lang('pages/pricing/corporate_tab.private_price_muted')</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.private_feature_1')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.private_feature_2')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.private_feature_3')</li>
                      <li><img src="/images/icons/check-circle.svg" class="mx-1" alt="" width="24" height="24" title="Check">@lang('pages/pricing/corporate_tab.private_feature_4')</li>
                    </ul>
                    <a href="/contact" class="btn btn-lg btn-primary">@lang('pages/pricing/corporate_tab.private_button')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</x-layouts.app>
