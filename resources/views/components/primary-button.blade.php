<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150', 'style' => 'background-color: #212529 !important; color: #ffffff !important; border: 1px solid #212529 !important;']) }}>
    {{ $slot }}
</button>
