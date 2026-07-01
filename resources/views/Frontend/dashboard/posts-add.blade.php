@extends('Frontend.layouts.dashboard')

@section('title', 'پست جدید | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-add-post.js'])
@endsection


@section('content')
<div class="grid w-[100%]">
    @include('Frontend.partials.spacing')
    <div class="grid w-full bg-[#202D38] p-5 rounded-lg">
        <h1 class="text-lg font-semibold mb-4 text-white">نوشته جدید / ویرایش نوشته</h1>
            <form class="mx-auto w-full">
              <div class="mb-5">
                <label
                  for="title"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >عنوان نوشته</label
                >
                <input
                  type="text"
                  id="title"
                  placeholder="عنوان نوشته جدید"
                  class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                  required
                />
              </div>

              <div class="mb-5 post-content">
                <label
                  for="editor"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >محتوای نوشته</label
                >
                <div class="adjoined-bottom">
                  <div class="grid-container">
                    <div class="grid-width-100">
                      <textarea
                        name="content"
                        id="editor"
                        rows="10"
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="محتوای نوشته را اینجا بنویسید..."
                      >{{ old('content') }}</textarea>
                    </div>
                  </div>
                </div>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="flex flex-col mb-5 lg:flex-row gap-4 justify-stretch items-top">

                <div class="1 flex-1">              <div class="mb-5">
                <label
                  for="message"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >خلاصه مطالب</label
                >
                <textarea
                  id="message"
                  rows="12"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="خلاصه این نوشته"
                ></textarea>
              </div></div>
                <div class="2 flex-1">
                  <div
                class="flex flex-row items-center justify-between gap-8 mb-2"
              >
                <label
                  for="profile-pic"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >تصویر شاخص</label
                >
              </div>
              <div class="flex items-center justify-center w-full mb-5">
                <label
                  for="dropzone-file"
                  class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                >
                  <div
                    class="flex flex-col items-center justify-center pt-5 pb-6"
                  >
                    <svg
                      class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 20 16"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                      />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400" data-dropzone-message>
                      <span class="font-semibold">برای بارگذاری کلیک کنید</span>
                      و یا عکس مورد نظر را به اینجا بکشید
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                      SVG, PNG, JPG یا GIF (حداکثر حجم 2 مگابایت)
                    </p>
                  </div>
                  <input id="dropzone-file" type="file" class="hidden" />
                </label>
              </div>
                            <div class="image flex flex-row justify-end">
                  <img
                    src="{{ asset('src/img/blogpost2.webp') }}"
                    alt="profile picture"
                    class="h-20 object-cover object-center"
                  />
                  <i class="close-icon fa-solid fa-xmark fa-lg"></i>
                </div></div>
              </div>





              <div class="flex flex-col md:flex-row gap-4 justify-stretch items-top">
                <div class="mb-5 flex-1">
                  <label
                    for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >دسته بندی مورد نظر را انتخاب کنید</label
                  >
                  <select
                    id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  >
                    <option selected>دسته بندی مطالب</option>
                    <option value="JS">JavaScript</option>
                    <option value="LNX">Linux</option>
                    <option value="NEXT">Next Js</option>
                    <option value="REACT">React</option>
                    <option value="EXP">Express Js</option>
                  </select>
                </div>
                <div class="mb-5 flex-2">
                  <label
                    for="keywords"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >کلمات کلیدی</label
                  >
                  <textarea
                    id="keywords"
                    rows="1"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="کلمات کلیدی را با ویرگول ، از هم جدا کنید."
                  ></textarea>
                  <span class="mt-2 text-gray-400 text-xs">توصیه میشود حداقل 5 کلمه کلیدی وارد کنید.</span>
                </div>
              </div>

              <button
                type="cancel"
                class="cursor-pointer text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-blue-800"
              >
                لغو
              </button>
              <button
                type="submit"
                class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                انتشار
              </button>
            </form>
          </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        window.CKEDITOR_BASEPATH = @json(rtrim(asset('src/libraries/ckeditor'), '/') . '/');
    </script>
    <script src="{{ asset('src/libraries/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor', {
            height: 300,
            language: 'fa',
            contentsLangDirection: 'rtl',
        });
    </script>
@endpush
