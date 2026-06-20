@extends('Frontend.layouts.dashboard')

@section('title', 'پست ها | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-posts.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')
    <div class="grid w-full bg-[#202D38] p-5 rounded-lg">
        <h1 class="text-lg font-semibold mb-4 text-white">پست های بلاگ</h1>

        @if(session('success'))
            <div class="mb-4 p-3 text-sm text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-[#253341]">
            <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 p-4 bg-[#253341]">
                <div>
                    <button
                        id="dropdownActionButton"
                        data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-white bg-[#344150] border border-[#4b5a6a] focus:outline-none hover:bg-[#3b4958] focus:ring-4 focus:ring-[#314152] font-medium rounded-lg text-sm px-3 py-1.5"
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

                    <div
                        id="dropdownAction"
                        class="z-10 hidden divide-y divide-[#3b4958] rounded-lg shadow-sm w-44 bg-[#344150]"
                    >
                        <ul class="py-1 text-sm text-white" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-[#3b4958]">ترفیغ</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-[#3b4958]">حذف</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-[#3b4958]">غیرفعال سازی</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <label for="table-search" class="sr-only">جستجو</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg
                            class="w-4 h-4 text-gray-300"
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
                        class="block p-2 ps-10 text-sm text-white border border-[#4b5a6a] rounded-lg w-80 bg-[#344150] placeholder-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="جستجو پست ها"
                    />
                </div>
            </div>

            <table class="w-full table-fixed text-sm text-left rtl:text-right text-gray-300 bg-[#253341] rounded overflow-hidden">
                <thead class="text-xs text-gray-200 bg-[#344150]">
                    <tr>
                        <th scope="col" class="p-4 w-14">
                            <div class="flex items-center justify-center">
                                <input
                                    id="checkbox-all-search"
                                    type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-[#344150] border-[#4b5a6a] rounded-sm focus:ring-blue-500"
                                />
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-8 py-3 w-[34%]">عنوان</th>
                        <th scope="col" class="px-8 py-3 w-[34%]">اسلاگ</th>
                        <th scope="col" class="px-8 py-3 w-44 whitespace-nowrap">تاریخ آخرین ویرایش</th>
                        <th scope="col" class="px-8 py-3 w-[18%]">دسته بندی</th>
                        <th scope="col" class="px-8 py-3 w-[18%]">توسط</th>
                        <th scope="col" class="px-8 py-3 w-40 text-center">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr class="bg-[#253341] border-b border-[#3b4958] hover:bg-[#2d3b49]">
                            <td class="w-14 p-4 align-middle">
                                <div class="flex items-center justify-center">
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-[#344150] border-[#4b5a6a] rounded-sm focus:ring-blue-500"
                                    />
                                </div>
                            </td>

                            <th scope="row" class="px-8 py-4 text-white whitespace-nowrap">
                                <div class="flex items-center gap-4">
                                    <img
                                        class="h-12 w-20 rounded object-cover flex-shrink-0"
                                        src="{{ $post->image ? asset($post->image) : asset('src/img/blogpost1.webp') }}"
                                        alt="{{ $post->title }}"
                                    />
                                    <div class="min-w-0">
                                        <a
                                            class="text-green-400 hover:underline font-medium block truncate"
                                            href="{{ route('posts.show', ['slug' => $post->slug]) }}"
                                        >
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                    <div class="min-w-0">
                                </div>
                            </th>

                            <td class="px-8 py-4 text-gray-300 whitespace-nowrap">
                                {{ verta($post->updated_at)->format('Y/m/d') }}
                            </td>

                            <td class="px-8 py-4 text-gray-300">
                                @if($post->categories->count())
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($post->categories as $category)
                                            <span class="text-sm text-gray-300">
                                                {{ $category->name }}@if(!$loop->last)، @endif
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-gray-400">ندارد</span>
                                @endif
                            </td>

                            <td class="px-8 py-4 text-gray-300 break-words">
                                {{ $post->user->email ?? 'نامشخص' }}
                            </td>

                            <td class="px-8 py-4">
                                <div class="flex flex-row items-center justify-center gap-3">
                                    <a
                                        href="{{ route('dashboard.posts.edit', $post->id) }}"
                                        class="font-medium text-blue-400 cursor-pointer"
                                    >
                                        ویرایش
                                    </a>

                                    <form
                                        action="{{ route('dashboard.posts.destroy', $post->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('از حذف این پست مطمئن هستید؟')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="font-medium text-red-600 cursor-pointer"
                                        >
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-[#253341] border-b border-[#3b4958]">
                            <td colspan="6" class="px-6 py-4 text-center text-gray-300">
                                هیچ پستی یافت نشد
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
