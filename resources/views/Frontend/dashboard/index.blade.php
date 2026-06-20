@extends('Frontend.layouts.dashboard')

@section('title', 'داشبورد | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-index.js'])
@endsection

@section('content')
          <div class="grid visit-chart">
            <h2 class="text-lg font-semibold">آمار بازدید</h2>
            <div id="apexChartTrafficStats"></div>
          </div>
          <div class="grid user-chart">
            <h2 class="text-lg font-semibold">آمار کاربران</h2>
            <div id="apexDeviceCharts"></div>
            <div
              class="colors-show flex flex-row gap-6 justify-center items-center"
            >
              <div
                class="color flex flex-col items-center justify-center gap-1 text-sm"
              >
                <i class="fa-solid fa-circle text-[#2163e8]"></i>
                <span class="">مرورگر</span>
              </div>
              <div
                class="color flex flex-col items-center justify-center gap-1 text-sm"
              >
                <i class="fa-solid fa-circle text-[#0cbc87]"></i>
                <span class="">شبکه های اجتماعی</span>
              </div>
              <div
                class="color flex flex-col items-center justify-center gap-1 text-sm"
              >
                <i class="fa-solid fa-circle text-[#d6293e]"></i>
                <span class="">وب سایت</span>
              </div>
              <div
                class="color flex flex-col items-center justify-center gap-1 text-sm"
              >
                <i class="fa-solid fa-circle text-[#f7c32e]"></i>
                <span class="">سایر</span>
              </div>
            </div>
          </div>
          <div class="grid comments-stats">
            <h2 class="text-lg font-semibold">آمار دیدگاه‌ها</h2>
            <div
              class="comments flex flex-col justify-evenly gap-6 mt-4 w-full h-[100%]"
            >
              <a
                class="unread flex gap-26 flex-row items-center justify-between text-blue-400 hover:text-blue-600"
                href="{{ route('dashboard.comments') }}"
              >
                <span>دیدگاه‌های جدید</span>
                <span>{{ $commentStats['pending'] }}</span>
              </a>
              <a
                class="unread flex gap-26 flex-row items-center justify-between text-green-600 hover:text-green-800"
                href="{{ route('dashboard.comments') }}"
              >
                <span>دیدگاه‌های تایید شده</span>
                <span>{{ $commentStats['approved'] }}</span>
              </a>
              <a
                class="unread flex flex-row gap-26 items-center justify-between text-red-600 hover:text-red-800"
                href="{{ route('dashboard.comments') }}"
              >
                <span>دیدگاه‌های رد شده</span>
                <span>{{ $commentStats['rejected'] }}</span>
              </a>
              <a
                class="unread flex flex-row gap-26 items-center justify-between text-yellow-600 hover:text-yellow-800"
                href="{{ route('dashboard.comments') }}"
              >
                <span>دیدگاه‌های هرز</span>
                <span>{{ $commentStats['spam'] }}</span>
              </a>
              <a
                class="unread flex flex-row gap-26 items-center justify-between text-orange-600 hover:text-orange-800"
                href="{{ route('dashboard.comments') }}"
              >
                <span>دیدگاه‌های حذف شده</span>
                <span>{{ $commentStats['deleted'] }}</span>
              </a>
            </div>
          </div>
          <div
            class="posts-table flex flex-col items-center gap-6 overflow-x-scroll"
          >
            <h2 class="text-lg font-semibold text-[var(--text-color)]">
              آخرین مطالب
            </h2>

            <div
              class="relative overflow-x-scroll shadow-md sm:rounded-lg w-full"
            >
              <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
              >
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="px-6 py-3">عنوان</th>
                    <th scope="col" class="px-6 py-3">دسته‌بندی</th>
                    <th scope="col" class="px-6 py-3">تاریخ انتشار</th>
                    <th scope="col" class="px-6 py-3">ویرایش</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($posts as $post)
                  <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                  >
                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      {{ $post->title }}
                    </th>
                    <td class="px-6 py-4">{{ $post->categories->pluck('name')->join('، ') ?: '—' }}</td>
                    <td class="px-6 py-4">
                      @if ($post->published_at)
                        {{ $post->published_at->format('Y/m/d') }}
                      @else
                        —
                      @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                      <a
                        href="{{ route('dashboard.posts.index') }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        >ویرایش</a
                      >
                    </td>
                  </tr>
                  @empty
                  <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                  >
                    <td colspan="4" class="px-6 py-4 text-center">هنوز پستی ثبت نشده است.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
@endsection
