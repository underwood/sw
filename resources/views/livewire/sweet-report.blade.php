<div>
    {{-- Be like water. --}}
  <div class="relative z-50 xl:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/80"></div>

    <div class="fixed inset-0 flex">
      <div class="relative mr-16 flex w-full max-w-xs flex-1">
        <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
          <button type="button" class="-m-2.5 p-2.5">
            <span class="sr-only">Close sidebar</span>
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 ring-1 ring-white/10">
          <div class="flex h-16 shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
              <li>
                <ul role="list" class="-mx-2 space-y-1">
                  <li>
                    <a href="/report" class="text-gray-400 hover:text-white hover:bg-gray-800 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                      <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                      </svg>
                      Report
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden xl:fixed xl:inset-y-0 xl:z-50 xl:flex xl:w-72 xl:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-black/10 px-6 ring-1 ring-white/5">
      <div class="flex h-16 shrink-0 items-center">
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
      </div>
      <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
          <li>
            <ul role="list" class="-mx-2 space-y-1">
              <li>
                <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                <a href="#" class="text-gray-400 hover:text-white hover:bg-gray-800 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                  <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                  </svg>
                  Report
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </div>

  <div class="xl:pl-72">
    <main>
      <header>
<div class="w-1/2 p-4">
  <label for="location" class="block text-sm font-medium leading-6 text-gray-100">Comment Report Type</label>
  <select wire:model="reportType" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
    <option>Comments about candy</option>
    <option>Comments about calling customer</option>
    <option>Comments about referrals</option>
    <option>Comments about signature requirements</option>
    <option>All Other Comments</option>
  </select>
</div>


      </header>

      <!-- Activity list -->
      <div class="border-t border-white/10 pt-11">
        <h2 class="px-4 text-base font-semibold leading-7 text-white sm:px-6 lg:px-8">{{ $reportType }}</h2>
        <table class="mt-6 w-full whitespace-nowrap text-left">
          <thead class="border-b border-white/10 text-sm leading-6 text-white">
            <tr>
              <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Order Id</th>
              <th scope="col" class="py-2 pl-0 pr-8 font-semibold sm:table-cell">Comment</th>
              <th scope="col" class="py-2 pl-0 pr-4 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20">Expected Ship Date</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-white/5">

            @forelse($comments as $comment)

            <tr>
              <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                <div class="flex items-center gap-x-4">
                  <div class="truncate text-sm font-medium leading-6 text-white">{{$comment->orderid}}</div>
                </div>
              </td>
              <td class="hidden py-4 pl-0 pr-4 sm:table-cell sm:pr-8 whitespace-normal overflow-auto">
                <div class="flex gap-x-3">
                  <div class="font-mono text-sm leading-6 text-gray-400">{{ $comment->comments }}</div>
                </div>
              </td>
              <td class="hidden py-4 pl-0 pr-4 sm:table-cell sm:pr-8">
                <div class="flex gap-x-3">
                  <div class="font-mono text-sm leading-6 text-gray-400">{{ $comment->displayShipDate() }}</div>
                </div>
              </td>

            </tr>

            @empty

            @endforelse

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
