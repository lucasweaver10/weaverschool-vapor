<!-- Footer -->
<div class="px-5 sm:mpx-0 section bg-gray-100 dark:bg-gray-900 dark:text-gray-100 footer py-5">
    <div class="grid grid-cols-6 pt-5">
        <div class="sm:col-span-1">
        </div>
        <div class="mb-3 sm:mb-0 col-span-6 sm:col-span-1 dark:text-gray-100">
          <h6>@lang('components/footer.contact')</h6>
            <p>The Weaver School</p>
            <p><a class="dark:text-gray-100" href="mailto:lucas@weaverschool.com">Email me</a></p>
        </div>

        <div class="mb-3 sm:mb-0 col-span-6 sm:col-span-1">
          <h6>@lang('components/footer.about')</h6>
            <ul class="list-unstyled justify-content-center">
              <li>
                <a href="/{{ session('locale') ?? 'en' }}/privacy-policy">@lang('components/footer.privacy')</a>
              </li>
              <li>
                <a href="/{{ session('locale') ?? 'en' }}/general-terms">@lang('components/footer.general_terms')</a>
              </li>
              <li>
                <a href="/{{ session('locale') ?? 'en' }}/impressum">Impressum</a>
              </li>
            </ul>
        </div>

                <div class="mb-3 sm:mb-0 col-span-6 sm:col-span-1">
                  <h6>@lang('components/footer.learn')</h6>
                    <ul class="list-unstyled justify-content-center">
                        <li>
                            <a href="{{ route('learn-korean', ['locale' => session('locale', 'en')]) }}">Learn Korean</a>
                        </li>
                        <li>
                            <a href="{{ route('learn-thai', ['locale' => session('locale', 'en')]) }}">Learn Thai</a>
                        </li>
                        <li>
                            <a href="{{ route('learn-vietnamese', ['locale' => session('locale', 'en')]) }}">Learn Vietnamese</a>
                        </li>
                      </ul>
                </div>

        <div class="mb-3 sm:mb-0 col-span-6 sm:col-span-1">
            <span class="list-unstyled justify-content-center inline-flex ml-24">          
                  <a href="https://www.instagram.com/theweaverschool"><svg class="inline-flex mx-1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M14.829 6.302c-.738-.034-.96-.04-2.829-.04s-2.09.007-2.828.04c-1.899.087-2.783.986-2.87 2.87-.033.738-.041.959-.041 2.828s.008 2.09.041 2.829c.087 1.879.967 2.783 2.87 2.87.737.033.959.041 2.828.041 1.87 0 2.091-.007 2.829-.041 1.899-.086 2.782-.988 2.87-2.87.033-.738.04-.96.04-2.829s-.007-2.09-.04-2.828c-.088-1.883-.973-2.783-2.87-2.87zm-2.829 9.293c-1.985 0-3.595-1.609-3.595-3.595 0-1.985 1.61-3.594 3.595-3.594s3.595 1.609 3.595 3.594c0 1.985-1.61 3.595-3.595 3.595zm3.737-6.491c-.464 0-.84-.376-.84-.84 0-.464.376-.84.84-.84.464 0 .84.376.84.84 0 .463-.376.84-.84.84zm-1.404 2.896c0 1.289-1.045 2.333-2.333 2.333s-2.333-1.044-2.333-2.333c0-1.289 1.045-2.333 2.333-2.333s2.333 1.044 2.333 2.333zm-2.333-12c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.958 14.886c-.115 2.545-1.532 3.955-4.071 4.072-.747.034-.986.042-2.887.042s-2.139-.008-2.886-.042c-2.544-.117-3.955-1.529-4.072-4.072-.034-.746-.042-.985-.042-2.886 0-1.901.008-2.139.042-2.886.117-2.544 1.529-3.955 4.072-4.071.747-.035.985-.043 2.886-.043s2.14.008 2.887.043c2.545.117 3.957 1.532 4.071 4.071.034.747.042.985.042 2.886 0 1.901-.008 2.14-.042 2.886z"/></svg></a>
                  <a href="https://www.twitter.com/TheWeaverSchool"><svg class="inline-flex mx-1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"/></svg></a>
{{--                      <a href="https://www.youtube.com/channel/UCjC3WdDLF2cEHsLt6GaTF5w"><svg class="inline-flex mx-1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M10.918 13.933h.706v3.795h-.706v-.419c-.13.154-.266.272-.405.353-.381.218-.902.213-.902-.557v-3.172h.705v2.909c0 .153.037.256.188.256.138 0 .329-.176.415-.284v-2.881zm.642-4.181c.2 0 .311-.16.311-.377v-1.854c0-.223-.098-.38-.324-.38-.208 0-.309.161-.309.38v1.854c-.001.21.117.377.322.377zm-1.941 2.831h-2.439v.747h.823v4.398h.795v-4.398h.821v-.747zm4.721 2.253v2.105c0 .47-.176.834-.645.834-.259 0-.474-.094-.671-.34v.292h-.712v-5.145h.712v1.656c.16-.194.375-.354.628-.354.517.001.688.437.688.952zm-.727.043c0-.128-.024-.225-.075-.292-.086-.113-.244-.125-.367-.062l-.146.116v2.365l.167.134c.115.058.283.062.361-.039.04-.054.061-.141.061-.262v-1.96zm10.387-2.879c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-10.746-2.251c0 .394.12.712.519.712.224 0 .534-.117.855-.498v.44h.741v-3.986h-.741v3.025c-.09.113-.291.299-.436.299-.159 0-.197-.108-.197-.269v-3.055h-.741v3.332zm-2.779-2.294v1.954c0 .703.367 1.068 1.085 1.068.597 0 1.065-.399 1.065-1.068v-1.954c0-.624-.465-1.071-1.065-1.071-.652 0-1.085.432-1.085 1.071zm-2.761-2.455l.993 3.211v2.191h.835v-2.191l.971-3.211h-.848l-.535 2.16-.575-2.16h-.841zm10.119 10.208c-.013-2.605-.204-3.602-1.848-3.714-1.518-.104-6.455-.103-7.971 0-1.642.112-1.835 1.104-1.848 3.714.013 2.606.204 3.602 1.848 3.715 1.516.103 6.453.103 7.971 0 1.643-.113 1.835-1.104 1.848-3.715zm-.885-.255v.966h-1.35v.716c0 .285.024.531.308.531.298 0 .315-.2.315-.531v-.264h.727v.285c0 .731-.313 1.174-1.057 1.174-.676 0-1.019-.491-1.019-1.174v-1.704c0-.659.435-1.116 1.071-1.116.678.001 1.005.431 1.005 1.117zm-.726-.007c0-.256-.054-.445-.309-.445-.261 0-.314.184-.314.445v.385h.623v-.385z"/></svg></a>--}}              
            </span>
        </div>

        <div class="col-span-1"></div>
        </div>

      <div class="justify-content-center py-5 mt-3">
        <div class="col-12 justify-content-center text-center">
            <p>©{{ date('Y') }} The Weaver School, @lang('components/footer.all_rights_reserved') | <a class="ratings" href="https://www.google.com/search?source=hp&ei=V79OXeKeKMuYkwWsxYGwCQ&q=weaver+english&oq=weaver+english&gs_l=psy-ab.3...2427.3655..3870...0.0..0.1462.1462.7-1......0....1..gws-wiz.cKy0MGHR0Vg&ved=0ahUKEwiipp25rfjjAhVLzKQKHaxiAJYQ4dUDCAU&uact=5#lrd=0x47c434b318fa5bd5:0x50418520688d5fdb,1,,,">@lang('components/footer.reviews')</a></p>
        </div>
      </div>
</div>
  <!-- End Footer -->
