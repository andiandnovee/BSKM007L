@props(['id' => null, 'caption' => 'OK', 'hsdata' => '','ariapopup'=>'dialog'])

<div class="text-center">
  <button id="{{$id}}" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="{{$ariapopup}}" aria-expanded="false" aria-controls="{{$hsdata}}" data-hs-overlay="#{{$hsdata}}">
    {{$caption}}
  </button>
</div>