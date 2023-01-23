@props(['posts'])
<div class="border border-gray-200 p-6 rounded-xl mt-6 w-4/5 mx-auto">
  <h1 class="text-center font-bold text-xl">Manage Posts</h1>
  <section class=" col-span-8 col-start-5 space-y-6">
    <div class="container px-4 sm:px-8">
      <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
          <div class="inline-block w-full shadow-md rounded-lg overflow-hidden">
            <table class="w-full leading-normal">
              <thead>
                <tr>
                  <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whtespace-normal">
                    Post Title
                  </th>
                  <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Author
                  </th>
                  <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Status
                  </th>
                  <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    Publication Date
                  </th>
                  <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                <x-post-table-row :post="$post" />
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>