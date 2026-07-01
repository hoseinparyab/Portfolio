@extends('Frontend.layouts.dashboard')

@section('title', 'کاربران | مدیریت')

@section('vite')
    @vite(['resources/js/frontend/dashboard.js', 'resources/js/frontend/dashboard-users.js'])
@endsection

@section('content')
    <div class="grid w-[100%]">
        @include('Frontend.partials.spacing')

        <h1 class="text-lg font-semibold mb-6">مدیریت کاربران</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-[#364153] p-4">
            <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">

                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-200 bg-[#2f3847] border border-gray-600 focus:outline-none hover:bg-[#3f4d62] focus:ring-4 focus:ring-gray-600 font-medium rounded-lg text-sm px-3 py-1.5"
                        type="button">
                        <span class="sr-only">عملیات</span>
                        عملیات
                        <svg class="w-2.5 h-2.5 ms-2.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="dropdownAction"
                        class="z-10 hidden bg-[#364153] divide-y divide-gray-600 rounded-lg shadow-sm w-44 border border-gray-600">
                        <ul class="py-1 text-sm text-gray-200" aria-labelledby="dropdownActionButton">
                            <li>
                                <button type="button"
                                    class="block w-full text-right px-4 py-2 hover:bg-[#3f4d62]">
                                    ترفیع
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="block w-full text-right px-4 py-2 hover:bg-[#3f4d62]">
                                    حذف
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="block w-full text-right px-4 py-2 hover:bg-[#3f4d62]">
                                    غیرفعال سازی
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <form method="GET" action="{{ route('dashboard.users.index') }}">
                    <label for="table-search-users" class="sr-only">جستجو</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="search" id="table-search-users"
                            value="{{ request('search') }}"
                            class="block p-2 ps-10 text-sm text-gray-100 border border-gray-600 rounded-lg w-80 bg-[#2f3847] placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="جستجو کاربران">
                    </div>
                </form>
            </div>

            <table class="w-full text-sm text-left rtl:text-right text-gray-300 rounded overflow-hidden">
                <thead class="text-xs text-gray-300 uppercase bg-[#2f3847]">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-[#364153] border-gray-500 rounded-sm">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">نام کاربری</th>
                        <th scope="col" class="px-6 py-3">دسترسی</th>
                        <th scope="col" class="px-6 py-3">وضعیت</th>
                        <th scope="col" class="px-6 py-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="bg-[#364153] border-b border-gray-600 hover:bg-[#3f4d62]">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-user-{{ $user->id }}" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-[#364153] border-gray-500 rounded-sm">
                                    <label for="checkbox-user-{{ $user->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>

                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-100 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full object-cover"
                                    src="{{ $user->avatar ? asset($user->avatar) : asset('src/img/Profile Picture.jpg') }}"
                                    alt="{{ $user->name }}">
                                <div class="ps-3">
                                    <div class="text-base font-normal">{{ $user->name }}</div>
                                    <div class="font-normal text-gray-400">{{ $user->email }}</div>
                                </div>
                            </th>

                            <td class="px-6 py-4">
                                {{ $user->role_label }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-2.5 w-2.5 rounded-full {{ $user->is_active ? 'bg-green-500' : 'bg-red-500' }} me-2">
                                    </div>
                                    {{ $user->is_active ? 'فعال' : 'غیرفعال' }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                    class="font-medium text-blue-400 hover:underline mx-2">
                                    ویرایش
                                </a>

                                <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('از حذف این کاربر مطمئن هستید؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium bg-red-400 hover:underline mx-2 cursor-pointer ">
                                        حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-400">
                                هیچ کاربری یافت نشد.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
@endsection
