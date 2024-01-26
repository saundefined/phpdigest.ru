<a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
   class="group relative bg-white rounded-lg shadow-card border border-gray-100 p-8 w-full shrink-0 lg:p-12">
    <img src="{{ $image }}"
         alt="{{ $title }}" class="h-10 object-contain object-left-top transition group-hover:opacity-80"
         loading="lazy">
    <div class="mt-6">
        <div class="font-medium text-gray-600 group-hover:opacity-80">{{ $title }}</div>
        <div class="mt-2 text-gray-600 group-hover:opacity-80">{{ $description }}</div>
    </div>
</a>