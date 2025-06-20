<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex bg-white shadow-md p-2 rounded-md items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      @foreach ($links as $index => $link)
        @if ($index !== count($links) - 1)
          <li class="inline-flex items-center">
              <a href="{{ $link->link }}" class="inline-flex items-center text-sm font-medium text-blackgray hover:text-secondary">
                {{ $link->name }}
              </a>
          </li>
          <li>
              <div class="flex items-center">
                  <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
              </div>
          </li>
        @else
          <li class="inline-flex items-center">
              <span class="inline-flex items-center text-sm font-medium text-secondary">
                {{ $link->name }}
              </span>
          </li>
        @endif
      @endforeach
    </ol>
</nav>
