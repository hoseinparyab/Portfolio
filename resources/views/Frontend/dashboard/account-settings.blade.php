@extends('Frontend.layouts.dashboard')

@section('title', 'ویرایش حساب | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-account-settings.js'])
@endsection


@section('content')
<div class="grid w-[100%]">
            <h1 class="text-lg font-semibold">ویرایش اطلاعات حساب کاربری</h1>

            <form class="mx-auto w-full">
              <div
                class="flex flex-row items-center justify-between gap-8 mb-5"
              >
                <label
                  for="profile-pic"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >تصویر حساب کاربری</label
                >
                <img
                  src="{{ asset('src/img/Profile Picture.jpg') }}"
                  alt="profile picture"
                  class="w-20 h-20 rounded-full object-cover object-center"
                />
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
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
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

              <div class="mb-5">
                <label
                  for="email-address-icon"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >ایمیل</label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                  >
                    <svg
                      class="w-4 h-4 text-gray-500 dark:text-gray-400"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor"
                      viewBox="0 0 20 16"
                    >
                      <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"
                      />
                      <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"
                      />
                    </svg>
                  </div>
                  <input
                    type="text"
                    id="email-address-icon"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com"
                  />
                </div>
              </div>
              <div class="mb-5">
                <label
                  for="email-address-icon"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >نام کاربری</label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                  >
                    <svg
                      class="w-4 h-4 text-gray-500 dark:text-gray-400"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"
                      />
                    </svg>
                  </div>
                  <input
                    type="text"
                    id="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="نام کاربری"
                  />
                </div>
              </div>
              <div class="mb-5">
                <label
                  for="message"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >بیوگرافی</label
                >
                <textarea
                  id="message"
                  rows="4"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="بیوگرافی کوتاه شما جهت نمایش در پروفایل"
                ></textarea>
              </div>
              <div class="mb-5">
                <label
                  for="password"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >کلمه عبور</label
                >
                <input
                  type="password"
                  id="password"
                  value="testpassword"
                  class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                  required
                />
              </div>
              <div class="mb-5">
                <label
                  for="repeat-password"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >تکرار کلمه عبور</label
                >
                <input
                  type="password"
                  id="repeat-password"
                  value="testpassword"
                  class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                  required
                />
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
                ویرایش
              </button>
            </form>
          </div>
@endsection
