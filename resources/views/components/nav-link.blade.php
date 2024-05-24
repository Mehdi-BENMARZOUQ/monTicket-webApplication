@props(['active'])

@php
    $currentUrl = request()->path();
    $isActiveUserList = $currentUrl === 'userList';
    $isActiveDashboard = $currentUrl === 'dashboard';
    $isActiveEventsList = $currentUrl === 'eventsList';

    $classesUserList = ($isActiveUserList )
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

    $classesDashboard = ($isActiveDashboard )
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

    $classesEventsList = ($isActiveEventsList )
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

@endphp

@if( Auth::user()->role === 'admin' )
<a href="/dashboard" class="{{ $classesDashboard }}">
    Dashboard
</a>

<a href="/userList" class="{{ $classesUserList  }}">
    User List
</a>

<a href="/eventsList" class="{{ $classesEventsList }}">
    Events
</a>
@endif
