<header>
  <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
    @include('partials.logo')
    @php($menu = Navi::build('primary_navigation'))
    @if ($menu->isNotEmpty())
      <nav class="hidden md:block">
        <ul class="flex flex-row p-0 border-gray-100 rounded-lg space-x-8 rtl:space-x-reverse mt-0 border-0">
          @foreach ($menu->all() as $item)
            <li @class([
                $item->classes,
                'hover:text-primary' => !$item->active,
                'text-primary' => $item->active,
            ])>
              <a href="{{ $item->url }}" data-dropdown-trigger="hover"
                @if (!get_field('enable_megamenu', $item->id)) data-dropdown-toggle="dropdown-{{ $item->id }}" @endif
                @if (get_field('enable_megamenu', $item->id)) data-collapse-toggle="megamenu-{{ $item->id }}" @endif
                class="flex items-center justify-between py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">
                {{ $item->label }}
                @if ($item->children)
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4" />
                  </svg>
                @endif
              </a>

              @if ($item->children && !get_field('enable_megamenu', $item->id))
                <div id="dropdown-{{ $item->id }}"
                  class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                  <ul class="py-2 text-sm text-gray-700">
                    @foreach ($item->children as $child)
                      <li @class([
                          $child->classes,
                          'hover:text-primary' => !$child->active,
                          'text-primary' => $child->active,
                      ])>
                        <a href="{{ $child->url }}" class="block px-4 py-2 hover:bg-gray-100">
                          {{ $child->label }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              @endif
            </li>
          @endforeach
        </ul>
      </nav>
    @endif

    <button data-drawer-target="sidebar-navigation" data-drawer-show="sidebar-navigation"
      aria-controls="sidebar-navigation" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

  </div>
  @if ($menu->isNotEmpty())
    <div class="relative">
      @foreach ($menu->all() as $item)
        @if ($item->children && get_field('enable_megamenu', $item->id))
          <div id="megamenu-{{ $item->id }}"
            class="p-20 border-gray-200 shadow-sm bg-gray-50 md:bg-white border-y hidden absolute w-full flex space-x-16">
            @foreach ($item->children as $child)
              <div>
                <p class="text-2xl font-extrabold">{{ $child->label }}</p>
                @if ($child->children)
                  <ul>
                    @foreach ($child->children as $child_l2)
                      <li>
                        <a href="{{ $child_l2->url }}" class="block px-4 py-2 hover:bg-gray-100">
                          {{ $child_l2->label }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                @endif
              </div>
            @endforeach
          </div>
        @endif
      @endforeach
    </div>
  @endif
</header>
<div id="sidebar-navigation"
  class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white"
  tabindex="-1" aria-labelledby="drawer-navigation-label">
  <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
  <button type="button" data-drawer-hide="sidebar-navigation" aria-controls="sidebar-navigation"
    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center">
    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd"
        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
        clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Close menu</span>
  </button>
  <div class="py-4 overflow-y-auto">
    @if ($menu->isNotEmpty())
      <ul class="space-y-2 font-medium">
        @foreach ($menu->all() as $item)
          <li>
            <div class="flex justify-between">
              <a href="{{ $item->url }}"
                class="flex items-center justify-between py-2 px-3 text-gray-900 rounded-lg hover:bg-gray-100">
                {{ $item->label }}

              </a>
              @if ($item->children)
                <button aria-controls="sidebar-dropdown-{{ $item->id }}"
                  data-collapse-toggle="sidebar-dropdown-{{ $item->id }}"
                  class="py-2 px-4 rounded-lg hover:bg-gray-100">
                  <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4" />
                  </svg>
                </button>
              @endif
            </div>

            @if ($item->children)
              <ul id="sidebar-dropdown-{{ $item->id }}" class="hidden py-2 space-y-2">
                @foreach ($item->children as $child)
                  <li>
                    @if (get_field('enable_megamenu', $item->id))
                      <p class="block p-1 pl-4 w-full text-gray-900">{{ $child->label }}</p>
                    @else
                      <a href="{{ $child->url }}" class="block p-1 pl-4 w-full text-gray-500">
                        {{ $child->label }}
                      </a>
                    @endif
                    @if ($child->children)
                      <ul>
                        @foreach ($child->children as $child_l2)
                          <li>
                            <a href="{{ $child_l2->url }}"
                              class="block px-4 pl-6 py-2 text-gray-500 hover:bg-gray-100">
                              {{ $child_l2->label }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>
{{-- 
<x-nav name="primary_navigation" /> 
--}}
