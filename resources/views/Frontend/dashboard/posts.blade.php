@extends('Frontend.layouts.dashboard')

@section('title', 'پست ها | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-posts.js'])
@endsection


@section('content')
<div class="grid w-[100%]">
            <h1 class="text-lg font-semibold">پست های بلاگ</h1>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4"
              >
                <div>
                  <button
                    id="dropdownActionButton"
                    data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button"
                  >
                    <span class="sr-only">عملیات</span>
                    عملیات
                    <svg
                      class="w-2.5 h-2.5 ms-2.5"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 10 6"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 4 4 4-4"
                      />
                    </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div
                    id="dropdownAction"
                    class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:divide-gray-600"
                  >
                    <ul
                      class="py-1 text-sm text-gray-700 dark:text-gray-200"
                      aria-labelledby="dropdownActionButton"
                    >
                      <li>
                        <a
                          href="#"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                          >ترفیغ</a
                        >
                      </li>
                      <li>
                        <a
                          href="#"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                          >حذف</a
                        >
                      </li>
                      <li>
                        <a
                          href="#"
                          class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                          >غیرفعال سازی</a
                        >
                      </li>
                    </ul>
                    <div class="py-1">
                      <a
                        href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                        >ویرایش</a
                      >
                    </div>
                  </div>
                </div>
                <label for="table-search" class="sr-only">جستجو</label>
                <div class="relative">
                  <div
                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none"
                  >
                    <svg
                      class="w-4 h-4 text-gray-500 dark:text-gray-400"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 20 20"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                      />
                    </svg>
                  </div>
                  <input
                    type="text"
                    id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="جستجو پست ها"
                  />
                </div>
              </div>
              <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded overflow-hidden"
              >
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="p-4">
                      <div class="flex items-center">
                        <input
                          id="checkbox-all-search"
                          type="checkbox"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label for="checkbox-all-search" class="sr-only"
                          >checkbox</label
                        >
                      </div>
                    </th>
                    <th scope="col" class="px-6 py-3">عنوان</th>
                    <th scope="col" class="px-6 py-3">تاریخ آخرین ویرایش</th>
                    <th scope="col" class="px-6 py-3">دسته بندی</th>
                    <th scope="col" class="px-6 py-3">توسط</th>
                    <th scope="col" class="px-6 py-3">عملیات</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                  >
                    <td class="w-4 p-4">
                      <div class="flex items-center">
                        <input
                          id="checkbox-table-search-1"
                          type="checkbox"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label for="checkbox-table-search-1" class="sr-only"
                          >checkbox</label
                        >
                      </div>
                    </td>
                    <th
                      scope="row"
                      class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      <img
                        class="h-10"
                        src="{{ asset('src/img/blogpost2.webp') }}"
                        alt="Jese image"
                      />
                      <div class="ps-3">
                        <a
                          class="text-green-500 hover:underline"
                          href="{{ route('posts.show', ['slug' => 'sample']) }}"
                        >
                          معرفی کتابخانه B-Crypt برای Express JS
                        </a>
                      </div>
                    </th>
                    <td class="px-6 py-4">23 خرداد 1404</td>
                    <td class="px-6 py-4 text-yellow-500">JavaScript</td>
                    <td class="px-6 py-4">borhawnm@gmail.com</td>
                    <td class="px-6 py-4">
                      <div
                        class="flex flex-row items-center justify-center gap-2"
                      >
                        <a
                          href="#"
                          class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 my-2"
                          >ویرایش</a
                        >
                        <a
                          href="#"
                          class="font-medium text-red-600 dark:text-red-500 hover:underline mx-2 my-2"
                          >حذف</a
                        >
                      </div>
                    </td>
                  </tr>
                                    <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                  >
                    <td class="w-4 p-4">
                      <div class="flex items-center">
                        <input
                          id="checkbox-table-search-1"
                          type="checkbox"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label for="checkbox-table-search-1" class="sr-only"
                          >checkbox</label
                        >
                      </div>
                    </td>
                    <th
                      scope="row"
                      class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      <img
                        class="h-10"
                        src="{{ asset('src/img/blogpost1.webp') }}"
                        alt="Jese image"
                      />
                      <div class="ps-3">
                        <a
                          class="text-green-500 hover:underline"
                          href="{{ route('posts.show', ['slug' => 'sample']) }}"
                        >
 مزیت های فریمورک Next Js نسبت به React 
                        </a>
                      </div>
                    </th>
                    <td class="px-6 py-4">12 فروردین 1404</td>
                    <td class="px-6 py-4 text-red-500">Next Js</td>
                    <td class="px-6 py-4">borhawnm@gmail.com</td>
                    <td class="px-6 py-4">
                      <div
                        class="flex flex-row items-center justify-center gap-2"
                      >
                        <a
                          href="#"
                          class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 my-2"
                          >ویرایش</a
                        >
                        <a
                          href="#"
                          class="font-medium text-red-600 dark:text-red-500 hover:underline mx-2 my-2"
                          >حذف</a
                        >
                      </div>
                    </td>
                  </tr>
                                    <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                  >
                    <td class="w-4 p-4">
                      <div class="flex items-center">
                        <input
                          id="checkbox-table-search-1"
                          type="checkbox"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label for="checkbox-table-search-1" class="sr-only"
                          >checkbox</label
                        >
                      </div>
                    </td>
                    <th
                      scope="row"
                      class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      <img
                        class="h-10"
                        src="{{ asset('src/img/blogpost7.webp') }}"
                        alt="Jese image"
                      />
                      <div class="ps-3">
                        <a
                          class="text-green-500 hover:underline"
                          href="{{ route('posts.show', ['slug' => 'sample']) }}"
                        >
 آموزش ریدایرکت کردن به صفحه ورود در Next Js 
                        </a>
                      </div>
                    </th>
                    <td class="px-6 py-4">8 اسفند 1403</td>
                    <td class="px-6 py-4 text-red-500">Next Js</td>
                    <td class="px-6 py-4">borhawnm@gmail.com</td>
                    <td class="px-6 py-4">
                      <div
                        class="flex flex-row items-center justify-center gap-2"
                      >
                        <a
                          href="#"
                          class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 my-2"
                          >ویرایش</a
                        >
                        <a
                          href="#"
                          class="font-medium text-red-600 dark:text-red-500 hover:underline mx-2 my-2"
                          >حذف</a
                        >
                      </div>
                    </td>
                  </tr>
                                    <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                  >
                    <td class="w-4 p-4">
                      <div class="flex items-center">
                        <input
                          id="checkbox-table-search-1"
                          type="checkbox"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label for="checkbox-table-search-1" class="sr-only"
                          >checkbox</label
                        >
                      </div>
                    </td>
                    <th
                      scope="row"
                      class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      <img
                        class="h-10"
                        src="{{ asset('src/img/blogpost6.webp') }}"
                        alt="Jese image"
                      />
                      <div class="ps-3">
                        <a
                          class="text-green-500 hover:underline"
                          href="{{ route('posts.show', ['slug' => 'sample']) }}"
                        >
 آموزش استفاده از API Routes در Next.js                         </a>
                      </div>
                    </th>
                    <td class="px-6 py-4">15 اردیبهشت 1404</td>
                    <td class="px-6 py-4 text-cyan-500">React</td>
                    <td class="px-6 py-4">borhawnm@gmail.com</td>
                    <td class="px-6 py-4">
                      <div
                        class="flex flex-row items-center justify-center gap-2"
                      >
                        <a
                          href="#"
                          class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 my-2"
                          >ویرایش</a
                        >
                        <a
                          href="#"
                          class="font-medium text-red-600 dark:text-red-500 hover:underline mx-2 my-2"
                          >حذف</a
                        >
                      </div>
                    </td>
                  </tr>
                                    <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                  >
                    <td class="w-4 p-4">
                      <div class="flex items-center">
                        <input
                          id="checkbox-table-search-1"
                          type="checkbox"
                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                        <label for="checkbox-table-search-1" class="sr-only"
                          >checkbox</label
                        >
                      </div>
                    </td>
                    <th
                      scope="row"
                      class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      <img
                        class="h-10"
                        src="{{ asset('src/img/blogpost9.webp') }}"
                        alt="Jese image"
                      />
                      <div class="ps-3">
                        <a
                          class="text-green-500 hover:underline"
                          href="{{ route('posts.show', ['slug' => 'sample']) }}"
                        >
 چرا باید جاوااسکریپت ES6 به بعد را یاد بگیریم؟ 
                        </a>
                      </div>
                    </th>
                    <td class="px-6 py-4">19 مهر 1403</td>
                    <td class="px-6 py-4 text-blue-500">Linux</td>
                    <td class="px-6 py-4">borhawnm@gmail.com</td>
                    <td class="px-6 py-4">
                      <div
                        class="flex flex-row items-center justify-center gap-2"
                      >
                        <a
                          href="#"
                          class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 my-2"
                          >ویرایش</a
                        >
                        <a
                          href="#"
                          class="font-medium text-red-600 dark:text-red-500 hover:underline mx-2 my-2"
                          >حذف</a
                        >
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <nav class="pagination-container rounded-full px-4 py-3">
              <ul class="flex gap-2 font-medium py-2">
                <li>
                  <a
                    href="#"
                    class="selected-page bg-gray-900 rounded-full px-4 py-2"
                    >1</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >2</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >3</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >4</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="page rounded-full px-4 py-2 transition duration-300 ease-in-out"
                    >5</a
                  >
                </li>
              </ul>
            </nav>
          </div>
@endsection
