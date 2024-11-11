<!-- resources/views/anggota/index.blade.php -->

<x-app-layout>



    <search-component 
    table="view_anggota" fields="Nama Anggota,Perumahan,Blok No,No_HP" 
    placeholder="Cari anggota..."></search-component>







    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Data Anggota</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Alamat</th>
                    <th class="py-2 px-4 border-b">No HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item->Anggota_id }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->Anggota_nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->Perumahan_nama." ".$item->Anggota_Perumahan_no }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->Anggota_HP }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
