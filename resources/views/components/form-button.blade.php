@props(['type'])

<div class="flex justify-start mt-6 pt-6 border-t border-gray-200">
  <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 "
    type="{{$type}}">{{$slot}}</button>
</div>