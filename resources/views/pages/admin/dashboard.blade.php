@extends('layouts.admin')

@section('content')
    

<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
  <p class="text-3xl mb-[1em]">Selamat Datang, <span>{{ auth()->user()->nama }}</span>!</p>
  <div
    class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5"
  >

    <!-- Card Item Start -->
    <div
      class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark"
    >
      <div
        class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-secondary text-white"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>
      
      </div>

      <div class="mt-4 flex items-end justify-between">
        <div>
          <h4
            class="text-title-md font-bold text-secondary"
          >
            {{$countAllSurat}}
          </h4>
          <span class="text-sm font-medium">Total Surat</span>
        </div>
      </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div
      class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark"
    >
      <div
        class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-primary text-white"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
        </svg>
      
      </div>

      <div class="mt-4 flex items-end justify-between">
        <div>
          <h4
            class="text-title-md font-bold text-primary"
          >
          {{$countUploadStatus}}
          </h4>
          <span class="text-sm font-medium">Pengajuan Surat Baru</span>
        </div>

        
      </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div
      class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark"
    >
      <div
        class="flex h-11.5 w-11.5 items-center justify-center rounded-full text-white bg-warning"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
      
      </div>

      <div class="mt-4 flex items-end justify-between">
        <div>
          <h4
            class="text-title-md font-bold text-warning"
          >
            {{$countRevisiStatus}}
          </h4>
          <span class="text-sm font-medium">Surat Dalam Revisi</span>
        </div>

      </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div
      class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark"
    >
      <div
        class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-success text-white"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
        </svg>
      
      </div>

      <div class="mt-4 flex items-end justify-between">
        <div>
          <h4
            class="text-title-md font-bold text-success"
          >
            {{$countDiterimaStatus}}
          </h4>
          <span class="text-sm font-medium">Surat Diterima</span>
        </div>

      </div>
    </div>
    <!-- Card Item End -->
  </div>
  
  </div>
</div>

@endsection
