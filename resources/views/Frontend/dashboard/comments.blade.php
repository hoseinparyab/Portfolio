@extends('Frontend.layouts.dashboard')

@section('title', 'دیدگاه‌ها | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-comments.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">

        @include('Frontend.partials.spacing')

        <h2 class="text-lg font-semibold mb-4">مدیریت دیدگاه‌ها</h2>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <div class="flex items-center justify-between flex-col md:flex-row gap-4 p-4 bg-white dark:bg-gray-800">
                <div class="relative">
                    <button id="dropdownActionButton"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700"
                        type="button">
                        عملیات
                        <svg class="w-2.5 h-2.5 ms-2.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdownAction"
                        class="z-10 hidden absolute mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    تأیید
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    حذف
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    هرزنامه
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-comments"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="جستجو">
                </div>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded overflow-hidden">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-comments" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-comments" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">توسط</th>
                        <th scope="col" class="px-6 py-3">دیدگاه</th>
                        <th scope="col" class="px-6 py-3">پست</th>
                        <th scope="col" class="px-6 py-3">تاریخ</th>
                        <th scope="col" class="px-6 py-3">وضعیت</th>
                        <th scope="col" class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-comment-{{ $comment->id }}" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-comment-{{ $comment->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-gray-900 dark:text-white whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <img class="w-10 h-10 rounded-full object-cover"
                                        src="{{ $comment->user?->avatar ?? asset('src/img/Profile Picture.jpg') }}"
                                        alt="{{ $comment->user?->name ?? $comment->name }}">
                                    <div>
                                        <div class="text-base font-normal">
                                            {{ $comment->user?->name ?? $comment->name ?? 'کاربر ناشناس' }}
                                        </div>
                                        <div class="font-normal text-gray-500 text-xs">
                                            {{ $comment->user?->email ?? $comment->email ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 max-w-[350px]">
                                <p class="line-clamp-3">
                                    {{ $comment->content }}
                                </p>
                            </td>

                            <td class="px-6 py-4">
                                @if($comment->post)
                                    <a href="{{ route('posts.show', ['slug' => $comment->post->slug]) }}"
                                        class="text-blue-500 hover:underline">
                                        {{ $comment->post->title }}
                                    </a>
                                @else
                                    <span class="text-gray-400">بدون پست</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                {{ verta($comment->created_at)->format('Y/m/d') }}
                            </td>

                            <td class="px-6 py-4">
                                @if($comment->status == 'approved')
                                    <span class="text-green-600 font-medium">تأیید شده</span>
                                @elseif($comment->status == 'spam')
                                    <span class="text-yellow-600 font-medium">هرزنامه</span>
                                @else
                                    <span class="text-gray-500 font-medium">در انتظار</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex flex-row items-center justify-around gap-2 flex-wrap">

                                    <form action="{{ route('dashboard.comments.approve', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="font-medium text-green-600 cursor-pointer">
                                            تایید
                                        </button>
                                    </form>

                                    <form action="{{ route('dashboard.comments.spam', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="font-medium text-yellow-600 cursor-pointer">
                                            هرز
                                        </button>
                                    </form>

                                    <form action="{{ route('dashboard.comments.destroy', $comment->id) }}" method="POST"
                                        onsubmit="return confirm('از حذف این دیدگاه مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 cursor-pointer">
                                            حذف
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                هنوز هیچ دیدگاهی ثبت نشده است.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($comments, 'links'))
            <div class="mt-6">
                {{ $comments->links() }}
            </div>
        @endif

    </div>
@endsection
