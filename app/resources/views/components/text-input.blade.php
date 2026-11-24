@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 bg-white text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm', 'style' => 'background-color: #ffffff !important; color: #111827 !important; border: 1px solid #d1d5db !important;']) !!}>
